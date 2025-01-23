<?php
namespace Core;

class App{

    protected static $container;

    public static function setContainer($container)
    {
        static::$container = $container;
    }

    public static function container()
    {
        return static::$container;
    }

    public function bind($key, $resolver)
    {
        return static::$container->bind($key, $resolver);
    }

    public function resolve($key)
    {
        return static::$container->resolve($key);
    }

}