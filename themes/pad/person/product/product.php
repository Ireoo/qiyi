<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 15/2/13
 * Time: 16:50
 */

if(isset($_GET['l']) and $_GET['l'] != '') {
    $l = $_GET['l'];
}else{
    $l = 1;
}

$member = 20;

$products = $basic->product_show("uid = {$_SESSION['user']['id']} and sid = {$_SESSION['user']['sid']}", ($l - 1) * $member, $member);
$zong = $basic->product_count("uid = {$_SESSION['user']['id']} and sid = {$_SESSION['user']['sid']}");

//print_r("uid = {$_SESSION['user']['id']} and sid = {$_SESSION['user']['sid']}");

//print_r($products);

?>

<style type="text/css">

    table {
        width: 100%;
        border-collapse: collapse;
     }

    table, td, th {
        border: 1px solid #EBEBEB;
    }
    td {
        padding: 5px;
        font-size: 12px;
        height: 50px;
        line-height: 50px;
    }
    
    td img{width: 50px; height: 50px;}

    td a.bt{
        padding: 3px 5px;
        font-size: 12px;
        color: #FFF;
        background: #CCC;
        border-radius: 3px;
    }
    
    td a.title{
	    color: #333;
	    text-decoration: none;
	    font-size: 16px;
	}
    
    td a.title:hover{
	    color: #ef4300;
	}
    
    td a.bt:hover{
	    background: #4898F8;
	}
    
    thead td{
	    text-align: center;
	    background: #EBEBEB;
	    color: #FFF;
	    border: none;
	    font-size: 16px;
	}

    div.ye{
        padding: 10px 0;
    }

</style>

<table class="products">
	<thead>
		<tr>
			<td>产品名称</td>
			<td>创建日期</td>
			<td>操作</td>
		</tr>
	</thead>
    <?php
    foreach($products as $key => $value) {
        ?>
        <tr class="product<?php if(($key+1)%2 == 0) {echo ' background';} ?>">
            <td>
            <a class="title" target="_blank" href="//product.ireoo.com/<?php echo $value['basic']['id']; ?>.html">
                <?php

                $image = explode(',', $value['image']['value']);

                ?>

            <img src="<?php echo $image[0]; ?>" />

            <span><?php echo $value['title']['value']; ?></span>
                </a>
            </td>
            <td width="30%" style="text-align: center;"><?php echo date('Y年m月d日 H:i', $value['basic']['timer']); ?></td>

            <td width="20%" style="text-align: center;">
                <a class="bt" href="?i=product&ii=productCreate&id=<?php echo $value['basic']['id']; ?>">修改</a>
                <a class="bt" href="?i=product&ii=sale&id=<?php echo $value['basic']['id']; ?>">销售</a>
                <a class="bt" href="?i=product&del=<?php echo $value['basic']['id']; ?>">删除</a>
            </td>

        </tr>
    <?php
    }
    ?>

</table>

<div class="ye">
    <?php $basic->turn_page($l, $member, $zong, 'person-', '.html?i=store&ii=product'); ?>
</div>