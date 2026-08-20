<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(300); // 5 minutes

$zip_path = __DIR__ . '/backend.zip';
$backend_dir = realpath(__DIR__ . '/..') . '/backend_app';

if (!file_exists($zip_path)) {
    die("backend.zip not found. Waiting for FTP to upload it...");
}

// 1. Unzip Laravel
if (!is_dir($backend_dir)) {
    mkdir($backend_dir, 0755, true);
}

echo "Extracting backend.zip...<br>";
$zip = new ZipArchive;
if ($zip->open($zip_path) === TRUE) {
    $zip->extractTo($backend_dir);
    $zip->close();
    echo "Extracted successfully.<br>";
} else {
    die("Failed to extract ZIP.");
}

// 2. Composer Install (Skipped because it's done in GitHub Actions)

// 3. Setup SQLite Database
$db_file = $backend_dir . '/database/database.sqlite';
if (!file_exists($db_file)) {
    touch($db_file);
}

// 4. Set .env
$env_content = "
APP_NAME=Laravel
APP_ENV=production
APP_KEY=base64:w/M/uT8f5r6i/jZ9Lh3M2A1pD3R6v5Y7+wQ8tH0sE9A=
APP_DEBUG=false
APP_URL=https://skysoftsystems.co.ke
DB_CONNECTION=sqlite
DB_DATABASE=" . $db_file . "
";
file_put_contents($backend_dir . '/.env', trim($env_content));

// 5. Run Migrations and create admin user programmatically
echo "Running Migrations...<br>";
$setup_script = "
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

try {
    Artisan::call('migrate', ['--force' => true]);
    echo '<pre>' . Artisan::output() . '</pre>';

    if (!User::where('email', 'wmutunga003@gmail.com')->exists()) {
        User::create([
            'name' => 'Willy Mutunga',
            'email' => 'wmutunga003@gmail.com',
            'password' => Hash::make('William#20'),
        ]);
        echo 'User created.<br>';
    } else {
        echo 'User already exists.<br>';
    }
} catch (\Exception \$e) {
    echo 'Error: ' . \$e->getMessage();
}
";

file_put_contents($backend_dir . '/setup_user.php', "<?php require __DIR__.'/vendor/autoload.php'; \$app = require_once __DIR__.'/bootstrap/app.php'; \$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap(); " . $setup_script);

// Include it directly so it runs in the same PHP process!
require_once $backend_dir . '/setup_user.php';

// 7. Setup public API routing
$api_dir = __DIR__ . '/api';
if (!is_dir($api_dir)) {
    mkdir($api_dir, 0755, true);
}
// Copy Laravel public files to api/
shell_exec("cp -r $backend_dir/public/* $api_dir/");

// Rewrite index.php paths
$index_php = file_get_contents($api_dir . '/index.php');
$index_php = str_replace("__DIR__.'/../vendor", "__DIR__.'/../../backend_app/vendor", $index_php);
$index_php = str_replace("__DIR__.'/../bootstrap", "__DIR__.'/../../backend_app/bootstrap", $index_php);
$index_php = str_replace("__DIR__.'/../storage", "__DIR__.'/../../backend_app/storage", $index_php);
file_put_contents($api_dir . '/index.php', $index_php);

// Add .htaccess to point everything to index.php
$htaccess = "
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ index.php [L]
</IfModule>
";
file_put_contents($api_dir . '/.htaccess', trim($htaccess));

echo "Laravel API deployment complete! SUCCESS";
?>
