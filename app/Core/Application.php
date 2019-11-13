<?php
declare(strict_types=1);

namespace GitFilter\Core;

class Application {

    /**
     * Application constructor.
     */
    public function __construct()
    {
        echo __NAMESPACE__;
        /** @var FrontController $frontController */
        $frontController = new FrontController();
        $frontController->run();
    }

    public function sayHello()
    {
        echo "Hello!";
    }
}