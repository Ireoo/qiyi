<?php

/*
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST');
*/

$t = time();

?>

<!DOCTYPE html>
<head>
	<title>合成测试示例</title>
</head>

<body>
<h2>这是一个合成测试示例</h2>
<script src="http://webapi.openspeech.cn/socket.io/socket.io.js"></script>
<script src="http://webapi.openspeech.cn/js/connection/connection.js"></script>
<script src="http://webapi.openspeech.cn/js/common/fingerprint.js"></script>
<script src="http://webapi.openspeech.cn/js/util/brow.js"></script>
<script src="http://webapi.openspeech.cn/js/log/log.js"></script>
<script src="http://webapi.openspeech.cn/js/session/tts.js"></script>
<script src="http://webapi.openspeech.cn/js/session/session.js"></script>
<script src="http://webapi.openspeech.cn/js/session/sessioninfo.js"></script>
<script src="http://blog.faultylabs.com/files/md5.js"></script>
<!-- 	<script src="read.js"></script> -->


<script type="text/javascript">
	/**
	 * 初始化Session对象
	 */
	var session = new Session({
		'url' : 'http://webapi.openspeech.cn',
		'reconnection' : true,
		'reconnectionDelay' : 30000,
		'sub' : 'tts'
	});
	var audio = null;

	/**
	 * 输入文本，输出语音播放链接
	 * @content 待合成文本(不超过4096字节)
	 */
	function play(content) {
		/***********************************************************以下签名过程需根据实际应用信息填入***************************************************/

		var appid = "55236ecb";                              //应用APPID，在open.voicecloud.cn上申请即可获得
		var timestamp = "<?php echo $t; ?>";                      //当前时间戳，例new Date().toLocaleTimeString()
		var expires = "10000";                          //签名失效时间，单位:ms，例60000
		//!!!为避免secretkey泄露，签名函数调用代码建议在服务器上完成
// 		var sign = appid + '&' + timestamp + '&' + expires + '&7fb08b8808343c68';
// 		console.log(sign);
// 		var signature = faultylabs.MD5(sign);
		
		var signature = "<?php echo strtoupper(md5("55236ecb&{$t}&10000&7fb08b8808343c68")); ?>";
		
		console.log(signature);
		/************************************************************以上签名过程需根据实际应用信息填入**************************************************/
		
// 		alert((new Date()).toLocaleTimeString());

		var params = { "params" : "aue = speex-wb;7, ent = intp65, spd = 50, vol = 50, tte = utf8, caller.appid=" + appid + ",timestamp=" + timestamp + ",expires=" + expires, "signature" : signature, "gat" : "mp3"};
		
		
		console.log(params);
		
		session.start('tts', params, content, function (err, obj)
		{
			if(err) {
				alert("语音合成发生错误，错误代码 ：" + err);
			} else {
				if(audio != null)
				{
					audio.pause();
				}
				audio = new Audio();
				audio.src = '';
				audio.play();
				audio.src = "http://webapi.openspeech.cn/" + obj.audio_url;
				audio.play();
			}
		});
	};
	play("123456jkhkjhkjhkjh上升空间和思考机会思考和技术会计师考试机会上课讲话说客家话说考试机会开始计划开始很深刻还是会计师很");
</script>
</body>
</html>
