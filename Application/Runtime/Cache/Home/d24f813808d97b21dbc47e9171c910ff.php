<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/newmeigui/Public/front/image/clogo.png" type="image/x-icon"/>
    <title>玫鲑</title>
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/front/css/register.css">
    <script type="text/javascript" src="/newmeigui/Public/front/js/jquery.js"></script>
    <script type="text/javascript" src="/newmeigui/Public/front/js/homePage.js"></script>
    <script type="text/javascript" src="/newmeigui/Public/front/js/check.js"></script>
    <style>
        * {
            font-family: "Microsoft YaHei";
        }
    </style>
</head>
<body>
<div id="wrap">
    <div id="wrapTop">
        <a href="/newmeigui"><img src="/newmeigui/Public/front/image/logo.png"></a>
    </div>
    <div id="homeMain">
        <div class="home">
            <div class="info">
                <form action="/newmeigui/index.php/Home/Login/res_check" method="post">
                    <p>　　昵称<input type="text" class="inp" name="na_user_name" id="usernameq" ></p><span id="diva"></span>
                    <p>　　用户名<input type="text" class="inp" name="na_user_loginName" id="usernameq_a" ></p><span id="dive"></span>
                    <p>　邮箱地址<input type="text" class="inp" name="na_user_email" id="phonqe"></p><span id="divb"></span>
                    <p>　　密码<input type="password" class="inp" name="na_user_pwd" id="passwoqrd"></p><span id="divc"></span>
                    <p>确认密码<input type="password" class="inp" name="na_user_pwd1" id="passwordaqgain"></p><span id="divd"></span>
                    <p>　验证码<input type="text" class="inp validate" name="verify">
                    <img  style="height:30px; width:80px; vertical-align:bottom;" src="<?php echo U('Login/verify_c',array());?>" title="点击刷新" onclick='this.src=this.src+"?c="+Math.random()'>
                    </p>
                    <p><input type="submit" value='注册' class="reg" onclick="return check(this.form);"></p>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function check(form) {
        var diva = document.getElementById("diva");
        var divb = document.getElementById("divb");
        var divc = document.getElementById("divc");
        var divd = document.getElementById("divd");

        var phoneRegExp = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
        if (form.na_user_name.value=="") {
            diva.innerHTML = "请输入姓名";
            form.na_user_name.focus();
            return false;
        }

        if (form.na_user_loginName.value=="") {
            divb.innerHTML = "请输入邮箱地址";
            form.na_user_loginName.focus();
            return false;
        }
        if (form.na_user_pwd.value=="") {
            divd.innerHTML = "请输入姓名";
            form.na_user_pwd.focus();
            return false;
        }
        if (form.na_user_pwd1.value=="") {
            divd.innerHTML = "请输确认密码";
            form.na_user_pwd1.focus();
            return false;
        }

        if(phoneRegExp.test(form.na_user_loginName.value)) {
            if((form.na_user_pwd.value)!=(form.na_user_pwd1.value)) {
                divd.innerHTML = "两次密码不一致";
                return false;
            }
        } else if(phoneRegExp.test(form.na_user_loginName.value)){
            div.innerHTML = "请输确认密码";
            form.na_user_loginName.focus();
            return false;
        } else {
                return true;
        }
    }

    $(function () {
        $("form span").unbind();
    })
</script>
</body>
</html>