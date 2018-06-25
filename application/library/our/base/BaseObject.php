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
}