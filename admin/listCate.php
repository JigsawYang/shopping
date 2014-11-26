<?php
/**
 * Created by PhpStorm.
 * User: Jigsaw
 * Date: 2014/11/26
 * Time: 12:12
 */
require_once '../include.php';

@$page = $_REQUEST['page'] ? (int)$_REQUEST['page'] : 1;
$sql = "select * from jx_cate";
$totalRows = get_result_num($sql);
$pageSize = 2;
$totalPage = ceil($totalRows / $pageSize);
if($page < 1 || $page == null || !is_numeric($page)) {
    $page = 1;
}
if($page >= $totalPage) {
    $page = $totalPage;
}
$offset = ($page - 1) * $pageSize;
$sql = "select id, cName from jx_cate order by id asc limit {$offset}, {$pageSize}";
$rows = fetch_all($sql);

if(!$rows){
    alertMes("没有分类,请添加!","addCate.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>管理员列表</title>
    <link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
<div class="details">
    <div class="details_operation clearfix">
        <div class="bui_select">
            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addCate()">
        </div>

    </div>
    <!--表格-->
    <table class="table" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th width="15%">编号</th>
            <th width="25%">分类名称</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php  foreach($rows as $row):?>
            <tr>
                <!--这里的id和for里面的c1 需要循环出来-->
                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['id'];?></label></td>
                <td><?php echo $row['cName'];?></td>
                <td align="center"><input type="button" value="修改" class="btn" onclick="editCate(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn"  onclick="delCate(<?php echo $row['id'];?>)"></td>
            </tr>
        <?php endforeach;?>
        <?php if($totalRows > $pageSize): ?>
            <tr>
                <td colspan="4"><?php echo showPage($page, $totalPage);?></td>
            </tr>
        <?php endif;?>
        </tbody>
    </table>
</div>
</body>
<script type="text/javascript">

    function addCate(){
        window.location="addCate.php";
    }
    function editCate(id){
        window.location="editCate.php?id="+id;
    }
    function delCate(id){
        if(window.confirm("您确定要删除吗？删除之后不可以恢复!")){
            window.location="doAdminAction.php?act=delCate&id="+id;
        }
    }
</script>
</html>
