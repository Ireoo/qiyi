<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/3
 * Time: 14:27
 */

// print_r($_POST);
//print_r($_SESSION['user']);

if(isset($_POST['present'])) {
    $result = $basic->store_present($_SESSION['user']['sid'], $_POST['present']);
//     print_r($result);
//    $_SESSION['store'] = $result;
    if($result) {
        header('location: /person.html?i=setting&ii=storeDesc');
    }else{
        print_r($result);
    }
//    header('location: /person.html?i=setting&ii=person');
}else{

    $result = $basic->store_present($_SESSION['user']['sid']);

}

//print_r($result);

// $store = $basic->store_get($_SESSION['user']['sid']);

// print_r($store);

?>

<link rel="stylesheet" type="text/css" href="/app/ueditor/themes/default/css/ueditor.css">

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/app/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/app/ueditor/ueditor.all.min.js"> </script>

<form action="" method="post">
    <ul>

        <li>
            <textarea id="editor" name="present" style="height: 300px;"><?php echo $result['present']; ?></textarea>
        </li>

        <li>
            <button>修改</button>
        </li>

    </ul>
</form>

<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');

</script>