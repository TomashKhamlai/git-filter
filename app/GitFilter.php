<?php
declare(strict_types=1);

namespace App;

final class GitFilter
{
    /**
     * @var GitFilter
     */
    private static $application;

    /**
     * gets the instance via lazy initialization (created on first usage)
     */
    public static function getApplication(): GitFilter
    {
        if (static::$application === null) {
            static::$application = new static();
        }

        return static::$application;
    }


    /**
     * GitFilter constructor.
     * Use GitFilter::getApplication() to obtain the instance
     */
    private function __construct()
    {
    }

    /**
     * Prevent copies of applications
     */
    private function __clone()
    {
    }

    /**
     * Prevent serialization of sensitive data
     */
    private function __wakeup()
    {
    }

    public function run()
    {

    }
}