<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="icon" href="/newmeigui/Public/front/image/clogo.png" type="image/x-icon"/>
    <title>玫鲑</title>
    <link href="/newmeigui/Public/front/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/common.css">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/personalCenter.css">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/rankingList.css">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/adDetail.css">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/page.css">
    <!-- Chang URLs to wherever Video.js files will be hosted -->
    <link href="video-js.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/newmeigui/Public/front/js/jquery.js"></script>
    <!-- video.js must be in the <head> for older IEs to work. -->

    <!-- 引入EasyUI -->
    <script type="text/javascript" src="/newmeigui/Public/front/js/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="/newmeigui/Public/front/js/easyui-lang-zh_CN.js"></script>
    <link rel="stylesheet" href="/newmeigui/Public/front/css/easyui.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/jquery.mCustomScrollbar.css">

    <script src="video.js"></script>
    <script>
        videojs.options.flash.swf = "video-js.swf";
    </script>
    <style>
        * {
            font-family: "Microsoft YaHei";
        }
        #head .headTop form {
            top: 2px;
        }
        .topRightp{
            margin-left: 2px;
            font-size: 1.5em;
            line-height: 1.6em;
        }
        .dianji {
            margin-left: 188px;
            font-size: 1.5em;
            line-height: 1.5em;
        }
        .mainContent .adLeft {
            vertical-align: bottom;
        }
    </style>
</head>
<body>
<!-- 头部 -->
<div id="head">
    <div class="headTop">
    <a href="/newmeigui"><img src="/newmeigui/Public/front/image/logo2.png"></a>
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
            <input type="hidden" id="user_id" value="<?php echo ($user_id); ?>"/>
        </div>
    </div>
    <hr>
</div>
<!-- 中间主要部分 -->
<div id="main">
    <div class="mainContent">
        <div class="adLeft">
            <div class="easyui-panel content">
                <?php echo ($info['na_ad_content']); ?>
            </div>
            <div class="flashIcon">
                <span id="collect" class="collect" onclick="collect();" title=""></span>
                <span class="click" onclick="love();"></span><br>
                <strong>收藏</strong><strong>点赞</strong><input id="hide" type="hidden" value="1">
                <input type="hidden" id="id" value="<?php echo ($info['na_ad_id']); ?>">
            </div>
            <div class="comment">
                <div class="publish">
                    <p>写点什么：</p>
                    <!-- <div id="show">
                        <input type="text">
                    </div> -->
                    <div class="comment2">
                        <div class="com_form">
                            <form action="/newmeigui/index.php/Home/Aa" method="post">
                                <input type="hidden" name="id" value="<?php echo ($info['na_ad_id']); ?>">
                            <textarea class="input" id="saytext" name="na_comment_content"></textarea>
                                <input type="hidden" name="now_url" value="<?php echo ($_SERVER['PHP_SELF']); ?>"/>
                            <p><input type="submit" class="sub_btn" value="提交">
                                <input type="button" class="emotion sub_btn_emotion" value="表情"></p>
                                </form>
                        </div>
                    </div>
                </div>
                <?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><div class="letsTalk">
						<span class="eachTalk">
							<a target="_blank" href="/newmeigui/index.php/Home/OtherCenter/index/ui/<?php echo base64_encode($arr['na_user_id']);?>"><img src="<?php echo is_photo($arr['na_user_photopath']);?>" class="talkPic"></a>
						</span>
                    <p>
                        <span class="talkUser"><?php echo ($arr['na_user_name']); ?></span>
                        <span class="talkTime"><?php echo ($arr['na_comment_time']); ?></span>
                        <span class="talkWord"><?php echo ubbReplace($arr['na_comment_content']);?></span>
                    </p>
                    <div class="clear"></div>
                    <hr>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="green-black">
                    <form>
                        <?php echo ($page); ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="adRight">

            <div class="rightTop">
                <div style="background: #868953;height:30px;line-height: 30px;color: whitesmoke;font-size: 2em;text-align: center">广告信息</div>
                <h4><?php echo ($info['na_ad_name']); ?></h4>
                <span><img src="/newmeigui/<?php echo ($info['na_ad_showpath']); ?>" class="topLeftPic"></span>
                <div class="topRight">
                    <p>类型：<?php echo ($info['na_ad_type']); ?></p>
                    <p>地区：<?php echo ($info['na_ad_place']); ?></p>
                    <p>时间：<?php echo ($info['na_ad_year']); ?></p>
                    <p>点击量：<?php echo ($info['na_ad_count']); ?></p>
                </div>
            </div>
            <!--<h4 class="rightTitle2">　相关推荐</h4>-->
            <div class="rightBottom">
                <div style="background: #868953;height:30px;line-height: 30px;color: whitesmoke;font-size: 2em;text-align: center">相关推荐</div>

                <?php if(is_array($most)): $i = 0; $__LIST__ = $most;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><span><img src="/newmeigui/<?php echo ($arr['na_ad_showpath']); ?>" class="bottomLeftPic"></span>
                <div class="bottomRight">
                    <strong><a style="text-decoration:none" href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($arr['na_ad_id']); ?>"><?php echo get_adname($arr['na_ad_name'],7);?></a></strong>
                    <p class="topRightp">类型：<?php echo ($arr['na_ad_type']); ?></p>
                    <p class="topRightp">地区：<?php echo ($arr['na_ad_place']); ?></p>
                    <p class="topRightp">时间：<?php echo ($arr['na_ad_year']); ?></p>
                    <p class="dianji">点击量：<?php echo ($arr['na_ad_count']); ?></p>
                </div>
                <div class="clear"></div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- 尾部 -->
<div id="footer">
    <span>版权所有：蓝旭工作室</span>
</div>
<script src="/newmeigui/Public/front/js/jquery.min.js"></script>
<script type="text/javascript" src="/newmeigui/Public/front/js/jquery-browser.js"></script>
<script type="text/javascript" src="/newmeigui/Public/front/js/jquery.qqFace.js"></script>
<script type="text/javascript" src="/newmeigui/Public/front/js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //限制字符个数
        $(".letsTalk .talkWord").each(function(){
            var maxwidth=350;
            if($(this).text().length>maxwidth){
                $(this).text($(this).text().substring(0,maxwidth));
                $(this).html($(this).html()+'…');
            }
        });
        $(".bottomRight p").each(function(){
            var maxwidth=40;
            if($(this).text().length>maxwidth){
                $(this).text($(this).text().substring(0,maxwidth));
                $(this).html($(this).html()+'…');
            }
        });

        /*var collect = 1;
        $(".collect").click(function() {
            if (collect == 1) {
                $(".collect").css({
                    backgroundImage: 'url(/newmeigui/Public/front/image/flashIconAf.png)',
                    backgroundPosition: '0 0',
                });
                collect = 0;
            }else{
                $(".collect").css({
                    backgroundImage: 'url(/newmeigui/Public/front/image/flashIcon.png)',
                    backgroundPosition: '0 0',
                });
                collect = 1;
            }
        });
        var clickPic = 1;
        $(".click").click(function() {
            if (clickPic == 1) {
                $(".click").css({
                    backgroundImage: 'url(/newmeigui/Public/front/image/flashIconAf.png)',
                    backgroundPosition: '-38px 0',
                });
                clickPic = 0;
            }else{
                $(".click").css({
                    backgroundImage: 'url(/newmeigui/Public/front/image/flashIcon.png)',
                    backgroundPosition: '-38px 0',
                });
                clickPic = 1;
            }
        });*/
    })
    $(function(){
        $('.emotion').qqFace({
            id : 'facebox',
            assign:'saytext',
            path:'/newmeigui/Public/front/arclist/'	//表情存放的路径
        });
        $(".sub_btn").click(function(){
            var str = $("#saytext").val();
            $("#show").html(replace_em(str));
        });
    });
    //查看结果
    function replace_em(str){
        str = str.replace(/\</g,'&lt;');
        str = str.replace(/\>/g,'&gt;');
        str = str.replace(/\n/g,'<br/>');
        str = str.replace(/\[em_([0-9]*)\]/g,'<img src="/newmeigui/Public/front/arclist/$1.gif" border="0" />');
        return str;
    }

    //点赞
    function love () {
        var flag = document.getElementById('hide').value;

        if (flag==1) {
            $.ajax({
                type:"POST",
                url:"/newmeigui/index.php/Home/AdMetail/love_do",
                data:{id:$("#id").val()},
                dataType:"json",
                success:function(data) {
                    document.getElementById('hide').value=data['flag'];
                    alert(data['message']);
                }
            });
        } else {
            alert('请勿重复点赞!');
        }
    }

    function collect () {
        var user_id = document.getElementById('user_id').value;
        if (user_id=="") {
            alert('请登录!');
            <?php echo set_request_url();?>
            window.location.href="/newmeigui/index.php/Home/Index/index";
        } else{
            $.ajax({
                type: "POST",
                url: "/newmeigui/index.php/Home/AdMetail/collect_do",
                data:{id:$("#id").val()},
                dataType: "json",
                success: function (data1) {
                    if (data1['message']) {
                        document.getElementById('collect').title="已收藏";
                        alert(data1['message']);
                    }
                }
            });
        }
    }

    $(".content").mCustomScrollbar();
</script>
</body>
</html>