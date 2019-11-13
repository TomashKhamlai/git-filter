<?php
declare(strict_types=1);

namespace GitFilter\Http;

use GitFilter\Http\Interfaces\ResponseInterface;

class Response implements ResponseInterface
{
    const HTTP_OK = 200;
    const HTTP_FOUND = 302;
    const HTTP_NOT_FOUND = 404;
    const HTTP_INTERNAL_SERVER_ERROR = 500;

    public static $statusTexts = [
        200 => 'OK',
        302 => 'Found',
        404 => 'Not Found',
        500 => 'Internal Server Error'
    ];

    /**
     * @var string
     */
    private $content;

    /**
     * @var array
     */
    private $headers;

    /**
     * @var int
     */
    private $status;

    /**
     * Response constructor.
     * @param string $content
     * @param int $status
     * @param array $headers
     */
    public function __construct(string $content = '', int $status = 200, array $headers = [])
    {
        $this->content = $content;
        $this->status = $status;
        $this->headers = $headers;
    }

    /**
     * Allows to create Response object with initialization
     *
     * @param $content
     * @param $status
     * @param $headers
     * @return static
     */
    public static function create($content, $status, $headers)
    {
        return new static($content, $status, $headers);
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->content;
    }

    /**
     *
     */
    public function setHeader()
    {
        /**  ToDO:add support for $key, $value */
        header("Content-type: text/json");
    }

    public function setBody($body)
    {
        $this->content = $body;
    }

}
