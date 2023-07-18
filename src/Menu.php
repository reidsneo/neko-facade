<?php
namespace Neko\Facade;
use \Neko\Framework\Menu as FMenu;
class Menu
{
    protected static $Instance;

    public static function __callStatic($method, $args)
    {
        if (!static::$Instance) {
            static::$Instance = new FMenu();
        }

        return call_user_func_array(array(static::$Instance, $method), $args);
    }

    public static function setInstance($Instance)
    {
        static::$Instance = $Instance;
    }
    
}


?>