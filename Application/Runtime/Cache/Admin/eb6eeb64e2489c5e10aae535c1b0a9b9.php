<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/admin/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/admin/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/newmeigui/Public/admin/css/style.css" />
    <script type="text/javascript" src="/newmeigui/Public/admin/js/jquery2.js"></script>
    <script type="text/javascript" src="/newmeigui/Public/admin/js/jquery.js"></script>
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

	#progress{
		width:200px;
		height:20px;
		border:1px solid green;
	}
	#bar{
		width:0%;
		height:100%;
		background:green;
	}
	#progress1{
		width:200px;
		height:20px;
		border:1px solid green;
	}
	#bar1{
		width:0%;
		height:100%;
		background:green;
	}
    </style>
    <script type="text/javascript">
    	function selfile ()
    	{
    		var fd = new FormData();
    		var video = document.getElementsByTagName('input')[4].files[0]; 		
    		var demo = video.name;
    		var demo1 = demo.split('.');
    		if (demo1[1]=="MP4"||demo1[1]=="avi"||demo1[1]=="RMVB"||demo1[1]=="WMV"||demo1[1]=="wmv"||demo1[1]=="mp4"||demo1[1]=="rmvb"||demo1[1]=="AVI") 
    			{
    			fd.append('video',video); 
        		var xhr = new XMLHttpRequest();
        		xhr.open('POST',"/newmeigui/index.php/Admin/UploadFiles/videoAdd",true);
        		    xhr.onreadystatechange = function () {
        			 if(4==xhr.readyState&&200==xhr.status){
        				 var data = xhr.responseText;
        				 var dataobj = eval("("+data+")");    				 
        				 alert(dataobj.error);    				 
        				}
        			} 
        		    xhr.upload.onprogress = function(ev){
    	    			if (ev.lengthComputable) {
    	    				var perent = 100*ev.loaded/ev.total;
    	    				document.getElementById('bar').style.width = perent+"%";
    	    				document.getElementById('bar').innerHTML = perent+"%";
    	    			}
    	    		}
        		xhr.send(fd);
    			}
    		else
    			{
    			alert("文件格式不符合标准");
				return false;
    			}
    	}
    </script>
    <script type="text/javascript">
    function selfiles ()
	{
		var fd = new FormData();
		var pic = document.getElementsByTagName('input')[3].files[0];
        var picture = pic.name;
        var demo = picture.split('.');
        if (demo[1]=='png'||demo[1]=='JPG'||demo[1]=='jpg'||demo[1]=='jpeg'||demo[1]=='JPEG'||demo[1]=='gif'||demo[1]=='GIF'||demo[1]=='bmp')
        {
            fd.append('pic',pic);
            var xhr = new XMLHttpRequest();
            xhr.open('POST',"/newmeigui/index.php/Admin/UploadFiles/videoPicAdd",true);
            if(4==xhr.readyState&&200==xhr.status){
                var data = xhr.responseText;
                var dataobj = eval("("+data+")");
                alert(dataobj.error);
            }

            xhr.upload.onprogress = function(ev){
                if (ev.lengthComputable) {
                    var perent = 100*ev.loaded/ev.total;
                    document.getElementById('bar1').style.width = perent+"%";
                    document.getElementById('bar1').innerHTML = perent+"%";
                }
            }
        }else
        {
            alert('文件格式不支持');
            return false;
        }
		xhr.send(fd);
	}
    </script>
    <script type="text/javascript">
    	function check(form){ 
    		if(form.na_ad_name.value==''){
    			alert('请输入视频名称');
    			form.na_ad_name.focus();
    			return false;
    		}
    		if(form.na_ad_daoyan.value==''){
    			alert('请输入导演名称');
    			form.na_ad_daoyan.focus();
    			return false;
    		}
    		if(form.na_ad_actor.value==''){
    			alert('请输入主演名称');
    			form.na_ad_actor.focus();
    			return false;
    		}
    		if(form.na_ad_introduce.value==''){
    			alert('请输入视频简介');
    			form.na_ad_introduce.focus();
    			return false;
    		}
    		if(form.pic.value==''){
    			alert('请选择图片上传');
    			form.pic.focus();
    			return false;
    		}
    		if(form.video.value==''){
    			alert('请选择视频上传');
    			form.video.focus();
    			return false;
    		}
    	}
    </script>
</head>
<body>
<form action="/newmeigui/index.php/Admin/UploadFiles/videoAd" method="post" class="definewidth m20" enctype="multipart/form-data">
<table class="table table-bordered table-hover m10" style="margin-left:10px;margin-top:3px;">
    <tr>
        <td width="10%" class="tableleft">类别</td>
        <td width="20%">
            <select name="na_ad_type">
               <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><option value="<?php echo ($arr['na_adtype_type']); ?>"><?php echo ($arr['na_adtype_type']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>    
            </select>
        </td>
        <td width="10%" class="tableleft">导演</td>
        <td><input type="text" name = "na_ad_daoyan"></td>
        <td></td>
    </tr>
    
   
    <tr>
        <td class="tableleft">视频名称</td>
        <td><input type="text" name="na_ad_name" id = "name"/></td>
        <td width="10%" class="tableleft">主演</td>
        <td><input type="text" name = "na_ad_actor"></td>
        <td width=30%></td>
    </tr>
    <tr>
        <td class="tableleft">所属地区</td>
        <td><select name="na_ad_place">
        	<option value="中国">中国</option>
        	<option value="日韩">日韩</option>
        	<option value="欧美">欧美</option>
        	<option value="其他">其他</option>
        </select></td>
        <td width="10%" class="tableleft">语言</td>
        <td><select name="na_ad_language">
        	<option value="中文">中文</option>
        	<option value="日语">日语</option>
        	<option value="英语">英语</option>
        	<option value="韩语">韩语</option>
        	<option value="其他">其他</option>
        </select></td>
        <td></td>
    <tr>
        <td class="tableleft">视频海报</td>
        <td class="tableleft"  colspan="2"><input type="file" name="pic" onchange="selfiles();" id="upPic" /><td><div style="color:red;font-size:17px">* 允许上传格式为jgp,jpeg,png,bmp,gif</div></td>
    	<td>
        	<div id="progress1">
        		<div id="bar1"></div>
        	</div>
        </td>
    </tr>
	 <tr>
        <td class="tableleft">选择视频</td>
        <td class="tableleft"  colspan="2"><input  type="file" name="video" id="upVideo"  onchange="selfile();" /></td><td><div style="color:red;font-size:17px">* 允许上传格式为mp4,avi,rmvb,wmv</div></td>
        <td>
        	<div id="progress">
        		<div id="bar"></div>
        	</div>
        </td>
	</tr>
    <tr>
        <td class="tableleft">广告年份</td>
        <td colspan="3"><select  name = "na_ad_year">
            <?php $__FOR_START_2066__=$year-16;$__FOR_END_2066__=$year+1;for($i=$__FOR_START_2066__;$i < $__FOR_END_2066__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td class="tableleft">视频简介</td>
        <td colspan="3"><textarea style="width:60%;height:100px" id ="jaj" name = "na_ad_introduce"></textarea></td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <input type="submit" onclick="return check(this.form)" class="btn btn-primary" value="保存"/>
        </td>
    </tr>
</table>
</form>

</body>
</html>