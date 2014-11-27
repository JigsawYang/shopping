<?php
/**
 * Created by PhpStorm.
 * User: Jigsaw
 * Date: 2014/11/26
 * Time: 23:30
 */

$filename = "des_big.jpg";
list($src_w, $src_h, $imagetype) = getimagesize($filename);
$mime = image_type_to_mime_type($imagetype);
$create_fun = str_replace("/", "createfrom", $mime);
$out_put = str_replace("/", null, $mime);

$src_image = $create_fun($filename);
$dst_50_image = imagecreatetruecolor(50, 50);
$dst_220_image = imagecreatetruecolor(220, 220);
imagecopyresampled($dst_50_image, $src_image, 0, 0, 0, 0, 50, 50, $src_w, $src_h);
imagecopyresampled($dst_220_image, $src_image, 0, 0, 0, 0, 220, 220, $src_w, $src_h);
$out_put($dst_50_image, "uploads/image_50/".$filename);
$out_put($dst_220_image, "uploads/image_220/".$filename);
imagedestroy($src_image);
imagedestroy($dst_50_image);
