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

// 2. Composer Install
echo "Running Composer install...<br>";
$output = shell_exec("cd $backend_dir && composer install --no-dev --optimize-autoloader 2>&1");
echo "<pre>$output</pre>";

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

// 5. Run Migrations
echo "Running Migrations...<br>";
$output = shell_exec("cd $backend_dir && php artisan migrate --force 2>&1");
echo "<pre>$output</pre>";

// 6. Create Admin User
echo "Setting up admin user...<br>";
$setup_script = "
use App\Models\User;
use Illuminate\Support\Facades\Hash;
if (!User::where('email', 'wmutunga003@gmail.com')->exists()) {
    User::create([
        'name' => 'Willy Mutunga',
        'email' => 'wmutunga003@gmail.com',
        'password' => Hash::make('William#20'),
    ]);
    echo 'User created.';
} else {
    echo 'User already exists.';
}
";
file_put_contents($backend_dir . '/setup_user.php', "<?php require __DIR__.'/vendor/autoload.php'; \$app = require_once __DIR__.'/bootstrap/app.php'; \$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap(); " . $setup_script);
echo shell_exec("cd $backend_dir && php setup_user.php 2>&1");

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
