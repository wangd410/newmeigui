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
        <input type="hidden" name="na_adtype_photo" id="img2" value=""/>
        <input type="file" id="pic" onchange="pic_up();"/><br /><br />
        成立时间：<input class="easyui-datebox" name="na_adtype_creatt" placeholder="请输入成立时间"><br /><br/>
        国&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;家：
        <select  name="na_adtype_country" id="country">
            <option value="AL">阿尔巴尼亚</option>
            <option value="DZ">阿尔及利亚</option>
            <option value="AF">阿富汗</option>
            <option value="AR">阿根廷</option>
            <option value="AE">阿拉伯联合酋长国</option>
            <option value="AW">阿鲁巴</option>
            <option value="OM">阿曼</option>
            <option value="AZ">阿塞拜疆</option>
            <option value="EG">埃及</option>
            <option value="ET">埃塞俄比亚</option>
            <option value="IE">爱尔兰</option>
            <option value="EE">爱沙尼亚</option>
            <option value="AD">安道尔</option>
            <option value="AO">安哥拉</option>
            <option value="AI">安圭拉岛</option>
            <option value="AG">安提瓜和巴布达</option>
            <option value="AT">奥地利</option>
            <option value="AX">奥兰岛</option>
            <option value="AU">澳大利亚</option>
            <option value="MO">澳门特别行政区</option>
            <option value="BB">巴巴多斯</option>
            <option value="PG">巴布亚新几内亚</option>
            <option value="BS">巴哈马</option>
            <option value="PK">巴基斯坦</option>
            <option value="PY">巴拉圭</option>
            <option value="PS">巴勒斯坦民族权力机构</option>
            <option value="BH">巴林</option>
            <option value="PA">巴拿马</option>
            <option value="BR">巴西</option>
            <option value="BY">白俄罗斯</option>
            <option value="BM">百慕大群岛</option>
            <option value="BG">保加利亚</option>
            <option value="MP">北马里亚纳群岛</option>
            <option value="BJ">贝宁</option>
            <option value="BE">比利时</option>
            <option value="IS">冰岛</option>
            <option value="PR">波多黎各</option>
            <option value="PL">波兰</option>
            <option value="BA">波斯尼亚和黑塞哥维那</option>
            <option value="BO">玻利维亚</option>
            <option value="BZ">伯利兹</option>
            <option value="BW">博茨瓦纳</option>
            <option value="BQ">博内尔</option>
            <option value="BT">不丹</option>
            <option value="BF">布基纳法索</option>
            <option value="BI">布隆迪</option>
            <option value="BV">布韦岛</option>
            <option value="KP">朝鲜</option>
            <option value="GQ">赤道几内亚</option>
            <option value="DK">丹麦</option>
            <option value="DE">德国</option>
            <option value="TL">东帝汶</option>
            <option value="TG">多哥</option>
            <option value="DO">多米尼加共和国</option>
            <option value="DM">多米尼克</option>
            <option value="RU">俄罗斯</option>
            <option value="EC">厄瓜多尔</option>
            <option value="ER">厄立特里亚</option>
            <option value="FR">法国</option>
            <option value="FO">法罗群岛</option>
            <option value="PF">法属波利尼西亚</option>
            <option value="GF">法属圭亚那</option>
            <option value="TF">法属南极地区</option>
            <option value="VA">梵蒂冈城</option>
            <option value="PH">菲律宾</option>
            <option value="FJ">斐济群岛</option>
            <option value="FI">芬兰</option>
            <option value="CV">佛得角</option>
            <option value="FK">福克兰群岛(马尔维纳斯群岛)</option>
            <option value="GM">冈比亚</option>
            <option value="CD">刚果(DRC)</option>
            <option value="CG">刚果共和国</option>
            <option value="CO">哥伦比亚</option>
            <option value="CR">哥斯达黎加</option>
            <option value="GG">格恩西岛</option>
            <option value="GD">格林纳达</option>
            <option value="GL">格陵兰</option>
            <option value="GE">格鲁吉亚</option>
            <option value="CU">古巴</option>
            <option value="GP">瓜德罗普岛</option>
            <option value="GU">关岛</option>
            <option value="GY">圭亚那</option>
            <option value="KZ">哈萨克斯坦</option>
            <option value="HT">海地</option>
            <option value="KR">韩国</option>
            <option value="NL">荷兰</option>
            <option value="HM">赫德和麦克唐纳群岛</option>
            <option value="ME">黑山共和国</option>
            <option value="HN">洪都拉斯</option>
            <option value="KI">基里巴斯</option>
            <option value="DJ">吉布提</option>
            <option value="KG">吉尔吉斯斯坦</option>
            <option value="GN">几内亚</option>
            <option value="GW">几内亚比绍</option>
            <option value="CA">加拿大</option>
            <option value="GH">加纳</option>
            <option value="GA">加蓬</option>
            <option value="KH">柬埔寨</option>
            <option value="CZ">捷克共和国</option>
            <option value="ZW">津巴布韦</option>
            <option value="CM">喀麦隆</option>
            <option value="QA">卡塔尔</option>
            <option value="KY">开曼群岛</option>
            <option value="CC">科科斯群岛(基灵群岛)</option>
            <option value="KM">科摩罗联盟</option>
            <option value="CI">科特迪瓦共和国</option>
            <option value="KW">科威特</option>
            <option value="HR">克罗地亚</option>
            <option value="KE">肯尼亚</option>
            <option value="CK">库可群岛</option>
            <option value="CW">库拉索</option>
            <option value="LV">拉脱维亚</option>
            <option value="LS">莱索托</option>
            <option value="LA">老挝</option>
            <option value="LB">黎巴嫩</option>
            <option value="LT">立陶宛</option>
            <option value="LR">利比里亚</option>
            <option value="LY">利比亚</option>
            <option value="LI">列支敦士登</option>
            <option value="RE">留尼汪岛</option>
            <option value="LU">卢森堡</option>
            <option value="RW">卢旺达</option>
            <option value="RO">罗马尼亚</option>
            <option value="MG">马达加斯加</option>
            <option value="IM">马恩岛</option>
            <option value="MV">马尔代夫</option>
            <option value="MT">马耳他</option>
            <option value="MW">马拉维</option>
            <option value="MY">马来西亚</option>
            <option value="ML">马里</option>
            <option value="MK">马其顿, 前南斯拉夫共和国</option>
            <option value="MH">马绍尔群岛</option>
            <option value="MQ">马提尼克岛</option>
            <option value="YT">马约特岛</option>
            <option value="MU">毛里求斯</option>
            <option value="MR">毛利塔尼亚</option>
            <option value="US">美国</option>
            <option value="AS">美属萨摩亚</option>
            <option value="UM">美属外岛</option>
            <option value="VI">美属维尔京群岛</option>
            <option value="MN">蒙古</option>
            <option value="MS">蒙特塞拉特</option>
            <option value="BD">孟加拉国</option>
            <option value="PE">秘鲁</option>
            <option value="FM">密克罗尼西亚</option>
            <option value="MM">缅甸</option>
            <option value="MD">摩尔多瓦</option>
            <option value="MA">摩洛哥</option>
            <option value="MC">摩纳哥</option>
            <option value="MZ">莫桑比克</option>
            <option value="MX">墨西哥</option>
            <option value="NA">纳米比亚</option>
            <option value="ZA">南非</option>
            <option value="AQ">南极洲</option>
            <option value="GS">南乔治亚和南德桑威奇群岛</option>
            <option value="NR">瑙鲁</option>
            <option value="NP">尼泊尔</option>
            <option value="NI">尼加拉瓜</option>
            <option value="NE">尼日尔</option>
            <option value="NG">尼日利亚</option>
            <option value="NU">纽埃</option>
            <option value="NO">挪威</option>
            <option value="NF">诺福克岛</option>
            <option value="PW">帕劳群岛</option>
            <option value="PN">皮特凯恩群岛</option>
            <option value="PT">葡萄牙</option>
            <option value="JP">日本</option>
            <option value="SE">瑞典</option>
            <option value="CH">瑞士</option>
            <option value="SV">萨尔瓦多</option>
            <option value="WS">萨摩亚</option>
            <option value="RS">塞尔维亚共和国</option>
            <option value="SL">塞拉利昂</option>
            <option value="SN">塞内加尔</option>
            <option value="CY">塞浦路斯</option>
            <option value="SC">塞舌尔</option>
            <option value="XS">沙巴岛</option>
            <option value="SA">沙特阿拉伯</option>
            <option value="BL">圣巴泰勒米岛</option>
            <option value="CX">圣诞岛</option>
            <option value="ST">圣多美和普林西比</option>
            <option value="SH">圣赫勒拿岛</option>
            <option value="KN">圣基茨和尼维斯</option>
            <option value="LC">圣卢西亚</option>
            <option value="MF">法属圣马丁岛</option>
            <option value="SX">荷属圣马丁岛</option>
            <option value="SM">圣马力诺</option>
            <option value="PM">圣皮埃尔岛和密克隆岛</option>
            <option value="VC">圣文森特和格林纳丁斯</option>
            <option value="XE">圣尤斯特歇斯岛</option>
            <option value="LK">斯里兰卡</option>
            <option value="SK">斯洛伐克</option>
            <option value="SI">斯洛文尼亚</option>
            <option value="SZ">斯威士兰</option>
            <option value="SD">苏丹</option>
            <option value="SR">苏里南</option>
            <option value="SB">所罗门群岛</option>
            <option value="SO">索马里</option>
            <option value="TJ">塔吉克斯坦</option>
            <option value="TW">台湾</option>
            <option value="TH">泰国</option>
            <option value="TZ">坦桑尼亚</option>
            <option value="TO">汤加</option>
            <option value="TC">特克斯和凯科斯群岛</option>
            <option value="TT">特立尼达和多巴哥</option>
            <option value="TN">突尼斯</option>
            <option value="TV">图瓦卢</option>
            <option value="TR">土耳其</option>
            <option value="TM">土库曼斯坦</option>
            <option value="TK">托克劳</option>
            <option value="WF">瓦利斯和富图纳</option>
            <option value="VU">瓦努阿图</option>
            <option value="GT">危地马拉</option>
            <option value="VG">维尔京群岛(英属)</option>
            <option value="VE">委内瑞拉</option>
            <option value="BN">文莱</option>
            <option value="UG">乌干达</option>
            <option value="UA">乌克兰</option>
            <option value="UY">乌拉圭</option>
            <option value="UZ">乌兹别克斯坦</option>
            <option value="ES">西班牙</option>
            <option value="GR">希腊</option>
            <option value="HK">香港特别行政区</option>
            <option value="SG">新加坡</option>
            <option value="NC">新喀里多尼亚</option>
            <option value="NZ">新西兰</option>
            <option value="HU">匈牙利</option>
            <option value="SY">叙利亚</option>
            <option value="JM">牙买加</option>
            <option value="AM">亚美尼亚</option>
            <option value="SJ">扬马延岛</option>
            <option value="YE">也门</option>
            <option value="IQ">伊拉克</option>
            <option value="IR">伊朗</option>
            <option value="IL">以色列</option>
            <option value="IT">意大利</option>
            <option value="IN">印度</option>
            <option value="ID">印度尼西亚</option>
            <option value="UK">英国</option>
            <option value="IO">英属印度洋领地</option>
            <option value="JO">约旦</option>
            <option value="VN">越南</option>
            <option value="ZM">赞比亚</option>
            <option value="JE">泽西</option>
            <option value="TD">乍得</option>
            <option value="GI">直布罗陀</option>
            <option value="CL">智利</option>
            <option value="CF">中非共和国</option>
            <option value="CN">中国</option>
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
</script>
</body>
</html>