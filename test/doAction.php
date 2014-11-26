<?php
/**
 * Created by PhpStorm.
 * User: Jigsaw
 * Date: 2014/11/26
 * Time: 14:02
 */
$filename = ($_FILES['myfile']['name']);
$type = $_FILES['myfile']['type'];
$tmp_name = $_FILES['myfile']['type'];
$error = $_FILES['myfile']['error'];
$size = $_FILES['myfile']['size'];

if($error == UPLOAD_ERR_OK) {
    if(is_uploaded_file($tmp_name)) {
        if(move_uploaded_file($filename, $destination)) {
            
        } else {
            $res = "文件移动失败";
        }
    }else {
        $res = "文件不是通过HTTP POST 上传的";
    }
} else {
    switch($error) {
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
