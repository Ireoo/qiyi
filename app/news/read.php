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


<!--<audio id="audio" controls="controls"></audio>-->
<ul></ul>



<script type="text/javascript">

	var list = [];

	$(function() {

		/**
		 * 输入文本，输出语音播放链接
		 * @content 待合成文本(不超过4096字节)
		 */
		var session = new Session({
			'url'                : 'http://webapi.openspeech.cn',
			'reconnection'       : true,
			'reconnectionDelay'  : 30000
		});
		/* 音频播放对象 */
		window.iaudio = null;
		/* 音频播放状态 0:未播放且等待音频数据状态，1:正播放且等待音频数据状态，2：未播放且不等待音频数据*/
		var audio_state = 0;
		/***********************************************local Variables**********************************************************/

		/**
		 * 播放音频
		 * @pcmdata   传入的raw音频数据
		 * @audio     播放音频的audio对象
		 */
		function play_audio(pcmdata) {
			var wave = new RIFFWAVE();
			wave.Make(pcmdata);
			window.iaudio.src = wave.dataURI;
			window.iaudio.play();
		}

		function play(content, vcn){
			reset();
			/**
			 * 参数说明:
			 * gat ( get audio type )  获取音频的类型，取值范围包括wav,mp3.
			 * caller.appid            应用的APPID，在语音云官网(open.voicecloud.cn)上申请.
			 * timestamp               当前时间戳，服务器使用该字符串进行数字签名
			 * expires                 失效时间，服务器使用该字符串进行数字签名
			 * signature 	            数字签名，MD5(appid + '&' + timestamp + '&' + expires + '&' + secret_key)
			 */
			ssb_param = {"params" : "aue = speex-wb;7, ent=intp65, spd = default, vol = 10, tte=utf8, caller.appid = 55236ecb, timestamp = <?php echo $t; ?>, expires = 60000, ssm = 1,vcn = " + vcn, "signature" : "<?php echo strtoupper(md5("55236ecb&{$t}&60000&7fb08b8808343c68")); ?>", "gat" : "mp3"};

			session.start('tts', ssb_param, content, function (err, obj)
			{
				var audio_url = obj.audio_url;

				/* 若返回音频链接，则直接使用audio标签进行播放 优点：兼容性高*/
				if( audio_url != null && audio_url != undefined )
				{
					window.iaudio.src = "http://webapi.openspeech.cn/" + audio_url;
					console.log(obj);
					window.iaudio.play();
					window.iaudio.addEventListener("ended", function() {
						read();
					}, false);
					/* 若返回音频数据，则插入音频缓存队列，依次进行播放 优点：合成速度快*/
				}else {
					var audio_data = obj.audio_data;
					if(audio_state == 0)
					{
						audio.addEventListener('ended', function() {
							if(audio_array.length != 0)
							{
								play_audio(audio_array[0]);
								audio_array.splice(0, 1);
							}else
							{
								audio_state = 0;
							}
						}, false);

						play_audio(audio_data);
						audio_state = 1;
					} else if(audio_state == 1)
					{
						audio_array.push(audio_data);
					}
				}
			});
		};

		/**
		 * 停止播放音频
		 *
		 */
		function stop() {
			audio_state = 2;
			audio.pause();
		}

		/**
		 * 重置音频缓存队列和播放对象
		 * 若音频正在播放，则暂停当前播放对象，创建并使用新的播放对象.
		 */
		function reset()
		{
			audio_array = [];
			audio_state = 0;
			if(window.iaudio != null)
			{
				window.iaudio.pause();
			}
			window.iaudio = new Audio();
//			window.iaudio = document.getElementById('audio');
			window.iaudio.src = '';
			window.iaudio.play();
		};

		var div = $("<div/>").appendTo('body').css({'position' : 'fixed', 'top' : '-10px', 'right' : '10px'});

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
							var desc = $.trim(arr.find('description').text().replace(/[\r\n]/g,""));
//							console.log(desc);
							if(desc != '') {
								$('<p/>').text(desc).appendTo(li);
								play("即时新闻：" + arr.find('title').text() + "。简要：" + desc + "。琦益播报完毕。", "xiaoyan");
								console.log("即时新闻：" + arr.find('title').text() + "。简要：" + desc + "。琦益播报完毕。");
							}else{
								play("即时新闻：" + arr.find('title').text() + "。琦益播报完毕。", "xiaoyan");
								console.log("即时新闻：" + arr.find('title').text() + "。琦益播报完毕。");
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

		read();


	});

</script>

</body>
</html>

