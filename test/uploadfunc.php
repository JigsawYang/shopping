<?php
/**
 * Created by PhpStorm.
 * User: Jigsaw
 * Date: 2014/11/26
 * Time: 14:02
 */
require_once "../lib/randstring.php";
//$filename = $_FILES['myfile']['name'];
//$type = $_FILES['myfile']['type'];
//$tmp_name = $_FILES['myfile']['tmp_name'];
//$error = $_FILES['myfile']['error'];
//$size = $_FILES['myfile']['size'];
function upload_file($fileinfo, $path = "uploads", $max_size = 1048576) {
    $allow_ext = array("jpg", "png", "jpeg");
    $ext = get_ext($fileinfo['name']);
    $res = "";
    $img_flag = true;
    if ($fileinfo['error'] == UPLOAD_ERR_OK) {
        if (!in_array($ext, $allow_ext)) {
            exit("非法类型");
        }
        if ($fileinfo['size'] > $max_size) {
            exit("文件过大");
        }
        if ($img_flag) {
            $info = getimagesize($fileinfo['tmp_name']);
            if (!$info) {
                exit("类型不对");
            }
        }
        $filename = get_uni_name() . "." . $ext;//生成随机的文件名字
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $destination = $path . "/" . $filename;
        if (is_uploaded_file($fileinfo['tmp_name'])) {
            if (move_uploaded_file($fileinfo['tmp_name'], $destination)) {
                $res = "文件移动OK";
            } else {
                $res = "文件移动失败";
            }
        } else {
            $res = "文件不是通过HTTP POST 上传的";
        }
    } else {
        switch ($fileinfo['error']) {
            case 1:
                $res = "超过配置文件上传文件大小";
                break;
            case 2:
                $res = "超过了表单设置的上传大小";
                break;
            case 3:
                $res = "文件部分被上传";
                break;
            case 4:
                $res = "没有文件被上传";
                break;
            case 6:
                $res = "没有找到临时目录";
                break;
            case 7:
                $res = "文件不可以写";
                break;
            case 8:
                $res = "由于PHP的扩展程序终端了上传";
        }
    }
    return $res;
}