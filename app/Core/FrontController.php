<?php
declare(strict_types=1);

namespace GitFilter\Core;

use GitFilter\Http\Request;
use GitFilter\Http\Router;

class FrontController implements FrontControllerInterface
{
    /**
     * @var string
     */
    private $data;

    public function __construct()
    {
        $this->data = "Hello!";
    }

    /**
     * Get information from router and delegate request processing depending of request type
     *
     * SPA should be loaded by for / path
     * API should be processed when /api prefix is used
     * GraphQL should be processed when /api prefix is used
     * noroute leads to 404 page
     * fatal leads to 500 page
     *
     * @param Request $request
     * @param ControllerInterface $controller
     * @return void|boolean
     */
    private function dispatch(Request $request, ControllerInterface $controller)
    {

    }

    private function  getDefaultController(): string
    {
        return $this->data;
    }

    private function  getDefaultAction(): string
    {
        return $this->data;
    }

    public function run(): void
    {
        $request = new Request();
        $router = Router::getInstance();
        $router->resolve($request);
        $controller = $router->getController($request);
        $action = $router->getAction($request);

        $this->dispatch($request, $controller);
    }
}