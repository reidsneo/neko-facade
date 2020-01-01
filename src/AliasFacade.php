<?php
namespace Neko\Facade;

/**
 * This class gives the ability to access non-static methods statically
 *
 * Class AliasFacade
 *
 * @package Facade
 */
class AliasFacade {

    /**
     * @var Container
     */
    protected static $facadeInstance;

    /**
     * @param $method
     * @param $args
     *
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        if(!static::$facadeInstance) {
            static::$facadeInstance = new Container();
        }

        return call_user_func_array(array(static::$facadeInstance, $method), $args);
    }

    /**
     * @param Container $instance
     */
    public static function setFacadeInstance(Container $instance)
    {
        static::$facadeInstance = $instance;
    }

    /**
     * @return \Facade\Container $instance
     */
    public static function getFacadeInstance()
    {
        return static::$facadeInstance;
    }
}