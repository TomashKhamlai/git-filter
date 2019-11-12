<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
define('DOC_ROOT', dirname(__DIR__));

if (
    !file_exists(DOC_ROOT . "/../vendor/autoload.php")
    ||
    !is_readable(DOC_ROOT . "/../vendor/autoload.php")
) {
    die("Could not find autoloader. Run 'composer install'.");
}
