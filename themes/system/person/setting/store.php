<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/3
 * Time: 14:27
 */

// print_r($_POST);

if(isset($_POST['createTimer'])) {
    $result = $basic->store_update($_SESSION['user']['sid'], $_POST);
//     print_r($result);
    $_SESSION['store'] = $result;
    if($result) {
        header('location: /person.html?i=setting&ii=store');
    }else{
        print_r($result);
    }
//    header('location: /person.html?i=setting&ii=person');
}

// $store = $basic->store_get($_SESSION['user']['sid']);

// print_r($store);

?>

<form action="" method="post">
    <ul>

        <li>
            <label>企业名称</label>
            <input readonly value="<?php echo $_SESSION['store']['title']; ?>" />
        </li>

        <li>
            <label>创建时间</label>
            <input name="createTimer" value="<?php echo $_SESSION['store']['createTimer']; ?>" />
        </li>
        
        <li>
            <label>员工人数</label>
            <input name="persons" value="<?php echo $_SESSION['store']['persons']; ?>" />
        </li>

        <li>
            <label>企业性质</label>
            <input name="nature" value="<?php echo $_SESSION['store']['nature']; ?>" />
        </li>

        <li>
            <label>主营项目</label>
            <input name="project" value="<?php echo $_SESSION['store']['project']; ?>" />
        </li>

        <li>
            <label>详细地址</label>
            <input name="address" value="<?php echo $_SESSION['store']['address']; ?>" />
        </li>

        <li>
            <label> </label>
            <button>修改</button>
        </li>

    </ul>
</form>