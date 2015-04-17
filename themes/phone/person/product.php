<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 15/2/17
 * Time: 18:27
 */

if($_SESSION['user']['sid'] < 1) header('Location: /person.html?i=storeReg');

if(isset($_GET['ii'])) {
    $ii = $_GET['ii'];
}else{
    $ii = 'product';
}
?>

<div class="mian">

    <div class="left">
        <ul class="caidan">
            <h1>个人设置</h1>
            <a<?php if($ii == 'productCreate') echo ' class="on"'; ?> href="/person.html?i=product&ii=productCreate">添加产品</a>
            <a<?php if($ii == 'product') echo ' class="on"'; ?> href="/person.html?i=product&ii=product">产品列表</a>
            <br class="clear" />
        </ul>
    </div>

    <div class="right">
        <?php include_once('product/' . $ii . '.php'); ?>
    </div>

    <br class="clear" />

</div>