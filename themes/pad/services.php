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
    <title>客户服务 - 琦益网</title>
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/style.css">
    <script type="text/javascript" src="<?php echo THEME_URL; ?>/include/js/jquery.js"></script>
</head>
<body>
<?php include_once('include/head/head.php'); ?>

<?php include_once('include/head/meun.php'); ?>

<?php include_once('include/head/foot.php'); ?>
</body>
</html>