<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/3
 * Time: 14:27
 */

if(isset($_GET['ii'])) {
    $ii = $_GET['ii'];
}else{
    $ii = 'index';
}

if($_SESSION['user']['sid'] < 1) header('Location: /person.html?i=storeReg');

?>

<div class="mian">

    <div class="left">
	    <ul class="caidan">
	        <h1>企业设置</h1>
	        <a<?php if($ii == 'index') echo ' class="on"'; ?> href="?i=store&ii=index">基础资料</a>
	        <a<?php if($ii == 'store') echo ' class="on"'; ?> href="?i=store&ii=store">修改资料</a>
	        <a<?php if($ii == 'storeDesc') echo ' class="on"'; ?> href="?i=store&ii=storeDesc">企业简介</a>
	        <a<?php if($ii == 'storeAvatar') echo ' class="on"'; ?> href="?i=store&ii=storeAvatar">更换LOGO</a>
	        <br class="clear" />
	    </ul>
    </div>

    <div class="right">
        <?php include_once('store/' . $ii . '.php'); ?>
    </div>

    <br class="clear" />

</div>