<?php
/**
 * Created by PhpStorm.
 * User: renbo
 * Date: 2018/6/25
 * Time: 11:49
 */

namespace our\base;

use Yae;

/**
 * Class Application
 * @package our\base
 *
 * @property \our\db\Test $db
 */
class Application extends ServiceLocator
{
    public function __construct($config=[])
    {
        Yae::$app = $this;

        Component::__construct($config);
    }

    /**
     * @throws InvalidConfigException
     */
    public function getDb()
    {
        return $this->get('db');
    }
}