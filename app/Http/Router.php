<?php

namespace GitFilter\Http;


use App\Controller\GraphQlController;
use App\Controller\WebApiController;

class Router
{
    private $routePattern;

    private static $matchNotFound = true;
    /**
     * @var string[]
     */
    private static $supportedHttpMethods = ["GET", "POST"];

    private static $instance;

    private static $routes = [
        'found' => HttpController::class,
        'api' => WebApiController::class,
        'graphql' => GraphQlController::class,
        'default' => ErrorHandler::class,
    ];
    /**
     * @var callable
     */
    private $callback;
    /**
     * @var bool
     */
    private $authorize;

    public static function getInstance(): Router
    {
        if (!self::$instance) {
            self::$instance = new Router();
        }

        return self::$instance;
    }

    /**
     * Router constructor.
     */
    private function __construct()
    {
    }

    public function getController(Request $request)
    {
        $uri = $request->getUri();

        if (!in_array($uri, self::$routes)) {
            return self::$routes['default'];
        }

        $action = self::$routes[$uri];
        return $action;
    }

    public function getAction(Request $request)
    {
        $uri = $request->getUri();

        if (!in_array($uri, self::$routes)) {
            return self::$routes['default'];
        }

        $action = self::$routes[$uri];
        return $action;
    }

    /**
     * Removes trailing forward slashes from the right of the route.
     * @param $route (string)
     * @return string
     */
    private function formatRoute($route)
    {
        $result = rtrim($route, '/');
        if ($result === '') {
            return '/';
        }
        return $result;
    }

    /**
     * @return array
     */
    public function getRoutes()
    {
        return self::$routes;
    }

    private function defaultRequestHandler()
    {
        header("{$this->requestHandler->getProtocol()} 404 Not Found");
    }

    /**
     * Resolves a route
     * @param Request $request
     */
    function resolve(Request $request)
    {
        $method = strtolower($request->getMethod());
        $pathInfo = explode('/', strtolower($request->getUri()));
        echo "method: " . $method . ", path: " . var_dump($pathInfo);
    }

    public function __call(string $method, array $params)
    {
        if(in_array($method, self::$supportedHttpMethods))
        {
            echo "Nice";
        }
    }

    /**
     * @param string $requestMethod
     * @param string $pattern
     * @param callable $callback
     */
    private function route(string $requestMethod, string $pattern, callable $callback)
    {
        if($this->requestHandler->getMethod() !== strtolower($requestMethod)) return;

        if(self::$matchNotFound){
            if($this->isRoute(trim($pattern, '/'))){
                $this->calculateRouteParams();
                self::$matchNotFound = false;
                $this->callback = $callback;
            }
        }
    }

    private function isRoute($pattern)
    {
        $raw_route = trim(str_replace("?{$this->requestHandler->getParams()}", "", $this->requestHandler->getUri()), "/");
        $this->routePattern = strtolower($pattern);

        return false|true;
    }

    function __destruct()
    {
        $this->resolve();
    }

    private function calculateRouteParams()
    {
        echo "Calculating";
    }
}