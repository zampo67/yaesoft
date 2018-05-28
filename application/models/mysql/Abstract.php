<?php

namespace mysql;

/**
 * 数据读取模型抽象类
 *
 * @package Mysql
 */
abstract class AbstractModel {

    protected $_tableName;
    /**
     * 禁止clone
     */
    public function __clone() {
        trigger_error('Clone is not allow!', E_USER_ERROR);
    }

}
