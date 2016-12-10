<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>用户管理</title>
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
<form class="form-inline definewidth m20" action="/newmeigui/index.php/Admin/ue" method="post">
    <font color="#777777"><strong>查询用户：</strong></font>
    <input type="text" name="name" id="menuname"class="abc input-default" placeholder="" value="">&nbsp;&nbsp; 
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; 
	
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>用户昵称</th>
        <th>用户名</th>
        <th>是否禁言</th>
       
       
    </tr>
 
    </thead>
	    <?php if($list != null): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($arr['na_user_name']); ?></td>
                <td><?php echo ($arr['na_user_loginname']); ?></td>
                <td>
                <?php echo userEdit($arr['na_user_state'],$arr['na_user_id']);?>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?> 
       <?php else: ?>
       <tr><td><?php echo ($empty); ?></td></tr><?php endif; ?>
       </table>
       <?php echo ($page); ?>

</body>
</html>
<script>
    $(function () {
        

		$('#addnew').click(function(){

				window.location.href="goodsAdd.html";
		 });


    });
	
</script>