<?php

namespace Rave\Config;

/**
 * Classe à modifier pour configurer les informations
 * nécessaires à l'accès à la base de données
 */
class Config
{

    /**
     * Attribut déterminant le mode de l'application
     * @var boolean
     *  Vrai si mode debug, faux si mode production
     */
    private static $_debug = true;

    /**
     * Attribut contenant les différentes informations
     * nécessaires à la connexion à la base de données
     * @var array
     *  Liste des infos de connexion
     */
    private static $_database = [
        'database' => 'projettut',
        'host'     => 'localhost',
        'login'    => 'root',
        'password' => 'root'
    ];

    /**
     * Attribut contenant les différentes informations
     * nécessaires au Router
     * @var array
     *  Liste contenant le nom du controller et de la
     *  méthode à appeller par defaut
     */
    private static $_router = [
        'controller' => 'Main',
        'method'     => 'index'
    ];
    
    /**
     * Attribut contenant les différentes pages d'erreur
     * @var array
     *  Liste contenant les nom des controllers
     *  pour chaque type d'erreur
     */
    private static $_error = [
        '500' => 'error/internal-server-error',
        '404' => 'error/not-found',
        '403' => 'error/forbidden'
    ];

    /**
     * Grain de sel pour la fonction de Hashage
     * @var string
     *  Grain de sel
     */
    private static $_seed = 'f6z5e4f62s1d32v1d653d4g65d4f32v1';

    /**
     * Méthode accesseur
     * @return boolean
     *  Attribut debug
     */
    public static function isDebug()
    {
        return self::$_debug;
    }

    /**
     * Méthode accesseur
     * @return string
     *  Attribut databases
     * @return string
     *  Valeur associée à la clé
     */
    public static function getDatabase($key)
    {
        return self::$_database[$key];
    }

    /**
     * Méthode accesseur
     * @param string $key
     *  Clé de la liste
     * @return string
     *  Valeur associée à la clé
     */
    public static function getRouter($key)
    {
        return self::$_router[$key];
    }
    
    /**
     * Méthode accesseur
     * @param string $key
     *  Clé de la liste
     * @return string
     *  Valeur associée à la clé
     */
    public static function getError($key)
    {
        return self::$_error[$key];
    }

    /**
     * Méthode accesseur
     * @return string
     *  Grain de sel
     */
    public static function getSeed()
    {
        return self::$_seed;
    }

}
