<?php
declare(strict_types=1);

namespace GitFilter\Http;

use GitFilter\Http\Interfaces\RequestInterface;

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
     * @var string
     */
    private $serverProtocol;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->serverProtocol = $_SERVER['SERVER_PROTOCOL'];
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
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @inheritDoc
     */
    public function getParams(): array
    {
        return $this->params;
    }


    /**
     * @inheritDoc
     */
    public function getParam(string $key)
    {
        if(array_key_exists($key, $this->params))
        {
            return filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return false;
    }

    /**
     * @inheritDoc
     */
    public function getProtocol(): string
    {
        return $this->serverProtocol;
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
