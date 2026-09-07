<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Auto-extract new deployment bundle if uploaded
$zipFile = __DIR__ . '/skysoft_app.zip';
if (!file_exists($zipFile) && file_exists(__DIR__ . '/../skysoft_app.zip')) {
    $zipFile = __DIR__ . '/../skysoft_app.zip';
}

if (file_exists($zipFile)) {
    $targetDir = dirname($zipFile);
    $dbFile = $targetDir . '/database/database.sqlite';
    $dbBackup = $targetDir . '/database/database.sqlite.live_backup';
    $hasExistingDb = file_exists($dbFile) && filesize($dbFile) > 0;
    if ($hasExistingDb) {
        @copy($dbFile, $dbBackup);
    }
    
    $zip = new \ZipArchive;
    if ($zip->open($zipFile) === TRUE) {
        $zip->extractTo($targetDir);
        $zip->close();
        @unlink($zipFile);
    }
    
    if ($hasExistingDb && file_exists($dbBackup)) {
        @copy($dbBackup, $dbFile);
        @unlink($dbBackup);
    }
    
    // Clear compiled views to force immediate refresh
    $viewFiles = glob($targetDir . '/storage/framework/views/*');
    if ($viewFiles) {
        foreach ($viewFiles as $f) {
            if (is_file($f)) {
                @unlink($f);
            }
        }
    }
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());

