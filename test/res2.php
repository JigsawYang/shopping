<?php
/**
 * Created by PhpStorm.
 * User: Jigsaw
 * Date: 2014/11/27
 * Time: 15:33
 */
require_once "../lib/randstring.php";
$filename = "des_big.jpg";
thumb($filename, "image_50/".$filename, 50, 50, true);

thumb($filename, "image_220/".$filename, 50, 50, true);
thumb($filename, "image_350/".$filename, 50, 50, true);
thumb($filename, "image_800/".$filename, 50, 50, true);

function thumb($filename, $destination = null, $dst_w = null, $dst_h = null, $is_drop_source = false, $scale = 0.5) {
    list($src_w, $src_h, $imagetype) = getimagesize($filename);
    if(is_null($dst_w) || is_null($dst_h)) {
        $dst_w = ceil($scale * $src_w);
        $dst_h = ceil($scale * $src_h);
    }
    $mime = image_type_to_mime_type($imagetype);
    $create_fun = str_replace("/", "createfrom", $mime);
    $out_put = str_replace("/", null, $mime);
    $src_image = $create_fun($filename);
    $dst_image = imagecreatetruecolor($dst_w, $dst_h);

    imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
    if($destination && !file_exists(dirname($destination))) {
        mkdir(dirname($destination), 0777, true);
    }
    $dst_filename = $destination == null ? get_uni_name(). "." .get_ext($filename) : $destination;
    $out_put($dst_image, $dst_filename);
    imagedestroy($src_image);
    imagedestroy($dst_image);
    if(!$is_drop_source) {
        unlink($filename);
    }
    return $dst_filename;
}