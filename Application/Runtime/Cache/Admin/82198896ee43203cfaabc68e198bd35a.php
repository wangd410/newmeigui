<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/newmeigui/Public/admin/css/adminStyle.css" />

<title>后台管理系统</title>
<script type="text/javascript" src="/newmeigui/Public/admin/js/jquery1.js"></script>
<script type="text/javascript">
	$(document).ready(
			function() {
				$(".div2").click(
						function() {
							$(this).next("div").slideToggle("slow").siblings(
									".div3:visible").slideUp("slow");
						});
			});
	function openurl(url) {
		var rframe = parent.document.getElementById("rightFrame");
		rframe.src = url;
	}
</script>
<style>
body {
	margin: 0;
	font-family: 微软雅黑;
	background-image: url(/newmeigui/Public/admin/images/.jpg);
	background-repeat: no-repea;
	background-size: cover;
	background-attachment: fixed;
	background-color: #DDDDDD
	
}

.top1 {
	position: absolute;
	top: 0px;
	width: 100%;
	height: 20px;
	text-align: center;
	color: #FFFFFF;
	font-size: 17px;
	font-height: 20px;
	font-family: 楷体;
	background-color: #888888
}

.title {
float:left;
    margin:-32px 20px;
	font-size: 40px;
	color: #FFFFFF;
	font-height: 55px;
	font-family: 隶书;
}

.top2 {
	position: absolute;
	top: 20px;
	width: 100%;
	height: 77px;
	text-align: center;
	color: #ccffff;
	background-color: #888888
}

.left {
	position: absolute;
	left: 0px;
	top: 97px;
	width: 200px;
	height: 85%;
	border-right: 1px solid #9370DB;
	color: #000000;
	font-size: 20px;
	text-align: center;
	background-color: #B3B3B3
}

.right {
	position: absolute;
	left: 200px;
	top:97px;
	width: 85.2%;
	height: 85%;
	border-top: 0px solid #484860;
	font-size: 14px;
	text-align: center;
}

.end {
	position: absolute;
	bottom: 0px;
	width: 100%;
	height: 30px;
	text-align: center;
	color: #556B2F;
	font-size: 17px;
	font-height: 20px;
	font-family: 楷体;
	background-color: #C0C0C0
}

.div1 {
	text-align: center;
	width: 200px;
	padding-top: 10px;
}

.div2 {
	height: 40px;
	line-height: 40px;
	cursor: pointer;
	font-size: 18px;
	position: relative;
	border-bottom: #ccc 0px dotted;
}

.spgl {
	position: absolute;
	height: 20px;
	width: 20px;
	left: 40px;
	top: 10px;
	background: url(/newmeigui/Public/admin/images/1.png);
}

.yhgl {
	position: absolute;
	height: 20px;
	width: 20px;
	left: 40px;
	top: 10px;
	background: url(/newmeigui/Public/admin/images/user_01.png);
}

.gggl {
	position: absolute;
	height: 20px;
	width: 20px;
	left: 40px;
	top: 10px;
	background: url(/newmeigui/Public/admin/images/4.png);
}

.zlgl {
	position: absolute;
	height: 20px;
	width: 20px;
	left: 40px;
	top: 10px;
	background: url(/newmeigui/Public/admin/images/4.png);
}

.pjgl {
	position: absolute;
	height: 20px;
	width: 20px;
	left: 40px;
	top: 10px;
	background: url(/newmeigui/Public/admin/images/4.png);
}

.tcht {
	position: absolute;
	height: 20px;
	width: 20px;
	left: 40px;
	top: 10px;
	background: url(/newmeigui/Public/admin/images/2.png);
}

.div3 {
	display: none;
	cursor: pointer;
	font-size: 15px;
}

.div3 ul {
	margin: 0;
	padding: 0;
}

.div3 li {
	height: 30px;
	line-height: 30px;
	list-style: none;
	border-bottom: #ccc 1px dotted;
	text-align: center;
}

.a {
	text-decoration: none;
	color: #000000;
	font-size: 15px;
}

.a1 {
	text-decoration: none;
	color: #000000;
	font-size: 18px;
}
</style>
</head>
<body>

	<div class="top1">
		<marquee scrollAmount=2 width=300>数据无价，请谨慎操作！</marquee>
	</div>
	<div class="top2">
		<div class="logo">
			<img src="/newmeigui/Public/admin/images/admin_logo.png" title="在哪儿" />
		</div>
		<div class="title" >
			<h3>新玫鲑网站后台管理系统</h3>
		</div>
		<div class="fr top-link">
		<i
				class="adminIcon"></i><span><?php echo ($type); ?>：<?php echo ($login); ?></span></a> 
		</div>
	</div>

	<div class="left">
		<div class="div1">
			<div class="left_top">
				<img src="/newmeigui/Public/admin/images/bbb_01.jpg"><img src="/newmeigui/Public/admin/images/bbb_02.jpg"
					id="2"><img src="/newmeigui/Public/admin/images/bbb_03.jpg"><img
					src="/newmeigui/Public/admin/images/bbb_04.jpg">
			</div>
			
           <div class="div2">
				<div class="spgl"></div>
				广告管理
			</div>
			<div class="div3">
				<li><a class="a" href="javascript:void(0);"
					onClick="openurl('/newmeigui/index.php/Admin/list/video');">
					视频管理</a></li>
				<li><a class="a" href="javascript:void(0);"
					onClick="openurl('/newmeigui/index.php/Admin/list');">图文管理</a></li>
			   
			</div>
			<div class="div2">
				<div class="spgl"></div>
				上传管理
			</div>
			<div class="div3">
				<ul>
					<li><a class="a" href="javascript:void(0);"
						onClick="openurl('/newmeigui/index.php/Admin/uv');">上传视频</a></li>
						<li><a class="a" href="javascript:void(0);"
						onClick="openurl('/newmeigui/index.php/Admin/UploadFiles');">上传图文</a></li>
					
				</ul>
			</div>
			<div class="div2">
				<div class="spgl"></div>
				类别管理
			</div>
			<div class="div3">
				<ul>
					<li><a class="a" href="javascript:void(0);"
						onClick="openurl('/newmeigui/index.php/Admin/adtype');">类别信息</a></li>
					<li><a class="a" href="javascript:void(0);"
						onClick="openurl('/newmeigui/index.php/Admin/at');">新增类别</a></li>
				</ul>
			</div>
			<div class="div2">
				<div class="yhgl"></div>
				用户管理
			</div>
			<div class="div3">
				<ul>
					<li><a class="a" href="javascript:void(0);"
						onClick="openurl('/newmeigui/index.php/Admin/admin');">权限分配</a></li>
					<li><a class="a" href="javascript:void(0);"
						onClick="openurl('/newmeigui/index.php/Admin/us');">修改密码</a></li>
				</ul>
			</div>
			
			<div class="div2">
				<div class="gggl"></div>
				评价管理
			</div>
			<div class="div3">

				<ul>
					<li><a class="a" href="javascript:void(0);"
						onClick="openurl('/newmeigui/index.php/Admin/comment');">评价管理</a></li>
					<li><a class="a" href="javascript:void(0);"
						onClick="openurl('/newmeigui/index.php/Admin/ue');">用户禁言</a></li>
				</ul>

			</div>

			<div class="div2">
				<div class="gggl"></div>
				轮播管理
			</div>
			<div class="div3">

				<ul>
					<li><a class="a" href="javascript:void(0);"
						   onClick="openurl('/newmeigui/index.php/Admin/pa');">广告轮播</a></li>
					<li><a class="a" href="javascript:void(0);"
						   onClick="openurl('/newmeigui/index.php/Admin/pc');">评价轮播</a></li>
				</ul>

			</div>
			<!-- <div class="div2">
				<div class="pjgl"></div>
				公告管理
			</div>
			<div class="div3">
				<ul>
					<li><a class="a" href="javascript:void(0);"
						onClick="openurl('afficheQuery.html');">查看公告</a></li>
					<li><a class="a" href="javascript:void(0);"
						onClick="openurl('afficheAdd.html');">添加公告</a></li>
				</ul>
			</div> -->
			<a class="a1" href="/newmeigui/index.php/Admin/gg"><div class="div2">
					<div class="tcht"></div>
					退出后台
				</div></a>
		</div>
	</div>

	<div class="right">
	
		<iframe id="rightFrame" name="rightFrame" width="100%" height="100%"
			scrolling="auto" marginheight="0" marginwidth="0" align="center"
			style="border: 0px solid #CCC; margin: 0; padding: 0;"></iframe>
	</div>







</body>
</html>