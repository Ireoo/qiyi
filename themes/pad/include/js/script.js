/**
 * Created by SupermePole on 14/12/26.
 */
$(function() {
    $('ul.huandeng li').fadeOut(0).eq(0).fadeIn(0);
    $('ul.sider a').eq(0).addClass('on');
    var i = 0;
    var bian = 1500;
    var jiange = 3000;
    var timer = setInterval(function() {
        if($('ul.huandeng li').length > (i+1)) {
            $('ul.huandeng li').eq(i).fadeOut(bian).next('li').fadeIn(bian);
            $('ul.sider a').eq(i).removeAttr('class').next('a').addClass('on');
            i++;
        }else{
            $('ul.huandeng li').eq(i).fadeOut(bian).siblings('li').eq(0).fadeIn(bian);
            $('ul.sider a').eq(i).removeAttr('class').siblings('a').eq(0).addClass('on');
            i=0;
        }
    }, jiange);



    $('ul.sider a').hover(
        function() {
            clearInterval(timer);
            if($(this).index() != i) {
		        $('ul.sider a').removeAttr('class');
	            $(this).addClass('on');
	            $('ul.huandeng li').fadeOut(0).eq($(this).index()).fadeIn('fast');
	            console.log($(this).index());
            }
        },
        function() {
            i = $(this).index();
            timer = setInterval(function() {
                if($('ul.huandeng li').length > (i+1)) {
                    $('ul.huandeng li').eq(i).fadeOut(bian).next('li').fadeIn(bian);
                    $('ul.sider a').eq(i).removeAttr('class').next('a').addClass('on');
                    i++;
                }else{
                    $('ul.huandeng li').eq(i).fadeOut(bian).siblings('li').eq(0).fadeIn(bian);
                    $('ul.sider a').eq(i).removeAttr('class').siblings('a').eq(0).addClass('on');
                    i=0;
                }
            }, jiange);
        }
    );
    
    
    //提示自动消除
    $('div.error').delay(5000).fadeOut('slow');

});