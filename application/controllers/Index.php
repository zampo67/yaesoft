<?php
/**
 * Created by PhpStorm.
 * User: renbo
 * Date: 2018/5/25
 * Time: 10:57
 */

use Yaf\Controller_Abstract;
use yae\base\Object;

class IndexController extends  Controller_Abstract
{
    public function indexAction()
    {
        echo Object::className();
        exit;
    }
}