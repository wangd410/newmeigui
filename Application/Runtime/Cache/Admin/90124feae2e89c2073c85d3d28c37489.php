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
    <script type="text/javascript" charset="utf-8" src="/newmeigui/Public/ueditor/ueditor.config.js">
    </script>
    <script type="text/javascript" charset="utf-8" src="/newmeigui/Public/ueditor/ueditor.all.min.js">
    </script>
    <script type="text/javascript" charset="utf-8" src="/newmeigui/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript" charset="utf-8" src="/newmeigui/Public/ueditor/ueditor.js"></script>
    <style type="text/css">
        body {font-size: 20px;
            padding-bottom: 20px;
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
 <font color="#777777"><strong>请填写图文广告资料：</strong></font>
<form action="/newmeigui/index.php/Admin/UploadFiles/addPt" method="post" class="definewidth m20" enctype="multipart/form-data">
<table class="table table-bordered table-hover m10" style="margin-left:10px;margin-top:1px;font-size:15px">
    <tr>
        <td class="tableleft">标题/年份</td>
        <td><input type="text" name="na_ad_name"/>&nbsp;&nbsp;
            <input type="text" name="na_ad_year"/>
        </td>
        
    </tr>
	<tr>
        <td class="tableleft">广告类型/地区</td>
        <td><select name="na_ad_type">
        <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><option value="<?php echo ($arr['na_adtype_type']); ?>"><?php echo ($arr['na_adtype_type']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <select name="na_ad_place">
            <option value="中国">中国</option>
            <option value="日韩">日韩</option>
            <option value="欧美">欧美</option>
            <option value="其他">其他</option>
        </select>
        </td>
    </tr>
    <tr>
        <td class="tableleft">封面图片</td>
        <td><input type="file" name="pic"/></td>
    </tr>	
</table>
	</div>
            <textarea id="editor" name="na_ad_content"></textarea>
		<div>
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