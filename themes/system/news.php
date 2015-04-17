<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 15/2/11
 * Time: 04:26
 */

if(isset($_GET['l']) and $_GET['l'] != '') {
    $l = $_GET['l'];
}else{
    $l = 1;
}
$member = 20;
$news = $basic->new_show('1', ($l-1)*$member, $member);
$zong = $basic->new_count('1');
//$zong = $basic->new_count();
//print_r($zong);
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>新闻动态 - 琦益网</title>
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/list.css">
    <style type="text/css">
        /*新闻列表css*/

        div.list ul{
            margin-bottom: 10px;
        }

        div.list ul li{
            height: 30px;
            line-height: 30px;
            border-bottom: 1px #EBEBEB solid;
            overflow: hidden;
        }

        div.list ul li a{
            text-decoration: none;
            font-size: 14px;
            color: #333;
        }

        div.list ul li a:hover{
            color: #ef4300;
        }

        div.list ul li span{
            font-size: 14px;
            color: #CCC;
            float: right;
            height: 30px;
            line-height: 30px;
        }
    </style>
    <script type="text/javascript" src="<?php echo THEME_URL; ?>/include/js/jquery.js"></script>
</head>
<body>
<?php include_once('include/head/head.php'); ?>

<?php include_once('include/head/meun.php'); ?>

<div class="store">
    <ul class="sider">
        <h1>商家分类</h1>
        <a href="#">餐饮</a>
        <a href="#">着装</a>
        <a href="#">出行</a>
        <a href="#">娱乐</a>
        <a href="#">设备</a>
        <a href="#">服务</a>
        <a href="#">建筑</a>
        <a href="#">原料</a>
    </ul>
    <div class="list">
        <ul>
            <?php
            foreach($news as $key => $value) {
                ?>
                <li><a target="_blank" href="//new.ireoo.com/<?php echo $value['id']; ?>.html"><?php echo $value['title']; ?></a><span><?php echo date('Y/m/d', $value['timer']); ?></span></li>
            <?php
            }
            ?>
        </ul>
        <div class="ye">
            <?php $basic->turn_page($l, $member, $zong, 'news-'); ?>
        </div>
    </div>

    <ul class="fu">
        <li></li>
    </ul>
    <br class="clear" />
</div>


<?php include_once('include/head/foot.php'); ?>
</body>
</html>