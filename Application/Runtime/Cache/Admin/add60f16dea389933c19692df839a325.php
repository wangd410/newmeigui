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
        td {
            text-align: center;
        }
        td img {
            width: 220px;
            height: 200px;
        }
        th {
            width: 300px;
        }
    </style>
</head>
<body>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th >轮播图片</th>
        <th>图片顺序</th>
        <th>操作</th>

    </tr>

    </thead>
    <?php if(is_array($pic)): $i = 0; $__LIST__ = $pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
            <td><img id="img" src="/newmeigui/<?php echo ($arr["na_picture_path"]); ?>" alt=""></td>
            <td><?php echo ($arr["na_picture_order"]); ?></td>
            <td><a href="javascript:void(0)" onclick="$('.easyui-window').eq($(this).attr('data-index')-1).window('open');"  data-index="<?php echo ($arr["na_picture_order"]); ?>">修改</a></td>
            <div id="w<?php echo ($arr["na_adtype_order"]); ?>" class="easyui-window" title="修改" data-options="modal:true,closed:true,minimizable:false,maximizable:false,collapsible:false" style="width:500px;height:450px;padding:10px;top:26%;left:40%;">
                <form  method="post" action="/newmeigui/index.php/Admin/ou" enctype="multipart/form-data">
                    <input type="text" id="order<?php echo ($arr["na_picture_order"]); ?>" name = "na_picture_order" value="<?php echo ($arr["na_picture_order"]); ?>"/>
                    <input type="hidden" name = "na_picture_type" value="评论"/>
<<<<<<< HEAD
                    <label for="img">修改图片：</label> <img id="img1<?php echo ($arr["na_picture_order"]); ?>" src="/newmeigui/<?php echo ($arr["na_picture_path"]); ?>" />
                    <input type="file" id="pic<?php echo ($arr["na_picture_order"]); ?>" onchange="pic_up(<?php echo ($arr["na_picture_order"]); ?>);"/><input type="hidden" id="path<?php echo ($arr["na_picture_order"]); ?>" name="na_picture_path" value="" >
=======
                    <label for="img">修改图片：</label> <img class="img1" src="/newmeigui/<?php echo ($arr["na_picture_path"]); ?>" />
                    <input type="file" class="pic" onchange="pic_up($(this));" data-index="<?php echo ($arr["na_picture_order"]); ?>"/><input type="hidden" class="path" name="na_picture_path" value="" >
>>>>>>> cb105d21d39231a56ef00f89d7eaa67321d84056
                    <br/>
                    <label><input type="submit" value="修改"></label>
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

<<<<<<< HEAD
    function pic_up(id) {
        var fd = new FormData();
        var pic = document.getElementById("pic"+id).files[0];
=======
    function pic_up(index_a) {
        var fd = new FormData();
        var index = index_a.attr('data-index');
       // alert(index);
        var pic = document.getElementsByClassName('pic')[index].getAttribute("data-index");
        alert(pic);
>>>>>>> cb105d21d39231a56ef00f89d7eaa67321d84056
        fd.append('pic', pic);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', "/newmeigui/index.php/Admin/POrder/upload_pic", true);
        xhr.send(fd);
        xhr.onreadystatechange = function () {
            if (4 == xhr.readyState && 200 == xhr.status) {
                var data = xhr.responseText;
                var dataobj = eval("(" + data + ")");
<<<<<<< HEAD
                document.getElementById('path'+id).value=dataobj.path;
                document.getElementById('img1'+id).src="/newmeigui/"+dataobj.path;
=======
                //document.getElementById('path').value=dataobj.path;
                document.getElementsByClassName('path')[index].value=dataobj.path;
                alert(document.getElementsByClassName('path')[index].value);
                document.getElementsByClassName('img1')[index].src="/newmeigui/"+dataobj.path;
                // document.getElementById('img1').src="/newmeigui/"+dataobj.path;
>>>>>>> cb105d21d39231a56ef00f89d7eaa67321d84056
                alert(dataobj.message);
            }
        }
    }
</script>