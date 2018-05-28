<?php

namespace mysql\slave;

/**
 * 主库的从库抽象模型
 *
 * @package Mysql\Slave
 */
abstract class AbstractModel {

    /**
     * 禁止clone
     */
    public function __clone() {
        trigger_error('Clone is not allow!', E_USER_ERROR);
    }

}
