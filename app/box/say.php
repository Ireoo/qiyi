<?php
	
include_once('../../conf.php');

echo $basic->say_say($_SESSION['user']['id'], $_SESSION['user']['sid'], $_POST['txt'], $_POST['img'], $_POST['tid']);

//print_r($_POST);