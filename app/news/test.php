<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 15/4/11
 * Time: 18:25
 */

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
require 'QueryList.class.php';
header('Content-type:text/xml;charset=gb2312');
//采集OSC的代码分享列表，标题 链接 作者

session_start();

$_SESSION['arr'] = array();
$_SESSION['start'] = 0;


$url = "http://www.chinanews.com/rss/scroll-news.xml";


print_r(file_get_contents($url));

// print_r($hj);