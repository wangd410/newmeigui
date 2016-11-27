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
	</style>
</head>
<body>
	<!-- 头部 -->
	<div id="head">
		<div class="headTop">
			<a href="/newmeigui"><img src="/newmeigui/Public/front/image/logo2.png"></a>
			<span class="logReg">
				<?php if(session('user_id') == null): ?><a href="/newmeigui/index.php/Home/Index">登录</a>|
				<a href="#">注册</a>
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
			</div>
			<span class="logRegc">　筛选条件　<img src="/newmeigui/Public/front/image/arrow.png"></span>
			<div class="clear"></div>
		</div>
		<hr>
		<div class="mainScreen">
				<ul class="grayLine">
					<li>年份：</li>
					<?php $__FOR_START_22071__=2000;$__FOR_END_22071__=2017;for($i=$__FOR_START_22071__;$i < $__FOR_END_22071__;$i+=1){ ?><li><a href="<?php echo U('AdSearch/index',array('year'=>$i));?>"><?php echo ($i); ?></a></li><?php } ?>
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
		<div class="container_image">
			<a href="javascript:void(0)" tip="0" class="i_btn prev_L"></a>
			<a href="javascript:void(0)" tip="1" class="i_btn next_R"></a>
			<ul class="slide_img">
				<li class="on">
					<a href="javascript:void(0);"><img src="/newmeigui/Public/front/image/za8_img.jpg" /></a>
					<div class="icon"></div>
					<div class="bg"></div>
					<div class="info">
						<i></i>
						<span></span>
						<p>徐汇艺术馆作为沪上首批向公众免费开放的区级公益性美术馆，亲历并见证了整个上海乃至全国的美术馆发展历程。在建馆十周年之际，徐汇艺术馆历时四个月，通过开展“
						徐汇·我在这里等时光” 摄影作品大赛、“衡山路街景”长卷少儿绘画集体创作、“美术馆里上美术课”等系列活动和展览，综合呈现十年来各方面工作的积累和成果。</p>
					</div>
				</li>
				<li>
					<a href="javascript:void(0)"><img src="/newmeigui/Public/front/image/za4_img.jpg" /></a>
					<div class="icon"></div>
					<div class="bg"></div>
					<div class="info">
						<i></i>
						<span></span>
						<p>徐汇艺术馆作为沪上首批向公众免费开放的区级公益性美术馆，亲历并见证了整个上海乃至全国的美术馆发展历程。在建馆十周年之际，徐汇艺术馆历时四个月，通过开展“
						徐汇·我在这里等时光” 摄影作品大赛、“衡山路街景”长卷少儿绘画集体创作、“美术馆里上美术课”等系列活动和展览，综合呈现十年来各方面工作的积累和成果。</p>
					</div>
				</li>
				<li>
					<a href="javascript:void(0)"><img src="/newmeigui/Public/front/image/za3_img.jpg" /></a>
					<div class="icon"></div>
					<div class="bg"></div>
					<div class="info">
						<i></i>
						<span></span>
						<p>徐汇艺术馆作为沪上首批向公众免费开放的区级公益性美术馆，亲历并见证了整个上海乃至全国的美术馆发展历程。在建馆十周年之际，徐汇艺术馆历时四个月，通过开展“
						徐汇·我在这里等时光” 摄影作品大赛、“衡山路街景”长卷少儿绘画集体创作、“美术馆里上美术课”等系列活动和展览，综合呈现十年来各方面工作的积累和成果。</p>
					</div>
				</li>
				<li>
					<a href="javascript:void(0)"><img src="/newmeigui/Public/front/image/za1_img.jpg" /></a>
					<div class="icon"></div>
					<div class="bg"></div>
					<div class="info">
						<i></i>
						<span> </span>
						<p>徐汇艺术馆作为沪上首批向公众免费开放的区级公益性美术馆，亲历并见证了整个上海乃至全国的美术馆发展历程。在建馆十周年之际，徐汇艺术馆历时四个月，通过开展“
						徐汇·我在这里等时光” 摄影作品大赛、“衡山路街景”长卷少儿绘画集体创作、“美术馆里上美术课”等系列活动和展览，综合呈现十年来各方面工作的积累和成果。</p>
					</div>
				</li>
				<li>
					<a href="javascript:void(0)"><img src="/newmeigui/Public/front/image/za2_img.jpg" /></a>
					<div class="icon"></div>
					<div class="bg"></div>
					<div class="info">
						<i></i>
						<span>广告名字　　　　<u>查看详情</u></span>
						<p>徐汇艺术馆作为沪上首批向公众免费开放的区级公益性美术馆，亲历并见证了整个上海乃至全国的美术馆发展历程。在建馆十周年之际，徐汇艺术馆历时四个月，通过开展“
						徐汇·我在这里等时光” 摄影作品大赛、“衡山路街景”长卷少儿绘画集体创作、“美术馆里上美术课”等系列活动和展览，综合呈现十年来各方面工作的积累和成果。</p>
					</div>
				</li>
				<li>
					<a href="javascript:void(0)"><img src="/newmeigui/Public/front/image/za6_img.jpg" /></a>
					<div class="icon"></div>
					<div class="bg"></div>
					<div class="info">
						<i></i>
						<span>广告名字　　　　<u>查看详情</u></span>
						<p>徐汇艺术馆作为沪上首批向公众免费开放的区级公益性美术馆，亲历并见证了整个上海乃至全国的美术馆发展历程。在建馆十周年之际，徐汇艺术馆历时四个月，通过开展“
						徐汇·我在这里等时光” 摄影作品大赛、“衡山路街景”长卷少儿绘画集体创作、“美术馆里上美术课”等系列活动和展览，综合呈现十年来各方面工作的积累和成果。</p>
					</div>
				</li>
				<li>
					<a href="javascript:void(0)"><img src="/newmeigui/Public/front/image/za7_img.jpg" /></a>
					<div class="icon"></div>
					<div class="bg"></div>
					<div class="info">
						<i></i>
						<span>广告名字　　　　<u>查看详情</u></span>
						<p>徐汇艺术馆作为沪上首批向公众免费开放的区级公益性美术馆，亲历并见证了整个上海乃至全国的美术馆发展历程。在建馆十周年之际，徐汇艺术馆历时四个月，通过开展“
						徐汇·我在这里等时光” 摄影作品大赛、“衡山路街景”长卷少儿绘画集体创作、“美术馆里上美术课”等系列活动和展览，综合呈现十年来各方面工作的积累和成果。</p>
					</div>
				</li>
			</ul>
		</div>

		<div class="mainContent">
			<div class="eachLine">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$adlist): $mod = ($i % 2 );++$i;?><span class="eachPic">
					<a href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($adlist['na_ad_id']); ?>" target="_blank"><img src="/newmeigui/<?php echo ($adlist['na_ad_showpath']); ?>" class="adPic"></a>
					<div class="clear"></div>
					<div class="brief">
						<h4><?php echo get_adname($adlist['na_ad_name']);?></h4>
						<p class="more"><?php echo ((isset($adlist['na_ad_introduce']) && ($adlist['na_ad_introduce'] !== ""))?($adlist['na_ad_introduce']):"  这是一段图文广告"); ?></p>
						<a href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($adlist['na_ad_id']); ?>">了解详情</a>
					</div>
				</span><?php endforeach; endif; else: echo "" ;endif; ?>
				<?php if($list == null): ?><h2>没有查询到该信息</h2><?php endif; ?>
			</div>
			<div class="paging">
				<form method="get"  id="form1">
					<div class="green-black"><?php echo ($page); ?>
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
	<script type="text/javascript">
		$('#form1').submit(function(){
			location.href='/newmeigui/index.php/Home/AdSearch/index/p/'+$('#param').val()+'.fix';
			return false;
		})
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
</body>
</html>