<html>
<head>
<meta charset="gb2312">
<title>充值中心</title>
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
<h1>充值中心</h1>
</header>
<div class="content" id="content">
<div class="payPage">
<div class="vipimg">
<img src="css/vip.jpg" alt="">
</div>
<div class="vipText">
开通VIP会员，尽情释放体内的洪荒之力！
</div><div style="display:none">
</div>
<ul class="chooseList" id="payChooseList">

<li class="typeList type1002" onClick="pay('/zhifu/zhifu3.html','/zhifu/zhifu3.html')" ><label class="typePos"><span class="inputWrap">
<label   for="radio_jd" onClick="pay('/zhifu/zhifu3.html','/zhifu/zhifu3.html')" class="grayRadio " ></label>
</span>
<h4>1V1私播</h4>
<span class="typeGray">与主播一对一激情私秀</span></label>
<div class="price">45￥<?php echo $zhifu[daxiu2]?>
</div>
</li>

<li class="typeList type1002" onClick="pay('/zhifu/zhifu2.html','/zhifu/zhifu2.html')" ><label class="typePos"><span class="inputWrap">
<label   for="radio_jd" onClick="pay('/zhifu/zhifu2.html','/zhifu/zhifu2.html')" class="grayRadio " ></label>
</span>
<h4>购买场票</h4>
<span class="typeGray">点亮房间看您想看的一切</span></label>
<div class="price">15￥<?php echo $zhifu[daxiu2]?>
</div>
</li>

<li class="typeList type1002" onClick="pay('/zhifu/zhifu1.html','/zhifu/zhifu1.html')" ><label class="typePos"><span class="inputWrap">
<label   for="radio_jd" onClick="pay('/zhifu/zhifu1.html','/zhifu/zhifu1.html')" class="grayRadio " ></label>
</span>
<h4>购买月票</h4>
<span class="typeGray">有特权闯入开车的房间</span></label>
<div class="price">58￥<?php echo $zhifu[daxiu2]?>
</div>
</li>

<li class="typeList type1002" onClick="pay('/zhifu/zhifu.html','/zhifu/zhifu.html')" ><label class="typePos"><span class="inputWrap">
<label   for="radio_jd" onClick="pay('/zhifu/zhifu.html','/zhifu/zhifu.html')" class="grayRadio checked" ></label>
</span>
<h4>永久会员</h4>
<span class="typeGray">全站永久体验权限</span></label>
<div class="price">88￥<?php echo $zhifu[daxiu2]?>
</div>
</li>

</ul>
<div class="ui-btn-wrap" id="payButtons">

<a href="/zhifu/zhifu.html" id="zfb">
<button class="ui-btn-lg pay ui-btn-alipay" ><img src="css/icon_alipay.png"> 支付宝冲费</button>
</a>
<a href="/zhifu/zhifu.html" id="wx">

<button class="ui-btn-lg pay ui-btn-alipay" ><img src="css/icon_wechat.png"> 微信扫码支付</button>
</a>

</div>
<div class="insText">
<p>特别说明：</p>
<p>1、未满18周岁禁止购买观看本站视频。</p>
<p>2、VIP会员享有美女客服全天候5星级服务。</p>
<p>3、钻石VIP客户享受不定期极品福利推送。</p>
<p>4、本站资源享受质量三包，如不满意，支持全额退款。</p>
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
/*单选选中*/
$('#payChooseList li').click(function(){
$(this).addClass("on").siblings().removeClass("on"), $("#payChooseList").find(".grayRadio").removeClass("checked");
var e = $(this).find(".grayRadio").addClass("checked").attr("value") || 0;
return ue = ce[e], !1					
});
});
</script>
</body>
</html>