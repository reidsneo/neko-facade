<?php
namespace Neko\Facade;
use Neko\Database\Connection;

class Database
{
    protected static $Instance;

    public static function __callStatic($method, $args)
    {
        global $app;
        if (!static::$Instance) {
            static::$Instance = new Connection('mysql', $app->config['db'], 'db');
        }

        return call_user_func_array(array(static::$Instance, $method), $args);
    }

    public static function setInstance($Instance)
    {
        static::$Instance = $Instance;
    }
    
}


?>