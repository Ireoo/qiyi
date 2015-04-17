<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 14/12/29
 * Time: 11:48
 */

//print_r($_SERVER);

if(!isset($_GET['id'])) header('Location: /1.html');

$basic->store_plus($_GET['id']);

$store = $basic->store_get($_GET['id']);
//print_r($store);

if(isset($_GET['p']) and $_GET['p'] != '') {
    $index = $_GET['p'];
}else{
    $index = 'index';
}

$present = $basic->store_present($_GET['id']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $store['title']; ?> - 企业产品直销平台</title>
    <meta name="keywords" content="<?php echo $store['title']; ?>，琦益，琦益网，产品直销平台，企业产品直销平台" />
    <meta name="description" content="<?php echo strip_tags($present['present']); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/store.css">
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/normalize.css">
    <script type="text/javascript" src="<?php echo THEME_URL; ?>/include/js/jquery.js"></script>
</head>
<body>
<?php

include_once('include/head/head.php');
include_once('include/head/store.php');
include_once('store/' . $index . '.php');
include_once('include/head/foot.php');

?>
</body>
</html>