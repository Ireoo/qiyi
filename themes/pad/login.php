<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 14/12/29
 * Time: 08:43
 */

//print_r($_SERVER['HTTP_REFERER']);

//echo strpos($_GET['url'], '?');
//echo 1;

if(isset($_POST['phone']) and isset($_POST['password'])) {
    $person = $basic->person_login('+86' . $_POST['phone'], $_POST['password']);
//     print_r($person);
    if(is_array($person) and !isset($person['error'])) {
//        print_r($person);
        $_SESSION['user'] = $person;
        $_SESSION['store'] = $basic->store_get($person['sid']);
        if(!isset($_GET['url'])) {
            header('Location: /');
        }else{

            if(strpos($_GET['url'], '?') > 0) {
                header('Location: ' . $_GET['url'] . '&session=' . session_id());
            }else{
                header('Location: ' . $_GET['url'] . '?session=' . session_id());
            }

        }

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
            <li>登陆</li><a href="reg.html">注册</a>
        </ol>
        <form action="" method="post">
            <ul>
                <li>
                    <input name="phone" placeholder="手机号" value="" />
                </li>
                <li>
                    <input name="password" type="password" placeholder="请输入密码" value="" />
                </li>
                <li>
                    <input id="checkbox" type="checkbox" />
                    <label for="checkbox">记住用户密码(公用电脑请勿勾选)</label>
                    <br class="clear" />
                </li>
                <?php
	            if(isset($person) and is_array($person) and isset($person['error'])) {
	                echo "<div class='error' style='margin: 0 0 10px 0;'>{$person['error']}</div>";
	            }
	            ?>
                <li>
                    <button>登陆</button>
                </li>
            </ul>
        </form>
    </div>
    <br class="clear" />
</div>

</body>
</html>