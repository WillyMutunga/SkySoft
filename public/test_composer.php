<?php
echo "<pre>";
echo shell_exec('composer -V 2>&1');
echo shell_exec('php -v 2>&1');
echo "</pre>";
?>
