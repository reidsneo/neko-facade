<?php
namespace Neko\Facade;
use Neko\Framework\WidgetManager;

class Widget
{
    protected static $Instance;

    public static function __callStatic($method, $args)
    {
        $args_1 = [];
        $args_2 = false;
        if(isset($args[1]))
        {
            $args_1 = $args[1];
        }
        if(isset($args[2]))
        {
            $args_2 = $args[2];
        }
        
        return app()->widget->render($args[0],$args_1,$args_2);
    }

    public static function setInstance($Instance)
    {
        static::$Instance = $Instance;
    }
    
}


?>