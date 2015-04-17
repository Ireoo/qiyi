<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
require 'QueryList.class.php';
require '../../conf.php';
header('Content-type:text/html;charset=utf-8');
//采集OSC的代码分享列表，标题 链接 作者


$url = "http://tech.sina.com.cn/internet/";
$reg = array("title"=>array("h3 a:eq(0)","text"),"url"=>array("h3 a:eq(0)","href"));
$rang = ".ul02 li";
//使用curl抓取源码并以GBK编码格式输出
$hj = QueryList::Query($url,$reg,$rang,'curl','utf-8');
$title = $hj->jsonArr;
//print_r($title[0]);

//$value = $title[0];
 foreach($title as $key => $value) {

    $url = $value['url'];
    $reg = array("con" => array("#artibody", "html"));
    $hj = QueryList::Query($url, $reg, '', 'curl', 'utf-8');
    $arr = $hj->jsonArr;

//print_r($hj->getJSON());

//print_r($hj);
//    print_r($value);
//    print_r($arr);

// $msg = $arr[0]['con'];

//    $arr[0]['con'] = preg_replace("/<style.+>(.+)<\/style>/is", "", $arr[0]['con']);

//    $arr[0]['con'] = preg_replace("/<script.+>(.+)<\/script>/is", "", $arr[0]['con']);

//    $arr[0]['con'] = preg_replace("新浪科技讯", "<a target='_blank' href='http://ireoo.com/news.html'>琦益科技讯</a>", $arr[0]['con']);



//    $arr[0]['con'] = preg_replace("/<a.+>(.+)<\/a>/is", "$1", $arr[0]['con']);

//    $arr[0]['con'] = preg_replace("/<div.+[^artical-player-wrap].+>.+<\/div>/is", "", $arr[0]['con']);

    $content = strip_tags($arr[0]['con'], "<p> <img> <link> <div> <script> <style>");



    $content = str_replace("新浪科技", '<a target="_blank" href="http://ireoo.com/news.html" title="琦益科技">琦益科技</a>', $content);

//    print_r($content);
// $basic = new basic();

// print_r($basic);

    if($content and trim($content) != '') {
        print_r($basic->new_say($value['title'], $content, $value['url']));
    }else{
        print_r($content);
    }

 }