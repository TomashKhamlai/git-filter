<?php

namespace GitFilter\Http;

class Router
{
    /**
     * @var string[]
     */
    private static $supportedHttpMethods = ["GET", "POST"];

    private static $instance;

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

    /**
     * Resolves a route
     * @param Request $request
     */
    function resolve(Request $request)
    {
        $uri = strtolower($request->getUri());

        if (mb_strpos($uri, '/public') === 0)
        {
            
        }

    }
}