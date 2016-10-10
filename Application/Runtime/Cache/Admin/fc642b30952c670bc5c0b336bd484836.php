<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/admin/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/admin/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/admin/css/style.css" />
    <script type="text/javascript" src="/newmeigui/Public/admin/js/jquery2.js"></script>
    <script type="text/javascript" src="/newmeigui/Public/admin/js/jquery2.sorted.js"></script>
    <script type="text/javascript" src="/newmeigui/Public/admin/js/bootstrap.js"></script>
    <script type="text/javascript" src="/newmeigui/Public/admin/js/ckform.js"></script>
    <script type="text/javascript" src="/newmeigui/Public/admin/js/common.js"></script>

    <style type="text/css">
        body {font-size: 20px;
            padding-bottom: 40px;
            background-color:#e9e7ef;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<body>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>评价内容</th>
        <th>评价人</th>
        <th>评价时间</th>
        <th>操作</th>
       
    </tr>
    </thead>
	   <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
                
                <td width=50%><?php echo ($arr['na_comment_content']); ?></td>
				<td><?php echo ($arr['na_user_name']); ?></td>
                <td><?php echo ($arr['na_comment_time']); ?></td>
                <td><a href="/newmeigui/index.php/Admin/comment/deleteComment/id/<?php echo ($arr['na_comment_id']); ?>"><img src="/newmeigui/Public/admin/images/stock_spam.png" title="删除"/></a></td>
               
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if($list == null): ?><tr><td><?php echo ($empty); ?></td></tr><?php endif; ?>  
              </table>
       
<?php echo ($page); ?>

</body>
</html>