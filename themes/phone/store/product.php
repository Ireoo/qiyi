<?php

if(isset($_GET['l'])) {
    $l = $_GET['l'];
}else{
    $l = 1;
}
$member = 8;
$product = $basic->product_show('sid = ' . $_GET['id'], ($l-1)*$member, $member);
//print_r($photo);
$zong = $basic->product_count('sid = ' . $_GET['id']);
//$zong = $basic->new_count();
//print_r($zong);
?>

<div class="mian">

        <div class="sortProduct">
            <a class="on" href="#">最新发布</a>
            <a href="#">热门热销</a>
            <a href="#">打折促销</a>
        </div>

        <div class="product">

            <ul>
                <?php foreach($product as $key => $value) { ?>
                <li>
                    <a target="_blank" href="//product.ireoo.com/<?php echo $value['basic']['id']; ?>.html">
                        <?php $img = explode(',', $value['image']['value']); ?>

                        <img src="http://ireoo.com/<?php echo $img[0]; ?>" />
                        <h1><?php echo $value['title']['value']; ?></h1>
                        <span class="money"><?php echo $value['money']['value']; ?></span>
                    </a>
                </li>
                <?php } ?>
                <br class="clear" />
            </ul>

            <div class="ye">
                <?php $basic->turn_page($l, $member, $zong, $_GET['id'] . '-product'); ?>
            </div>

        </div>

        <br class="clear" />

    </div>