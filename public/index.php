<?php
declare(strict_types=1);

try {
    require __DIR__ . '/config/bootstrap.php';
} catch (\Exception $e) {
    die('Probably you have wrong .htaccess file or problems with permissions');
}

require_once DOC_ROOT . "/../vendor/autoload.php";

