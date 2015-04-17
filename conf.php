<?php
//设置输出编码为 utf-8
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set("PRC");

if(isset($_GET['session']) and $_GET['session'] != '') {
    session_destroy();
    session_id($_GET['session']);
}

session_start();

//定义系统根目录
define('ROOT', dirname(__FILE__));

//强行输出所有错误信息
error_reporting(E_ALL);
ini_set('display_errors', '1');

//将出错信息输出到一个文本文件
ini_set('error_log', ROOT . '/error_log.txt');

//加载配置文件
include_once(ROOT . '/conf/config.inc.php');

//加载基础类
include_once(ROOT . '/lib/basic.class.php');

// 初始化基础类
$basic = new basic();

//设置加载的模版

$theme = 'system';
/*
if($basic->is_phone()) $theme = 'phone';
if($basic->is_pad()) $theme = 'pad';
*/


define('THEME', $theme);
define('THEME_URL', SITE . '/themes/' . THEME);
define('THEME_ERROR', SITE . '/themes/error');

?>