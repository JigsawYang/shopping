<?php
/**
 * Created by PhpStorm.
 * User: Jigsaw
 * Date: 2014/11/26
 * Time: 11:59
 */

/**
 * 添加分类
 * @return string
 */
function addCate() {
    $arr = $_POST;
    if(insert("jx_cate", $arr)) {
        $res = "<p class='bg-font'>分类成功</p><a href='addCate.php' role='button' class='btn btn-primary'>继续添加</a>";
    } else {
        $res = "<p class='bg-font'>分类失败</p><a href='addCate.php' role='button' class='btn btn-danger'>重新添加</a>";
    }
    return $res;
}

function getCateById($id) {
    $sql = "select id, cName from jx_cate where id ={$id}";
    return fetch_one($sql);
}

/**
 * 修改分类
 * @param $id
 * @return string
 */
function editCate($id) {
    $arr = $_POST;
    if(update("jx_cate", $arr, "id={$id}")) {
        $res = "<p class='bg-font'>修改成功</p><a href='listCate.php' role='button' class='btn btn-primary'>查看分类</a>";
    } else {
        $res = "<p class='bg-font'>修改失败</p><a href='listCate.php' role='button' class='btn btn-danger'>重新修改</a>";
    }
    return $res;
}

/**
 * 删除分类
 * @param $id
 * @return string
 */
function delCate($id) {
    if(delete("jx_cate", "id={$id}")) {
        $res = "<p class='bg-font'>删除成功</p><a href='listCate.php' role='button' class='btn btn-primary'>查看分类</a>";
    } else {
        $res = "<p class='bg-font'>删除失败</p><a href='listCate.php' role='button' class='btn btn-danger'>重新删除</a>";
    }
    return $res;
}