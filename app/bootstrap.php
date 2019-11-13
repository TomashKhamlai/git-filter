<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
define('DOC_ROOT', dirname(__DIR__));

if (
    !file_exists("../vendor/autoload.php")
    ||
    !is_readable("../vendor/autoload.php")
) {
    die("Could not find autoloader. Run 'composer install'.");
}

require_once 'Core/Application.php';

$app = new GitFilter\Core\Application;
