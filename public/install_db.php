<?php

// SkySoft Systems - Database Migration & Seeder Web Runner
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Product;

echo "<!DOCTYPE html><html><head><title>SkySoft Database Setup</title><style>body{font-family:sans-serif;padding:30px;background:#0f172a;color:#f8fafc;}pre{background:#1e293b;padding:15px;border-radius:10px;color:#38bdf8;}h2{color:#10b981;}</style></head><body>";
echo "<h2>SkySoft Systems - Database Migration & Seeder</h2>";

try {
    echo "<p>1. Running Database Migrations...</p>";
    Artisan::call('migrate', ['--force' => true]);
    echo "<pre>" . Artisan::output() . "</pre>";

    echo "<p>2. Running Database Seeders...</p>";
    Artisan::call('db:seed', ['--force' => true]);
    echo "<pre>" . Artisan::output() . "</pre>";

    echo "<h2 style='color:#10b981;'>&check; Setup Complete Successfully!</h2>";
    echo "<p>Total Products Seeded: " . Product::count() . "</p>";
    echo "<p>Administrator: " . User::first()->email . "</p>";
    echo "<p><a href='/' style='color:#38bdf8;font-weight:bold;'>&rarr; Visit SkySoft Systems Website</a> | <a href='/admin/login' style='color:#38bdf8;font-weight:bold;'>&rarr; Go to Admin Login</a></p>";
} catch (\Exception $e) {
    echo "<h2 style='color:#f43f5e;'>Error: " . $e->getMessage() . "</h2>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
}

echo "</body></html>";
