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
    $product = $basic->product_show("class = 'title' and value like '%{$key}%'", ($l-1)*$member, $member);
    $zong = $basic->product_count("class = 'title' and value like '%{$key}%'");
}else{
    $product = $basic->product_show('1', ($l-1)*$member, $member);
    $zong = $basic->product_count();
}
//print_r($product);
//print_r(json_decode($store));

//print_r($zong);
//print_r($store);
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>商家宝贝展示 - 琦益网</title>
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/list.css">
    <script type="text/javascript" src="<?php echo THEME_URL; ?>/include/js/jquery.js"></script>
</head>
<body>
<?php include_once('include/head/head.php'); ?>

<?php include_once('include/head/meun.php'); ?>

<div class="product">
    <ul class="sider">
        <h1>宝贝分类</h1>
        <?php
        foreach($fenlei as $key => $value) {
            echo "<a href='?span={$value}'>{$value}</a>";
        }
        ?>
    </ul>
    <div class="list">
        <ul class="list">
            <?php
            foreach($product as $key => $value) {
//                 print_r($value);
                ?>
                <a target="_blank" href="//product.ireoo.com/<?php echo $value['basic']['id']; ?>.html" title="<?php echo $value['title']['value']; ?>">
                    <div class="photo">
                        <?php
                        $img = explode(',', $value['image']['value']);
                        echo "<img src='{$img[0]}' alt='{$value['title']['value']}' />";
                        ?>
                    </div>
                    <span><?php echo $value['money']['value']; ?><em>176人付款</em></span>
                    <h1><?php echo $value['title']['value']; ?></h1>
                </a>
            <?php
            }
            ?>
            <br class="clear" />
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