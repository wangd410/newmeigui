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
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/page.css">
    <script type="text/javascript" src="/newmeigui/Public/front/js/jquery.js"></script>
    <!--<script type="text/javascript" src="/newmeigui/Public/front/js/common.js"></script>-->
    <style>
        #main{
            min-height: 1466px;
        }
        .whiteLine {
            margin-left: 181px;
            height: 40px;
            line-height: 40px;
        }
        .mainScreen .whiteRadio li {
            width: 90px;
            margin-left: 72px;
            margin-top: 8px;
            vert-align: top;
        }
        .mainScreen .whiteRadio span{
            vertical-align: top;
        }
        .mainScreen .whiteRadio input{
           vert-align: top;
        }
        #footer {
            position: relative;
            top: 20px;
        }
        *{
            font-family: "Microsoft YaHei";
        }
    </style>
</head>
<body>
<!-- 头部 -->
<div id="head">
    <div class="headTop">
        <a href="/neimeigui"><img src="/newmeigui/Public/front/image/logo2.png"></a>
        <span class="logReg">
				<?php if(session('user_id') == null): ?><a href="/newmeigui/index.php/Home/Index">登录</a>|
					<a href="/newmeigui/index.php/Home/lr">注册</a>
                <?php else: ?>
                 <?php echo ($user_info['na_user_name']); endif; ?>
        </span>
        <form>
            <input type="text" class="searchinp"><input type="button" class="searchbtn">
        </form>
    </div>
    <div class="clear"></div>
    <hr>
    <div class="headBottom">
        <div class="nav">
            <span class="navTitle"><a href="/newmeigui">首页</a></span>
            <span class="navTitle"><a href="/newmeigui/index.php/Home/AdSearch">广告</a></span>
            <span class="navTitle"><a href="/newmeigui/index.php/Home/AdComment">大众评论</a></span>
            <span class="navTitle"><a href="/newmeigui/index.php/Home/AdRank">排行榜</a></span>
            <span class="navTitle"><a href="/newmeigui/index.php/Home/MyInfo">个人中心</a></span>
            <span class="logRegc">　筛选条件　<img src="/newmeigui/Public/front/image/arrow.png"></span>
        </div>

        <div class="clear"></div>
    </div>
    <hr>
    <div class="mainScreen" style="display: none;min-height: 15px;">
        <ul class="whiteLine whiteRadio">
            <li><input type="radio" name="order" onclick="search('count');"><span>热度排行榜</span></li>
            <li><input type="radio" name="order" onclick="search('love');">人气排行榜</li>
            <li><input type="radio" name="order" checked onclick="search('time');">最新广告</li>
        </ul>
    </div>
</div>
<!-- 中间主要部分 -->
<div id="main">
    <div class="mainContent">
        <div class="eachLine">
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><span class="eachPic">
					<a href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($arr['na_ad_id']); ?>" target="_blank"><img src="/newmeigui/<?php echo ($arr['na_ad_showpath']); ?>" class="rangPic"></a>
					<p><span class="wordLeft"><?php echo ($arr['na_ad_adtype']); ?></span><span class="wordMiddle"><?php echo ($arr['na_ad_type']); ?>|<?php echo get_adname($arr['na_ad_name']);?></span><span class="wordRight"></span></p>
                    <div class="liulanliang">浏览量：<span><?php echo ($arr['na_ad_count']); ?></span></div>
				</span><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
<!-- 尾部 -->
<div id="footer">
    <span>版权所有：蓝旭工作室</span>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        //限制字符个数
        $(".wordLeft").each(function(){
            var maxwidth=2;
            if($(this).text().length>maxwidth){
                $(this).text($(this).text().substring(0,maxwidth));
                $(this).html($(this).html()+'…');
            }
        });
        $(".wordMiddle").each(function(){
            var maxwidth=9;
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
                backgroundColor: '#868953',
                color: '#fff'
            }).siblings('input').css({
                backgroundColor: '#d1d2c1',
                color: '#868953'
            });;
        });
    });

    function search (type) {
        $.ajax({
            type:"POST",
            url:"/newmeigui/index.php/Home/AdRank/get_ad_by_condition",
            data:{condition:type},
            success:function(data){
                $('#main').html(data);
            }
        });
    }

    /*function go_url () {
        window.location.href="/newmeigui/index.php/Home/Index";
    }*/
</script>
<script type="text/javascript">
    $(function () {
        $(".logRegc").bind("click",function () {
            var $content = $(".mainScreen");
            if($content.is(":visible")){
                $content.hide();
            }else{
                $content.show();
            }
        })
    })
</script>
</body>
</html>