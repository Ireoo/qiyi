<?php

$conf = array();



// ----------------------------  CONFIG APP  ----------------------------- //

//define('APP_URL', 'http://qiyi.oschina.mopaas.com/');
define('APP_URL', 'http://api.ireoo.com');

define('APP_ID', '18652327596');

define('APP_KEY', 'cc880108');

define('APP_TOKEN', 'ireoo');





// ----------------------------  CONFIG SQL  ----------------------------- //

//$conf['mysql'] = new mysql;





// ----------------------------  CONFIG ROOT  ---------------------------- //

if(isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
	define('SITE', $_SERVER['HTTP_X_FORWARDED_PROTO'] . '://' . $_SERVER['HTTP_HOST']);
}else{
	define('SITE', 'http://' . $_SERVER['HTTP_HOST']);
}

// ----------------------------  CONFIG SITE ------------------------------ //

define('SITE_NAME', '琦益网 - 企业产品直销平台');
define('SITE_KEYWORD', '琦益，琦益网，直销，产品直销，产品直销平台，企业产品直销平台');
define('SITE_DESCRIPTION', '琦益，由淮安万达信息科技有限公司开发，专注于现实网络开发，是一款结合企业的宣传营销平台。通过琦益平台，可以快速销售您的产品！');

$fenlei = array('餐饮', '着装', '出行', '娱乐', '设备', '服务', '建筑', '原料');
