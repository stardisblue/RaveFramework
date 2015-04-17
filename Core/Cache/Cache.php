<?php

namespace Rave\Core\Cache;

abstract class Cache
{ 
    protected static $_instance;
    
    private static function getInstance()
    {
        if (!isset(self::$_instance))
        {
            self::$_instance = new \Memcache();
        }
        return self::$_instance;
    }
    
    public static function set($key, $value, $lifeTime = 0)
    {
        self::getInstance()->set($key, $value, $lifeTime);
    }

    public static function delete($key)
    {
        self::getInstance()->delete($key);
    }

    public static function update($key, $value, $lifeTime = 0)
    {
        self::getInstance()->update($key, $value, $lifeTime);
    }

}
