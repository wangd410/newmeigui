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
<form class="form-inline definewidth m20" action="/newmeigui/index.php/Admin/aa" method="get">
    <button type="submit" class="btn btn-primary">新增</button> 
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>用户名</th>
        <th>登陆名</th>
        <th>密码</th>
        <th>账号类型</th>
        <th>分配时间</th>
		 <th>操作</th>

     </tr>
    </thead>
    <?php if($adminInfo != null): if(is_array($adminInfo)): $i = 0; $__LIST__ = $adminInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($info['na_admin_name']); ?></td>
                <td><?php echo ($info['na_admin_loginname']); ?></td>
                <td><?php echo md5($info['na_admin_pwd']);?></td>
                <td><?php echo ($info['na_admin_type']); ?></td>
                <td><?php echo ($info['na_admin_time']); ?></td>
				<td><a href = "/newmeigui/index.php/Admin/admin/deleteA/id/<?php echo ($info["na_admin_id"]); ?>"><img src="/newmeigui/Public/admin/images/stock_spam.png" title="删除"/></a>&nbsp;&nbsp;&nbsp;
				<?php if($info["na_admin_state"] == 1): ?><a href="/newmeigui/index.php/Admin/admin/updateS/id/<?php echo ($info["na_admin_id"]); ?>/type/j"><img src="/newmeigui/Public/admin/images/stock_mail_priority_high.png" title="禁用"/></a>
				<?php else: ?><a href="/newmeigui/index.php/Admin/admin/updateS/id/<?php echo ($info["na_admin_id"]); ?>/type/q"><img src="/newmeigui/Public/admin/images/stock_not_spam.png" title="启用"/></td><?php endif; ?>
          
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>    
       </table>
       <?php else: ?><tr><td><?php echo ($empty); ?></td></tr><?php endif; ?>


</body>
</html>