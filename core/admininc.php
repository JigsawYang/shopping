<?php
//获取用户名
function checkAdmin($sql) {
    return fetch_one($sql);
}

//检测是否登陆

function checkLogined() {
    if(@$_SESSION['adminid'] == "" && @$_SESSION['adminid'] == "") {
        alert_msg("请先登陆", "login.php");
    }
}

function addAdmin() {
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
    if(insert("jx_admin", $arr)) {
        $res = "<p class='bg-font'>添加成功</p><a href='addAdmin.php' role='button' class='btn btn-primary'>继续添加</a>";
    } else {
        $res = "<p class='bg-font'>添加失败</p><a href='addAdmin.php' role='button' class='btn btn-primary'>重新添加</a>";
    }
    return $res;
}

function getAllAdmin() {
    $sql = "select id, username, email from jx_admin";
    $row = fetch_all($sql);
    return $row;
}


function getAdminByPage($page, $pageSize = 2) {
    $sql = "select * from jx_admin";
    global $totalRows; //全局变量小心使用
    $totalRows = get_result_num($sql);
    global $totalPage;
    $totalPage = ceil($totalRows / $pageSize);
    if ($page < 1 || $page == null || !is_numeric($page)) {
        $page = 1;
    }
    if ($page >= $totalPage) $page = $totalPage;
    $offset = ($page - 1) * $pageSize;
    $sql = "select id,username,email from jx_admin limit {$offset},{$pageSize}";
    $rows = fetch_all($sql);
    return $rows;
}

function editAdmin($id) {
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
    if(update("jx_admin", $arr, "id={$id}")) {
        $res = "<p class='bg-font'>修改成功</p><a href='listAdmin.php' role='button' class='btn btn-primary'>查看列表</a>";
    } else {
        $res = "<p class='bg-font'>修改失败</p><a href='listAdmin.php' role='button' class='btn btn-danger'>重新修改</a>";
    }
    return $res;
}


function delAdmin($id) {
    if(delete("jx_admin", "id={$id}")) {
        $res = "<p class='bg-font'>删除成功</p><a href='listAdmin.php' role='button' class='btn btn-primary'>查看列表</a>";
    } else {
        $res = "<p class='bg-font'>删除失败</p><a href='listAdmin.php' role='button' class='btn btn-danger'>重新删除</a>";
    }
    return $res;
}


/**
 *  退出
 */
function logout() {
    $_SESSION = array();
    if(isset($_COOKIE[session_name()])) {
        setcookie(session_name(), "", time()-100);
    }
    if(isset($_COOKIE['adname'])) {
        setcookie("adname", "", time()-100);
    }
    if(isset($_COOKIE['adminid'])) {
        setcookie("adminid", "", time()-100);
    }
    session_destroy();
    header("location: login.php");
}
