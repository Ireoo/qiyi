<?php
/**
 * Note:for octet-stream upload
 * �������ʽ�ϴ�PHP�ļ�
 * Please be amended accordingly based on the actual situation
 */

session_start();

$post_input = 'php://input';
$save_path = dirname( __FILE__ ) . '/../../upload/';
$postdata = file_get_contents( $post_input );

$id = $_SESSION['user']['sid'];
//print_r($id);

if (!file_exists($save_path)) mkdir($save_path);
if (!file_exists($save_path . 'store')) mkdir($save_path . 'store');

if ( isset( $postdata ) && strlen( $postdata ) > 0 ) {
	$filename = $save_path . 'store/' . $id . '.jpg';
	$handle = fopen( $filename, 'w+' );
	fwrite( $handle, $postdata );
	fclose( $handle );
	if ( is_file( $filename ) ) {
		echo '保存成功！';
		exit ();
	}else {
		die ( '保存失败，请稍后再试！' );
	}
}else {
	die ( '图片数据不存在，请联系站长！' );
}