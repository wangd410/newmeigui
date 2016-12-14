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
	<link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/adSearch.css">
	<link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/style.css">
	<link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/page.css">
	<link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/jquery.mCustomScrollbar.css">
	<script type="text/javascript" src="/newmeigui/Public/front/js/jquery.js"></script>
	<script type="text/javascript" src="/newmeigui/Public/front/js/jquery_slide.js"></script>
	<style>
		.paging{
			font-size: 15px;
		}
		a:hover{
			text-decoration: none;
		}
		.logRegc {
			right: 254px;
		}
		*{
			font-family: "Microsoft YaHei";
		}
		#btn {
			display:block;
			width: 70px;
			text-align: center;
			margin: 22px auto 0 auto;
			border-radius: 6px;
			border: 1px black solid;
		}
		#btn:hover{
			opacity: 0.5;
		}
		#footer {
			margin-top: 16px;
		}
	</style>
	<!--新添加的遮罩层样式-->
	<style>
		#cover{
			position: relative;
			/*left: 20px;*/
			margin: 0 auto;
			width: 1185px;
			height: 548px;
			background:rgb(233,231,239);
			overflow: hidden;
			z-index: 9999;
		}
		#cover-content {
			margin:20px;
		}
		#cover img {
			width: 220px;
			height: 230px;
			margin-top: 6px;
			margin-left: 6px;
			border-radius: 50%;
		}
		.content-blocks {
			display: inline-block;
			width: 540px;
			height: 244px;
			margin-bottom: 10px;
			margin-right: 10px;
			vertical-align: top;
			border: 1px black solid;
			border-radius: 6px;
		}
		.content-des {
			display: inline-block;
			vertical-align: top;
			margin-left: 20px;
			margin-top: 6px;
		}
		.content-des p {
			line-height: 1.2em;
			font-size: 1.2em;
			height: 1.2em;
			width: 264px;
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
			font-weight: bold;
		}
	</style>
	<!--样式修正-->
	<style>
		#main{
			width: 1225px !important;
			margin: 0 auto !important;
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
			<form action="/newmeigui/index.php/Home/As" method="post">
				<input type="text" name="na_ad_name"  class="searchinp"><input type="submit" value="" class="searchbtn">
			</form>
		</div>
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
		<div class="mainScreen">
				<ul class="grayLine">
					<li>年份：</li>
					<?php $__FOR_START_21038__=$year-16;$__FOR_END_21038__=$year+1;for($i=$__FOR_START_21038__;$i < $__FOR_END_21038__;$i+=1){ ?><li><a href="<?php echo U('AdSearch/index',array('year'=>$i));?>"><?php echo ($i); ?></a></li><?php } ?>
				</ul>
				<ul class="whiteLine">
					<li>类型：</li>
					<?php if(is_array($typeList)): $i = 0; $__LIST__ = $typeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><li><a href = "<?php echo U('AdSearch/index',array('type'=>encode($arr['na_adtype_type'])));?>"><?php echo ($arr['na_adtype_type']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<ul class="grayLine">
					<li>地区：</li>
					<li><a href="/newmeigui/index.php/Home/AdSearch/index/place/zg">中国</a></li>
					<li><a href="/newmeigui/index.php/Home/AdSearch/index/place/om">欧美</a></li>
					<li><a href="/newmeigui/index.php/Home/AdSearch/index/place/rh">日韩</a></li>
					<li><a href="/newmeigui/index.php/Home/AdSearch/index/place/qt">其他</a></li>
				</ul>
			</div>
	</div>


	<!-- 中间主要部分 -->
	<div id="main">
		<div id="cover" style="display: none;">
			<div id="cover-content">
				<div class="content-blocks">
					<img src="http://localhost/newmeigui/Public/picture/za7_img.jpg">
					<div class="content-des">
						<p>品牌名称：aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
						<p>成立时间：</p>
						<p>国家：</p>
						<p>代言人：</p>
						<p>官方网址：</p>
						<p class="content-intro">简介：</p>
					</div>
				</div>
				<div class="content-blocks">
					<img src="http://localhost/newmeigui/Public/picture/za7_img.jpg">
					<div class="content-des">
						<p>品牌名称：</p>
						<p>成立时间：</p>
						<p>国家：</p>
						<p>代言人：</p>
						<p>官方网址：</p>
						<p>简介：</p>
					</div>
				</div>
				<div class="content-blocks">
					<img src="http://localhost/newmeigui/Public/picture/za7_img.jpg">
					<div class="content-des">
						<p>品牌名称：</p>
						<p>成立时间：</p>
						<p>国家：</p>
						<p>代言人：</p>
						<p>官方网址：</p>
						<p>简介：</p>
					</div>
				</div>
				<div class="content-blocks">
					<img src="http://localhost/newmeigui/Public/picture/za7_img.jpg">
					<div class="content-des">
						<p>品牌名称：</p>
						<p>成立时间：</p>
						<p>国家：</p>
						<p>代言人：</p>
						<p>官方网址：</p>
						<p>简介：</p>
					</div>
				</div>
				<div class="content-blocks">
					<img src="http://localhost/newmeigui/Public/picture/za7_img.jpg">
					<div class="content-des">
						<p>品牌名称：</p>
						<p>成立时间：</p>
						<p>国家：</p>
						<p>代言人：</p>
						<p>官方网址：</p>
						<p>简介：</p>
					</div>
				</div>
				<div class="content-blocks">
					<img src="http://localhost/newmeigui/Public/picture/za7_img.jpg">
					<div class="content-des">
						<p>品牌名称：</p>
						<p>成立时间：</p>
						<p>国家：</p>
						<p>代言人：</p>
						<p>官方网址：</p>
						<p>简介：</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container_image">
			<a href="javascript:void(0)" tip="0" class="i_btn prev_L"></a>
			<a href="javascript:void(0)" tip="1" class="i_btn next_R"></a>
			<ul class="slide_img">
				<?php if(is_array($pic)): $i = 0; $__LIST__ = $pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pic): $mod = ($i % 2 );++$i;?><li class="on">
						<a href="javascript:void(0);"><img src="/newmeigui/<?php echo ($pic["na_picture_path"]); ?>" /></a>
						<div class="icon"></div>
						<div class="bg"></div>
						<div class="info">
							<i></i>
							<span></span>
							<p><?php echo ($pic["na_picture_intro"]); ?></p>
						</div>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<button id="btn">品牌信息</button>
		<div class="mainContent">
			<div class="eachLine">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$adlist): $mod = ($i % 2 );++$i;?><span class="eachPic">
					<a href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($adlist['na_ad_id']); ?>" target="_blank"><img src="/newmeigui/<?php echo ($adlist['na_ad_showpath']); ?>" class="adPic"></a>
					<div class="clear"></div>
					<div class="brief">
						<h4><?php echo get_adname($adlist['na_ad_name']);?></h4>
						<p class="more"><?php echo ((isset($adlist['na_ad_introduce']) && ($adlist['na_ad_introduce'] !== ""))?($adlist['na_ad_introduce']):"  这是一段图文广告"); ?></p>
						<a href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($adlist['na_ad_id']); ?>">详情</a>
					</div>
				</span><?php endforeach; endif; else: echo "" ;endif; ?>
				<?php if($list == null): ?><h2>没有查询到该信息</h2><?php endif; ?>
			</div>
			<div class="paging">
				<form method="get"  id="form1">
					<div class="tres"><?php echo ($page); ?>
					<!--input id="param" type="input" class="pageNum" name="p">
					<input type="submit" value="GO" class="pageNum go">-->
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- 尾部 -->
	<div id="footer">
		<span>版权所有：蓝旭工作室</span>
	</div>
	<script type="text/javascript" src="/newmeigui/Public/front/js/jquery.mCustomScrollbar.js"></script>
	<script type="text/javascript">
		$('#form1').submit(function(){
			location.href='/newmeigui/index.php/Home/AdSearch/index/p/'+$('#param').val()+'.fix';
			return false;
		})
		 $("#cover").mCustomScrollbar();
		</script>
	<script type="text/javascript">
		$(document).ready(function() {
			var newopt={
				w2:"180",//小图宽度
				h2:"490"//小图高度
			};

			i_slide($(".container_image"),newopt);
			//限制字符个数
			$(".brief p").each(function(){
				var maxwidth=35;
				if($(this).text().length>maxwidth){
					$(this).text($(this).text().substring(0,maxwidth));
					$(this).html($(this).html()+'…');
				}
			});
			$(".grayLine li").click(function() {
				$(this).css('backgroundColor', '#fff')
					   .siblings('li').css('backgroundColor', '#f1f1f1');
			});
			$(".whiteLine li").click(function() {
				$(this).css('backgroundColor', '#f1f1f1')
					   .siblings('li').css('backgroundColor', '#fff');
			});
			$(".pageNum:not('.go')").click(function() {
				$(this).css({
					backgroundColor: '#868953',
					color: '#fff'
				}).siblings('input').css({
					backgroundColor: '#d1d2c1',
					color: '#868953'
				});
			});
			$(".slide_img li .info span u").click(function() {
				location.href = "   ";
			});
		});
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
	<script>
		$("#btn").click(function () {
			$("#cover").toggle(1500);
			$(".container_image").toggle(1500);

		})
	</script>

</body>
</html>