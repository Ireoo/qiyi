<div class="meun">
    <div>
        <a<?php if($index == 'index') {echo ' class="on"';} ?> href="//<?php echo $_SERVER['SERVER_NAME']; ?>/">首页</a>
        <a<?php if($index == 'stores' or $index == 'store') {echo ' class="on"';} ?> href="//<?php echo $_SERVER['SERVER_NAME']; ?>/stores.html">企业</a>
        <a<?php if($index == 'products' or $index == 'product') {echo ' class="on"';} ?> href="//<?php echo $_SERVER['SERVER_NAME']; ?>/products.html">宝贝</a>
        <a<?php if($index == 'news' or $index == 'new') {echo ' class="on"';} ?> href="//<?php echo $_SERVER['SERVER_NAME']; ?>/news.html">新闻</a>
        <div class="right">
        <a<?php if($index == 'services' or $index == 'service') {echo ' class="on"';} ?> href="//<?php echo $_SERVER['SERVER_NAME']; ?>/services.html">客户服务</a>
        </div>
        <br class="clear" />
    </div>
</div>