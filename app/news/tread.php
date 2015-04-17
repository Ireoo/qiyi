<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 14/12/29
 * Time: 14:41
 */

$t = time();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>新闻即使读取并朗读系统</title>

	<script type="text/javascript" src="//ireoo.com/themes/system/include/js/jquery.js"></script>

	<script src="http://webapi.openspeech.cn/socket.io/socket.io.js"></script>
	<script src="http://webapi.openspeech.cn/js/connection/connection.js"></script>
	<script src="http://webapi.openspeech.cn/js/common/fingerprint.js"></script>
	<script src="http://webapi.openspeech.cn/js/util/brow.js"></script>
	<script src="http://webapi.openspeech.cn/js/log/log.js"></script>
	<script src="http://webapi.openspeech.cn/js/session/tts.js"></script>
	<script src="http://webapi.openspeech.cn/js/session/session.js"></script>
	<script src="http://webapi.openspeech.cn/js/session/sessioninfo.js"></script>
	<script src="http://www.veryhuo.com/uploads/Common/js/jQuery.md5.js"></script>

	<!--	<script src="http://webapi.openspeech.cn/js/tts_demo.js"></script>-->

	<style type="text/css">
		ul{
			list-style: none;
			padding: 0;
		}

		ul li{
			margin-bottom: 5px;
			padding-bottom: 5px;
			border-bottom: 1px #EBEBEB solid;
		}

		ul li div{
			color: red;
		}
	</style>

</head>

<body>

<ul></ul>



<script type="text/javascript">

	(function() {

		audio = new Audio();

		audio.addEventListener("ended", function() {
			read();
		}, true);

		$.play = function(content, vcn) {

			console.log('翻译内容：' + content);
			var session = new Session({
				'url'                : 'http://webapi.openspeech.cn',
				'reconnection'       : true,
				'reconnectionDelay'  : 30000
			});

			var param = {"params" : "aue = speex-wb;7, ent=intp65, spd = default, vol = 10, tte=utf8, caller.appid = 55236ecb, timestamp = <?php echo $t; ?>, expires = 10000, ssm = 1,vcn = " + vcn, "signature" : "<?php echo strtoupper(md5("55236ecb&{$t}&10000&7fb08b8808343c68")); ?>", "gat" : "mp3"};

			session.start('tts', param, content, function (err, obj) {
				if(err) {
					console.log("语音合成发生错误，错误代码 ：" + err);
				} else {
					audio.src = "http://webapi.openspeech.cn/" + obj.audio_url;
					console.log(obj);
					audio.play();
				}
			});

		};


	})(jQuery);

</script>

<script type="text/javascript">

	var list = [];





		function read() {
			div.text(div.text() + '.');
			if(div.text() == '...........') div.text('.');
			$.get("http://ireoo.com/app/news/test.php", function(data) {

				var has = false;

				if ($(data).find('channel').find('item').length > 0) {

					for(var x = $(data).find('channel').find('item').length; x >= 0; x--) {

						var arr = $(data).find('channel').find('item').eq(x);
						if($.inArray(arr.find('link').text(), list) === -1 && arr.find('title').text() != '') {
							has = true;
							list.push(arr.find('link').text());


							var li = $('<li/>').prependTo($('ul'));
							var h1 = $('<h1/>').appendTo(li);

							var a = $('<a/>').attr('target', '_blank').attr('href', arr.find('link').text()).text(arr.find('title').text()).appendTo(h1);
							$('<div/>').text(arr.find('pubDate').text()).appendTo(li);

							if(arr.find('description').text() != '') {
								$('<p/>').text(arr.find('description').text()).appendTo(li);
								$.play("即时新闻：" + arr.find('title').text() + "。简要：" + arr.find('description').text() + "。琦益播报完毕。", "xiaoyan");
							}else{
								$.play("即时新闻：" + arr.find('title').text() + "。琦益播报完毕。", "xiaoyan");
							}

							break;
						}

					};

					if(!has) read();


				}else{
					read();
				}


			});

		}
	$(function() {

		var div = $("<div/>").appendTo('body').css({'position' : 'fixed', 'top' : '-10px', 'right' : '10px'});
		read();


	});

</script>

</body>
</html>



</body>
</html>

