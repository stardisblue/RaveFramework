<?php

namespace Rave\Core\Database;

interface NoSQLDriver {
    
    public static function insert(array $key, array $values);
    
    public static function select(array $key);
    
    public static function selectOne(array $key);
    
    public static function update(array $key, array $values, $method);
    
    public static function delete(array $key);

}
