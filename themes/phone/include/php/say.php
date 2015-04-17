<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 15/2/11
 * Time: 00:57
 */

if(isset($_GET['del']) and $_GET['del'] > 0) $basic->say_del($_GET['del'], $_SESSION['user']['id']);

if(isset($_GET['l']) and $_GET['l'] != '') {
    $l = $_GET['l'];
}else{
    $l = 1;
}
if(!isset($member)) $member = 20;

if(isset($mode) and $mode == 'user') {
    $zong = $basic->say_count('uid = ' . $id);
//		print_r($zong);
    $say = $basic->say_show('tid = 0 and uid = ' . $id, ($l - 1) * $member, $member);
//		print_r($say);
}elseif(isset($mode) and $mode == 'store') {
    $zong = $basic->say_count('sid = ' . $id);
//		print_r($zong);
    $say = $basic->say_show('tid = 0 and sid = ' . $id, ($l - 1) * $member, $member);
//		print_r($say);
}
?>

<ul class="say">
    <?php

//    print_r($say);

    foreach($say as $key => $value) {
        $zhuanfa = 0;
        $pinglun = 0;
        $zan = 0;
        ?>
        <li>
            <div class="txt">
                <?php echo $value['txt']; ?>
            </div>
            <?php
            //                    if($value['image'] == '') $value['image'] = '[]';
            //                    print_r($value['image']);
            $img = json_decode($value['image'], true); if(count($img) == 1) { ?>
                <div class="img one">
                    <?php foreach($img as $key => $value) {?>
                        <img src="http://iwd.hk:81/<?php echo $value; ?>.jpg" />
                    <?php } ?>
                </div>
            <?php }elseif(count($img) > 1) { ?>
                <div class="img one">
                    <?php foreach($img as $key => $value) {?>
                        <img src="http://iwd.hk:81/<?php echo $value; ?>.jpg" />
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="another">
                <a id="timer"><?php echo $basic->timer($value['timer']); ?></a>
                <?php if(isset($_SESSION['user']['id']) and $value['uid'] == $_SESSION['user']['id']) { ?>
                <a id="del" href="?del=<?php echo $value['id']; ?>">删除</a>
                <?php }else{ ?>
                <a id="user" data="<?php echo $value['uid']; ?>"><?php echo $value['username']; ?></a>
                <?php } ?>
            </div>
            <div class="action">
                <a href="#">
                    <span>收藏</span>
                </a><a href="#">
                    <span>转发<?php if($zhuanfa > 0) { ?><em><?php echo $zhuanfa; ?></em><?php } ?></span>
                </a><a href="#">
                    <span>评论<?php if($pinglun > 0) { ?><em><?php echo $pinglun; ?></em><?php } ?></span>
                </a><a href="#">
                    <span class="last"><i class="icon good"></i><?php if($zan > 0) { ?><em><?php echo $zan; ?></em><?php } ?></span>
                </a>
            </div>
        </li>
    <?php
    }
    ?>
</ul>

<div class="ye">
    <?php $basic->turn_page($l, $member, $zong, $url)?>
</div>