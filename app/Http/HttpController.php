<?php

namespace GitFilter\Http;

use GitFilter\Http\Request;
use GitFilter\Http\Response;
use GitFilter\Http\Router;

class HttpController
{

    private static $viewController = [
        'index' => 'home/index.phtml',
        'default' => 'errors/default.phtml'
    ];
    /**
     * @var \GitFilter\Http\Router
     */
    private $router;

    /**
     * HttpController constructor.
     * @param Router $router
     */
    public function __construct()
    {
        $this->router = new Router(new Request());
    }

    /**
     * @param Router $router
     * @return HttpController
     */
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
        $request = new Request();
        $response = new Response();
        $router = new Router($request);
        $actionName = $router->getActionName();
        $action = new $actionName($response);

        return $response;
    }

    /**
     * @return Router
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @param $dir
     * @throws \Exception
     */
    public function setViewDirectory($dir)
    {
        if(is_dir($dir)):
            $this->router->responseHandler->setViewDir(realpath($dir));
        else:
            throw new \Exception("{$dir} is not a valid directory.");
        endif;
    }
}
