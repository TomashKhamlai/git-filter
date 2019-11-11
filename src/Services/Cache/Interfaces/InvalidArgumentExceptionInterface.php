<?php

namespace Services\Cache\Interfaces;

/**
 * Exception interface for invalid cache arguments.
 *
 * Any time an invalid argument is passed into a method it must throw an
 * exception class which implements Psr\Cache\InvalidArgumentException.
 */
interface InvalidArgumentExceptionInterface extends CacheExceptionInterface
{
}
