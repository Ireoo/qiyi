<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/3
 * Time: 14:27
 */

// print_r($_POST);

if(isset($_POST['title'])) {
    $result = $basic->store_basic($_SESSION['user']['sid'], $_POST['title']);
//     print_r($result);
    $_SESSION['store'] = $result;
    if($result) {
        header('location: /person.html?i=setting&ii=storeBasic');
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
            <input name="title" value="<?php echo $_SESSION['store']['title']; ?>" />
        </li>

        <li>
            <label> </label>
            <button>修改</button>
        </li>

    </ul>
</form>