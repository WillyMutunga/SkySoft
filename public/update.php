<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$backend_dir = realpath(__DIR__ . '/../backend_app');
if (!$backend_dir) {
    die("Could not find backend_app folder. Looking at: " . __DIR__ . '/../backend_app');
}

// 1. Update urls.py
$urls_py = $backend_dir . '/skysoft_backend/urls.py';
$new_urls_content = "from django.contrib import admin\nfrom django.urls import path, include, re_path\nfrom django.views.static import serve\nfrom django.conf import settings\n\nurlpatterns = [\n    path('admin/', admin.site.urls),\n    path('api/', include('products.urls')),\n    re_path(r'^static/(?P<path>.*)$', serve, {'document_root': settings.STATIC_ROOT}),\n]\n";
file_put_contents($urls_py, $new_urls_content);
echo "urls.py updated.<br>";

// 2. Move staticfiles
$payload_dir = __DIR__ . '/staticfiles_payload';
$target_dir = $backend_dir . '/staticfiles';

function recursiveCopy($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while (false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recursiveCopy($src . '/' . $file, $dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

if (is_dir($payload_dir)) {
    recursiveCopy($payload_dir, $target_dir);
    echo "staticfiles copied.<br>";
} else {
    echo "no staticfiles payload found at $payload_dir.<br>";
}

// 3. Restart Passenger
$tmp_dir = $backend_dir . '/tmp';
if (!is_dir($tmp_dir)) {
    mkdir($tmp_dir, 0755, true);
}
touch($tmp_dir . '/restart.txt');
echo "Passenger restarted!<br>SUCCESS";
?>
