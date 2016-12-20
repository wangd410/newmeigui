<?php if (!defined('THINK_PATH')) exit();?><div class="myTrend" id="move">
    <p class="title">我的动态</p>
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