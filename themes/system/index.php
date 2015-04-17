<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 14/12/24
 * Time: 15:09
 */



?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo SITE_NAME; ?></title>
    <meta name="keywords" content="<?php echo SITE_KEYWORD; ?>" />
    <meta name="description" content="<?php echo SITE_DESCRIPTION; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/style.css">
    <script type="text/javascript" src="<?php echo THEME_URL; ?>/include/js/jquery.js"></script>
<!--    <script type="text/javascript" src="http://rawgit.com/briangonzalez/rgbaster.js/master/rgbaster.js"></script>-->
    <script type="text/javascript" src="<?php echo THEME_URL; ?>/include/js/script.js"></script>
    <script type="text/javascript" src="<?php echo THEME_URL; ?>/include/js/conf.js"></script>
    <style type="text/css">

        ul.sider{
            float: left;
            width: 100px;
/*             border: 1px #EBEBEB solid; */
            height: 400px;
            background: #333;
        }

        ul.sider a{
            display: block;
            height: 50px;
            text-align: center;
            line-height: 50px;
            text-decoration: none;
            color: #FFF;
        }

        ul.sider a.on{
/*             background-color: #3876c0; */
			color: #ff4ebf;
        }

        ul.sider a:hover{
/*             background-color: #3876c0; */
			color: #ff4ebf;
        }

        ul.sider a.on:hover{
            color: #ff4ebf;
        }

        ul.huandeng{
            width: 1100px;
            float: right;
            height: 400px;
            overflow: hidden;
            position: relative;
            /*box-shadow: 1px 1px 1px #CCC;*/
/*             margin-right: 300px; */
        }

        ul.huandeng li{
            width: 1100px;
            height: 400px;
            position: absolute;
            top: 0;
            left: 0;
        }

        ul.huandeng li img{
            width: 100%;
        }

        div.list{
            float: left;
            width: 905px;
        }

        ul.list{list-style: none; padding: 0;}
        ul.list h1.title{margin-bottom: 10px;}
        ul.list li{display: inline-block; width: 152px; border: 1px #CCC solid; border-bottom-width: 2px; vertical-align: top; margin-right: 20px; margin-bottom: 20px; padding: 1px;}
        ul.list li a.img{display: block; width: 152px; height: 100px; overflow: hidden; position: relative;}
        ul.list li a.img:hover span{display: block;}
        ul.list li a.img img{width: 152px; -webkit-animation-name: mouseOn; animation-name: mouseOn; position: absolute; top: -26px;}
        ul.list li a.img:hover img{-webkit-animation-name: mouseOver; animation-name: mouseOver;}
        ul.list li div{display: block;}
        ul.list li div h1{font-size: 12px; font-weight: normal; height: 30px; line-height: 30px; overflow: hidden; padding: 0 10px;}
        ul.list li div h1 a{text-decoration: none; color: #333;}
        ul.list li div h1 a:hover{color: #ff4ebf; text-decoration: underline;}
        ul.list li div h1 a img{width: 28px; height: 28px; border-radius: 3px; margin-right: 10px;border: 1px #FFF solid;}
        ul.list li div h1 a:hover img{border-color: #ff4ebf;}
        ul.list li div span{display: block; font-size: 12px; padding: 0 10px 10px 10px; color: #AAA;}
        ul.list li div span img{width: 16px; height: 16px; margin-right: 5px;}


        ul.news{
            float: right;
            width: 295px;
            height: 100px;
            background: #EBEBEB;
        }
    </style>

</head>
<body>
	
<?php include_once('include/head/head.php'); ?>

<?php include_once('include/head/meun.php'); ?>

<div class="mian">
    <img src="/uploads/guang1.png" style="width: 100%;" />
</div>

<div class="mian">
    <ul class="sider">
        <a href="/stores.html" class="list">餐饮</a>
        <a href="/stores.html" class="list">着装</a>
        <a href="/stores.html" class="list">出行</a>
        <a href="/stores.html" class="list">娱乐</a>
        <a href="/stores.html" class="list">设备</a>
        <a href="/stores.html" class="list">服务</a>
        <a href="/stores.html" class="list">建筑</a>
        <a href="/stores.html" class="list">原料</a>
        <br class="clear" />
    </ul>

    <ul class="huandeng">
        <li><img src="/uploads/g1.jpg" /></li>
        <li><img src="/uploads/g2.jpg" /></li>
        <li><img src="/uploads/g3.jpg" /></li>
        <li><img src="/uploads/g4.jpg" /></li>
        <li><img src="/uploads/g5.jpg" /></li>
        <li><img src="/uploads/g6.jpg" /></li>
        <li><img src="/uploads/g7.jpg" /></li>
        <li><img src="/uploads/g8.jpg" /></li>
    </ul>

    <br class="clear" />
</div>

<div class="mian">
    <div class="list">
        <ul class="list">
        <h1 class="title">最新发布的产品</h1>
        <?php
        $news = $basic->product_show('1', 0, 5);
//                print_r($news);
        foreach($news as $k => $v) {
        ?>
        <li>
            <a class="img" target="_blank" href="//product.ireoo.com/<?php echo $v['basic']['id']; ?>.html">
                <?php $image = explode(',', $v['image']['value']); ?>
                <img class="animated" src="<?php echo $image[0]; ?>" />
            </a>
            <div>
                <h1>
                    <a target="_blank" href="//product.ireoo.com/<?php echo $v['basic']['id']; ?>.html"><?php echo $v['title']['value']; ?></a>
                </h1>
                <span>售价 <?php echo $v['money']['value']; ?> 元</span>
            </div>
        </li>
        <?php
        }
        ?>
        </ul>

        <ul class="list">
            <h1 class="title">最新加入的企业</h1>
            <?php
            $randMax = $basic->store_count();
            $rand = rand(5, $randMax) - 5;
            $news = $basic->store_show('1', $rand, 5);
            //        print_r($news);
            foreach($news as $k => $v) {
	            
	            if(!file_exists(ROOT . "/upload/store/{$v['id']}.jpg")) {
		            $img = 'http://ireoo.com/upload/store/0.jpg';
	            }else{
		            $img = "/upload/store/{$v['id']}.jpg";
	            }
	            
                ?>
                <li>
                    <a class="img" target="_blank" href="/<?php echo $v['id']; ?>.html">
                        <img class="animated" src="<?php echo $img; ?>" />
                    </a>
                    <div>
                        <h1>
                            <a target="_blank" href="/<?php echo $v['id']; ?>.html"><?php echo $v['title']; ?></a>
                        </h1>
                        <span>访问 <?php echo $v['count']; ?> 次</span>
                    </div>
                </li>
            <?php
            }
            ?>
            <br class="clear" />
        </ul>


    </div>

    <ul class="news">

    </ul>

    <br class="clear" />
</div>


<?php include_once('include/head/foot.php'); ?>
</body>
</html>