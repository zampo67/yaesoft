<?php
/**
 * Created by PhpStorm.
 * User: renbo
 * Date: 2018/5/25
 * Time: 10:57
 */


class IndexController extends  \our\Controller_AbstractIndex
{
    public function indexAction()
    {
        echo Yae::$app->id;
    }
}