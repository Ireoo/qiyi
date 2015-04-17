<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 14/12/29
 * Time: 10:35
 */

if(isset($_GET['l']) and $_GET['l'] != '') {
    $l = $_GET['l'];
}else{
    $l = 1;
}
$member = 20;
//print_r($l);
if(isset($_GET['key']) and $_GET['key'] != '') {
    $key = htmlspecialchars($_GET['key']);
    $store = $basic->store_show("title like '%{$key}%'", ($l-1)*$member, $member);
    $zong = $basic->store_count("title like '%{$key}%'");
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
    <title><?php if(isset($_GET['key']) and $_GET['key'] != '') {echo "搜索有关“{$_GET['key']}”的商家";}else{echo "企业";} ?> - 琦益网</title>
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/list.css">
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/normalize.css">
    <script type="text/javascript" src="<?php echo THEME_URL; ?>/include/js/jquery.js"></script>

</head>
<body>
<?php include_once('include/head/head.php'); ?>

<?php include_once('include/head/meun.php'); ?>

<div class="store">
    <ul class="sider">
        <h1>商家分类</h1>
        <?php
        foreach($fenlei as $key => $value) {
            echo "<a href='?span={$key}'>{$value}</a>";
        }
        ?>
    </ul>
    <div class="list">
        <ul class="list">
            <?php
            foreach($store as $key => $value) {
                // print_r($value);
                $present = $basic->store_present($value['id']);
            ?>
            <li>
                <h1><a target="_blank" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/<?php echo $value['id']; ?>.html" title="<?php echo $value['title']; ?>"><?php echo $value['title']; ?><?php if($value['verified'] != 1) { ?><i class="Icon Icon--verified Icon--small" title="未认证"></i><?php }else{ ?><i class="Icon Icon--verified Icon--small verified" title="已认证"></i><?php } ?></a></h1>
                <div class="txt"><?php echo strip_tags($present['present']); ?></div>
                <div class="bottom">
                    <a target="_blank" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/<?php echo $value['id']; ?>.html" title="<?php echo $value['title']; ?>">http://<?php echo $_SERVER['SERVER_NAME']; ?>/<?php echo $value['id']; ?>.html</a>
                </div>
            </li>
            <?php
            }
            ?>
        </ul>
        <div class="ye">
        <?php
        if(isset($_GET['key']) and $_GET['key'] != '') {
	        $basic->turn_page($l, $member, $zong, 'stores-', '.html?key=' . $_GET['key']);
        }else{
            $basic->turn_page($l, $member, $zong, 'stores-');
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