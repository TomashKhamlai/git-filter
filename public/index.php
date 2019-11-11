<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');


use App\FrontController;

if (
    !file_exists(dirname(__DIR__) . '/vendor/autoload.php')
    ||
    !is_readable(dirname(__DIR__) . '/vendor/autoload.php')
) {
    die("Could not find autoloader. Run 'composer install'.");
}

require_once dirname(__DIR__) . '/vendor/autoload.php';

/** @var FrontController $frontController */
$frontController = new FrontController();
$frontController->run();
