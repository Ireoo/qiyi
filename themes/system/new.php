<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 14/12/29
 * Time: 14:41
 */

$new = $basic->new_get($_GET['id']);

$t = time();
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $new['title'] . '|' . SITE_NAME; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL; ?>/include/css/store.css">
    <script type="text/javascript" src="<?php echo THEME_URL; ?>/include/js/jquery.js"></script>

    <script src="http://webapi.openspeech.cn/socket.io/socket.io.js"></script>
    <script src="http://webapi.openspeech.cn/js/connection/connection.js"></script>
    <script src="http://webapi.openspeech.cn/js/common/fingerprint.js"></script>
    <script src="http://webapi.openspeech.cn/js/util/brow.js"></script>
    <script src="http://webapi.openspeech.cn/js/log/log.js"></script>
    <script src="http://webapi.openspeech.cn/js/session/tts.js"></script>
    <script src="http://webapi.openspeech.cn/js/session/session.js"></script>
    <script src="http://webapi.openspeech.cn/js/session/sessioninfo.js"></script>



    <style type="text/css">

        div.background{
            background: #EBEBEB;
        }

        div.mian{
            padding: 10px 200px 10px 0;
            width: 1000px;
        }

        div.mian h1{
            padding-top: 50px;
            text-align: center;
            font-size: 20px;
            font-family: 'microsoft yahei', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0 0 10px 0;
        }

        div.mian div.con{
            padding: 20px;
            background: #FFF;
        }

        div.mian div.con img{
            display: block;
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>
<?php include_once('include/head/head.php'); ?>

<?php include_once('include/head/meun.php'); ?>

<div class="background">

    <div class="mian">
        <h1><?php echo $new['title']; ?></h1>
        <div class="con"><?php echo $new['con']; ?></div>
    </div>

</div>

<?php include_once('include/head/foot.php'); ?>



<script>

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

    var appid = "55236ecb";
    var timestamp = "<?php echo $t; ?>";
    var expires = "10000";
    var signature = "<?php echo strtoupper(md5("55236ecb&{$t}&10000&7fb08b8808343c68")); ?>";
    var params = { "params" : "aue = speex-wb;7, ent = intp65, spd = 50, vol = 50, tte = utf8, caller.appid=" + appid + ",timestamp=" + timestamp + ",expires=" + expires, "signature" : signature, "gat" : "wav"};

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

    /**
     * 输入文本，输出语音播放链接
     * @content 待合成文本(不超过4096字节)
     */
    function play(content, param) {

        session.start('tts', param, content, function (err, obj)
        {
            var audio_url = obj.audio_url;

            /* 若返回音频链接，则直接使用audio标签进行播放 优点：兼容性高*/
            if( audio_url != null && audio_url != undefined )
            {
                window.iaudio.src = "http://webapi.openspeech.cn/" + audio_url;
                console.log(obj.duration);
                window.iaudio.play();
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

    function stop() {
        audio_state = 2;
        audio.pause();
    }

    function reset()
    {
        audio_array = [];
        audio_state = 0;
        if(window.iaudio != null)
        {
            window.iaudio.pause();
        }
        window.iaudio = new Audio();
        window.iaudio.src = '';
        window.iaudio.play();
    };

    <?php

    $con = preg_replace("/<style.+>(.+)<\/style>/is", "", $new['con']);

    $con = preg_replace("/<script.+>(.+)<\/script>/is", "", $con);

    $con = strip_tags($con);

    $arr = explode('。', $con);

//    print_r($arr);

    ?>

    reset();
    play("这是语音测试，稍后我们会为用户提供新闻自动朗读系统！", params);
    play("下面播放一段试音！", params);
    play("<?php echo trim($arr[0]); ?>", params);


</script>


<script type="text/javascript">

    $(function() {

        var load = $("<span/>").text('loading...').css({"marginLeft" : "10px"}).appendTo($('div.foot'));
        $.get("http://ireoo.com/app/news/index.php", function(result){
            load.remove();
        });
    });

</script>

</body>
</html>