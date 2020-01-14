<?php
namespace Neko\Facade;
use Neko\Framework\View\View as views;

class View
{
    protected static $Instance;

    public static function __callStatic($method, $args)
    {
        global $app;
        $view_path = $app->config->get('app.path')."themes/".$app->config->get('user_theme');
        $engine = $app->config->get('view.engine');
        $engine = $app->container->make($engine, [$view_path]);
        if (!static::$Instance) {
            static::$Instance = new views($app,$engine);
        }

        return call_user_func_array(array(static::$Instance, $method), $args);
    }

    public static function setInstance($Instance)
    {
        static::$Instance = $Instance;
    }
    
}


?>