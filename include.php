<?php
/**
 * Created by PhpStorm.
 * User: Jigsaw
 * Date: 2014/11/25
 * Time: 12:33
 */

header("content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
session_start();
define("ROOT", dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
require_once 'randstring.php';
require_once 'verification.php';
require_once 'mysqlfunc.php';
require_once 'configs.php';
require_once 'admininc.php';
require_once 'common.php';
require_once 'pagefunc.php';
require_once 'cateinc.php';
connect();
?>