<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="icon" href="/newmeigui/Public/front/image/clogo.png" type="image/x-icon"/>
    <title>玫鲑</title>
    <link href="/newmeigui/Public/front/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/personalCenter.css">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/common.css">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/page.css">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/jquery.mCustomScrollbar.css">
    <script type="text/javascript" src="/newmeigui/Public/front/js/jquery.js"></script>
    <!--<script type="text/javascript" src="/newmeigui/Public/front/js/common.js"></script>-->
    <style>
        #main{
            min-height: 930px;

        }
        .recommend {
            width: 315px;
            margin: 0 auto;
        }
        .recommend img {
            height: 178px;
            width: 160px;
            margin-top: 4px;
            margin-right: 15px;
        }

        a{
            text-decoration: none;
        }
        a:hover{
            text-decoration: none !important;
        }
        #img {
            width: 145px;
            height: 154px;
        }
        .title {
            font-weight: bolder;
            font-size: larger;
            margin-top: 8px;
        }
        .nav {
            width: 900px;
            margin:0 auto;
        }
        #head .headTop {
            height: 42px;
        }
        #footer {
            margin-top: 10px;
        }
        .bottomRightp {
            font-size: 1.42em;
            line-height: 1.5em;
            width: 268px;
            word-break: break-all;
            word-wrap: break-word;
        }
        .tres {
            margin-bottom:0;
            margin-top: 20px;
        }
        .icon {
            width: 50px !important;
            height: 30px !important;
            border-radius: 50% !important;
            position: absolute;
            left: 93px;
        }
        .tres a{
            border: none !important;
            background-color: white !important;
            color: #0000cc !important;
        }
        #main{
            min-height: 700px;
        }
        .mainContent .right{
            height: 672px;
            overflow: hidden;
        }
    </style>
    <script type="text/javascript" src="/newmeigui/Public/front/js/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="/newmeigui/Public/front/js/easyui-lang-zh_CN.js"></script>
    <link rel="stylesheet" href="/newmeigui/Public/front/css/easyui.css" type="text/css"/>
    <link rel="stylesheet" href="/newmeigui/Public/front/css/icon.css" type="text/css"/>
</head>
<body>
<!-- 头部 -->
<div id="head">
    <div class="headTop">
        <a href="/newmeigui"><img src="/newmeigui/Public/front/image/logo2.png"></a>
        <form action="/newmeigui/index.php/Home/As" method="post">
            <input type="text" name="na_ad_name" class="searchinp"><input type="submit" class="searchbtn" value="">
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
        </div>
    </div>
    <hr>
</div>
<!-- 中间主要部分 -->
<div id="main">
    <div class="mainContent">
        <div class="left">
            <!--<div class="publish">
                <p class="writeSome">写点什么：</p>
                <div class="comment">
                    <div class="com_form">
                        <form action="/newmeigui/index.php/Home/mm" method="post" enctype="multipart/form-data">
                            <textarea class="input" id="saytext" name="na_comment_content"></textarea>
                            <p><input type="submit" class="sub_btn" value="提交" onclick="return check_content();">
                                <input type="button" class="emotion sub_btn_emotion" value="表情" /></p>
                        </form>
                    </div>
                </div>
                <hr>
            </div>-->
            <div class="loveAd" id="collect">
                <p class="title">他喜欢的广告</p>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><span class="adContent" >
						<!--  照片由后台获取后台获取 -->
						<img src="/newmeigui/<?php echo ($arr['na_ad_showpath']); ?>" class="adImg">
						<img src="/newmeigui/Public/front/image/flower.png" class="adFlower">
						<strong><a href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($arr['na_ad_id']); ?>"  target="_blank"><?php echo get_adname($arr['na_ad_name'],5);?></a></strong>
                        <p></p>
					</span><?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="clear"></div>
                <div class="tres">
                    <?php echo ($page); ?>
                </div>
                <hr>
            </div>
            <div class="myTrend" id="move">
                <p class="title">他的动态</p>
                <?php if(is_array($movelist)): $i = 0; $__LIST__ = $movelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><div class="trendLeft">
                        <div class="trendContent">
                            <p class="trendP"><?php echo ubbReplace($arr['na_comment_content']);?></p>
                            <img src="/newmeigui/Public/front/user_photo/838ba61ea8d3fd1f8e32761c334e251f95ca5fd9.jpg" class="trendImg">
                        </div>
                        <div class="clear"></div>
                        <span class="from"><?php echo ($arr['na_comment_time']); ?></span>
                        <div class="clear"></div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="clear"></div>
                <div class="tres" style="margin-top: 20px;"><?php echo ($movepage); ?></div>
            </div>

        </div>
        <div class="right">
            <div class="rightTop">
                <h4><?php echo ($info['na_user_name']); ?></h4>
                <input type="hidden" name="na_user_id" id="user_id" value=<?php echo ($info['na_user_id']); ?>>
                <span class="rightPic">
                    <img src="<?php echo is_photo($info['na_user_photopath']);?>"  /><?php echo ($url); ?>
                </span>
                <?php if($info['na_user_show'] == 1): ?><p class="per-email"> 512030849@qq.com </p><?php endif; ?>
                <p><?php if($info['na_user_intro'] != null): echo ($info['na_user_intro']); ?>
                    <?php else: ?>个性签名~~个性签名~~个性签名~~~~<?php endif; ?></p>
            </div>
            <div class="rightMidde">
                <h4>相关推荐</h4><hr>
                <?php if(is_array($love)): $i = 0; $__LIST__ = $love;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><div class="recommend">
                        <span><img src="/newmeigui/<?php echo ($arr['na_ad_showpath']); ?>" class="bottomLeftPic"></span>
                        <div class="bottomRight">
                            <strong><a href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($arr['na_ad_id']); ?>" target="_blank" ><?php echo get_adname($arr['na_ad_name'],4);?></a></strong>
                            <p></p>
                            <p class="bottomRightp">类型:<?php echo ($arr['na_ad_type']); ?></p>
                            <p class="bottomRightp">时间:<?php echo ($arr['na_ad_year']); ?></p>
                            <p class="bottomRightp">点击量:<?php echo ($arr['na_ad_count']); ?></p>
                        </div>
                        <div class="clear"></div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- 尾部 -->

<div id="footer" >
    <span>版权所有：蓝旭工作室</span>
</div>
<script src="/newmeigui/Public/front/jquery.min.js"></script>
<script type="text/javascript" src="/newmeigui/Public/front/js/jquery-browser.js"></script>
<script type="text/javascript" src="/newmeigui/Public/front/js/jquery.qqFace.js"></script>
<script type="text/javascript" src="/newmeigui/Public/front/js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#cover").mCustomScrollbar();

        //限制字符个数
        $(".left .adContent p").each(function(){
            var maxwidth=12;
            if($(this).text().length>maxwidth){
                $(this).text($(this).text().substring(0,maxwidth));
                $(this).html($(this).html()+'…');
            }
        });
        $(".myTrend .trendP").each(function(){
            var maxwidth=65;
            if($(this).text().length>maxwidth){
                $(this).text($(this).text().substring(0,maxwidth));
                $(this).html($(this).html()+'…');
            }
        });
        $(".rightTop p").each(function(){
            var maxwidth=80;
            if($(this).text().length>maxwidth){
                $(this).text($(this).text().substring(0,maxwidth));
                $(this).html($(this).html()+'…');
            }
        });
        $(".recommend p").each(function(){
            var maxwidth=40;
            if($(this).text().length>maxwidth){
                $(this).text($(this).text().substring(0,maxwidth));
                $(this).html($(this).html()+'…');
            }
        });
    });
    /*$(function(){
        $('.emotion').qqFace({
            id : 'facebox',
            assign:'saytext',
            path:'/newmeigui/Public/front/arclist/'	//表情存放的路径
        });
        $(".sub_btn").click(function(){
            var str = $("#saytext").val();
            $(".trendP").html(replace_em(str));
        });
    });*/
    //查看结果
    function replace_em(str){
        str = str.replace(/\</g,'&lt;');
        str = str.replace(/\>/g,'&gt;');
        str = str.replace(/\n/g,'<br/>');
        str = str.replace(/\[em_([0-9]*)\]/g,'<img src="/newmeigui/Public/front/arclist/$1.gif" border="0" />');
        return str;
    }
    function check_content() {
        var content = document.getElementById('saytext').value;
        if(content==="") {
            return false;
        } else{
            return true;
        }
    }


    function collect(id){
        var user_id = document.getElementById('user_id').value;
        var id = id;
        $.ajax({
            type:"GET",
            url:"/newmeigui/index.php/Home/OtherCenter/other_loves",
            data:{'p':id,'id':user_id},
            success:function(data) {
                $("#collect").html(data);
            }
        });
    }

    function move(id){
        var id = id;
        var user_id = document.getElementById('user_id').value;
        $.ajax({
            type:"GET",
            url:"/newmeigui/index.php/Home/OtherCenter/other_move",
            data:{'p':id,'id':user_id},
            success:function(data) {
                $("#move").html(data);
            }
        });
    }
</script>
</body>
</html>