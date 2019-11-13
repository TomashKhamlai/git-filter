<?php
declare(strict_types=1);

namespace GitFilter\Cache\Backend;

class MongoRepository {

    /**
     * @var MongoRepository
     */
    private static $client;

    /**`
     * @return MongoRepository
     * @throws MongoRepositoryException
     */
    public static function getClient(): MongoRepository
    {
        if (!self::$client) {
            self::$client = new MongoRepository();
        }

        return self::$client;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }
}
