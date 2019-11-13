<?php
declare(strict_types=1);

if (
    !file_exists("../vendor/autoload.php")
    ||
    !is_readable("../vendor/autoload.php")
) {
    die("Could not find autoloader. Run 'composer install'.");
}

require_once '../vendor/autoload.php';
require_once '../app/bootstrap.php';