<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 15/1/2
 * Time: 14:50
 */

//print_r($_SERVER);
 
if(!isset($_SESSION['user']) or !isset($_SESSION['user']['id'])) header('Location: /login.html?url=' . $_SERVER['REQUEST_URI']);
// $_SESSION['user'] = $basic->person_get($_SESSION['user']['id']);
//print_r($_SESSION);

if(isset($_GET['i'])) {
    $i = $_GET['i'];
}else{
    $i = 'index';
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>用户管理中心</title>
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/person.css">
    <script type="text/javascript" src="<?php echo THEME_URL; ?>/include/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo THEME_URL; ?>/include/js/script.js"></script>
</head>
<body>
<?php include_once('include/head/head.php'); ?>
<div class="m">
    <div>
        <a<?if($i == 'index') echo ' class="on"'; ?> href="/person.html">我的琦益</a>
        <a<?if($i == 'store') echo ' class="on"'; ?> href="?i=store">我的企业</a>
        <a<?if($i == 'product') echo ' class="on"'; ?> href="?i=product">我的产品</a>
<!--        <a<?if($i == 'setting') echo ' class="on"'; ?> href="?i=setting">设置</a>.   -->
        <em class="right">
            <a href="#">客户服务</a>
        </em>
    </div>
</div>
<?php include_once('person/' . $i . '.php'); ?>

<?php include_once('include/head/foot.php'); ?>
</body>
</html>