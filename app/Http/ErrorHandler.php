<?php


namespace GitFilter\Http;


class ErrorHandler
{
    public function __construct(\Exception $error)
    {
        echo $error->getTraceAsString();
    }
}