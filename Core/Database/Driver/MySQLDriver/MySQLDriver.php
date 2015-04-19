<?php

namespace Rave\Core\Database\Driver;

use Rave\Core\Database\Driver;
use Rave\Core\Error;

use PDO, PDOException;

class MySQLDriver implements Driver
{
    private static $_instance;

    private static function _getInstance()
    {
        if (!isset(self::$_instance)) {
            try {
                self::$_instance = new PDO('mysql:dbname=' . Config::getDatabase('database') . ';host=' . Config::getDatabase('host'), Config::getDatabase('login'), Config::getDatabase('password'));
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $pdoException) {
                Error::create($pdoException->getMessage(), '500');
            }
        }

        return self::$_instance;
    }
    
    public static function query($statement, array $values = [])
    {
        try {
            $sql = self::_getInstance()->prepare($statement);
            $sql->execute($values);
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $pdoException) {
            Error::create($pdoException->getMessage(), '500');
        }
    }

    public static function execute($statement, array $values = [])
    {
        try {
            $sql = self::_getInstance()->prepare($statement);
            $sql->execute($values);
        } catch (PDOException $pdoException) {
            Error::create($pdoException->getMessage(), '500');
        }
    }

}
