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
        <form action="doAdminAction.php?act=addAdmin" method="post">
            <div class="form-group">
                <label for="adname">用户名</label>
                <input type="text" class="form-control" name="username" placeholder="请输入用户名">
            </div>
            <div class="form-group">
                <label for="psd">密码</label>
                <input type="password" class="form-control" name="password" placeholder="密码">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="邮箱">
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">添加管理员</button>
        </form>
    </div>

</body>
</html>