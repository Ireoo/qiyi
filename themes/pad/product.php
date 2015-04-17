<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 14/12/30
 * Time: 14:49
 */

$product = $basic->product_get($_GET['id']);

//print_r($_GET);

//print_r($product);


?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title><?php echo $product['title']['value']; ?>|<?php echo SITE_NAME; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/product.css">
        <script type="text/javascript" src="<?php echo THEME_URL; ?>/include/js/jquery.js"></script>
    </head>
    <body>
    <?php include_once('include/head/head.php'); ?>

    <?php include_once('product/index.php'); ?>

    <?php include_once('include/head/foot.php'); ?>
    </body>
</html>