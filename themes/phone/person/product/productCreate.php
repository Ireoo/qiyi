<?php
/**
 * Created by PhpStorm.
 * User: SupermePole
 * Date: 15/2/13
 * Time: 16:54
 */

//print_r($_SESSION['user']);

if(isset($_POST['title'])) {
    $result = $basic->product_reg($_SESSION['user']['id'], $_SESSION['user']['sid'], $_POST);
//    print_r($_SESSION);
    print_r($result);
    if($result) {
//        $_SESSION['user'] = $result;
//        header('location: /person.html?i=store&ii=product');
    }else{
        print_r($result);
    }
//    header('location: /person.html?i=setting&ii=person');
}

?>

<link rel="stylesheet" type="text/css" href="/app/ueditor/themes/default/css/ueditor.css">

<script type="text/javascript" charset="utf-8" src="/app/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/app/ueditor/ueditor.all.min.js"> </script>

<h1>创建一个产品</h1>
<span class="h2">填写的资料越详细，越有助于消费者找到你的产品.</span>

<form action="" method="post">
    <ul>

        <li>
            <label>标题</label>
            <input name="title" value="" />
        </li>

        <li>
            <label>价格</label>
            <input class="money" name="money" value="" />
        </li>

        <li>
            <label>产品图片
                <div id="progress" class="progress">
                    <div class="progress-bar progress-bar-success"></div>
                </div>
            </label>
            <input name="image" class="photo" style="display: none;" value="" />
        </li>

        <li class="image">
            <input id="fileupload" type="file" name="files[]" style="display: none;" multiple accept="image/png, image/gif, image/jpg, image/jpeg">
            <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>选择本地图片</span>
                    <!-- The file input field used as target for the file upload widget -->
                </span>
        </li>

        <li>
            <label>详细参数</label>
            <input name="modes" value="" />
        </li>

        <li>
            <label>详细介绍</label>
            <textarea id="editor" name="present" style="height: 400px;"></textarea>
        </li>

        <li>
            <label> </label>
            <button>添加</button>
        </li>

    </ul>
</form>

<!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->
<!-- Generic page styles -->
<link rel="stylesheet" href="app/upload/css/jquery.fileupload.css">

<!--<script src="//ireoo.com/themes/system/include/js/jquery.js"></script>-->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="/app/upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="/app/upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="/app/upload/js/jquery.fileupload.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    /*jslint unparam: true */
    /*global window, $ */
    $(function () {

        $('.fileinput-button').click(function() {
            $('#fileupload').click();
        });

        $('#progress').hide();
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = '/app/upload/';
        $('#fileupload').fileupload({
            url: url,
            maxFileSize: 1024 * 1024,
            acceptFileTypes: "/(.|/)(gif|jpe?g|png)$/i",
            process: [
                {
                    action: 'load',
                    fileTypes: "/^image/(gif|jpeg|png)$/",
                    maxFileSize: 1024 * 1024 // 1MB
                },
                {
                    action: 'resize',
                    maxWidth: 600,
                    maxHeight: 600
                },
                {
                    action: 'save'
                }
            ],
            dataType: 'json',
            done: function (e, data) {
                $('.image').show();
                $('#progress').hide();
                $.each(data.result.files, function (index, file) {
                    var div = $('<div/>').appendTo('.image');
                    var img = $('<img />').addClass('image').attr('src', file.url).appendTo(div);
                    $('<a title="点击去除，要想完全删除请进入我的图片管理页面！"><img src="http://ireoo.com/ico/del.png" /></a>').click(
                        function() {
//                            var src = ;
                            reimage(img.attr('src'));
                            $(this).parent().remove();
                        }
                    ).appendTo(div);
                });
                reimage('');
            },
            progressall: function (e, data) {
                $('#progress').show();
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    progress + '%'
                ).text(progress + '%');
            }
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });


    function reimage(src) {
        $('input.photo').val('');
        $.each($('li.image').find('img.image'), function(i, img) {
            if(src != '') {
                if(src != $(this).attr('src')) {
                    if (i > 1) {
                        $('input.photo').val($('input.photo').val() + ',' + $(this).attr('src'));
                    } else {
                        $('input.photo').val($(this).attr('src'));
                    }
                }
            }else {
                if (i > 0) {
                    $('input.photo').val($('input.photo').val() + ',' + $(this).attr('src'));
                } else {
                    $('input.photo').val($(this).attr('src'));
                }
            }
        });
    }


    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');

</script>

<style type="text/css">

    li.image{
        /*display: none;*/
    }

    li.image div img{
        width: 100px;
        height: 100px;
        padding: 1px;
        border: 1px #EBEBEB solid;
    }

    li.image div{
        display: inline-block;
        margin-right: 10px;
        position: relative;
    }

    li.image div a{
        position: absolute;
        bottom: 2px;
        right: 2px;
        width: 20px;
        height: 20px;
        background: red;
        cursor: pointer;
        display: none;
    }

    li.image div:hover a{
        display: block;
    }

    li.image div a img{
        width: 20px;
        height: 20px;
        padding: 0;
        border: none;
    }

    input.money:before {
        content: '¥';
        font-family: Arial;
    }

</style>