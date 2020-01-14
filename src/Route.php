<?php
namespace Neko\Facade;
use Neko\Framework\Router\Router;

class Route
{
    protected static $Instance;

    public static function __callStatic($method, $args)
    {
        if (!static::$Instance) {
            static::$Instance = new Router();
        }

        return call_user_func_array(array(static::$Instance, $method), $args);
    }

    public static function setInstance($Instance)
    {
        static::$Instance = $Instance;
    }
    
}


?>