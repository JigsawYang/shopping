<?php
require_once '../include.php';
$adname = $_POST['adname'];
$password = md5($_POST['psd']);
$vcode = strtolower($_POST['vcode']);
$verify1 = $_SESSION['verify'];
@$auto_flag = $_POST['auto_flag'];

if($verify1 == $vcode) {
    $adname = mysql_real_escape_string($adname);//防止SQL注入
    $sql = "select * from jx_admin where username='{$adname}' and password='{$password}'";
    $row = checkAdmin($sql);
    if($row) {
        //如果选择了自动登录
        if($auto_flag) {
            setcookie("adminid", $row['id'], time() + 3 * 24 * 3600);
            setcookie("adname", $row['username'], time() + 3 * 24 * 3600);
        }
        $_SESSION['adname'] = $row['username'];
        $_SESSION['adminid'] = $row['id'];
        header("location: index.php");
    } else {
        alert_msg("登录失败", "login.php");
    }
} else {
    alert_msg("验证码错误", "login.php");
}