<div class="top">
    <div class="avatar">
        <img src="//<?php echo $_SERVER['SERVER_NAME']; ?>/store/<?php echo $_GET['id']; ?>.jpg" />
        <h1><?php echo $store['title']; ?><?php if($store['verified'] != 1) { ?><i class="Icon Icon--verified" title="未认证"></i><?php }else{ ?><i class="Icon Icon--verified verified" title="已认证"></i><?php } ?></h1>
    </div>
</div>

<div class="m">
    <ul>
        <a<?php if($index == 'index') echo ' class="on"'; ?> href="//<?php echo $_SERVER['SERVER_NAME']; ?>/<?php echo $_GET['id']; ?>.html">首页</a>
        <a<?php if($index == 'new') echo ' class="on"'; ?> href="//<?php echo $_SERVER['SERVER_NAME']; ?>/<?php echo $_GET['id']; ?>/new.html">动态</a>
<!--        <a--><?php //if($index == 'photo') echo ' class="on"'; ?><!-- href="//--><?php //echo $_SERVER['SERVER_NAME']; ?><!--/--><?php //echo $_GET['id']; ?><!--/photo.html">相册</a>-->
        <a<?php if($index == 'product') echo ' class="on"'; ?> href="//<?php echo $_SERVER['SERVER_NAME']; ?>/<?php echo $_GET['id']; ?>/product.html">产品</a>
        <br class="clear" />
    </ul>
</div>