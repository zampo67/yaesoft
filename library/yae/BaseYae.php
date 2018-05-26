<?php
/**
 * Yaf extend library
 *
 * 对yaf功能扩展基础类,主要用于扩展yaf的一些工作流
 *
 * BaseYae.php
 *
 * User: zampo
 * Date: 2018/5/25
 * Time: 14:56
 */

namespace yae;

class BaseYae
{
    public static $classMap = [];
    /**
     * @var \yae\web\Application the application instance
     */
    public static $app;
    public static $container;

    public static function getVersion()
    {
        return '1.0.0';
    }

    public function test()
    {
        echo 'this is a test';
    }
}