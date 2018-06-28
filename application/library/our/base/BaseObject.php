<?php
/**
 * Created by PhpStorm.
 * User: renbo
 * Date: 2018/5/28
 * Time: 15:40
 */

namespace our\base;

use Yae;
class BaseObject
{
    /**
     * 获取当前类名
     * @return string
     */
    public static function className()
    {
        return get_called_class();
    }

    public function __construct($config=[])
    {
        if(!empty($config)){
            Yae::configure($this, $config);
        }
        $this->init();
    }

    public function init()
    {
    }

    /**
     * 获取成员变量
     *
     * @param $name
     * @return mixed
     * @throws UnknownPropertyException if the property is not defined
     * @throws InvalidCallException if the property is write-only
     * @see __set()
     */
    public function __get($name)
    {
        $getter = 'get' . $name;
        if (method_exists($this, $getter)) {
            return $this->$getter();
        } elseif (method_exists($this, 'set' . $name)) {
            throw new InvalidCallException('Getting write-only property: ' . get_class($this) . '::' . $name);
        }

        throw new UnknownPropertyException('Getting unknown property: ' . get_class($this) . '::' . $name);
    }

    /**
     * 设置成员变量
     *
     * @param $name
     * @param $value
     * @return mixed the property value
     * @throws UnknownPropertyException if the property is not defined
     * @throws InvalidCallException if the property is read-only
     * @see __get()
     */
    public function __set($name, $value)
    {
        $setter = 'set' . $name;
        if (method_exists($this, $setter)) {
            return $this->$setter($value);
        }elseif(method_exists($this, 'get' . $name)){
            throw new InvalidCallException('Setting read-only property: ' . get_class($this) . '::' . $name);
        }

        throw new UnknownPropertyException('Setting unknown property: ' . get_class($this) . '::' . $name);
    }
}