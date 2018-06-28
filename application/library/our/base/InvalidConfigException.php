<?php
/**
 * Created by PhpStorm.
 * User: renbo
 * Date: 2018/6/28
 * Time: 15:02
 */

namespace our\base;


class InvalidConfigException extends \Exception
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Invalid Configuration';
    }
}