<?php
/**
 * Note:for octet-stream upload
 * �������ʽ�ϴ�PHP�ļ�
 * Please be amended accordingly based on the actual situation
 */

session_start();

$photo = md5(time() . rand(10000,99999));

$post_input = 'php://input';
$save_path = dirname( __FILE__ ) . '/../../upload/';
$postdata = file_get_contents( $post_input );

$id = $_SESSION['user']['id'];

// if(isset($_GET['text'])) $s['text'] = $_GET['text'];

//echo $os['id'];
//echo $save_path;
//echo $photo;

if (!file_exists($save_path)) mkdir($save_path);
if (!file_exists($save_path . $id)) mkdir($save_path . $id);

if (isset($postdata) && strlen($postdata) > 0) {
    $filename = $save_path . $id . '/'. $photo . '.jpg';
    $handle = fopen($filename, 'w+');
    fwrite($handle, $postdata);
    fclose($handle);
    if ( is_file($filename)) {
//         $r = $mysql->insert('image', $s);
        //echo mysql_error();
        echo 'upload/' . $id . '/'. $photo . '.jpg';
//         echo $r;
        exit ();
    }else {
        //echo $filename;
        die ( '0');
    }
}else {
    die ( '-1');
}

?>