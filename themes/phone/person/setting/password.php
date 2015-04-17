<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/3
 * Time: 12:54
 */

if(isset($_POST['old']) and isset($_POST['password']) and isset($_POST['password2'])) {
    if($_POST['password'] == $_POST['password2']) {
        $result = $basic->person_password($_SESSION['user']['id'], $_POST['old'], $_POST['password']);
//        print_r($result);
        if(!isset($result['error'])) {
            $success = '密码修改成功!';
            header('location: /person.html?ii=password');
        }else{
            $error = $result['error'];
        }
    }else{
        $error = '两次密码输入不一致!';
    }
}

?>


<form action="" method="post">
    <ul>

        <li>
            <label>原密码</label>
            <input name="old" type="password" value="" />
        </li>

        <li>
            <label>新密码</label>
            <input name="password" type="password" value="" />
        </li>

        <li>
            <label>确认新密码</label>
            <input name="password2" type="password" value="" />
        </li>

        <?php if(isset($success) or isset($error)) { ?>
        <li>
            <label></label>
            <?php if(isset($success)) {echo "<span>{$success}</span>";}else{echo "<div class='error' style='width: 312px; display: inline-block;'>{$error}</div>";} ?>
        </li>
        <?php } ?>
        <li>
            <label> </label>
            <button>修改</button>
        </li>

    </ul>
</form>