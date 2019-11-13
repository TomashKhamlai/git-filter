<?php
declare(strict_types=1);

namespace Services\Cache\Backend;

class MongoDb {

    public static function getClient(): \MongoClient
    {
        $client = new \MongoClient();
        return $client;
    }
}

