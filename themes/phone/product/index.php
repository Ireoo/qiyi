<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 15/1/2
 * Time: 14:17
 */

$store = $basic->store_get($product['basic']['sid']);

//print_r($store);

?>

<!--<div class="top">-->
<!---->
<!--</div>-->

<div class="m">
    <ul>
        <a class="on" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/<?php echo $product['basic']['sid']; ?>.html"><?php echo $store['title']; ?></a>
        <a href="//<?php echo $_SERVER['SERVER_NAME']; ?>/<?php echo $product['basic']['sid']; ?>/product.html">新款</a>
        <a href="//<?php echo $_SERVER['SERVER_NAME']; ?>/<?php echo $product['basic']['sid']; ?>/hot.html">热销</a>
        <a href="//<?php echo $_SERVER['SERVER_NAME']; ?>/<?php echo $product['basic']['sid']; ?>/sale.html">促销</a>
    </ul>
</div>

<div class="mian head">
    <div class="photos">
        <?php $img = explode(',', $product['image']['value']); ?>
        <img src="<?php echo $img[0]; ?>" />
    </div>

    <div class="minute">
        <h1><?php echo $product['title']['value']; ?></h1>

        <div class="money">
            <em><label>促销价</label><i></i><span><?php echo $product['money']['value']; ?></span></em>
            <span><label>市场价</label><i></i><s><?php echo $product['money']['value']; ?></s></span>
        </div>

        <div class="shou">
            <span><label>月销量</label>90</span>
            <span><label>累积评价</label>65465</span>
            <span><label>送积分</label>5</span>
        </div>

        <ul>
            <li><label>数量</label>库存<?php echo $product['money']['value']; ?>件</li>
        </ul>

        <div class="buy">
            <a class="pay" href="#">立即购买</a>
            <a class="put" href="#">放入购物车</a>
        </div>

    </div>

    <br class="clear" />
</div>

<div class="mian">

    <div class="carte">

        <ul>
            <h1><?php echo $store['title']; ?></h1>
            <li></li>
        </ul>

    </div>

    <div class="com">

        <ul class="mod">
            <h1>产品参数</h1>

            <?php
            $modes = $product['modes']['value'];

            $mode = explode('[;；]', $modes);

            foreach($mode as $v) {
                $m = explode('[:：]', $v);
                if(count($m) < 2) continue;
                ?>

                <li>
                    <label><?php echo $m[0]; ?></label>
                    <span><?php echo $m[1]; ?></span>
                </li>

            <?php
            }
            ?>
        </ul>

        <div>
            <?php echo $product['present']['present']; ?>
        </div>

    </div>

    <br class="clear" />
</div>