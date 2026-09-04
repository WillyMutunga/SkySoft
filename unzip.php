<?php
// Auto-extractor & Legacy Artifact Cleaner for SkySoft Systems
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 1. Remove old React SPA index.html so Apache strictly serves Laravel Blade index.php
if (file_exists(__DIR__ . '/index.html')) {
    @unlink(__DIR__ . '/index.html');
}
if (file_exists(__DIR__ . '/public/index.html')) {
    @unlink(__DIR__ . '/public/index.html');
}

$zipFile = __DIR__ . '/skysoft_app.zip';

if (file_exists($zipFile)) {
    $zip = new ZipArchive;
    if ($zip->open($zipFile) === TRUE) {
        $zip->extractTo(__DIR__);
        $zip->close();
        @unlink($zipFile);
        echo "<h3>&check; SkySoft Systems deployed and extracted successfully!</h3>";
    } else {
        echo "<h3>Error extracting ZIP bundle.</h3>";
    }
}

// Ensure index.html is definitely gone
if (file_exists(__DIR__ . '/index.html')) {
    @unlink(__DIR__ . '/index.html');
}

echo "<h3>&check; Legacy React files cleaned up. Laravel is now active across all routes!</h3>";
echo "<p><a href='/'>&rarr; View Live Website (Home)</a> | <a href='/products'>&rarr; Products Catalog</a> | <a href='/admin/products'>&rarr; Admin Products</a></p>";
