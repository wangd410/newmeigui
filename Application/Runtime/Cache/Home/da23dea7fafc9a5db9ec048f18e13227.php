<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/newmeigui/Public/front/image/clogo.png" type="image/x-icon"/>
    <title>玫鲑</title>
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/reset.css">
    <link href="/newmeigui/Public/front/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/common.css">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/personalCenter.css">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/rankingList.css">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/adDetail.css">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/comment.css">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/page.css">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/jquery.mCustomScrollbar.css">
    <style>
        .logReg a {color: #555}
        #footer {bottom: 0;}
        #con1_1 {
            top: 30px;
            right: 6px;
        }
        #main .mainContent {
            margin: 0 auto;
        }
        .adRight-content {
            display: inline-block;
            vertical-align: top;
            width: 320px;
            margin-top:6px;
            margin-left: 12px;
        }
        .adRight-content img{
            width: 175px;
            height: 200px;
        }
        .adRight-content-right {
            display: inline-block;
            vertical-align: top;
        }
        .adRight-content-right p {
            width: 130px;
            height: 1.5em;
            line-height: 1.5em;
            font-size: 1.2em;
            font-weight: bold;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .right-comment {
            margin-top: 20px;
            width: 320px;
            height: 220px;
            background: #ddd;
            padding-top: 8px;
        }
        .right-comment p {
            width: 290px;
            margin: 6px auto 0 auto;
            font-size: 1.2em;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        #picContent{
            width:910px;
            max-height:500px;
        }
    </style>
</head>
<body>
<!-- 头部 -->
<div id="head">
    <div class="headTop">
        <a href="/newmeigui"><img src="/newmeigui/Public/front/image/logo2.png"></a>
        <span class="logReg">
            <?php if(session('user_id') == null): ?><a href="/newmeigui/index.php/Home/Index">登录</a>|
					<a href="/newmeigui/index.php/Home/lr">注册</a>
                <?php else: ?>
                 <?php echo ($user_info['na_user_name']); endif; ?>
        </span>
        <form action="/newmeigui/index.php/Home/As" method="post" target="_blank">
            <input type="text" class="searchinp" name="na_ad_name" ><input  type="submit" class="searchbtn" value="">
        </form>
    </div>
    <div class="clear"></div>
    <hr>
    <div class="headBottom">
        <!--<span class="screen">　筛选条件　<img src="/newmeigui/Public/front/image/arrow.png"></span>-->
        <div class="nav">
            <span class="navTitle"><a href="/newmeigui">首页</a></span>
            <span class="navTitle"><a href="/newmeigui/index.php/Home/AdSearch">广告</a></span>
            <span class="navTitle"><a href="/newmeigui/index.php/Home/AdComment">大众评论</a></span>
            <span class="navTitle"><a href="/newmeigui/index.php/Home/AdRank">排行榜</a></span>
            <span class="navTitle"><a href="/newmeigui/index.php/Home/MyInfo">个人中心</a></span>
        </div>
        <div class="clear"></div>
    </div>
    <hr>
</div>
<!-- 中间主要部分 -->
<div id="main">
    <div class="mainContent">
        <div class="adLeft">
            <div id="container">
                <div id="list" style="left: -910px;">
                    <?php if(is_array($pic)): $i = 0; $__LIST__ = $pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i; if($p['na_picture_order'] == 5): ?><img src="/newmeigui/<?php echo ($p['na_picture_path']); ?>" alt="1" id="picContent"><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    <?php if(is_array($pic)): $i = 0; $__LIST__ = $pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pics): $mod = ($i % 2 );++$i;?><img id="picContent" src="/newmeigui/<?php echo ($pics['na_picture_path']); ?>" alt="<?php echo ($pics['na_picture_order']); ?>"/><?php endforeach; endif; else: echo "" ;endif; ?>
                    <?php if(is_array($pic)): $i = 0; $__LIST__ = $pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i; if($p['na_picture_order'] == 1): ?><img id="picContent" src="/newmeigui/<?php echo ($p['na_picture_path']); ?>" alt="5"><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div id="buttons">
                    <span index="1" class="on"></span>
                    <span index="2"></span>
                    <span index="3"></span>
                    <span index="4"></span>
                    <span index="5"></span>
                </div>
                <a href="javascript:;" id="prev" class="arrow">&lt;</a>
                <a href="javascript:;" id="next" class="arrow">&gt;</a>
            </div>
        </div>

        <div class="adRight">
<!--             <img src="/newmeigui/Public/front/image/icon.png" class="rightIcon">
            <h4><?php echo ($first['na_user_name']); ?></h4>
            <hr>
            <img src="<?php echo is_photo($arr['na_user_photopath']);?>" class="topPic">
            <p class="message"><?php echo ubbReplace($first['na_comment_content']);?></p>
            <hr>
            <div class="rightBottom">
                <h4>我的最新评论</h4>
                <div class="myComment">
                    <br>
                    <?php if(session('user_id') == NULL): ?><p>您还未登陆，请先<a href="/newmeigui/index.php/Home/">登录</a></p>
                        <?php else: ?>
                        hahah<?php endif; ?>
                </div>
            </div> -->
            <div class="adRight-content">
                <span><img src="http://localhost/newmeigui/Public/picture/za7_img.jpg"></span>
                <div class="adRight-content-right">
                    <strong><a href="" target="_blank">这里是标题</a></strong>
                    <p class="topRightp">类型:adsfasfwefwqfrwa</p>
                    <p class="topRightp">时间:</p>
                    <p class="topRightp">点击量:</p>
                </div>
                <div class="right-comment">
                    <p>这里是评论</p>
                    <p>这里是评论</p>
                    <p>这里是评论</p>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div id="con1_1">
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><div class="product_list"> <a target="_blank" href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($arr['na_ad_id']); ?>"><img src="/newmeigui/<?php echo ($arr['na_ad_showpath']); ?>"></a>
                        <div class="pre-scrollablee content">
                            <?php if(is_array($arr['Comment'])): $i = 0; $__LIST__ = $arr['Comment'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><p class="biaoqing"><?php echo ubbReplace($comment['na_comment_content']);?></p><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="clear"></div>
        <div class="sabrosus">
            <?php echo ($page); ?>
        </div>
    </div>

</div>
<!-- 尾部 -->
<div id="footer">
    <span>版权所有：蓝旭工作室</span>
</div>
<script type="text/javascript" src="/newmeigui/Public/front/js/jquery.js"></script>
<script type="text/javascript" src="/newmeigui/Public/front/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="/newmeigui/Public/front/js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //限制字符个数
        $(".picTalk").each(function(){
            var maxwidth=105;
            if($(this).text().length>maxwidth){
                $(this).text($(this).text().substring(0,maxwidth));
                $(this).html($(this).html()+'…');
            }
        });
        $(".grayLine li").click(function() {
            $(this).css('backgroundColor', '#fff')
                    .siblings('li').css('backgroundColor', '#f1f1f1');;
        });
        $(".whiteLine li").click(function() {
            $(this).css('backgroundColor', '#f1f1f1')
                    .siblings('li').css('backgroundColor', '#fff');;
        });
        $(".pageNum:not('.go')").click(function() {
            $(this).css({
                backgroundColor: '#acc3d3',
                color: '#fff'
            }).siblings('input').css({
                backgroundColor: '#dce3e8',
                color: '#8b9ca9'
            });;
        });

        var container = $('#container');
        var list = $('#list');
        var buttons = $('#buttons span');
        var prev = $('#prev');
        var next = $('#next');
        var index = 1;
        var len = 5;
        var interval = 3000;
        var timer;


        function animate (offset) {
            var left = parseInt(list.css('left')) + offset;
            if (offset>0) {
                offset = '+=' + offset;
            }
            else {
                offset = '-=' + Math.abs(offset);
            }
            list.animate({'left': offset}, 300, function () {
                if(left > -200){
                    list.css('left', -910 * len);
                }
                if(left < (-910 * len)) {
                    list.css('left', -910);
                }
            });
        }

        function showButton() {
            buttons.eq(index-1).addClass('on').siblings().removeClass('on');
        }

        function play() {
            timer = setTimeout(function () {
                next.trigger('click');
                play();
            }, interval);
        }
        function stop() {
            clearTimeout(timer);
        }

        next.bind('click', function () {
            if (list.is(':animated')) {
                return;
            }
            if (index == 5) {
                index = 1;
            }
            else {
                index += 1;
            }
            animate(-910);
            showButton();
        });

        prev.bind('click', function () {
            if (list.is(':animated')) {
                return;
            }
            if (index == 1) {
                index = 5;
            }
            else {
                index -= 1;
            }
            animate(910);
            showButton();
        });

        buttons.each(function () {
            $(this).bind('click', function () {
                if (list.is(':animated') || $(this).attr('class')=='on') {
                    return;
                }
                var myIndex = parseInt($(this).attr('index'));
                var offset = -910 * (myIndex - index);

                animate(offset);
                index = myIndex;
                showButton();
            })
        });

        container.hover(stop, play);

        play();
    });
    $(function () {
        $(".screen").bind("click",function () {
            var $content = $(".mainScreen");
            if($content.is(":visible")){
                $content.hide();
            }else{
                $content.show();
            }
        });

        $(".content").mCustomScrollbar();
    })
    $(document).ready(function(){
        var $container = $('#con1_1');
        $container.imagesLoaded(function(){
            $container.masonry({
                itemSelector: '.product_list',
                columnWidth: 24 //每两列之间的间隙为20像素
            });
        });

    });

    var a = document.getElementsByClassName("pre-scrollable");
    for(var i=0;i<a.length;i++){
        if(a[i].offsetHeight > 95){
           a[i].setAttribute("class","pre-scrollablee")
        }
    }
</script>
</body>
</html>