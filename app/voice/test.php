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
header('Content-type:text/html;charset=utf-8');
//采集OSC的代码分享列表，标题 链接 作者


$url = "http://www.chinanews.com/scroll-news/news1.html";
$reg = array(
	"timer"=>array("div.dd_time", "text"),
	"title"=>array("div.dd_bt a:eq(0)", "text"),
	'url'  =>array("div.dd_bt a:eq(0)", "href")
);
$rang = ".content_list li";
//使用curl抓取源码并以GBK编码格式输出
$hj = QueryList::Query($url,$reg,$rang,'curl','utf-8');
$title = $hj->jsonArr;

print_r($title);

// print_r($hj);