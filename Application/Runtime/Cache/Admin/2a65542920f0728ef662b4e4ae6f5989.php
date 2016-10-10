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
    <script type="text/javascript" src="/newmeigui/Public/admin/js/jquerypicture.js"></script>
    
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
<br>
 <font color="#777777"><strong>请填写管理员资料：</strong></font>
<form action="/newmeigui/index.php/Admin/aA" method="post" class="definewidth m20" enctype="multipart/form-data">
<table class="table table-bordered table-hover m10" style="margin-left:10px;margin-top:3px;">
    
   
   <br>
    <tr>
        <td class="tableleft">用户名</td>
        <td><input type="text" name="na_admin_name"/></td>
        
    </tr>
    <tr>
        <td class="tableleft">登录名</td>
        <td><input type="text" name="na_admin_loginName"/></td>
        
    </tr>
	<tr>
        <td class="tableleft" name="na_admin_type">管理员类型</td>
        <td><select>
            <option value="管理员">普通管理员</option>
            <option value="超级管理员">超级管理员</option>
        </select></td>
    </tr>
    <tr>
        <td class="tableleft">密码</td>
        <td><input type="text" name="na_admin_pwd"/></td>
    </tr>
	
	
</table>
<br>
&nbsp&nbsp<button type="submit" class="btn btn-primary">添加</button>
</form>
 
<script>	
$("#GoodsPicture").change(function(){
	var objUrl = getObjectURL(this.files[0]) ;
	console.log("objUrl = "+objUrl) ;
	if (objUrl) {
		$("#img0").attr("src", objUrl) ;
	}
}) ;

</body>
</html>
<script>
   $(function (){       
		$('#backid').click(function(){
				window.location.href="goodsQuery.html";
		 });
    });
		
</script>