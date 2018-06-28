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
    /**
     * @var \our\web\Application the application instance
     */
    public static $app;

    public static $container;

    public static function configure($object, $properties)
    {
        foreach ($properties as $name => $value) {
            $object->$name = $value;
        }

        return $object;
    }

    /**
     * @param $type
     * @param array $params
     * @return mixed
     * @throws InvalidConfigException
     */
    public static function createObject($type, array $params = [])
    {
        if (is_string($type)) {
            return static::$container->get($type, $params);
        } elseif (is_array($type) && isset($type['class'])) {
            $class = $type['class'];
            unset($type['class']);
            return static::$container->get($class, $params, $type);
        } elseif (is_callable($type, true)) {
            return static::$container->invoke($type, $params);
        } elseif (is_array($type)) {
            throw new InvalidConfigException('Object configuration must be an array containing a "class" element.');
        }

        throw new InvalidConfigException('Unsupported configuration type: ' . gettype($type));
    }
}