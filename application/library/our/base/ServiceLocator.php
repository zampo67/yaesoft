<?php
/**
 * Created by PhpStorm.
 * User: renbo
 * Date: 2018/6/28
 * Time: 14:39
 */

namespace our\base;

use Closure;
use Yae;

class ServiceLocator extends Component
{
    /**
     * @var array 组件类的实例按id索引
     */
    private $_components = [];

    /**
     * @var array 组件定义按id索引
     */
    private $_definitions = [];

    /**
     * 获取组件实例
     *
     * @param $id
     * @param bool $throwException
     * @return mixed|null
     * @throws InvalidConfigException
     */
    public function get($id,$throwException = true){
        if (isset($this->_components[$id])) {
            return $this->_components[$id];
        }

        if(isset($this->_definitions[$id])){
            $definition = $this->_definitions[$id];
            if (is_object($definition) && !$definition instanceof Closure) {
                return $this->_components[$id] = $definition;
            }
            return $this->_components[$id] = Yae::createObject($definition);
        }elseif ($throwException) {
            throw new InvalidConfigException("Unknown component ID: $id");
        }

        return null;
    }

    /**
     * 定义组件，组件必须是定义class类的数组或者可被执行的对象
     *
     * @param $id
     * @param $definition
     * @throws InvalidConfigException
     */
    public function set($id,$definition){
        unset($this->_components[$id]);

        if ($definition === null) {
            unset($this->_definitions[$id]);
            return;
        }

        if (is_object($definition) || is_callable($definition, true)) {
            // an object, a class name, or a PHP callable
            $this->_definitions[$id] = $definition;
        } elseif (is_array($definition)) {
            // a configuration array
            if (isset($definition['class'])) {
                $this->_definitions[$id] = $definition;
            } else {
                throw new InvalidConfigException("The configuration for the \"$id\" component must contain a \"class\" element.");
            }
        } else {
            throw new InvalidConfigException("Unexpected configuration type for the \"$id\" component: " . gettype($definition));
        }
    }

    /**
     * 系统初始阶段预先定义用户要使用到的一些组件及配置信息，按id索引
     *
     * @param $components
     * @throws InvalidConfigException
     */
    public function setComponents($components)
    {
        foreach ($components as $id => $component) {
            $this->set($id, $component);
        }
    }
}