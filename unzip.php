<?php
// Auto-extractor for SkySoft Systems deployment
error_reporting(E_ALL);
ini_set('display_errors', 1);

$zipFile = __DIR__ . '/skysoft_app.zip';

if (!file_exists($zipFile)) {
    die("skysoft_app.zip not found yet. Waiting for upload...");
}

$zip = new ZipArchive;
if ($zip->open($zipFile) === TRUE) {
    $zip->extractTo(__DIR__);
    $zip->close();
    @unlink($zipFile);
    echo "<h3>&check; SkySoft Systems deployed and extracted successfully!</h3>";
    echo "<p><a href='/'>&rarr; View Live Website</a> | <a href='/admin/login'>&rarr; Admin Login</a></p>";
} else {
    echo "<h3>Error extracting ZIP bundle.</h3>";
}
