<?php

namespace GitFilter\Http;

use GitFilter\Core\ControllerInterface;

class HttpController implements ControllerInterface
{
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
        $this->router = Router::getInstance();
    }

    public function execute()
    {
        // TODO: Implement execute() method.
    }
}
