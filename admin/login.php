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
<div class="header">
    <div class="content">
        <a href=""><img src="images/logo.png" alt="logo"></a>
        <h3>欢迎登陆</div>
</div>
<div class="main">
    <form action="doLogin.php" role="form" method="post" id="loginform">
        <div class="form-group">
            <label for="adname">用户名</label>
            <input type="text" class="form-control" name="adname" placeholder="请输入用户名">
        </div>
        <div class="form-group">
            <label for="psd">密码</label>
            <input type="password" class="form-control" name="psd" placeholder="密码">
        </div>
        <div class="form-group">
            <label for="vcode">验证码</label>
            <input type="text" class="form-control" name="vcode" placeholder="验证码">
            <img src="getVerify.php" alt="vcode">
        </div>
        <div class="checkbox">
            <label id="ckb">
                <input type="checkbox" name="auto_flag" value="1"> 自动登陆(三天内自动登陆)
            </label>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">登陆</button>
    </form>
</div>
<div class="hr_25"></div>
<div class="footer">
    <p><a href="#">京西简介</a><i>|</i><a href="#">京西公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-123-1234</p>
    <p>Copyright &copy; 2006 - 2014 京西版权所有&nbsp;&nbsp;&nbsp;京ICP备12312323号&nbsp;&nbsp;&nbsp;京ICP证xxxxx-xxxx号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
    <p class="web"><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a></p>
</div>
</body>
</html>
