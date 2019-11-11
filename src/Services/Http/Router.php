<?php

namespace Services\Http;

use Services\Http\Request;

class Router
{
    /** @var Request $requestHandler */
    public $requestHandler;

    /** @var Response $responseHandler */
    public $responseHandler;

    private $routePattern;
    private static $matchNotFound = true;
    /**
     * @var string[]
     */
    private $supportedHttpMethods = ["GET", "POST"];

    private static $routes = [
        'index' => IndexAction::class,
        'default' => DefaultAction::class,
    ];

    function __construct(Request $requestHandler, Response $responseHandler)
    {
        $this->requestHandler = $requestHandler;
        $this->responseHandler = $responseHandler;
        $this->calculateRouteParams();
    }

    public function getActionName()
    {
        $uri = $this->requestHandler->getUri();

        if (!in_array($uri, self::$routes)) {
            return self::$routes['default'];
        }

        return self::$routes[$uri];
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
        if(in_array($method, $this->supportedHttpMethods))
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
        $raw_route = trim(str_replace("?{$this->requestHandler->getParams()}", "", $this->requestHandler->requestUri), "/");
        $this->routePattern = strtolower($pattern);

        if($pattern === $this->route) // direct route
            return true;
        else
            return $this->isIndirectRoute();
        return false;
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