<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>登陆</title>

<link rel="stylesheet" type="text/css" href="/newmeigui/Public/admin/css/styles.css">


</head>
<body>


<div class="wrapper">

	<div class="container">
		<h1>后台管理系统</h1>
		<form class="form" action="/newmeigui/index.php/Admin/u" method="post">
			<input type="text" name="loginname"  placeholder="Username">
			<input type="password" name="password" placeholder="Password"><br>
			<button type="submit" id="login-button" onclick="window.location.href='index.html';"><strong>登陆</strong></button>
			
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		
	</ul>
	
</div>



</body>
</html>