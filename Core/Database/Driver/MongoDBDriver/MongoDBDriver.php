<?php

namespace Rave\Core\Database\Driver;

use Rave\Core\Error;
use Rave\Core\Database\NoSQLDriver;

class MongoDBDriver implements NoSQLDriver
{
    private static $_instance;
    
    const DEFAULT_CONNECTION = 'mongodb://localhost:27017';
    
    private static function getInstance()
    {
        if (isset(self::$_instance) === false) {
            self::$_instance = new \MongoClient(self::DEFAULT_CONNECTION);
        }
        
        return self::$_instance;
    }
    
    public static function delete(array $key)
    {
        try {
            $database = $this->database;
            $collection = $this->collection;
            self::getInstance()->$database->$collection->remove($key);
        } catch (\Exception $exception) {
            Error::create($exception->getMessage(), '500');
        }
    }

    public static function insert(array $key, array $values)
    {
        
    }

    public static function select(array $key)
    {
        
    }

    public static function selectOne(array $key)
    {
        
    }

    public static function update(array $key, array $values, $method)
    {
        
    }

}
