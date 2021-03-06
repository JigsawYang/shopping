<?php
/**
 * User: Jigsaw
 * Date: 2014/11/25
 * Time: 12:08
 */

//产生随机字符串
function random_string($str_type = 1, $length = 4) {
    if ($str_type > 3 || $str_type < 1) {
        exit("参数错误");
    }
    if ($str_type == 1) {
        $chars = join("", range(0, 9));
    } elseif ($str_type == 2) {
        $chars = join("", array_merge(range("a", "z"), range("A", "Z")));
    } elseif ($str_type == 3) {
        $chars = "abcdefghijkmnpqrstuvwxy3456789";
    }
    if ($length > strlen($chars)) {
        exit("超出范围");
    }
    $chars = str_shuffle($chars);
    return substr($chars, 0, $length);
}

/**
 * 生成唯一字符串
 * @return string
 */
function get_uni_name() {
    return md5(uniqid(microtime(true), true));
}

/**
 * 获得文件扩展名
 * @param $filename
 * @return string
 */
function get_ext($filename) {
    $sp_str = explode(".",$filename);
    return strtolower(end($sp_str));
}