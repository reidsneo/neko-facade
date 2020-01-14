<?php
namespace Neko\Facade;
use Neko\Session\SessionManager;
use Neko\Session\CookieSessionHandler;

class Cookie
{
    protected static $Instance;

    public static function __callStatic($method, $args)
    {
        if (!static::$Instance) {
            static::$Instance = new SessionManager(new CookieSessionHandler);
        }

        return call_user_func_array(array(static::$Instance, $method), $args);
    }

    public static function setInstance($Instance)
    {
        static::$Instance = $Instance;
    }
    
}


?>