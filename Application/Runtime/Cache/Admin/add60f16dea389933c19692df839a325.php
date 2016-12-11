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
        <th>操作</th>
    </tr>

    </thead>
    <?php if(is_array($pic)): $i = 0; $__LIST__ = $pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><tr>
            <td><img src="/newmeigui/<?php echo ($arr["na_picture_path"]); ?>" alt=""></td>
            <td><?php echo ($arr["na_picture_order"]); ?></td>
            <td><a href="javascript:void(0)"  onclick="$('#w').window('open')">修改</a></td>
            <div id="w" class="easyui-window" title="修改" data-options="modal:true,closed:true,minimizable:false,maximizable:false,collapsible:false" style="width:500px;height:450px;padding:10px;">
                <form  method="post" action="/newmeigui/index.php/Admin/Mu" enctype="multipart/form-data">
                    <label for="img">修改图片：</label> <img id="img" src="<?php echo is_photo($info['na_user_photopath']);?>" />
                    <input type="file" id="pic" onchange=""/><input type="hidden" id="path" name="" >
                    <label for="changetalk">修改图片简介：</label><textarea id="changetalk" name="na_user_intro" name="changetalk"></textarea>
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

</script>