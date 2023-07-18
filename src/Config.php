<?php
namespace Neko\Facade;
use Neko\Framework\Configurator;

class Config
{
    protected static $Instance;

    public static function __callStatic($method, $args)
    {
        if (!static::$Instance) {
            $configs = array_merge(app()->config->all(),app()->configs);
            static::$Instance = new Configurator($configs);
        }

        return call_user_func_array(array(static::$Instance, $method), $args);
    }

    public static function setInstance($Instance)
    {
        static::$Instance = $Instance;
    }
}


?>