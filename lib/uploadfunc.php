<?php
/**
 * Created by PhpStorm.
 * User: Jigsaw
 * Date: 2014/11/25
 * Time: 12:10
 */
require_once 'randstring.php';

function format_file_info() {
    if(!$_FILES){
        return;
    }
    $i = 0;
    foreach($_FILES as $val) {
        if(is_string($val['name'])) {
            $files[$i] = $val;
            $i++;
        } else {
            foreach((array)$val['name'] as $key => $filename) {
                $files[$i]['name'] = $filename;
                $files[$i]['size'] = $val['size'][$key];
                $files[$i]['tmp_name'] = $val['tmp_name'][$key];
                $files[$i]['error'] = $val['error'][$key];
                $files[$i]['type'] = $val['type'][$key];
                $i++;
            }
        }
    }
    return $files;
}


function upload_file_muti($path = "uploads", $max_size = 2097152) {
    $allow_ext = array("jpg", "png", "jpeg");
    $img_flag = true;
    if(!file_exists($path)) {
        mkdir($path, 0777, true);
    }
    $i = 0;
    $uploaded_file = array();
    $files = format_file_info();
    if(!($files && is_array($files))) {
        return;
    }
    foreach ($files as $file) {
        if($file['error'] == UPLOAD_ERR_OK) {
            $ext = get_ext($file['name']);
            if(!in_array($ext, $allow_ext)) {
                exit("非法文件类型");
            }
            if($img_flag) {
                if(!getimagesize($file['tmp_name'])) {
                    exit("不是图片类型");
                }
            }
            if($file['size'] > $max_size) {
                exit("太大");
            }
            if(!is_uploaded_file($file['tmp_name'])) {
                exit("不是HTTP上传的");
            }
            $filename = get_uni_name() . "." . $ext;
            $destination = $path. "/". $filename;
            if(move_uploaded_file($file['tmp_name'], $destination)) {
                $file['name'] = $filename;
                unset($file['error'], $file['tmp_name'], $file['size'], $file['type']);
                $uploaded_file[$i] = $file;
                $i++;
            }
        } else {
            switch ($file['error']) {
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
                    break;
            }
            echo $res;
        }
    }
    return $uploaded_file;
}


