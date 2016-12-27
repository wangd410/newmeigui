<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/newmeigui/Public/front/image/clogo.png" type="image/x-icon"/>
    <title>玫鲑</title>
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/newIndex.css">
    <style>
        #navContent .register_out img{
            width: 158px;
            height: 158px;
            border-radius: 79px;
            margin-right: 30px;
        }
        #navContent .info p{
            font-family: "黑体" !important;
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="top">
        <div class="header">
            <a href="/newmeigui" id="logo"></a>
            <?php if(session('user_id') == NULL): ?><span id="registerBox">
						<a href="">登陆</a> |
						<a href="/newmeigui/index.php/Home/lr" target="_blank">注册</a>
					</span><?php endif; ?>
        </div>
    </div>
</div>

<div id="flower"></div>
<div id="navBox">
    <div class="navList" id="l1">
        <span class="item"></span>
        <span class="text"></span>
    </div>
    <div class="navList" id="l2">
        <span class="item"></span>
        <span class="text"></span>
    </div>
    <div class="navList" id="l3">
        <span class="item"></span>
        <span class="text"></span>
    </div>
    <div class="navList" id="l4">
        <span class="item"></span>
        <span class="text"></span>
    </div>
    <div class="navList" id="l5">
        <span class="item"></span>
        <span class="text"></span>
    </div>
</div>
<div id="navContent">
    <div class="register_out">
        <img id="img" src="<?php echo is_photo($info['na_user_photopath']);?>"/>
        <div class="info">
            <p>用户名：</p>
            <p>邮箱：</p>
            <p class="intro">个性签名：</p>
        </div>
    </div>
    <input type="button" value="注销" class="linkmore link_a">
</div>
<span id="canshu" style="display:none"><?php echo is_session();;?></span>
</body>
<script type="text/javascript" src="/newmeigui/Public/front/js/jquery.js"></script>
<script type="text/javascript" src="/newmeigui/Public/front/js/jquery.rotate.min.js"></script>
<script type="text/javascript" src="/newmeigui/Public/front/js/LinkedList.js"></script>
<script type="text/javascript" src="/newmeigui/Public/front/js/newIndex.js"></script>
<script type="text/javascript" >
var navListContent = [
{
text: "首  页",
src: '<?php if(is_array($ad)): $key = 0; $__LIST__ = $ad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$adList): $mod = ($key % 2 );++$key; if($key == 1): ?><div class="peoplecomment first"><a href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($adList['na_ad_id']); ?>"><img src="/newmeigui/<?php echo ($adList['na_ad_showpath']); ?>"></a><p><?php echo ($adList['na_ad_name']); ?></p></div><?php else: ?><div class="peoplecomment"><a href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($adList['na_ad_id']); ?>"><img src="/newmeigui/<?php echo ($adList['na_ad_showpath']); ?>"><p><?php echo ($adList['na_ad_name']); ?></p></div><?php endif; endforeach; endif; else: echo "" ;endif; ?></div><a href="/newmeigui/index.php/Home/AdSearch" class="linkmore">More</a>',
color: 'rgb(134,137,83)'
},
{
text: "广  告",
src: '<?php if(is_array($ad)): $key = 0; $__LIST__ = $ad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$adList): $mod = ($key % 2 );++$key; if($key == 1): ?><div class="peoplecomment first"><a href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($adList['na_ad_id']); ?>"><img src="/newmeigui/<?php echo ($adList['na_ad_showpath']); ?>"></a><p><?php echo ($adList['na_ad_name']); ?></p></div><?php else: ?><div class="peoplecomment"><a href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($adList['na_ad_id']); ?>"><img src="/newmeigui/<?php echo ($adList['na_ad_showpath']); ?>"><p><?php echo ($adList['na_ad_name']); ?></p></div><?php endif; endforeach; endif; else: echo "" ;endif; ?></div><a href="/newmeigui/index.php/Home/AdSearch" class="linkmore">More</a>',
color: 'rgb(69,83,143)'
},
{
text: "个人中心",
    src: '<?php if(session('user_id') == null): ?><form class="register" action="/newmeigui/index.php/Home/lc" method="post"><p>用户名：<input type="text" name="na_user_loginName" id="username"></p><p>密&nbsp;&nbsp;&nbsp;码：<input name="na_user_pwd" type="password" id="password"></p><input type="submit" value="登陆" onclick="return check()"><?php else: ?><div class="register_out"><img id="img" src="<?php echo is_photo($user_info['na_user_photopath']);?>"/><div class="info"><p>用户名：<?php echo ($user_info["na_user_loginname"]); ?></p><p>邮箱：<?php echo ($user_info["na_user_email"]); ?></p><p class="intro">个性签名：<?php echo ((isset($user_info["na_user_intro"]) && ($user_info["na_user_intro"] !== ""))?($user_info["na_user_intro"]):"个性签名~可在个人中心设置"); ?></p></div></div><input type="button" onclick="quit();" value="注销" class="linkmore link_a"><?php endif; ?></form>',
color: 'rgb(254,216,122)'
},
{
text: "大众评论",
src: '<?php if(is_array($ad)): $key = 0; $__LIST__ = $ad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$adList): $mod = ($key % 2 );++$key; if($key == 1): ?><div class="peoplecomment first"><a href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($adList['na_ad_id']); ?>"><img src="/newmeigui/<?php echo ($adList['na_ad_showpath']); ?>"><p><?php echo ($adList['na_ad_name']); ?></p></div><?php else: ?><div class="peoplecomment"><a href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($adList['na_ad_id']); ?>"><img src="/newmeigui/<?php echo ($adList['na_ad_showpath']); ?>"><p><?php echo ($adList['na_ad_name']); ?></p></div><?php endif; endforeach; endif; else: echo "" ;endif; ?></div><a href="/newmeigui/index.php/Home/AdComment" class="linkmore">More</a>',
color: 'rgb(234,167,113)'
},
{
text: "排 行 榜",
src:'<?php if(is_array($love)): $key = 0; $__LIST__ = $love;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$love): $mod = ($key % 2 );++$key; if($key == 1): ?><div class="peoplecomment first"><a href="__ MODULE__/AdMetail/index/id/<?php echo ($love['na_ad_id']); ?>"><img src="/newmeigui/<?php echo ($love['na_ad_showpath']); ?>"><p><?php echo ($love['na_ad_name']); ?></p></div><?php else: ?><div class="peoplecomment"><a href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($love['na_ad_id']); ?>"><img src="/newmeigui/<?php echo ($love['na_ad_showpath']); ?>"><p><?php echo ($love['na_ad_name']); ?></p></div><?php endif; endforeach; endif; else: echo "" ;endif; ?><a href="/newmeigui/index.php/Home/AdRank" class="linkmore">More</a>',
color: 'rgb(134,33,52)'
}
];

function check() {
    var username = document.getElementById("username").value;
    if(!username.length){
        alert("用户名不能为空");
        return false;
    }
}
    function quit() {
        window.location.href="/newmeigui/index.php/Home/lq";
    }
</script>
</html>