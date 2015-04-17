<?php

if(isset($_GET['logout']) and $_GET['logout'] == 'yes') {
    unset($_SESSION['user']);
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/');
}

//print_r(session_id());

$url = 'stores';
$key = '搜索企业';

if($index == 'store' or $index == 'stores') {
    $url = 'stores';
    $key = '搜索企业';
}
if($index == 'product' or $index == 'products') {
    $url = 'products';
    $key = '搜索宝贝';
}

//print_r($_SERVER);

?>

<div class="head">
    <a class="logo" href="//<?php echo $_SERVER['SERVER_NAME']; ?>"><img src="//<?php echo $_SERVER['SERVER_NAME']; ?>/logo/top.png" /></a>
    <form class="search" action="//<?php echo $_SERVER['SERVER_NAME']; ?>/<?php echo $url; ?>.html" method="get"<?php if($index != 'stores' and $index != 'products') {echo ' target="_blank"';} ?>>
        <input name="key" placeholder="企业/宝贝搜索" value="<?php if(isset($_GET['key'])) {echo $_GET['key'];} ?>" />
        <button><?php echo $key; ?></button>
        <br class="clear" />
    </form>
    <div class="right">
        <?php
        if(!isset($_SESSION['user'])) {
            ?>
            <a href="//<?php echo $_SERVER['SERVER_NAME']; ?>/login.html?url=http://<?php echo $_SERVER['HTTP_HOST']; ?><?php echo $_SERVER['REQUEST_URI']; ?>">登陆</a>
            <a href="//<?php echo $_SERVER['SERVER_NAME']; ?>/reg.html">免费注册</a>
        <?php
        }else{
        ?>
            <a target="_blank" class="person" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/person.html"><?php echo $_SESSION['user']['username']; ?></a>
            <a href="?logout=yes">退出登陆</a>
        <?php
        }
        ?>
        <br class="clear" />
    </div>
    <br class="clear" />
</div>
<script type="text/javascript">
    $(function() {
        //搜索框获取焦点／失去焦点效果
        $('form.search input').focus(function () {
            $(this).animate({width: "700px"}).parent().addClass('on');
        }).blur(function () {
            $(this).parent().removeClass('on');
            if($(this).val() == '') if($('div.meun').length == 0) $(this).animate({width: "200px"});
        });

        if($('div.meun').length > 0) {
            $('form.search input').animate({width: "700px"});
        }
    });
</script>