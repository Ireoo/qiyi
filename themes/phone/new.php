<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 14/12/29
 * Time: 14:41
 */

$new = $basic->new_get($_GET['id']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
        <title><?php echo $new['title'] . '|' . SITE_NAME; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/store.css">
        <script type="text/javascript" src="<?php echo THEME_URL; ?>/include/js/jquery.js"></script>
        <style type="text/css">

            div.background{
                background: #EBEBEB;
            }

            div.mian{
                padding: 10px 200px 10px 0;
                width: 1000px;
            }

            div.mian h1{
                padding-top: 50px;
                text-align: center;
                font-size: 20px;
                font-family: 'microsoft yahei', 'Helvetica Neue', Helvetica, Arial, sans-serif;
                margin: 0 0 10px 0;
            }

            div.mian div.con{
                padding: 20px;
                background: #FFF;
            }

            div.mian div.con img{
                display: block;
                max-width: 600px;
                margin: auto;
            }
        </style>
    </head>
    <body>
    <?php include_once('include/head/head.php'); ?>

    <?php include_once('include/head/meun.php'); ?>

    <div class="background">

        <div class="mian">
            <h1><?php echo $new['title']; ?></h1>
            <div class="con"><?php echo $new['con']; ?></div>
        </div>

    </div>

    <?php include_once('include/head/foot.php'); ?>


    <script type="text/javascript">

        $(function() {

            var load = $("<span/>").text('loading...').css({"marginLeft" : "10px"}).appendTo($('div.foot'));
            $.get("http://ireoo.com/app/news/index.php", function(result){
                load.remove();
            });
        });

    </script>

    </body>
</html>