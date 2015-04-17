<?php

$sayCount = $basic->say_count('sid = ' . $_GET['id']);
//print_r($sayCount);
//    print_r("sid = {$_GET['id']}");
//    print_r($say);
//    print_r(1);
$photoCount = $basic->photo_count('sid = ' . $_GET['id']);

?>


<div class="mian">
    <div class="left">
        <ul class="show">
            <li class="border">
                <em><?php echo $store['count']; ?></em>
                <span>访问</span>
            </li>
            <li class="border">
                <em><?php echo $sayCount; ?></em>
                <span>动态</span>
            </li>
            <li>
                <em><?php echo $photoCount; ?></em>
                <span>相册</span>
            </li>
            <br class="clear" />
        </ul>

        <ul class="store">
            <h1>企业档案</h1>
            <li class="first"><lable>建立时间</lable><?php echo $store['createTimer']; ?>年(<?php $t = date('Y') - $store['createTimer']; if($t < 1) {echo "刚成立不久";}else{echo "已经有{$t}个年头了";} ?>)</li>
            <li><lable>企业性质</lable><?php echo $store['nature']; ?></li>
            <li><lable>主营项目</lable><?php echo $store['project']; ?></li>
            <li><lable>详细地址</lable><?php echo $store['address']; ?></li>
        </ul>
        
        <ul class="store">
            <h1>联系方式</h1>
            <li class="first"><lable>联系人</lable>王经理</li>
            <li><lable>职位职责</lable>产品经理</li>
            <li><lable>移动电话</lable>18252365671</li>
        </ul>

    </div>

    <div class="zhu">

            <?php echo $present['present']; ?>

    </div>
    <br class="clear" />
</div>