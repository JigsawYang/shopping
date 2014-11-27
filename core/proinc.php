<?php
/**
 * Created by PhpStorm.
 * User: Jigsaw
 * Date: 2014/11/27
 * Time: 16:32
 */

function addPro() {
    $arr = $_POST;
    $arr['pubTime'] = time();
    $path = "./uploads";
    $uploadfiles = upload_file_muti($path);
    if(is_array($uploadfiles) && $uploadfiles) {
        foreach ($uploadfiles as $key => $uploadfile) {
            thumb($path . "/" . $uploadfile['name'], "../image_50/" . $uploadfile['name'], 50, 50);
            thumb($path . "/" . $uploadfile['name'], "../image_220/" . $uploadfile['name'], 220, 220);
            thumb($path . "/" . $uploadfile['name'], "../image_350/" . $uploadfile['name'], 350, 350);
            thumb($path . "/" . $uploadfile['name'], "../image_800/" . $uploadfile['name'], 800, 800);
        }
    }
    $mes = insert("jx_pro", $arr);
    $pid = get_insert_id();
    if($mes && $pid) {
        foreach((array)$uploadfiles as $uploadfile) {
            $arr1['pid'] = $pid;
            $arr1['albumpath'] = $uploadfile['name'];
            addAlbum($arr1);
        }
        $res = "<p class='bg-font'>添加成功</p><a href='addPro.php' role='button' class='btn btn-primary' target='mainFrame'>继续添加</a>";
    } else {
        foreach((array)$uploadfiles as $uploadfile) {
            if(file_exists("../image_800/".$uploadfile['name'])){
                unlink("../image_800/".$uploadfile['name']);
            }
            if(file_exists("../image_50/".$uploadfile['name'])){
                unlink("../image_50/".$uploadfile['name']);
            }
            if(file_exists("../image_220/".$uploadfile['name'])){
                unlink("../image_220/".$uploadfile['name']);
            }
            if(file_exists("../image_350/".$uploadfile['name'])){
                unlink("../image_350/".$uploadfile['name']);
            }

        }
        $res = "<p class='bg-font'>添加失败</p><a href='addPro.php' role='button' class='btn btn-primary' target='mainFrame'>重新添加</a>";
    }
    return $res;
}

function getAllProductsByAdmin() {
    $sql = "select p.id, p.pName, p.pSn, p.pNum, p.mPrice, p.iPrice, p.pDesc, p.pubTime, p.isShow, p.isHot, c.cName from jx_pro as p join jx_cate c on p.cId=c.id";
    $rows = fetch_all($sql);
    return $rows;
}

function getAllImageByProId($id) {
    $sql = "select a.albumPath from jx_album a where pid={$id}";
    $rows = fetch_all($sql);
    return $rows;
}


function getProById($id) {
    $sql = "select p.id, p.pName, p.pSn, p.pNum, p.mPrice, p.iPrice, p.pDesc, p.pubTime, p.isShow, p.isHot, c.cName, p.cId from jx_pro as p join jx_cate c on p.cId=c.id where p.id={$id}";
    $row = fetch_one($sql);
    return $row;
}

function editPro($id) {
    $arr = $_POST;
    $path = "./uploads";
    $uploadfiles = upload_file_muti($path);
    if(is_array($uploadfiles) && $uploadfiles) {
        foreach ($uploadfiles as $key => $uploadfile) {
            thumb($path . "/" . $uploadfile['name'], "../image_50/" . $uploadfile['name'], 50, 50);
            thumb($path . "/" . $uploadfile['name'], "../image_220/" . $uploadfile['name'], 220, 220);
            thumb($path . "/" . $uploadfile['name'], "../image_350/" . $uploadfile['name'], 350, 350);
            thumb($path . "/" . $uploadfile['name'], "../image_800/" . $uploadfile['name'], 800, 800);
        }
    }
    $mes = update("jx_pro", $arr, "id={$id}");
    $pid = $id;
    if($mes && $pid) {
        if(is_array($uploadfiles) && $uploadfiles) {
            foreach ($uploadfiles as $uploadfile) {
                $arr1['pid'] = $pid;
                $arr1['albumpath'] = $uploadfile['name'];
                addAlbum($arr1);
            }
        }
        $res = "<p class='bg-font'>修改成功</p><a href='listPro.php' role='button' class='btn btn-primary' target='mainFrame'>查看商品</a>";
    } else {
        if(is_array($uploadfiles) && $uploadfiles) {
            foreach ($uploadfiles as $uploadfile) {
                if (file_exists("../image_800/" . $uploadfile['name'])) {
                    unlink("../image_800/" . $uploadfile['name']);
                }
                if (file_exists("../image_50/" . $uploadfile['name'])) {
                    unlink("../image_50/" . $uploadfile['name']);
                }
                if (file_exists("../image_220/" . $uploadfile['name'])) {
                    unlink("../image_220/" . $uploadfile['name']);
                }
                if (file_exists("../image_350/" . $uploadfile['name'])) {
                    unlink("../image_350/" . $uploadfile['name']);
                }

            }
        }
        $res = "<p class='bg-font'>修改失败</p><a href='listPro.php' role='button' class='btn btn-danger' target='mainFrame'>重新修改</a>";
    }
    return $res;
}