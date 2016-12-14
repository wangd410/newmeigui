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
        .datebox .combo-arrow {
            background-image: url("/newmeigui/Public/front/css/icons/datebox_arrow.png");
            background-position: center center;
        }
        textarea {
            resize: none;
        }
        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }
        #img {
            width: 150px;
            height:150px;
        }
    </style>
</head>
<body><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font color="#777777"><strong>添加品牌：</strong></font>
<form action="/newmeigui/index.php/Admin/ta" method="post" class="definewidth m20" enctype="multipart/form-data">
    <table style="margin-left:10px;margin-top:3px;text-align:right;">
        品牌名称：<input type="text" name="na_adtype_type" placeholder="请输入品牌名称"><br />
        品牌图标：</label> <img id="img" src="" />
        <input type="hidden" name="na_adtype_photo" id="img2" value="">
        <input type="file" id="pic" onchange="pic_up();"/><br /><br />
        成立时间：<input class="easyui-datebox" name="na_adtype_creatt" placeholder="请输入成立时间"><br /><br/>
        国&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;家：
        <select  name="na_adtype_country" id="country">
            <option value="">阿尔巴尼亚</option>
            <option value="">阿尔及利亚</option>
            <option value="">阿富汗</option>
            <option value="">阿根廷</option>
            <option value="">阿拉伯联合酋长国</option>
            <option value="">阿鲁巴</option>
            <option value="">阿曼</option>
            <option value="">阿塞拜疆</option>
            <option value="">埃及</option>
            <option value="">埃塞俄比亚</option>
            <option value="">爱尔兰</option>
            <option value="">爱沙尼亚</option>
            <option value="">安道尔</option>
            <option value="">安哥拉</option>
            <option value="">安圭拉岛</option>
            <option value="">安提瓜和巴布达</option>
            <option value="">奥地利</option>
            <option value="">奥兰岛</option>
            <option value="">澳大利亚</option>
            <option value="">澳门特别行政区</option>
            <option value="">巴巴多斯</option>
            <option value="">巴布亚新几内亚</option>
            <option value="">巴哈马</option>
            <option value="">巴基斯坦</option>
            <option value="">巴拉圭</option>
            <option value="">巴勒斯坦民族权力机构</option>
            <option value="">巴林</option>
            <option value="">巴拿马</option>
            <option value="">巴西</option>
            <option value="">白俄罗斯</option>
            <option value="">百慕大群岛</option>
            <option value="">保加利亚</option>
            <option value="">北马里亚纳群岛</option>
            <option value="">贝宁</option>
            <option value="">比利时</option>
            <option value="">冰岛</option>
            <option value="">波多黎各</option>
            <option value="">波兰</option>
            <option value="">波斯尼亚和黑塞哥维那</option>
            <option value="">玻利维亚</option>
            <option value="">伯利兹</option>
            <option value="">博茨瓦纳</option>
            <option value="">博内尔</option>
            <option value="">不丹</option>
            <option value="">布基纳法索</option>
            <option value="">布隆迪</option>
            <option value="">布韦岛</option>
            <option value="">朝鲜</option>
            <option value="">赤道几内亚</option>
            <option value="">丹麦</option>
            <option value="">德国</option>
            <option value="">东帝汶</option>
            <option value="">多哥</option>
            <option value="">多米尼加共和国</option>
            <option value="">多米尼克</option>
            <option value="">俄罗斯</option>
            <option value="">厄瓜多尔</option>
            <option value="">厄立特里亚</option>
            <option value="">法国</option>
            <option value="">法罗群岛</option>
            <option value="">法属波利尼西亚</option>
            <option value="">法属圭亚那</option>
            <option value="">法属南极地区</option>
            <option value="">梵蒂冈城</option>
            <option value="">菲律宾</option>
            <option value="">斐济群岛</option>
            <option value="">芬兰</option>
            <option value="">佛得角</option>
            <option value="">福克兰群岛(马尔维纳斯群岛)</option>
            <option value="">冈比亚</option>
            <option value="">刚果(DRC)</option>
            <option value="">刚果共和国</option>
            <option value="">哥伦比亚</option>
            <option value="">哥斯达黎加</option>
            <option value="">格恩西岛</option>
            <option value="">格林纳达</option>
            <option value="">格陵兰</option>
            <option value="">格鲁吉亚</option>
            <option value="">古巴</option>
            <option value="">瓜德罗普岛</option>
            <option value="">关岛</option>
            <option value="">圭亚那</option>
            <option value="">哈萨克斯坦</option>
            <option value="">海地</option>
            <option value="">韩国</option>
            <option value="">荷兰</option>
            <option value="">赫德和麦克唐纳群岛</option>
            <option value="">黑山共和国</option>
            <option value="">洪都拉斯</option>
            <option value="">基里巴斯</option>
            <option value="">吉布提</option>
            <option value="">吉尔吉斯斯坦</option>
            <option value="">几内亚</option>
            <option value="">几内亚比绍</option>
            <option value="">加拿大</option>
            <option value="">加纳</option>
            <option value="">加蓬</option>
            <option value="">柬埔寨</option>
            <option value="">捷克共和国</option>
            <option value="">津巴布韦</option>
            <option value="">喀麦隆</option>
            <option value="">卡塔尔</option>
            <option value="">开曼群岛</option>
            <option value="">科科斯群岛(基灵群岛)</option>
            <option value="">科摩罗联盟</option>
            <option value="">科特迪瓦共和国</option>
            <option value="">科威特</option>
            <option value="">克罗地亚</option>
            <option value="">肯尼亚</option>
            <option value="">库可群岛</option>
            <option value="">库拉索</option>
            <option value="">拉脱维亚</option>
            <option value="">莱索托</option>
            <option value="">老挝</option>
            <option value="">黎巴嫩</option>
            <option value="">立陶宛</option>
            <option value="">利比里亚</option>
            <option value="">利比亚</option>
            <option value="">列支敦士登</option>
            <option value="">留尼汪岛</option>
            <option value="">卢森堡</option>
            <option value="">卢旺达</option>
            <option value="">罗马尼亚</option>
            <option value="">马达加斯加</option>
            <option value="">马恩岛</option>
            <option value="">马尔代夫</option>
            <option value="">马耳他</option>
            <option value="">马拉维</option>
            <option value="">马来西亚</option>
            <option value="">马里</option>
            <option value="">马其顿, 前南斯拉夫共和国</option>
            <option value="">马绍尔群岛</option>
            <option value="">马提尼克岛</option>
            <option value="">马约特岛</option>
            <option value="">毛里求斯</option>
            <option value="">毛利塔尼亚</option>
            <option value="">美国</option>
            <option value="">美属萨摩亚</option>
            <option value="">美属外岛</option>
            <option value="">美属维尔京群岛</option>
            <option value="">蒙古</option>
            <option value="">蒙特塞拉特</option>
            <option value="">孟加拉国</option>
            <option value="">秘鲁</option>
            <option value="">密克罗尼西亚</option>
            <option value="">缅甸</option>
            <option value="">摩尔多瓦</option>
            <option value="">摩洛哥</option>
            <option value="">摩纳哥</option>
            <option value="">莫桑比克</option>
            <option value="">墨西哥</option>
            <option value="">纳米比亚</option>
            <option value="">南非</option>
            <option value="">南极洲</option>
            <option value="">南乔治亚和南德桑威奇群岛</option>
            <option value="">瑙鲁</option>
            <option value="">尼泊尔</option>
            <option value="">尼加拉瓜</option>
            <option value="">尼日尔</option>
            <option value="">尼日利亚</option>
            <option value="">纽埃</option>
            <option value="">挪威</option>
            <option value="">诺福克岛</option>
            <option value="">帕劳群岛</option>
            <option value="">皮特凯恩群岛</option>
            <option value="">葡萄牙</option>
            <option value="">日本</option>
            <option value="">瑞典</option>
            <option value="">瑞士</option>
            <option value="">萨尔瓦多</option>
            <option value="">萨摩亚</option>
            <option value="">塞尔维亚共和国</option>
            <option value="">塞拉利昂</option>
            <option value="">塞内加尔</option>
            <option value="">塞浦路斯</option>
            <option value="">塞舌尔</option>
            <option value="">沙巴岛</option>
            <option value="">沙特阿拉伯</option>
            <option value="">圣巴泰勒米岛</option>
            <option value="">圣诞岛</option>
            <option value="">圣多美和普林西比</option>
            <option value="">圣赫勒拿岛</option>
            <option value="">圣基茨和尼维斯</option>
            <option value="">圣卢西亚</option>
            <option value="">法属圣马丁岛</option>
            <option value="">荷属圣马丁岛</option>
            <option value="">圣马力诺</option>
            <option value="">圣皮埃尔岛和密克隆岛</option>
            <option value="">圣文森特和格林纳丁斯</option>
            <option value="">圣尤斯特歇斯岛</option>
            <option value="">斯里兰卡</option>
            <option value="">斯洛伐克</option>
            <option value="">斯洛文尼亚</option>
            <option value="">斯威士兰</option>
            <option value="">苏丹</option>
            <option value="">苏里南</option>
            <option value="">所罗门群岛</option>
            <option value="">索马里</option>
            <option value="">塔吉克斯坦</option>
            <option value="">台湾</option>
            <option value="">泰国</option>
            <option value="">坦桑尼亚</option>
            <option value="">汤加</option>
            <option value="">特克斯和凯科斯群岛</option>
            <option value="">特立尼达和多巴哥</option>
            <option value="">突尼斯</option>
            <option value="">图瓦卢</option>
            <option value="">土耳其</option>
            <option value="">土库曼斯坦</option>
            <option value="">托克劳</option>
            <option value="">瓦利斯和富图纳</option>
            <option value="">瓦努阿图</option>
            <option value="">危地马拉</option>
            <option value="">维尔京群岛(英属)</option>
            <option value="">委内瑞拉</option>
            <option value="">文莱</option>
            <option value="">乌干达</option>
            <option value="">乌克兰</option>
            <option value="">乌拉圭</option>
            <option value="">乌兹别克斯坦</option>
            <option value="">西班牙</option>
            <option value="">希腊</option>
            <option value="">香港特别行政区</option>
            <option value="">新加坡</option>
            <option value="">新喀里多尼亚</option>
            <option value="">新西兰</option>
            <option value="">匈牙利</option>
            <option value="">叙利亚</option>
            <option value="">牙买加</option>
            <option value="">亚美尼亚</option>
            <option value="">扬马延岛</option>
            <option value="">也门</option>
            <option value="">伊拉克</option>
            <option value="">伊朗</option>
            <option value="">以色列</option>
            <option value="">意大利</option>
            <option value="">印度</option>
            <option value="">印度尼西亚</option>
            <option value="">英国</option>
            <option value="">英属印度洋领地</option>
            <option value="">约旦</option>
            <option value="">越南</option>
            <option value="">赞比亚</option>
            <option value="">泽西</option>
            <option value="">乍得</option>
            <option value="">直布罗陀</option>
            <option value="">智利</option>
            <option value="">中非共和国</option>
            <option value="">中国</option>
        </select><br />
        代&nbsp;言&nbsp;&nbsp;人：<input type="text" name="na_adtype_looker" placeholder="请输入代言人"><br />
        官方网址：<input type="text" name="na_adtype_url" placeholder="请输入官方网址"><br />
        简&nbsp;&nbsp;介：<textarea name="na_adtype_intro"></textarea><br />
        <button style="margin-left:5px;"type="submit" class="btn btn-primary" type="button">保存</button>
    </table>
</form>
<script>
function pic_up() {
    var fd = new FormData();
    var pic = document.getElementById('pic').files[0];
    fd.append('pic', pic);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "/newmeigui/index.php/Admin/Adtype/up_pic", true);
    xhr.send(fd);
    xhr.onreadystatechange = function () {
        if (4 == xhr.readyState && 200 == xhr.status) {
            var data = xhr.responseText;
            var dataobj = eval("(" + data + ")");
            document.getElementById('img2').value=dataobj.path;
            document.getElementById('img').src="/newmeigui/"+dataobj.path;
            alert(dataobj.message);
        }
    }
}

var options = document.getElementsByTagName("option");
for (var i = options.length - 1; i >= 0; i--) {
    var value = options[i].innerHTML;
    options[i].setAttribute("value",value);
}
</script>
</body>
</html>