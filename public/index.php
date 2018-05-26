<?php
/**
 * Yaf.app Framework
 *
 * 程序入口（普通请求、API请求）
 *
 * User: zampo
 * Date: 2018/5/25
 * Time: 9:21
 */

define('APP_NAME',      'application');
define('ROOT_PATH',      realpath(dirname(dirname(__FILE__))));
define('INI_PATH',       ROOT_PATH.DIRECTORY_SEPARATOR.'conf'.DIRECTORY_SEPARATOR.'application.ini');

use Yaf\Application;
try {
    $app = new Application(INI_PATH);
    $app->bootstrap()->run();
}catch (Exception $e){
    echo $e->getMessage();
}