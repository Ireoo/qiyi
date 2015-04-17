<?php
/**
 *
 * 网站首页引导程序
 * 网站主题放在themes文件夹相关主题的index文件夹内
 *
 */

// 加载配置文件
include_once('conf.php');

// print_r($_SESSION);

if(isset($_GET['logout']) and $_GET['logout'] == 'yes') {
    foreach($_SESSION as $key => $value) {
        unset($_SESSION[$key]);
    }
}


//设置加载的页面
$index = 'index';
if(isset($_GET['page'])) $index = $_GET['page'];

// echo $theme;

// 加载页面
// echo ROOT . $basic->getTheme($index);
include($basic->getTheme($index, $theme));

// 调试输出服务器返回的详细信息
//print_r($_SERVER);

die();