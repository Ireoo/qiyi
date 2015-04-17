<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 14/12/29
 * Time: 10:35
 */

if(isset($_GET['l'])) {
    $l = $_GET['l'];
}else{
    $l = 1;
}
$member = 20;
//print_r($l);
if(isset($_GET['key']) and $_GET['key'] != '') {
    $store = $basic->store_show("title like '%{$_GET['key']}%'", ($l-1)*$member, $member);
    $zong = $basic->store_count("title like '%{$_GET['key']}%'");
}else{
    $store = $basic->store_show('1', ($l-1)*$member, $member);
    $zong = $basic->store_count();
}
//print_r($store);
//print_r(json_decode($store));

//print_r($zong);
//print_r($store);
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>搜索<?php if(isset($_GET['key']) and $_GET['key'] != '') echo "“{$_GET['key']}”"; ?> - 琦益网</title>
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/style.css">
    <script type="text/javascript" src="<?php echo THEME_URL; ?>/include/js/jquery.js"></script>
</head>
<body>
<?php include_once('include/head/head.php'); ?>

<div class="meun">
    <div>
        <a class="on" href="#">企业</a>
        <a href="#">产品</a>
        <a href="#">服务</a>
    </div>
</div>

<div class="search">
    <ul class="sider">
        <h1>企业全部分类</h1>
        <a href="#">零售/贸易/传媒</a>
        <a href="#">饮料/酒业/制造</a>
        <a href="#">手机/数码/通信</a>
        <a href="#">服装/家纺/丝绸</a>
        <a href="#">建筑/装潢/装饰</a>
        <a href="#">酒店/餐饮/住宿</a>
        <a href="#">旅游/景点/乐园</a>
        <a href="#">医疗/器械/服务</a>
        <a href="#">工业/民用/建筑</a>
        <a href="#">石油/煤炭/开采</a>
        <a href="#">种植/林木/养殖</a>
        <a href="#">综合/其他/分类</a>
    </ul>
    <div class="list">
        <ul class="list">
            <?php
            foreach($store as $key => $value) {
                // print_r($value);
            ?>
            <li>
                <h1><a target="_blank" href="/<?php echo $value['id']; ?>.html"><?php echo $value['title']; ?></a></h1>
                <div class="txt">淮安万达信息科技有限公司是中国领先的企业网络安全及营销运营商，拥有琦益平台，秉承“用心创造价值”的企业理念，</div>
                <div class="bottom">
                    <a target="_blank" href="http://t.ireoo.com/<?php echo $value['id']; ?>.html">http://t.ireoo.com/<?php echo $value['id']; ?>.html</a>
                </div>
            </li>
            <?php
            }
            ?>
        </ul>
        <div class="ye">
        <?php
        if(!isset($_GET['key']) and $_GET['key'] != '') {
            $basic->turn_page($l, $member, $zong, 'search-');
        }else{
            $basic->turn_page($l, $member, $zong, 'search-', '.html?key=' . $_GET['key']);
        }
        ?>
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