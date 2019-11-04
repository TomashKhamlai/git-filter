<?php
declare(strict_types=1);

namespace Services\Http;

use Services\Http\Interfaces\RequestInterface;

class Request implements RequestInterface
{
    /**
     * @var mixed
     */
    private $method;

    /**
     * @var mixed
     */
    private $uri;

    /**
     * @var array
     */
    private $params;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        if ($this->method == 'POST') {
            $this->params = $_POST;
        }
        if ($this->method == 'GET') {
            $this->params = $_GET;
        }
    }

    /**
     * @inheritDoc
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @inheritDoc
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @inheritDoc
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        // TODO: Implement getData() method.
    }

    /**
     * @inheritDoc
     */
    public function getRawData()
    {
        // TODO: Implement getRawData() method.
    }
}
