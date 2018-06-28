<?php
/**
 * Created by PhpStorm.
 * User: renbo
 * Date: 2018/6/28
 * Time: 13:38
 */

namespace our\base;


class UnknownPropertyException extends \Exception
{
    public function getName()
    {
        return 'Unknown Property';
    }
}