<?php if (!defined('THINK_PATH')) exit();?><div class="mainContent">
    <div class="eachLine">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><span class="eachPic">
					<a href="/newmeigui/index.php/Home/AdMetail/index/id/<?php echo ($arr['na_ad_id']); ?>" target="_blank"><img src="/newmeigui/<?php echo ($arr['na_ad_showpath']); ?>" class="rangPic"></a>
					<p><span class="wordLeft"></span><?php echo ($arr['na_ad_adtype']); ?><span class="wordMiddle"><?php echo ($arr['na_ad_type']); ?>|<?php echo get_adname($arr['na_ad_name'],4);?></span><div class="liulanliang">
                        <?php echo adlove_or_ad($arr['na_adlove_count'],$arr['na_ad_count']);?>
                    </div>
            </span><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>