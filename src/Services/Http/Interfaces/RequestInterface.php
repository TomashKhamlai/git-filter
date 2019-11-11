<?php
declare(strict_types=1);

namespace Services\Http\Interfaces;

interface RequestInterface
{
    /**
     * Getter for method
     *
     * @return string
     */
    public function getMethod(): string;

    /**
     * Getter for URI
     *
     * @return string
     */
    public function getUri(): string;

    /**
     * Getter for params
     *
     * @return mixed
     */
    public function getParams();

    /**
     * Getter for specific parameter
     *
     * @param string $key
     * @return string|null
     */
    public function getParam(string $key);

    /**
     * Getter for the protocol type
     *
     * @return string
     */
    public function getProtocol(): string;
    /**
     * Getter for the raw data
     */
    public function getRawData();

    /**
     * Getter for the filtered input
     */
    public function getData();
}
