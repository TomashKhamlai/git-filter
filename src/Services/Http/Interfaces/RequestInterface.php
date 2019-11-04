<?php
declare(strict_types=1);

namespace Services;

interface RequestInterface
{
    /**
     * Getter for method
     *
     * @return mixed
     */
    public function getMethod();

    /**
     * Getter for URI
     *
     * @return mixed
     */
    public function getUri();

    /**
     * Getter for params
     *
     * @return mixed
     */
    public function getParams();

    /**
     * Getter for the raw data
     */
    public function getRawData();

    /**
     * Getter for the filtered input
     */
    public function getData();
}
