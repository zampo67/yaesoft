<?php
/**
 * Created by PhpStorm.
 * User: renbo
 * Date: 2018/6/25
 * Time: 11:38
 */

namespace our\base;


class BaseYae
{
    public static $app;

    public static $container;

    public static function configure($object, $properties)
    {
        foreach ($properties as $name => $value) {
            $object->$name = $value;
        }

        return $object;
    }

    public static function createObject($definition)
    {
        return new $definition['class'];
    }
}