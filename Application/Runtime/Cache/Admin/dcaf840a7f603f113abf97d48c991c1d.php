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
				<th>类别名称</th>
			    <th>添加人</th>
				<th>添加时间</th>
				<th>操作</th>
			</tr>
		</thead>

		<tr>
			<td>娱乐</td>
		    <td>admin
			</td>
			<td>
			   2016 
            </td>
			<td>
				<button type="submit">删除</button> 
			</td>

		</tr>


	</table>

   <form action="classAdd.html">
 &nbsp; &nbsp; &nbsp;<button  class="btn btn-primary">新增</button>
   </form>
	</body>
</html>