<html>
<head>
<meta charset="gb2312">
<title>��ֵ����</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon-precomposed" href="css/appIcon.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<link href="css/style.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
</head>
<body class="Skin_mm">
<header id="innerHeader" class="header" style="display: block;"><a href="javascript:;" onclick='location.href="/dx.php"'></a>
<h1>��ֵ����</h1>
</header>
<div class="content" id="content">
<div class="payPage">
<div class="vipimg">
<img src="css/vip.jpg" alt="">
</div>
<div class="vipText">
��ͨVIP��Ա�������ͷ����ڵĺ��֮����
</div><div style="display:none">
</div>
<ul class="chooseList" id="payChooseList">

<li class="typeList type1002" onClick="pay('/zhifu/zhifu3.html','/zhifu/zhifu3.html')" ><label class="typePos"><span class="inputWrap">
<label   for="radio_jd" onClick="pay('/zhifu/zhifu3.html','/zhifu/zhifu3.html')" class="grayRadio " ></label>
</span>
<h4>1V1˽��</h4>
<span class="typeGray">������һ��һ����˽��</span></label>
<div class="price">45��<?php echo $zhifu[daxiu2]?>
</div>
</li>

<li class="typeList type1002" onClick="pay('/zhifu/zhifu2.html','/zhifu/zhifu2.html')" ><label class="typePos"><span class="inputWrap">
<label   for="radio_jd" onClick="pay('/zhifu/zhifu2.html','/zhifu/zhifu2.html')" class="grayRadio " ></label>
</span>
<h4>����Ʊ</h4>
<span class="typeGray">�������俴���뿴��һ��</span></label>
<div class="price">15��<?php echo $zhifu[daxiu2]?>
</div>
</li>

<li class="typeList type1002" onClick="pay('/zhifu/zhifu1.html','/zhifu/zhifu1.html')" ><label class="typePos"><span class="inputWrap">
<label   for="radio_jd" onClick="pay('/zhifu/zhifu1.html','/zhifu/zhifu1.html')" class="grayRadio " ></label>
</span>
<h4>������Ʊ</h4>
<span class="typeGray">����Ȩ���뿪���ķ���</span></label>
<div class="price">58��<?php echo $zhifu[daxiu2]?>
</div>
</li>

<li class="typeList type1002" onClick="pay('/zhifu/zhifu.html','/zhifu/zhifu.html')" ><label class="typePos"><span class="inputWrap">
<label   for="radio_jd" onClick="pay('/zhifu/zhifu.html','/zhifu/zhifu.html')" class="grayRadio checked" ></label>
</span>
<h4>���û�Ա</h4>
<span class="typeGray">ȫվ��������Ȩ��</span></label>
<div class="price">88��<?php echo $zhifu[daxiu2]?>
</div>
</li>

</ul>
<div class="ui-btn-wrap" id="payButtons">

<a href="/zhifu/zhifu.html" id="zfb">
<button class="ui-btn-lg pay ui-btn-alipay" ><img src="css/icon_alipay.png"> ֧�������</button>
</a>
<a href="/zhifu/zhifu.html" id="wx">

<button class="ui-btn-lg pay ui-btn-alipay" ><img src="css/icon_wechat.png"> ΢��ɨ��֧��</button>
</a>

</div>
<div class="insText">
<p>�ر�˵����</p>
<p>1��δ��18�����ֹ����ۿ���վ��Ƶ��</p>
<p>2��VIP��Ա������Ů�ͷ�ȫ���5�Ǽ�����</p>
<p>3����ʯVIP�ͻ����ܲ����ڼ�Ʒ�������͡�</p>
<p>4����վ��Դ���������������粻���⣬֧��ȫ���˿</p>
</div>
</div>
</div>
<script type="text/javascript">
function pay(zfb,wx){
document.getElementById('zfb').href=zfb;
document.getElementById('wx').href=wx;
}
</script>
<script>
$(function(){
/*��ѡѡ��*/
$('#payChooseList li').click(function(){
$(this).addClass("on").siblings().removeClass("on"), $("#payChooseList").find(".grayRadio").removeClass("checked");
var e = $(this).find(".grayRadio").addClass("checked").attr("value") || 0;
return ue = ce[e], !1					
});
});
</script>
</body>
</html>