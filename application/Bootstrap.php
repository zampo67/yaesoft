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
use Yaf\Registry;

/**
 * Class Bootstrap
 *
 * 由yaf调用执行在应用起始阶段
 */
final class  Bootstrap extends Bootstrap_Abstract
{
    public function _init()
    {
        Yaf\Loader::import(APPLICATION_PATH . '/functions.php');
    }

    public function _initConfig(Dispatcher $dispatcher)
    {
        $config = Application::app()->getConfig()->toArray();
        Registry::set('app_config',$config);
        $dispatcher->disableView(); // 开启后，不自动加载视图

    }

    public function _initPlugin(Dispatcher $dispatcher)
    {

    }
}