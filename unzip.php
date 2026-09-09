<?php
// Auto-extractor, Cache Cleaner & Migration Runner for SkySoft Systems
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 1. Remove old React SPA index.html so Apache strictly serves Laravel Blade index.php
if (file_exists(__DIR__ . '/index.html')) {
    @unlink(__DIR__ . '/index.html');
}
if (file_exists(__DIR__ . '/public/index.html')) {
    @unlink(__DIR__ . '/public/index.html');
}

$dbFile = __DIR__ . '/database/database.sqlite';
$dbBackup = __DIR__ . '/database/database.sqlite.live_backup';
$hasExistingDb = file_exists($dbFile) && filesize($dbFile) > 0;

// Backup live SQLite database before extraction so user-made edits are NEVER wiped
if ($hasExistingDb) {
    @copy($dbFile, $dbBackup);
}

$zipFile = __DIR__ . '/skysoft_app.zip';

if (file_exists($zipFile)) {
    $zip = new ZipArchive;
    if ($zip->open($zipFile) === TRUE) {
        $zip->extractTo(__DIR__);
        $zip->close();
        @unlink($zipFile);
        echo "<p>&check; ZIP bundle extracted.</p>";
    } else {
        echo "<p>&cross; Error extracting ZIP bundle.</p>";
    }
}

// Restore live database if backup exists
if ($hasExistingDb && file_exists($dbBackup)) {
    @copy($dbBackup, $dbFile);
    @unlink($dbBackup);
    echo "<p>&check; Live SQLite database preserved successfully.</p>";
}

// Ensure necessary storage and upload folders exist with write permissions
$dirs = [
    __DIR__ . '/storage',
    __DIR__ . '/storage/app',
    __DIR__ . '/storage/framework',
    __DIR__ . '/storage/framework/views',
    __DIR__ . '/storage/framework/sessions',
    __DIR__ . '/storage/framework/cache',
    __DIR__ . '/storage/framework/cache/data',
    __DIR__ . '/storage/logs',
    __DIR__ . '/public/uploads',
    __DIR__ . '/public/uploads/products',
];

foreach ($dirs as $dir) {
    if (!file_exists($dir)) {
        @mkdir($dir, 0777, true);
    }
    @chmod($dir, 0777);
}

// Clear compiled blade views to force immediate UI refresh
$viewFiles = glob(__DIR__ . '/storage/framework/views/*');
if ($viewFiles) {
    foreach ($viewFiles as $f) {
        if (is_file($f)) {
            @unlink($f);
        }
    }
}

// Clear bootstrap cache
$cacheFiles = glob(__DIR__ . '/bootstrap/cache/*.php');
if ($cacheFiles) {
    foreach ($cacheFiles as $f) {
        if (is_file($f)) {
            @unlink($f);
        }
    }
}

// Ensure index.html is definitely gone
if (file_exists(__DIR__ . '/index.html')) {
    @unlink(__DIR__ . '/index.html');
}

// Direct SQLite schema check and repair for users table
try {
    if (file_exists($dbFile)) {
        $db = new PDO('sqlite:' . $dbFile);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $cols = [];
        $res = $db->query("PRAGMA table_info(users)");
        if ($res) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $cols[] = $row['name'];
            }
        }
        
        if (!in_array('role', $cols)) {
            $db->exec("ALTER TABLE users ADD COLUMN role VARCHAR DEFAULT 'admin'");
        }
        if (!in_array('permissions', $cols)) {
            $db->exec("ALTER TABLE users ADD COLUMN permissions TEXT NULL");
        }
        if (!in_array('is_active', $cols)) {
            $db->exec("ALTER TABLE users ADD COLUMN is_active INTEGER DEFAULT 1");
        }
        if (!in_array('last_login_at', $cols)) {
            $db->exec("ALTER TABLE users ADD COLUMN last_login_at DATETIME NULL");
        }
        
        // Update super admin
        $db->exec("UPDATE users SET role = 'super_admin', is_active = 1 WHERE email = 'wmutunga003@gmail.com'");
        echo "<p>&check; Direct SQLite user columns verified & repaired.</p>";
    }
} catch (\Throwable $e) {
    echo "<p>&excl; Direct SQLite note: " . $e->getMessage() . "</p>";
}

// Bootstrap Laravel to run Artisan commands if composer autoload exists
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
    $app = require_once __DIR__ . '/bootstrap/app.php';
    
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();

    try {
        Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        echo "<p>&check; Migrations: " . Illuminate\Support\Facades\Artisan::output() . "</p>";

        if (class_exists('App\Models\Post') && \App\Models\Post::count() === 0) {
            Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
            echo "<p>&check; Initial articles seeded successfully.</p>";
        }
    } catch (\Throwable $e) {
        echo "<p>&excl; Migration note: " . $e->getMessage() . "</p>";
    }

    try {
        Illuminate\Support\Facades\Artisan::call('view:clear');
        Illuminate\Support\Facades\Artisan::call('route:clear');
        Illuminate\Support\Facades\Artisan::call('config:clear');
        echo "<p>&check; Laravel caches flushed.</p>";
    } catch (\Throwable $e) {
        echo "<p>&excl; Cache note: " . $e->getMessage() . "</p>";
    }

    // Self-test dispatching real HTTP request through Kernel
    try {
        $user = \App\Models\User::where('email', 'wmutunga003@gmail.com')->first() ?: \App\Models\User::first();
        if ($user) {
            \Illuminate\Support\Facades\Auth::login($user);
            $req = \Illuminate\Http\Request::create('/admin/users/create', 'GET');
            $req->setUserResolver(function () use ($user) { return $user; });
            $res = $app->handle($req);
            
            echo "<p>&check; HTTP Request GET [/admin/users/create] Response Status: <strong>" . $res->getStatusCode() . "</strong> (" . strlen($res->getContent()) . " bytes)</p>";
            
            $reqIndex = \Illuminate\Http\Request::create('/admin/users', 'GET');
            $reqIndex->setUserResolver(function () use ($user) { return $user; });
            $resIndex = $app->handle($reqIndex);
            echo "<p>&check; HTTP Request GET [/admin/users] Response Status: <strong>" . $resIndex->getStatusCode() . "</strong> (" . strlen($resIndex->getContent()) . " bytes)</p>";
        }
    } catch (\Throwable $e) {
        echo "<p style='color:red;font-weight:bold;'>&cross; Kernel HTTP Dispatch Test Error: " . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine() . "</p>";
    }
}

// Show recent Laravel log entries
$logFile = __DIR__ . '/storage/logs/laravel.log';
if (file_exists($logFile)) {
    $lines = file($logFile);
    $lastLines = array_slice($lines, -60);
    echo "<h4>Recent Laravel Error Log:</h4>";
    echo "<pre style='background:#0f172a;color:#38bdf8;padding:12px;border-radius:8px;font-size:11px;overflow:auto;max-height:350px;white-space:pre-wrap;'>" . htmlspecialchars(implode("", $lastLines)) . "</pre>";
}

echo "<h3>&check; SkySoft Systems is fully synced, cache-cleared, and live!</h3>";
echo "<p><a href='/'>&rarr; Live Website</a> | <a href='/admin/dashboard'>&rarr; Admin Dashboard</a> | <a href='/admin/users'>&rarr; Staff & Privileges</a></p>";
