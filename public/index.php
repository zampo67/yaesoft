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
define ("APPLICATION_PATH", __DIR__ . "/../application");

use Yaf\Application;
try {
    $app = new Application(__DIR__."/../conf/application.ini");
    $app->bootstrap()->run();
}catch (Exception $e){
    echo $e->getMessage();
}