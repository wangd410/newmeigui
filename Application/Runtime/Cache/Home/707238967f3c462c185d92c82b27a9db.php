<?php if (!defined('THINK_PATH')) exit();?><p class="title">我喜欢的广告</p>
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