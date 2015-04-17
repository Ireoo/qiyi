<?php

// 	print_r($_SESSION['store']);

if(isset($_POST['title']) and trim($_POST['title']) != '') {
	$r = json_decode($basic->store_reg($_POST['title'], $_SESSION['user']['id']), true);
	if($r['title'] == $_POST['title']) {
		$_SESSION['user'] = $basic->person_get($_SESSION['user']['id']);
		$_SESSION['store'] = $basic->store_get($_SESSION['user']['sid']);
//		print_r($user);
	}
}

if($_SESSION['user']['sid'] > 0) header('Location: /person.html?i=store');


?>

<style type="text/css">

	h1.reg{
		padding: 25px 0;
		font-size: 30px;
		text-align: center;
	}

	input.reg{
		padding: 0 5px;
		height: 28px;
	}

	label.reg{
		height: 30px;
		line-height: 30px;
	}

	button.reg{
		height: 50px;
		width: 272px;
	}

	li{
		text-align: center;
		margin-bottom: 10px;
	}

</style>


<div class="mian">
	<h1 class="reg">创建您的企业</h1>
	<form action="" method="post">
		<ul>

			<li>
				<label class="reg">企业名称</label>
				<input class="reg" name="title" value="" />
			</li>

			<li>
				<label> </label>
				<button class="reg">创建</button>
			</li>

		</ul>
	</form>
</div>