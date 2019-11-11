<?php

namespace App;

use Services\Http\Request;
use Services\Http\Response;
use Services\Http\Router;

class FrontController
{
    private static $context;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public static function getContext(Router $router)
    {
        if(is_null(self::$context)):
            self::$context = new FrontController($router);
        endif;

        return self::$context;
    }

    /**
     * ToDO: Write description
     */
    public function run()
    {
        $router = new Router(new Request(), new Response());
    }

    public function getRouter()
    {
        return $this->router;
    }

    public function setViewDirectory($dir)
    {
        if(is_dir($dir)):
            $this->router->responseHandler->setViewDir(realpath($dir));
        else:
            throw new \Exception("{$dir} is not a valid directory.");
        endif;
    }
}
