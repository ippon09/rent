<?php
$scheme =(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : 'http';
$base = rtrim(dirname($_SERVER['SCRIPT_NAME']),'/\\') . '/';
define("BASE_URL", $scheme . "://" . $_SERVER['HTTP_HOST'] . $base);
define("SECOND_PAGE_URL", BASE_URL . "second_page.php");
?>