<?php

namespace Rave\Core;

use PDOException, PDO;

/**
 * Super classe abstraite Model, doit être héritée par
 * tous les models nécessitants des interractions avec
 * la base de données
 */
abstract class Model
{

    /**
     * Attribut désignant la table sur laquelle le model opère
     * @var string
     *  Nom de la table
     */
    protected static $table;
    /**
     * Attribut désignant la clé primaire de la table
     * @var string
     *  Nom de la clé primaire
     */
    protected static $primary;    
    
    /**
     * Méthode d'insertion générique
     * @param array $rows
     *  Valeurs à inserer
     */
    public static function insert(array $rows)
    {
        try
        {
            $firstHalfStatement = 'INSERT INTO ' . static::$table . ' (';

            $secondHalfStatement = ') VALUES (';

            foreach ($rows as $key => $value)
            {
                $firstHalfStatement .= $key . ', ';
                $key = ':' . $key;
                $secondHalfStatement .= $key . ', ';
                stripcslashes($value);
                trim($value);
            }

            $firstHalfRequest = rtrim($firstHalfStatement, ', ');
            $secondHalfRequest = rtrim($secondHalfStatement, ', ');

            $request = $firstHalfRequest . $secondHalfRequest . ')';

            $sql = self::getInstance()->prepare($request);
            $sql->execute($rows);
        }
        catch (PDOException $ex)
        {
            Error::createError($ex->getMessage());
        }
    }

    /**
     * Méthode de selection d'une table entière générique
     * @return array
     *  Tableau d'objets
     */
    public static function selectAll()
    {
        try
        {
            $request = 'SELECT * FROM ' . static::$table;
            $query = self::getInstance()->prepare($request);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        catch (PDOException $ex)
        {
            Error::createError($ex->getMessage());
        }
    }

    /**
     * Méthode générique de selection selon une valeur
     * de la clé primaire
     * @param string $primary
     *  Valeur de la clé primaire
     * @return object
     *  Objet contenant les valeurs selectionnées
     */
    public static function select($primary)
    {
        try
        {
            $request = 'SELECT * FROM ' . static::$table . ' WHERE ' . static::$primary . ' = :primary';
            $query = self::getInstance()->prepare($request);
            $query->execute(array(':primary' => $primary));
            return $query->fetch(PDO::FETCH_OBJ);
        }
        catch (PDOException $ex)
        {
            Error::createError($ex->getMessage());
        }
    }

    /**
     * Méthode générique de mise à jour
     * @param array $rows
     *  Nouvelles valeurs
     * @param mixed $primary
     *  Valeur de la clé primaire
     */
    public static function update(array $rows, $primary)
    {
        try
        {
            $statement = 'UPDATE ' . static::$table . ' SET ';

            foreach ($rows as $key => $value)
            {
                $statement .= $key . ' = :' . $key . ', ';
                stripcslashes($value);
                trim($value);
            }

            $request = rtrim($statement, ', ');
            $request .= ' WHERE ' . static::$primary . ' = :primary';

            $rows[':primary'] = $primary;

            $sql = self::getInstance()->prepare($request);
            $sql->execute($rows);
        }
        catch (PDOException $ex)
        {
            Error::createError($ex->getMessage());
        }
    }

    /**
     * Méthode générique permettant de supprimer
     * une ligne dans la base de données
     * @param string $primary
     *  Clauses de la condition WHERE
     */
    public static function delete($primary)
    {
        try
        {
            $request = 'DELETE FROM ' . static::$table . ' WHERE ' . static::$primary . ' = :primary';
            $sql = self::getInstance()->prepare($request);
            $sql->execute(array(':primary' => $primary));
        }
        catch (PDOException $ex)
        {
            Error::createError($ex->getMessage());
        }
    }

    /**
     * Méthode permettant de conter le nombre d'entrées
     * d'une table
     * @return int
     *  Nombre de lignes comptées
     */
    public static function count()
    {
        try
        {
            $request = 'SELECT Count(' . static::$primary . ') AS count FROM ' . static::$table;
            $sql = self::getInstance()->prepare($request);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_OBJ)->count;
        }
        catch (PDOException $ex)
        {
            Error::createError($ex->getMessage());
        }
    }

}
