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
    <script src="video.js"></script>
    <script>
        videojs.options.flash.swf = "/newmeigui/Public/front/other/video-js.swf";
    </script>
    <style>
        a:hover{
            text-decoration: none;
        }
        *{
            font-family: "Microsoft YaHei";
        }
        .topRightp {
            font-size: 1.5em;
            line-height: 1.5em;
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
            <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="909" height="455"
                   poster="http://video-js.zencoder.com/oceans-clip.png"
                   data-setup="{}">

                <source src="/newmeigui/<?php echo ($info['na_ad_videopath']); ?>" type='video/mp4' id="video_path" />
            </video>
            <div class="flashIcon">
                <span  id="collect" class="collect" onclick="collect();"></span>
                <span class="click" onclick="love();"></span>
                <a target="_blank" href="/newmeigui/index.php/Home/AdMetail/download/id/<?php echo ($info['na_ad_id']); ?>"><span  class="download" ></span></a><br>
                <strong>收藏</strong><strong>点赞</strong><strong>下载</strong><input id="hide" type="hidden" value="1" />
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
                                <type type="hidden" name="now_url" value="<?php echo ($_SERVER['PHP_SELF']); ?>"/>
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
                            <span class="talkWord"><?php echo ubbReplace($arr['na_comment_content']);?></span>
                            <span class="talkTime"><?php echo ($arr['na_comment_time']); ?></span>

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
                    <p class="topRightp">品牌：<?php echo ($info['na_ad_type']); ?></p>
                    <p class="topRightp">地区：<?php echo ($info['na_ad_place']); ?></p>
                    <p class="topRightp">时间：<?php echo ($info['na_ad_year']); ?></p>
                    <p >点击量：<?php echo ($info['na_ad_count']); ?></p>
                </div>
            </div>
            <div class="rightBottom">
                <div style="background: #868953;height:30px;line-height: 30px;color: whitesmoke;font-size: 2em;text-align: center">相关推荐</div>
                <?php if(is_array($most)): $i = 0; $__LIST__ = $most;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><span><img src="/newmeigui/<?php echo ($arr['na_ad_showpath']); ?>" class="bottomLeftPic"></span>
                    <div class="bottomRight">
                        <strong><a style="text-decoration:none" href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($arr['na_ad_id']); ?>"><?php echo get_adname($arr['na_ad_name'],7);?></a></strong>
                        <p class="topRightp">品牌：<?php echo ($arr['na_ad_type']); ?></p>
                        <p class="topRightp">地区：<?php echo ($arr['na_ad_place']); ?></p>
                        <p class="topRightp">时间：<?php echo ($arr['na_ad_year']); ?></p>
                        <p class="topRightp">点击量：<?php echo ($arr['na_ad_count']); ?></p>
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
<script type="text/javascript">
    $(function(){
        $('.emotion').qqFace({
            id : 'facebox',
            assign:'saytext',
            path:"/newmeigui/Public/front/arclist/"	//表情存放的路径
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
    //收藏
    function collect () {
        var user_id = document.getElementById('user_id').value;
        if(user_id=="") {
            alert('请登录!');
            <?php echo set_request_url();?>
            window.location.href="/newmeigui/index.php/Home/Index/index";
        } else {
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
    /*function download() {
        var path = document.getElementById('video_path').getAttribute("src");
        alert(path);
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
    }*/

</script>
</body>
</html>