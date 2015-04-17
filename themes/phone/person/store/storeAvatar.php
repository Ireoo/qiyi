<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/3
 * Time: 12:53
 */

?>

<!-- load js -->
<script src="http://open.web.meitu.com/sources/xiuxiu.js" type="text/javascript"></script>
<script type="text/javascript">

    xiuxiu.embedSWF("avatar", 5, 890, 400);

    xiuxiu.onInit = function ()
    {
        // your code here
        xiuxiu.loadPhoto("http://ireoo.com/store/<?php echo $_SESSION['user']['sid']; ?>.jpg?<?php echo rand(0, 9999999999999999999); ?>");
    };

    xiuxiu.setUploadURL("http://ireoo.com/app/xiuxiu/store.php");

    xiuxiu.setUploadType (1);

    xiuxiu.onBeforeUpload = function(data, id) {
//        alert(data);
    };

    xiuxiu.onUploadResponse= function(data, id) {
        alert(data);

    };

    xiuxiu.onDebug = function (data)
    {
        alert(data);
    }
</script>


<ul class="account">
    <h1>上传修改LOGO<!--<span>( <b>*</b>必须填写项 )</span>--></h1>
    <span class="h2">可以上传自己喜欢的图片,然后用鼠标在图片上选择合适的大小.</span>
    <div id="avatar"></div>
</ul>
