<?php
/**
 * Created by PhpStorm.
 * User: renbo
 * Date: 2018/5/26
 * Time: 14:24
 */

namespace yae\base;
use Yaf\Exception;
use yii\base\InvalidCallException;


/**
 * Class Object
 * @package yae\base
 */
class Object
{
    /**
     * 返回类的名称
     * @return string
     */
    public static function className()
    {
        return get_called_class();
    }

    public function __construct()
    {
        $this->init();
    }

    /**
     *  在初始化末尾调用此方法
     */
    public function init()
    {
    }

    /**
     * 在 `$value = $object->property;` 时执行此方法
     * @param string $name the property name
     * @return mixed the property value
     * @throws UnknownPropertyException if the property is not defined
     * @throws InvalidCallException if the property is write-only
     * @see __set()
     */
    public function __get($name)
    {
        $getter = 'get' . $name;
        if (method_exists($this,$getter)) {
            return $this->$getter;
        } elseif (method_exists($this,'set'.$name)) {
            throw new InvalidCallException('Getting write-only property: ' . get_class($this) . '::' . $name);
        } else {
           throw new UnknownPropertyException('Getting write-only property: ' . get_class($this) . '::' . $name);
        }
    }

    /**
     * Sets value of an object property.
     *
     * Do not call this method directly as it is a PHP magic method that
     * will be implicitly called when executing `$object->property = $value;`.
     * @param string $name the property name or the event name
     * @param mixed $value the property value
     * @throws UnknownPropertyException if the property is not defined
     * @throws InvalidCallException if the property is read-only
     * @see __get()
     */
    public function __set($name, $value)
    {
        $setter = 'set' . $name;
        if (method_exists($this, $setter)) {
            $this->$setter($value);
        } elseif (method_exists($this, 'get' . $name)) {
            throw new InvalidCallException('Setting read-only property: ' . get_class($this) . '::' . $name);
        } else {
            throw new UnknownPropertyException('Setting read-only property: ' . get_class($this) . '::' . $name);
        }
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }
}