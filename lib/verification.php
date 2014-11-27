<?php
/**
 * Created by PhpStorm.
 * User: Jigsaw
 * Date: 2014/11/25
 * Time: 12:09
 */
require_once 'randstring.php';

/**
 * 产生验证码
 * @param int $type
 * @param int $length
 * @param string $sess_name
 */
function verify_image($type = 3, $length = 4, $sess_name = "verify") {
    session_start();
    $width = 80;
    $height = 32;
    $image = imagecreatetruecolor ( $width, $height );
    $white = imagecolorallocate ( $image, 255, 255, 255 );
    // $black = imagecolorallocate($image, 0, 0, 0);

    //画布
    imagefilledrectangle ( $image, 1, 1, $width - 2, $height - 2, $white );
    $chars = random_string ( $type, $length );
    $_SESSION [$sess_name] = strtolower($chars);

    $fontfiles = "msyh.ttf";
    for($i = 0; $i < $length; $i ++) {
        $size = mt_rand ( 14, 18 );
        $angle = mt_rand ( - 15, - 15 );
        $x = 5 + $i * $size;
        $y = mt_rand ( 20, 25 );
        $font = "../fonts/" . $fontfiles;
        $color = imagecolorallocate ( $image, mt_rand ( 0, 120 ), mt_rand ( 0, 120 ), mt_rand ( 0, 120 ) );
        $text = substr ( $chars, $i, 1 );
        imagettftext ( $image, $size, $angle, $x, $y, $color, $font, $text );
    }

    // 干扰点
    for($i = 0; $i < 300; $i ++) {
        $pointcolor = imagecolorallocate ( $image, rand ( 50, 200 ), rand ( 50, 200 ), rand ( 50, 200 ) );
        imagesetpixel ( $image, rand ( 1, 99 ), rand ( 1, 99 ), $pointcolor );
    }
    // 干扰线
    for($i = 0; $i < 4; $i ++) {
        $linecolor = imagecolorallocate ( $image, rand ( 80, 220 ), rand ( 80, 220 ), rand ( 80, 220 ) );
        imageline ( $image, rand ( 1, 99 ), rand ( 1, 99 ), rand ( 1, 99 ), rand ( 1, 29 ), $linecolor );
    }

    header ( "content-type:image/gif" );
    ob_clean (); // 清空下浏览器的缓存
    imagegif ( $image );
    imagedestroy ( $image );
}

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
    if($is_drop_source) {
        unlink($filename);
    }
    return $dst_filename;
}

