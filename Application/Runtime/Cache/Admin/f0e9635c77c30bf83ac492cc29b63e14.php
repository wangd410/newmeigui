<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/newmeigui/Public/admin/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/newmeigui/Public/admin/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="/newmeigui/Public/admin/css/style.css" />
<script type="text/javascript" src="__PUBLIC_/admin/Js/jquery2.js"></script>
<script type="text/javascript" src="__PUBLIC_/admin/Js/jquery2.sorted.js"></script>
<script type="text/javascript" src="__PUBLIC_/admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__PUBLIC_/admin/Js/ckform.js"></script>
<script type="text/javascript" src="__PUBLIC_/admin/Js/common.js"></script>

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
	<form class="form-inline definewidth m20" action="/newmeigui/index.php/Admin/list" method="post">
		 <font color="#777777"><strong>图文标题：</strong></font> <input type="text"
			name="name" id="menuname" class="abc input-default"
			placeholder="" value="">&nbsp;&nbsp;
		<button type="submit" class="btn btn-primary">查询</button>
		&nbsp;&nbsp;
		<a href="/newmeigui/index.php/Admin/UploadFiles"><img src="/newmeigui/Public/admin/images/stock_inbox.png" title="添加图文广告"></a>
	</form>
	<table class="table table-bordered table-hover definewidth m10">
		<thead>
			<tr>
				<th>图文标题</th>
				<th>类型</th>
				<th>上传者</th>
				<th>点击量</th>
				<th>上传日期</th>
				<th>管理菜单</th>
			</tr>
		</thead>
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($arr['na_ad_name']); ?></td>
			<td><?php echo ($arr['na_ad_type']); ?></td>
			<td><?php echo ($arr['na_ad_uname']); ?></td>
			<td><?php echo ($arr['na_ad_count']); ?></td>
			<td><?php echo ($arr['na_ad_time']); ?></td>

			<td>
				<a href="/newmeigui/index.php/Admin/list/deleteAd/id/<?php echo ($arr['na_ad_id']); ?>"><img src="/newmeigui/Public/admin/images/stock_spam.png" title="删除"/></a>&nbsp;&nbsp;
				<a href="/newmeigui/index.php/Admin/list/editPt/id/<?php echo ($arr['na_ad_id']); ?>"><img src="/newmeigui/Public/admin/images/stock_mail_compose.png" title="编辑" /></a>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	<?php if($list == null): ?><tr><td><?php echo ($empty); ?></td></tr><?php endif; ?>
	</table>
	<?php echo ($page); ?>
</body>
</html>