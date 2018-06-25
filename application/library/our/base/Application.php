<?php
/**
 * Created by PhpStorm.
 * User: renbo
 * Date: 2018/6/25
 * Time: 11:49
 */

namespace our\base;

use Yae;

class Application extends Component
{
    public function __construct($config=[])
    {
        Yae::$app = $this;

        Component::__construct($config);
    }
}