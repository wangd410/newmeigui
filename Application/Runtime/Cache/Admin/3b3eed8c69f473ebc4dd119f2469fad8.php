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
    <!-- 引入EasyUI -->
    <script type="text/javascript" src="/newmeigui/Public/front/js/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="/newmeigui/Public/front/js/easyui-lang-zh_CN.js"></script>
    <link rel="stylesheet" href="/newmeigui/Public/front/css/easyui.css" type="text/css"/>
    <link rel="stylesheet" href="/newmeigui/Public/front/css/icon.css" type="text/css"/>
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
        <th>轮播图片</th>
        <th>图片顺序</th>
        <th>图片简介</th>
        <th>操作</th>
    </tr>

    </thead>
            <?php if(is_array($pic)): $i = 0; $__LIST__ = $pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
                <td><img src="/newmeigui/<?php echo ($arr["na_picture_path"]); ?>" alt=""></td>
                <td><?php echo ($arr["na_picture_order"]); ?></td>
                <td><?php echo ($arr["na_picture_intro"]); ?></td>
                <td><a href="javascript:void(0)"  onclick="$('#w').window('open')">修改</a></td>
                <div id="w" class="easyui-window" title="修改" data-options="modal:true,closed:true,minimizable:false,maximizable:false,collapsible:false" style="width:500px;height:450px;padding:10px;">
                    <form  method="post" action="/newmeigui/index.php/Admin/Mu" enctype="multipart/form-data">
                        <label for="img">修改头像：</label> <img id="img" src="<?php echo is_photo($info['na_user_photopath']);?>" />
                        <input type="file" id="pic" onchange="up_pic();"/><input type="hidden" id="path" name="na_user_photoPath" >
                        <label for="changename">修改用户名：</label><input name="na_user_name" id="changename"  type="text" value="<?php echo ($info['na_user_name']); ?>" placeholder="名字不超过六个字符"/>
                        <label for="changetalk">修改个性签名：</label><textarea id="changetalk" name="na_user_intro" name="changetalk"  placeholder="个性签名不超过二十个字符"></textarea>
                        <label for="ifshow">是否要显示个人邮箱：<input type="radio" name="ifshow" value="0">否<input type="radio" name="ifshow" value="1">是</label>
                        <label><input type="submit" value="修改" onclick="return check(this.form);"></label>
                    </form>
                </div>
 
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</body>
</html>
<script>
    $(function () {


        $('#addnew').click(function(){

            window.location.href="goodsAdd.html";
        });


    });
    function up_pic() {
        var fd = new FormData();
        var pic = document.getElementById('pic').files[0];
        fd.append('pic', pic);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', "/newmeigui/index.php/Admin/MyInfo/up_pic", true);
        xhr.send(fd);
        xhr.onreadystatechange = function () {
            if (4 == xhr.readyState && 200 == xhr.status) {
                var data = xhr.responseText;
                var dataobj = eval("(" + data + ")");
                document.getElementById('path').value=dataobj.path;
                document.getElementById('img').src="/newmeigui/"+dataobj.path;
                alert(dataobj.message);
            }
        }
    }
</script>