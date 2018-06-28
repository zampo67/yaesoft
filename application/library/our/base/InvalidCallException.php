<?php
/**
 * Created by PhpStorm.
 * User: renbo
 * Date: 2018/6/28
 * Time: 13:36
 */

namespace our\base;

/**
 * InvalidCallException represents an exception caused by calling a method in a wrong way.
 *
 * Class InvalidCallException
 * @package our\base
 */
class InvalidCallException extends \BadMethodCallException
{
    public function getName()
    {
        return 'Invalid Call';
    }
}