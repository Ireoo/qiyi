<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 15/4/9
 * Time: 00:36
 */

if(isset($_GET['del']) and $_GET['del'] != '') {
    if(unlink(ROOT . '/upload/' . $_SESSION['user']['id'] . '/' . $_GET['del'])) {
        header('Location: /person.html?ii=photos');
    }else{
        header('Location: /person.html?ii=photos');
    }
}

$dir = ROOT . '/upload/' . $_SESSION['user']['id'] . '/';

if (is_dir($dir)){
    if ($dh = opendir($dir)){
        while (($file = readdir($dh))!= false){

            //文件名的全路径 包含文件名
            $filePath = $dir.$file;
            if(!is_dir($filePath)) {
                //获取文件修改时间
                $fmt = filemtime($filePath);
                $nameArray = explode('/', $filePath);
                $name = $nameArray[count($nameArray) - 1];
                // echo "<span style='color:#666'>(".date("Y-m-d H:i:s",$fmt).")</span> ".$name."<br/>";
                $title = explode('.', $name);
                ?>
                <div class="image">
                    <img src="<?php echo '/upload/' . $_SESSION['user']['id'] . '/' . $name; ?>"/>
                    <h1><?php echo $title[0]; ?></h1>
                    <a href="?ii=photos&del=<?php echo $name; ?>"><img src="/ico/del.png"/></a>
                </div>
            <?php
            }
        }
        closedir($dh);
    }
}
?>
<style type="text/css">

    div.image{
        display: inline-block;
        width: 104px;
        height: 124px;
        position: relative;
        overflow: hidden;
        margin: 0 10px 10px 0;
    }

    div.image img{
        width: 100px;
        height: 100px;
        padding: 1px;
        border: 1px #EBEBEB solid;
    }

    div.image a{
        width: 20px;
        height: 20px;
        position: absolute;
        bottom: 22px;
        right: 2px;
        background: red;
        display: none;
        cursor: pointer;
    }

    div.image:hover a{
        display: block;
    }

    div.image a img{
        width: 20px;
        height: 20px;
        padding: 0;
        border: none;
    }

    div.image h1{
        height: 20px;
        line-height: 20px;
        font-size: 12px;
        font-weight: normal;
    }

</style>