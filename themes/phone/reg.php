<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 14/12/29
 * Time: 08:43
 */


if(isset($_POST['phone']) and isset($_POST['password']) and isset($_POST['password2'])) {

    if($_POST['password'] == $_POST['password2']) {
        $l = $basic->person_reg('+86' . $_POST['phone'], $_POST['password']);
        $result = json_decode($l, true);

//        print_r($result);

        if(!isset($result['error'])) {
            $_SESSION['user'] = $result;
//            header("location:/setting.html");
        }else{
            $error = $result['error'];
        }
    }else{
        $error = '两次密码不一致';
    }

}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title></title>
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/lr.css">
        <script type="text/javascript" src="<?php echo THEME_URL; ?>/include/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo THEME_URL; ?>/include/js/script.js"></script>
    </head>
    <body>
    <div class="head">
        <a class="logo" href="/"><img src="/logo/top.png" /></a>
        <br class="clear" />
    </div>

    <div class="mian">
        <div class="tu">
            <ul>
                <li><img src="<?php echo THEME_URL; ?>/include/img/wechat.jpg" /></li>
                <li>微信扫描获取琦益最新资讯</li>
            </ul>
        </div>
        <div class="lr">
            <ol>
                <a href="login.html">登陆</a><li>注册</li>
            </ol>
            <form action="" method="post">
                <ul>
                    <li>
                        <input name="phone" placeholder="手机号注册新账号" value="" />
                    </li>
                    <li>
                        <input name="password" type="password" placeholder="为新账号设置密码" value="" />
                    </li>
                    <li>
                        <input name="password2" type="password" placeholder="再次确认设置的密码" value="" />
                    </li>

                    <?php if(isset($error)) { ?>
                        <div class="error" style="margin: 0 0 10px 0;"><?php echo $error; ?></div>
                    <?php } ?>
                    <li>
                        <button>一键注册</button>
                    </li>
                </ul>
            </form>
        </div>
        <br class="clear" />
    </div>

    </body>
</html>