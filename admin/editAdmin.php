<?php
require_once "../include.php";
session_cache_limiter('nocache');
$id = $_REQUEST['id'];
$sql = "select id, username, password, email from jx_admin where id='{$id}'";
$row = fetch_one($sql);
var_dump($row);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>京西购物</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/new.ico">
    <!-- Bootstrap -->
    <link href="styles/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="styles/reset.css" rel="stylesheet" media="screen">
    <link href="styles/main.css" rel="stylesheet" media="screen">
    <script src="scripts/jquery-1.11.1.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/jquery.validate.min.js"></script>
    <script src="scripts/validate.js"></script>
    <script src="scripts/message.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="main">
    <form action="doAdminAction.php?act=editAdmin&id=<?php echo $id; ?>" method="post">
        <div class="form-group">
            <label for="username">用户名</label>
            <input type="text" class="form-control" name="username" placeholder="<?php echo $row['username']; ?> " autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password">密码</label>
            <input type="password" class="form-control" name="password" placeholder="密码" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="<?php echo $row['email']; ?>">
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">修改管理员</button>
    </form>
</div>

</body>
</html>
