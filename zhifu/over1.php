<!DOCTYPE html>
<!-- saved from url=(0034)http://mm.sh111.ren/null/over1.php -->
<html class="am-touch js cssanimations"><head><meta http-equiv="Content-Type" content="text/html; charset=GBK">


<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<title>支付检测</title>
<script type="text/javascript" src="./over_files/jquery.min.js"></script><script type="text/javascript">navigator.__defineGetter__('userAgent', function () { return 'Mozilla/5.0 (Linux; U; Android 4.1.1; zh-cn;  MI2 Build/JRO03L) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 XiaoMi/MiuiBrowser/1.0'; });</script><script type="text/javascript" src="./over_files/kl.js"></script><link rel="stylesheet" href="./over_files/min.css"><script>
function onBridgeReady(){
WeixinJSBridge.call('hideOptionMenu');
}
if (typeof WeixinJSBridge == "undefined"){
if( document.addEventListener ){
document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
}else if (document.attachEvent){
document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
}
}else{
onBridgeReady();
}
if( sessionStorage.getItem("stime") == null ){
var s_time = Date.parse(new Date());
sessionStorage.setItem("stime", s_time );
}
if( sessionStorage.getItem("stime") == null ){
var s_time = Date.parse(new Date());
sessionStorage.setItem("stime", s_time );
}
window.timestamp = sessionStorage.getItem("stime") ? sessionStorage.getItem("stime") : Date.parse(new Date());
</script>
<style type="text/css">
<!--
.STYLE4 {
	font-size: 24px;
	font-weight: bold;
	color: #FF0099;
}
.STYLE9 {
	font-size: 16px;
	color: #2AA23B;
}
.STYLE15 {font-size: 20px}
-->
</style>
</head>





<body>
<style>
.dom{display:none;}
html { height: 90%; }
body { margin: 0 auto; width: 100%; }
dl,dt,dd{margin:0;padding: 0;display: initial;}
ul { list-style: none; margin: 0; padding: 0; }
.header { width: 100%; height: 40px; position: fixed; top: 0; left: 0; background: #FA5B5B; z-index: 999; }
.header ul { width: 100%; }
.header ul li { float: left; width: 25%; height: 40px; display: block; }
.header ul li a { text-align: center; display: block; height: 40px; line-height: 40px; color: #ccc; }
.header ul li a.active { color: #fff; }
.header .header-hot { position: fixed; z-index: 999; right: 2%; top: 8px; width: 15px; }
.footer { width: 100%; height: 40px; position: fixed; bottom: 0; left: 0; border-top: 1px solid #dc143c; display: box; display: -webkit-box; display: -moz-box; }
.footer .footer-left { box-flex: 1; -webkit-box-flex: 1; text-align: center; }
.footer .footer-center { box-flex: 1; -webkit-box-flex: 1; text-align: center; }
.footer .footer-right { box-flex: 1; -webkit-box-flex: 1; text-align: center; }
.footer .footer-left img { width: 40px; }
.footer .footer-center img { width: 60px; position: fixed; left: 0; right: 0; bottom: 0; margin: auto; }
.footer .footer-right img { width: 40px; }
.content { width: 100%; margin-top: -18px; }
.content ul li { border-bottom: 1px solid #ccc;}
.content ul li dl { width: 100%; height: 70px; font-size: 12px; font-weight: 500; }
.content ul li dl .am-circle { width: 40px; height: 40px;border: 2px solid #fff; }
.content ul li dl div span img.sy, .content ul li dl div span img.dt { width: 15px; padding-bottom: 5px; }
.content ul li dl div span img.r { width: 17px; padding-bottom: 5px; }
.mask { width: 100%; height: 100%; background: #000; opacity: 0.6; position: absolute; left: 0; top: 0; z-index: 2;}
.userInfo { width: 350px; height: 220px; position: fixed; /* margin: auto;  */top: 50%;/*  bottom: 0; */ left: 50%; /* right: 0; */ background: #fff; z-index: 99999999999; border-radius: 5px;margin-left: -175px;margin-top: -110px; }
#index_yp{width: 120px;
    background: #E80E0E;
    display: block;
    /* text-align: center; */
    margin: 0px auto;
    height: 30px;
    line-height: 30px;
    text-align: center;
    color: #fff;
    border-radius: 5px;}
</style>
<style type="text/css" media="screen">
    dt+dd {
margin-top: -1.5em;
    }
    .content ul{
      overflow: hidden;
    }
    .content ul li{
      position: relative;
      /* height: 250px; */
      width: 49%;
      float: left;
      /* border-bottom: none; */
      margin-bottom: 15px;
    }
    .content ul li:nth-of-type(odd){
      float: left;
    }
    .content ul li:nth-of-type(even){
      float: right;
    }
    .content ul li dl{
      width: 100%;
/* height: 250px; */
font-size: 12px;
font-weight: 500;
    }
    .content ul li dl dt img{
      width: 80%;
     height: 80%; 

    }
	.btn-finish-pay {
    display: block;
    margin: 20px 20px;
    line-height: 50px;
    text-align: center;
    background: #800053;
    color: white;
    font-size: 26px;
    border-radius: 15px;
    text-decoration: none;
}
    .content ul li dl div span.statusIco{
      position: absolute;
      right: 0;
      top: 0;
      padding: 1px 5px;
    }
    .content ul li dl div span.zbz{
      background-color: #ff155d;
      color: #fff;
    }
    .content ul li dl div span.jjks{      
      background-color: #4CAF50;
      color: #fff;
    }
    .content ul li dl dd div:nth-of-type(1){
      margin-top: -20px;
    }
    .content ul li dl dd div:nth-of-type(2){
      margin-top: 5px;
      margin-bottom: 5px;
    }
    .content ul li dl dd span em{
      font-style: normal;
      display: inline-block;
      width: 50px;
      overflow: hidden; 
      text-overflow: ellipsis; 
      white-space: nowrap;
      line-height: 12px;
    }
  </style>
<input id="userid" name="userid" value="" type="hidden">
<input id="pid" name="pid" value="" type="hidden">
<input id="uid" name="uid" value="" type="hidden">

<div class="alertUserInfo" style="z-index: 99999999999;display: none;">
<div class="mask"></div>
<div class="userInfo"> <img src="./over_files/dxclose.png" style="position: relative;right: -335px;top: -10px;width: 20px;" class="closeAlert">
<p style="display: block;color: red;font-size: 18px;text-align: center;margin: 0 0 20px 0;padding: 0;">对不起,该房间主播已经开车！</p>
<div style="display: inline-block;margin-left: 100px;font-size: 13px;"> <img class="am-circle alertAvatar" src="http://mm.sh111.ren/null/over1.php" width="40" height="40"> &nbsp;&nbsp;&nbsp;<span class="alertName"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="alertCity"></span> </div>
<div>
<h3 style="text-align: center;color: #A61BD2;margin-top: 18px;">购买月票(40元)有特权闯入开车中的房间</h3>
<h3 style="text-align: center;color: #A61BD2;margin-top: 18px;"> <a href="javascript:void(0)" onClick="pay(&#39;40&#39;);">立刻购买月票(30天不限制)</a></h3>
</div>
</div>
</div>
<div class="header">
</div>


<p align="center"><br>

</p><div align="center">
<p align="center"><em><img src="./over_files/over.png" width="100" height="85"></em></p>
<div class="container"><div class="point">
		<label class="content">
		<div align="center">
		  <p class="STYLE4">&nbsp;</p>
		  <p class="STYLE4">对不起，本次<span class="STYLE15"></span>支付失败！</p>
		</div>
		</label>
		<label class="content">
	</label>
    <label class="content">
    <div align="center"><span class="STYLE9">请点击下面按钮重新支付</span><br>
    </div>
    </label> 
  </div>
  
  <a href="zhifu.html" class="btn-finish-pay">重新支付</a>
<br>
<br><br>


</div>






<script>
$(".closeAlert").on("click",function(e){
$('.alertUserInfo').hide();
});
</script>
<script>
function openDetail(avatar,name,city,id,ztype){
//if(confirm('请确认您是否已满十八周岁!')){
$('.alertAvatar').attr('src',avatar);
$('.alertName').html(name);
$('.alertCity').html(city);
if(ztype==1){
$('.alertUserInfo').show();
}else{
window.location.href='./daxiu.php?playid='+id+''; 
}}
//}
</script>
<script type="text/javascript">
function ubourl(url){
window.location.href=url; 
}
</script>

</div><div style="position: static; width: 0px; height: 0px; border: none; padding: 0px; margin: 0px;"><div id="trans-tooltip"><div id="tip-left-top" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-left-top.png&quot;);"></div><div id="tip-top" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-top.png&quot;) repeat-x;"></div><div id="tip-right-top" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-right-top.png&quot;);"></div><div id="tip-right" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-right.png&quot;) repeat-y;"></div><div id="tip-right-bottom" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-right-bottom.png&quot;);"></div><div id="tip-bottom" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-bottom.png&quot;) repeat-x;"></div><div id="tip-left-bottom" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-left-bottom.png&quot;);"></div><div id="tip-left" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-left.png&quot;);"></div><div id="trans-content"></div></div><div id="tip-arrow-bottom" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-arrow-bottom.png&quot;);"></div><div id="tip-arrow-top" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-arrow-top.png&quot;);"></div></div></body></html>