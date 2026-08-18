<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$payload_dir = __DIR__ . '/backend_payload';
$backend_dir = realpath(__DIR__ . '/../backend_app');

if (!$backend_dir) {
    // Attempt to resolve home directory
    $backend_dir = realpath(__DIR__ . '/..') . '/backend_app';
    if (!is_dir($backend_dir)) {
        @mkdir($backend_dir, 0755, true);
    }
}

function recursiveCopy($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while (false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recursiveCopy($src . '/' . $file, $dst . '/' . $file);
            }
            else {
                if (file_exists($dst . '/' . $file)) {
                    @chmod($dst . '/' . $file, 0666);
                }
                @copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

if (is_dir($payload_dir)) {
    recursiveCopy($payload_dir, $backend_dir);
    echo "Backend files copied successfully.<br>";
} else {
    die("No backend_payload found at $payload_dir.");
}

// Restart Passenger
$tmp_dir = $backend_dir . '/tmp';
if (!is_dir($tmp_dir)) {
    mkdir($tmp_dir, 0755, true);
}
touch($tmp_dir . '/restart.txt');
echo "Passenger restarted successfully!<br>SUCCESS";
?>
