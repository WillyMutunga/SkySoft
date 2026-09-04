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

// Bootstrap Laravel to run Artisan commands if composer autoload exists
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
    $app = require_once __DIR__ . '/bootstrap/app.php';
    
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();

    try {
        Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        echo "<p>&check; Migrations: " . Illuminate\Support\Facades\Artisan::output() . "</p>";
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
}

echo "<h3>&check; SkySoft Systems is fully synced, cache-cleared, and live!</h3>";
echo "<p><a href='/'>&rarr; Live Website</a> | <a href='/admin/dashboard'>&rarr; Admin Dashboard</a> | <a href='/admin/settings'>&rarr; Company Settings</a></p>";
