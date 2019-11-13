<?php

namespace GitFilter\Core;

use GitFilter\Http\RequestValidator;
use GitFilter\Http\Router;
use GitFilter\Http\Response;

class HttpFrontController implements FrontControllerInterface
{

    /**
     * @var Response
     */
    private $response;

    /**
     * @var Router
     */
    private $router;

    public function __construct(GitFilter\Http\Response $response)
    {
        $this->response = $response;
    }

    private function dispatch($request)
    {
        //find router
        $action = $this->router->getAction($request);
        //find executor
        $executor = $action->getExecutor();
        $result = $this->process($request, $executor);
        return $result;
    }

    public function validate(array $requestValidators)
    {
        // Validation goes here
        return $action->execute();
        }


    /**
     *
     */
    public function run(): void
    {
        // TODO: Implement run() method.
    }
}