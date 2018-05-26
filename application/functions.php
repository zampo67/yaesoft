<?php
/**
 * Created by PhpStorm.
 * User: renbo
 * Date: 2018/5/25
 * Time: 14:00
 */

/**
 * @param $data
 */
function p($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

/**
 * @param $data
 */
function p_e($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    exit;
}

/**
 * @return string[]
 */
function getIncludedFiles(){
    $included_files = get_included_files();
    return $included_files;
}