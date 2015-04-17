<?php
if(isset($_GET['ii'])) {
    $ii = $_GET['ii'];
}else{
    $ii = 'person';
}
?>

<div class="mian">

<div class="left">
    <ul class="caidan">
        <h1>个人设置</h1>
        <a<?php if($ii == 'person') echo ' class="on"'; ?> href="?i=setting&ii=person">个人资料</a>
        <a<?php if($ii == 'avatar') echo ' class="on"'; ?> href="?i=setting&ii=avatar">更换头像</a>
        <a<?php if($ii == 'password') echo ' class="on"'; ?> href="?i=setting&ii=password">修改密码</a>
        <br class="clear" />
    </ul>

    <ul class="caidan">
        <h1>企业设置</h1>
        <a<?php if($ii == 'storeBasic') echo ' class="on"'; ?> href="?i=setting&ii=storeBasic">基础资料</a>
        <a<?php if($ii == 'store') echo ' class="on"'; ?> href="?i=setting&ii=store">详细资料</a>
        <a<?php if($ii == 'storeDesc') echo ' class="on"'; ?> href="?i=setting&ii=storeDesc">企业简介</a>
        <a<?php if($ii == 'storeAvatar') echo ' class="on"'; ?> href="?i=setting&ii=storeAvatar">更换LOGO</a>
        <br class="clear" />
    </ul>
</div>

<div class="right">
    <?php include_once('setting/' . $ii . '.php'); ?>
</div>

<br class="clear" />

</div>