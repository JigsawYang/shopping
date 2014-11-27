<?php
/**
 * Created by PhpStorm.
 * User: Jigsaw
 * Date: 2014/11/26
 * Time: 16:40
 */
require_once "../lib/randstring.php";
require_once "uploadfunc.php";
$fileinfo = $_FILES['myfile'];
$a = upload_file($fileinfo);
echo $a;