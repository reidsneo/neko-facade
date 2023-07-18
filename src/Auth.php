<?php
namespace Neko\Facade;
use Neko\Auth as AuthMethod;

class Auth
{
    protected static $Instance;

    public static function __callStatic($method, $args)
    {
        if (!static::$Instance) {
            static::$Instance = new AuthMethod\JWT('secret', 'HS256', 3600, 10);
        }

        return call_user_func_array(array(static::$Instance, $method), $args);
    }

    public static function setInstance($Instance)
    {
        static::$Instance = $Instance;
    }
    
}


?>