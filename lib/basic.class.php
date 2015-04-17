<?php
class basic {

    var $conf = array();

    var $ID = 0;

    function __construct() {

    }

    function __destruct() {
        unset($conf);
    }

    function getTheme($index = 'index', $theme = THEME) {
        if(!isset($index)) $index = 'index';
        // $a = $admin?'admin':'index';
        $file = ROOT . "/themes/{$theme}/{$index}.php";
        if(file_exists($file)) {
            return $file;
        }else{

            if(file_exists(ROOT . "/themes/{$theme}/error/404.php")) {
                return ROOT . "/themes/{$theme}/error/404.php";
            }else{
                return ROOT . "/themes/system/error/404.php";
            }
        }
    }

    function curl($url = '', $data = '') {
        $ch = curl_init ();
//         print_r($ch);
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
        $return = curl_exec ( $ch );
        curl_close ( $ch );
    }

    function mysql($data = array()) {
        $default = array(
            'json' => '',
            'verify' =>
            json_encode(
                array(
                        'appid'    => APP_ID,      //APP ID
                        'appkey'   => APP_KEY,     //APP 密钥
                        'TOKEN'    => APP_ID       //反向链接ID，自己可以在服务器端修改，防止源码外泄，别人恶意操作
                        )
                )
            );
        $data = array_merge($default,$data);
        // 调试输出
        // print_r($data);
        // $uri = "http://qiyi.oschina.mopaas.com/";
        $ch = curl_init ();
//         print_r($ch);
        curl_setopt ( $ch, CURLOPT_URL, APP_URL );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        // return json_decode($return, true);
//        print_r($return);
        return $return;
    }
    // 用户信息管理

    function person_login($phone = '', $password = '') {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'login',
                    'table' => 'person',
                    'phone' => $phone,
                    'password' => $password
                    )
                )
            );
        $result = $this->mysql($d);
//        print_r($result);
        return json_decode($result, true);
    }

    function person_reg($phone = '', $password = '') {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'reg',
                    'table' => 'person',
                    'phone' => $phone,
                    'value' => array(
                        'password' => $password
                        )
                    )
                )
            );
        $result = $this->mysql($d);
        return $result;
    }

    function person_get($uid) {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'get',
                    'table' => 'person',
                    'uid' => $uid
                    )
                )
            );
        return json_decode($this->mysql($d),true);
    }

    function person_update($uid, $data = array()) {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'update',
                    'table' => 'person',
                    'uid' => $uid,
                    'value' => $data
                    )
                )
            );
        return json_decode($this->mysql($d), true);
    }

    function person_password($id, $old, $new) {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'password',
                    'table' => 'person',
                    'id'    => $id,
                    'old'   => $old,
                    'new'   => $new
                )
            )
        );
//        return $this->mysql($d);
        return json_decode($this->mysql($d), true);
    }
    
    // 企业信息管理

    function store_reg($title = '', $uid = 0, $data = array()) {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'reg',
                    'table' => 'store',
                    'uid' => $uid,
                    'title' => $title,
                    'value' => $data
                    )
                )
            );
        return $this->mysql($d);
    }
    
    function store_basic($id, $title = '') {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'basic',
                    'table' => 'store',
                    'id'    => $id,
                    'title' => $title
                    )
                )
            );
//         return $this->mysql($d);
//         print_r($this->mysql($d));
//         return $return;
        return json_decode($this->mysql($d), true);
    }

    function store_update($id, $data = array()) {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'update',
                    'table' => 'store',
                    'id'    => $id,
                    'value' => $data
                    )
                )
            );
//         return $this->mysql($d);
//         print_r($this->mysql($d));
//         return $return;
        return json_decode($this->mysql($d), true);
    }
    
    function store_present($sid, $present = 'null') {
	    
	    $d = array(
            'json' => json_encode(
                array(
                    'class'   => 'present',
                    'table'   => 'store',
                    'sid'      => $sid,
                    'present' => $present
                    )
                )
            );
//         return $this->mysql($d);
//         print_r($this->mysql($d));
//         return $return;
        return json_decode($this->mysql($d), true);
	    
    }

    function store_get($id = 0) {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'get',
                    'table' => 'store',
                    'id'    => $id
                    )
                )
            );
//         print_r($this->mysql($d));
        return json_decode($this->mysql($d), true);
    }

    function store_show($condition = '1', $start = 0, $limit = -1, $order = 'id desc') {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'show',
                    'table' => 'store',
                    'condition'   => $condition,
                    'start' => $start,
                    'limit' => $limit,
                    'order' => $order
                    )
                )
            );
//        return $this->mysql($d);
//        print_r(json_decode($this->mysql($d), true));
        return json_decode($this->mysql($d), true);
    }

    function store_follow($id, $type = 'store') {
        if($type == 'store') {
            $d = array(
                'json' => json_encode(
                    array(
                        'class' => 'follow',
                        'table' => 'store',
                        'sid'    => $id
                        )
                    )
                );
        }elseif($type == 'person'){
            $d = array(
                'json' => json_encode(
                    array(
                        'class' => 'follow',
                        'table' => 'store',
                        'uid'    => $id
                        )
                    )
                );
        }
        return json_decode($this->mysql($d), true);
    }

    function store_count($condition = '1') {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'count',
                    'table' => 'store',
                    'condition' => $condition
                )
            )
        );
//        return $this->mysql($d);
        return json_decode($this->mysql($d), true);
    }
    
    function store_plus($id = 0) {
	    $d = array(
            'json' => json_encode(
                array(
                    'class' => 'plus',
                    'table' => 'store',
                    'id'    => $id
                )
            )
        );
//        return $this->mysql($d);
        return json_decode($this->mysql($d), true);
    }
    
    // 产品信息管理

    function product_reg($uid = 0, $sid = 0, $data = array()) {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'reg',
                    'table' => 'product',
                    'uid' => $uid,
                    'sid' => $sid,
                    'value' => $data
                    )
                )
            );
//        return $this->mysql($d);
//        $return = $this->mysql($d);
//        print_r($return);
        return json_decode($this->mysql($d), true);
    }

    function product_updata($id = 0, $uid = 0, $data = array()) {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'updata',
                    'table' => 'product',
                    'uid' => $uid,
                    'id'    => $id,
                    'value' => $data
                    )
                )
            );
        return $this->mysql($d);
    }

    function product_get($id = 0) {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'get',
                    'table' => 'product',
                    'id'    => $id
                    )
                )
            );

//        return $this->mysql($d);
        return json_decode($this->mysql($d), true);
    }

    function product_show($condition = '1', $start = 0, $limit = 20) {
        $d = array(
            'json' => json_encode(
                array(
                    'class'       => 'show',
                    'table'       => 'product',
                    'condition'   => $condition,
                    'start'       => $start,
                    'limit'       => $limit
                )
            )
        );
//        print_r($this->mysql($d));
        return json_decode($this->mysql($d), true);
    }

    function product_count($condition = '1') {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'count',
                    'table' => 'product',
                    'condition' => $condition
                )
            )
        );
//        return $this->mysql($d);
        return json_decode($this->mysql($d), true);
    }
    // 发言管理

    function say_say($uid, $sid, $txt = '', $image = '', $tid = 0) {
        $d = array(
            'json' => json_encode(
                array(
                    'class'   => 'say',
                    'table'   => 'say',
                    'show'    => 1,
                    'uid'     => $uid,
                    'sid'     => $sid,
                    'tid'     => $tid,
                    'txt'     => $txt,
                    'image'   => $image
                    )
                )
            );
//        print_r($d);
        return $this->mysql($d);
    }

    function say_get($id = 30) {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'get',
                    'table' => 'say',
                    'id'    => $id
                    )
                )
            );
        return json_decode($this->mysql($d), true);
    }

    function say_show($condition = 'tid = 0', $start = 0, $limit = 20) {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'show',
                    'table' => 'say',
                    'start' => $start,
                    'limit' => $limit,
                    'condition' => $condition
                )
            )
        );
//        return $this->mysql($d);
//        print_r($this->mysql($d));
        return json_decode($this->mysql($d), true);
    }

    function say_count($condition = '1') {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'count',
                    'table' => 'say',
                    'condition' => $condition
                )
            )
        );
//        return $this->mysql($d);
        return json_decode($this->mysql($d), true);
    }

    function say_del($id = 0, $uid = 0) {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'del',
                    'table' => 'say',
                    'uid'   => $uid,
                    'id'    => $id
                    )
                )
            );
        return json_decode($this->mysql($d), true);
    }

    function new_say($title, $txt, $url) {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'say',
                    'table' => 'news',
                    'title' => $title,
                    'txt'   => $txt,
                    'url'   => $url
                )
            )
        );
//        print_r($d);
//        return $this->mysql($d);
        return json_decode($this->mysql($d), true);
    }

    function new_get($id) {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'get',
                    'table' => 'news',
                    'id'    => $id
                )
            )
        );
        return json_decode($this->mysql($d), true);
    }

    function new_show($condition = '1', $start = 0, $limit = 20) {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'show',
                    'table' => 'news',
                    'condition'   => $condition,
                    'start' => $start,
                    'limit' => $limit
                )
            )
        );
//        return $this->mysql($d);
        return json_decode($this->mysql($d), true);
    }

    function new_count($condition = '1') {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'count',
                    'table' => 'news',
                    'condition'   => $condition
                )
            )
        );
//        return $this->mysql($d);
        return json_decode($this->mysql($d), true);
    }

    function photo_show($condition = '1', $start = 0, $limit = 20) {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'show',
                    'table' => 'image',
                    'condition'   => $condition,
                    'start' => $start,
                    'limit' => $limit
                )
            )
        );
//        return $this->mysql($d);
        return json_decode($this->mysql($d), true);
    }

    function photo_count($condition = '1') {
        $d = array(
            'json' => json_encode(
                array(
                    'class' => 'count',
                    'table' => 'image',
                    'condition'   => $condition
                )
            )
        );
//        return $this->mysql($d);
        return json_decode($this->mysql($d), true);
    }

    function turn_page($now = 1, $member = 20, $zong = 0, $page = '', $last = '.html') {
        if($zong != 0) {
            echo '<a';
            if ($now == 1) echo ' class="on"';
            echo ' href="/' . $page . '1' . $last . '">1</a>';
            $z = floor($zong / $member);
//            if(($zong % $member) > 0) $z++;
//            print_r($zong % $member);
            if (($zong / $member) > $z) $z++;
            if ($now > 5) echo "<a class='no'>...</a>";
            if (($now - 3) <= 1) {
                $start = 2;
                $limit = 7;
            } elseif (($now + 3) >= $z) {
                $start = $z - 6;
                $limit = $z - 1;
            } else {
                $start = $now - 3;
                $limit = $now + 3;
            }
            for ($i = $start; $i <= $limit; $i++) {
                if ($i <= 1) continue;
                if ($i >= $z) continue;
                echo '<a';
                if ($now == $i) echo ' class="on"';
                echo ' href="/' . $page . $i . $last . '">' . $i . '</a>';
            }
            if ($now <= ($z - 5)) echo "<a class='no'>...</a>";
            if ($z > 1) {
                echo '<a';
                if ($now == $z) echo ' class="on"';
                echo ' href="/' . $page . $z . $last . '">' . $z . '</a>';
            }
        }
    }


    function getIP() {
        if(!empty($_SERVER["HTTP_CLIENT_IP"])){
            $cip = $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        elseif(!empty($_SERVER["REMOTE_ADDR"])){
            $cip = $_SERVER["REMOTE_ADDR"];
        }
        else{
            $cip = "无法获取！";
        }
        return $cip;
    }

    function getIPLoc($queryIP){
        $url = 'http://ip.qq.com/cgi-bin/searchip?searchip1='.$queryIP;
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_ENCODING ,'gb2312');
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
        $result = curl_exec($ch);
        $result = mb_convert_encoding($result, "utf-8", "gb2312"); // 编码转换，否则乱码
        curl_close($ch);
        preg_match("@<span>(.*)</span></p>@iU",$result,$ipArray);
        $loc = $ipArray[1];
        return $loc;
    }

    function timer($timer = 0) {
        $week = array('星期一','星期二','星期三','星期四','星期五','星期六','星期日');
        $now = time();
        if($now - $timer < 60) return '1分钟内';
        if($now - $timer < 3600) return '1小时内';
        if($now - $timer < 3600*24) return date('今天 H:i', $timer);
        if($now - $timer < 3600*24*7) return $week[date('N', $timer) - 1] . date(' H:i', $timer);
        if($now - $timer < 3600*24*30) return date('d日 H:i', $timer);
        if($now - $timer < 3600*24*365) return date('m月d日 H:i', $timer);
        return date('Y年m月d日 H:i', $timer);
    }

    function is_phone(){
        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Phone') !== false ) {
            return true;
        }
        return false;
    }

    function is_pad(){
        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Pad') !== false ) {
            return true;
        }
        return false;
    }

    function bar($key){
        if ( strpos($_SERVER['HTTP_USER_AGENT'], $key) !== false ) {
            return true;
        }
        return false;
    }

}