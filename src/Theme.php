<?php
namespace Neko\Facade;
use Neko\Framework\Theme as Themes;

class Theme
{
    protected static $Instance;

    public static function __callStatic($method, $args)
    {
        if (!static::$Instance) {
            static::$Instance = new Themes();
        }

        return call_user_func_array(array(static::$Instance, $method), $args);
    }

    public static function setInstance($Instance)
    {
        static::$Instance = $Instance;
    }
    
}


?>