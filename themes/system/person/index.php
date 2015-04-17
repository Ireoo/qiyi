<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 15/1/2
 * Time: 14:51
 */

?>

<?php
// print_r($_SESSION['user']);
$money = explode('.', $_SESSION['user']['money']);
// print_r($money);
?>

<div class="person">
	<div>
		<img src="//<?php echo $_SERVER['SERVER_NAME']; ?>/user/<?php echo $_SESSION['user']['id']; ?>.jpg" />
		<h1><?php echo $_SESSION['user']['realname']; ?>
			<span>
				余额<em><?php echo $money[0]; ?>.<?php echo $money[1]; ?></em>
				<a href="#">充值</a>
				<a href="#">提现</a>
				<a href="#">转账</a>
				<br />
				积分<em><?php echo $money[0]; ?></em>
				<a href="#">兑换</a>
			</span>
		</h1>
	</div>
</div>

<div class="mian">
	<div class="left">
		
		<?php
			
			if(isset($_GET['ii'])) {
			    $ii = $_GET['ii'];
			}else{
			    $ii = 'index';
			}
			
		?>

		<ul class="caidan">
			<h1>个人设置</h1>
			<a<?php if($ii == 'person') echo ' class="on"'; ?> href="?ii=person">个人资料</a>
			<a<?php if($ii == 'avatar') echo ' class="on"'; ?> href="?ii=avatar">更换头像</a>
			<a<?php if($ii == 'password') echo ' class="on"'; ?> href="?ii=password">修改密码</a>
			<br class="clear" />
		</ul>

		<ul class="caidan">
			<h1>管理</h1>
			<a<?php if($ii == 'photos') echo ' class="on"'; ?> href="?ii=photos">图片</a>
			<br class="clear" />
		</ul>
	</div>

	<div class="right">
		
		<?php if($ii == 'index') { ?>

		<script type="text/javascript" src="/app/box/saybox.js"></script>
		<script type="text/javascript">
			$(function() {
				saybox('#saybox', 0, 0);
			});
		</script>

		<div id="saybox" class="saybox"></div>

		<?php
		$member = 20;
		$mode = 'user';
		$id = $_SESSION['user']['id'];
		$url = 'person-';

//		print_r($id);

		include_once(ROOT . '/themes/system/include/php/say.php');
		
		}else{
			
			include_once('setting/' . $ii . '.php');
			
		}
		?>

	</div>

	<br class="clear" />

</div>