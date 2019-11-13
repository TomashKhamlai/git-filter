<?php

namespace GitFilter\Http;


class Router
{
    /** @var Request $requestHandler */
    public $requestHandler;

    private $routePattern;
    private static $matchNotFound = true;
    /**
     * @var string[]
     */
    private static $supportedHttpMethods = ["GET", "POST"];

    private static $instance;

    private static $routes = [
        'index' => Index::class
    ];
    /**
     * @var callable
     */
    private $callback;
    /**
     * @var bool
     */
    private $authorize;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Router();
        }

        return self::$instance;
    }

    /**
     * Router constructor.
     * @param \GitFilter\Http\Request $requestHandler
     */
    private function __construct()
    {
        $this->calculateRouteParams();
    }



    public function getController()
    {
        $uri = $this->requestHandler->getUri();

        if (!in_array($uri, self::$routes)) {
            return self::$routes['default'];
        }

        $action = self::$routes[$uri];
        return $action;
    }

    public function getAction()
    {
        $uri = $this->requestHandler->getUri();

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
     */
    function resolve()
    {
        $methodDictionary = $this->{strtolower($this->requestHandler->getMethod())};
        $formattedRoute = $this->formatRoute($this->requestHandler->getUri());
        $method = $methodDictionary[$formattedRoute];

        if (is_null($method)) {
            $this->defaultRequestHandler();
            return;
        }

        echo call_user_func_array($method, array($this->requestHandler));
    }

    public function __call(string $method, array $params)
    {
        if(in_array($method, self::$supportedHttpMethods))
        {

        }
    }

    /**
     * @param string $requestMethod
     * @param string $pattern
     * @param callable $callback
     * @param bool $authorize
     */
    private function route(string $requestMethod, string $pattern, callable $callback, bool $authorize = false)
    {
        if($this->requestHandler->getMethod() !== strtolower($requestMethod)) return;

        if(self::$matchNotFound){
            if($this->isRoute(trim($pattern, '/'))){
                $this->calculateRouteParams();
                self::$matchNotFound = false;
                $this->authorize = $authorize;
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