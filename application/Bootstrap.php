<?php
/**
 * Yaf.app Framework
 *
 * Bootstrap.php
 *
 * 应用引导文件，初始化应用主体
 *
 * User: zampo
 * Date: 2018/5/25
 * Time: 9:59
 */

use Yaf\Application;
use Yaf\Bootstrap_Abstract;
use Yaf\Dispatcher;
use Yaf\Loader;
use yae\Yae;
use yae\web\Application as YaeApp;

/**
 * Class Bootstrap
 *
 * 由yaf调用执行在应用起始阶段
 */
final class  Bootstrap extends Bootstrap_Abstract
{
    public function _init(Dispatcher $dispatcher)
    {
        Loader::import(ROOT_PATH . '/application/functions.php');
        // 初始化应用配置信息
        Yae::$app = new YaeApp();
        //echo Application::app()->getConfig()->application->database->driver;
    }
}