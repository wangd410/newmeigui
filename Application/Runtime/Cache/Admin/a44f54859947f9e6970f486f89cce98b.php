<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/newmeigui/Public/admin/css/bootstrap.css" />
<link rel="stylesheet" type="text/css"
	href="/newmeigui/Public/admin/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="Css/style.css" />
<script type="text/javascript" src="/newmeigui/Public/admin/js/jquery2.js"></script>
<script type="text/javascript" src="/newmeigui/Public/admin/js/jquery2.sorted.js"></script>
<script type="text/javascript" src="/newmeigui/Public/admin/js/bootstrap.js"></script>
<script type="text/javascript" src="/newmeigui/Public/admin/js/ckform.js"></script>
<script type="text/javascript" src="/newmeigui/Public/admin/js/common.js"></script>

<style type="text/css">
body {font-size: 20px;
	padding-bottom: 40px;
	background-color: #e9e7ef;
}

.sidebar-nav {
	padding: 9px 0;
}

@media ( max-width : 980px) {
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
	<form class="form-inline definewidth m20" action="classAdd.html" method="get">
		 <font color="#777777"><strong>类别信息：</strong></font> 
		
	</form>
	<table class="table table-bordered table-hover definewidth m10">
		<thead>
			<tr>
				<th>类别</th>
			    <th>添加人</th>
				<th>添加时间</th>
				<th>操作</th>
			</tr>
		</thead>

		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($vo["na_adtype_type"]); ?></td>
		    <td><?php echo ($vo["na_adtype_uname"]); ?></td>
			<td><?php echo ($vo["na_adtype_time"]); ?></td>
			<td><a href = "/newmeigui/index.php/Admin/adtype/typeDelete/id/<?php echo ($vo["na_adtype_id"]); ?>"><img src="/newmeigui/Public/admin/images/stock_spam.png" title="删除"/></a></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	<tr border=0><td>
	<?php echo ($page); ?>	
	</td></tr>
	</table>

   <form action="/newmeigui/index.php/Admin/at">
 &nbsp; &nbsp; &nbsp;<button  class="btn btn-primary">新增</button>
   </form>
	</body>
</html>