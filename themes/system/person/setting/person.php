<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/2
 * Time: 18:39
 */
//print_r($_SESSION['user']);

if(isset($_POST['username'])) {
    $result = $basic->person_update($_SESSION['user']['id'], $_POST);
//    print_r($result);
    if($result) {
        $_SESSION['user'] = $result;
        header('location: /person.html?ii=person');
    }else{
        print_r($result);
    }
//    header('location: /person.html?i=setting&ii=person');
}

?>

<form action="" method="post">
    <ul>

        <li>
            <label>手机号</label>
            <input readonly value="<?php echo $_SESSION['user']['phone']; ?>" />
        </li>

        <li>
            <label>昵称</label>
            <input name="username" value="<?php echo $_SESSION['user']['username']; ?>" />
        </li>

        <li>
            <label>真实姓名</label>
            <input name="realname" value="<?php echo $_SESSION['user']['realname']; ?>" />
        </li>

        <li>
            <label>性别</label>
            <input name="sex" value="<?php echo $_SESSION['user']['sex']; ?>" />
        </li>

        <li>
            <label>性取向</label>
            <input name="love" value="<?php echo $_SESSION['user']['love']; ?>" />
        </li>

        <li>
            <label>家乡</label>
            <input name="hometown" value="<?php echo $_SESSION['user']['hometown']; ?>" />
        </li>

        <li>
            <label> </label>
            <input name="address" value="<?php echo $_SESSION['user']['address']; ?>" />
        </li>

        <li>
            <label>现居</label>
            <input name="location" value="<?php echo $_SESSION['user']['location']; ?>" autocomplete="off" />
        </li>

        <li>
            <label> </label>
            <input name="locationAddress" value="<?php echo $_SESSION['user']['locationAddress']; ?>" />
        </li>

        <li>
            <label> </label>
            <button>修改</button>
        </li>

    </ul>
</form>
