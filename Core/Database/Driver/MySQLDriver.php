<?php

namespace Rave\Core\Database\Driver;

use Rave\Core\Database\Driver;
use Rave\Core\Error;

use PDO, PDOException;

class MySQLDriver implements Driver
{
    private static $_instance;

    private static function getInstance() {
        if (!isset(self::$_instance)) {
            $host =& Config::getDatabase('host');
            $login =& Config::getDatabase('login');
            $password =& Config::getDatabase('password');
            $databaseName =& Config::getDatabase('database');

            try {
                self::$_instance = new PDO('mysql:dbname=' . $databaseName . ';host=' . $host, $login, $password);
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $pdoException) {
                Error::create($pdoException->getMessage(), '500');
            }
        }

        return parent::$_instance;
    }
    
    public static function query($statement, array $values = [])
    {
        try {
            $sql = self::getInstance()->prepare($statement);
            $sql->execute($values);
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $pdoException) {
            Error::create($pdoException->getMessage(), '500');
        }
    }

    public static function execute($statement, array $values = [])
    {
        try {
            $sql = self::getInstance()->prepare($statement);
            $sql->execute($values);
        } catch (PDOException $pdoException) {
            Error::create($pdoException->getMessage(), '500');
        }
    }

}
