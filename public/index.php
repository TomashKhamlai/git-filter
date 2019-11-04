<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\FrontController;

/** @var FrontController $frontController */
$frontController = new FrontController();

$frontController->run();
