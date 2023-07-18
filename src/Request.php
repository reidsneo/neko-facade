<?php
namespace Neko\Facade;
use Neko\Framework\Http\Request as Requester;

class Request
{
    protected static $Instance;

    public static function __callStatic($method, $args)
    {
        global $app;
        if (!static::$Instance) {
            static::$Instance = new Requester($app);
        }

        return call_user_func_array(array(static::$Instance, $method), $args);
    }

    public static function setInstance($Instance)
    {
        static::$Instance = $Instance;
    }
    
}


?>