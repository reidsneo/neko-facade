<?php
namespace Neko\Facade;
use Neko\Framework\App as Apps;
use Neko\Framework\Container;
use Reflector;
class App extends Container
{
    protected static $Instance;

    public static function __callStatic($method, $args)
    {
        //class_alias('Neko\\Framework\\App', 'App');
       // $container = new \Neko\Facade\Container();
       // var_dump($container);
       // $builder = $container->build('Neko\\Framework\\App', array('neko'));
        //AliasFacade::setQueryBuilderInstance($builder);

        if (!static::$Instance) {
            static::$Instance = app();
        }

        return call_user_func_array(array(static::$Instance, $method), $args);
    }

    public static function setInstance($Instance)
    {
        static::$Instance = $Instance;
    }
    
}


?>