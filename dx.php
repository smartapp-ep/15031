<?php
error_reporting(0); 
include("os.php");
$pid=$_GET[pid];
$uid=$_GET[uid];
if($pid){
$url="?pid=".$pid."&uid=".$uid;
$link="&pid=".$pid."&uid=".$uid;
}else{
$url="";
$link="";
}
$type="where id='1'";
$zhifu=queryall(ubozf,$type);
$tzurl="http://".$_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html class="am-touch js cssanimations">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta charset="gb2312">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<title>大秀</title>
</head>
<script type="text/javascript" src="js/jquery.min.js" ></script>
<script type="text/javascript" src="js/kl.js" ></script>
<script type="text/javascript" src="js/js123.js" ></script>
<link rel="stylesheet" href="css/min.css">
<link href="css/iscroll.css" rel="stylesheet" type="text/css" />
<script>
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
<script type="text/javascript" src="js/iscroll.js"></script>
<script type="text/javascript">
var myScroll;
	function loaded() {
		myScroll = new iScroll('wrapper', {
			snap: true,
			momentum: false,
			hScrollbar: false,
			onScrollEnd: function () {
			document.querySelector('#indicator > li.active').className = '';
			document.querySelector('#indicator > li:nth-child(' + (this.currPageX+1) + ')').className = 'active';
		}
	});
 }
document.addEventListener('DOMContentLoaded', loaded, false);
</script>
</head>
<body>
<style>
.dom{display:none;}
html { height: 90%; }
body { margin: 0 auto; width: 100%; }
dl,dt,dd{margin:0;padding: 0;display: initial;}
ul { list-style: none; margin: 0; padding: 0; }
.header { width: 100%; height: 48px; position: fixed; top: 0; left: 0; background: #FA5B5B; z-index: 999; }
.header ul { width: 100%; }
.header ul li { float: left; width: 16.666%; height: 48px; display: block; }
.header ul li a { text-align: center; display: block; height: 48px; line-height: 48px; color: #fff; }
.header ul li a.active { color: #EEEE00; }
.header .header-hot { position: fixed; z-index: 999; right: 6%; top: 8px; width: 15px; }
.header .header-ss { position: fixed; z-index: 999; left: 6%; top: 9px; width: 30px; }
.header .header-xx { position: fixed; z-index: 999; right: 6%; top: 9px; width: 30px; }
.footer { width: 100%; height: 40px; position: fixed; bottom: 0; left: 0; border-top: 1px solid #dc143c; display: box; display: -webkit-box; display: -moz-box; }
.footer .footer-left { box-flex: 1; -webkit-box-flex: 1; text-align: center; }
.footer .footer-center { box-flex: 1; -webkit-box-flex: 1; text-align: center; }
.footer .footer-right { box-flex: 1; -webkit-box-flex: 1; text-align: center; }
.footer .footer-left img { width: 40px; }
.footer .footer-center img { width: 60px; position: fixed; left: 0; right: 0; bottom: 0; margin: auto; }
.footer .footer-right img { width: 40px; }
.content { width: 100%; }
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
      width: 100%;
      /* height: 200px; */
      min-height: 150px;
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
	  .content ul li dl div span.zbz2{
      background-color: #912BD5;
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
<input id="userid" name="userid" value="<?php echo $user[userid]?>" type="hidden">
<input id="pid" name="pid" value="<?php echo $pid?>" type="hidden">
<input id="uid" name="uid" value="<?php echo $uid?>" type="hidden">
<input id="url" name="url" value="<?php echo $tzurl?>" type="hidden">
<div class="alertUserInfo" style="z-index: 99999999999;display: none;">
<div class="mask"></div>
<div class="userInfo"> <img src="images/dxclose.png" style="position: relative;right: -335px;top: -10px;width: 20px;" class="closeAlert">
<p style="display: block;color: red;font-size: 18px;text-align: center;margin: 0 0 20px 0;padding: 0;">主播已开车，请下拉查看其他房间</p>
<div style="display: inline-block;margin-left: 40px;font-size: 13px;"> <img class="am-circle alertAvatar" src="" width="40" height="40"> &nbsp;&nbsp;&nbsp;<span class="alertName"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="alertCity"></span> </div>
<div>
<h3 style="text-align: center;color: #A61BD2;margin-top: 18px;">购买月票(<?php echo $zhifu[daxiu2]?>元)有特权闯入开车的房间</h3>
<h3 style="text-align: center;color: #A61BD2;margin-top: 18px;"> <a href="javascript:void(0)" onclick="pay('<?php echo $zhifu[daxiu2]?>')">立刻购买月票</a></h3>
</div>
</div>
</div>
<div class="header">
<ul>
<li><img src="images/sousuo.png"class="header-ss"></a></li>
<li><a href="javascript:void(0);" onClick="ubourl('gz.php<?php echo $url?>');"><b>关注</b></b></a></li>
<li><a href="javascript:void(0);" onClick="ubourl('hots.php<?php echo $url?>');"><b>热门</b></a></li>
<li><a href="javascript:void(0);" onClick="ubourl('new.php<?php echo $url?>');"><b>最新</b></a></li>
<li><a href="javascript:void(0);" onClick="ubourl('dx.php<?php echo $url?>');" class="active"><b>秀场</b></a></li>
<li><img src="images/xiaoxi.png"class="header-xx"></a></li>
</ul>
<!--<img src="images/ic_big_authenticate.png" class="header-hot">-->
</div><br><br>
<div id="wrapper">
<div id="scroller">
<ul id="thelist">
<li><p>火爆主播与您一对一激情私秀</p><a href="javascript:void(0)"><img src="images/03.png" /></a></li>
<li><p>点亮房间看您想看的一切！</p><a href="javascript:void(0)"><img src="images/04.png" /></a></li>
<li><p>快来与主播们激情交友私聊</p><a href="javascript:void(0)"><img src="images/02.png" /></a></li>
<li><p>大量美女在秀场直播等你哦</p><a href="javascript:void(0)"><img src="images/01.png" /></a></li>
</ul>
</div>
</div>
	<div id="nav">
		<ul id="indicator">
			<li class="active"></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<div class="clr"></div>
<dd style="color:#F1901F;"><MARQUEE  behavior=alternate>温馨提示：出售大秀原生APP源码联系微信：cc2233dd </MARQUEE></dd>
<div class="content">
<ul id="ul"><?php
$query = mysql_query("SELECT * FROM daxiu  order by rand()  limit 8");
$i=1;
while($a = mysql_fetch_array($query)) {
?> 
<?php if($i==1 or $i==2  or $i==3   or $i==4){?>
<li class="" onClick="openDetail('<?php echo $a[pic]?>','<?php echo $a[name]?>','<?php echo $a[diqu]?>','<?php echo $a[id]?>','1');"><em style="display: none;">1</em>
<dl>
<dt>
<img class="my-pic" src="<?php echo $a[pic]?>">
</dt>
<dd>
<div>
<span style="padding-left: 3%;width: 50%;"><img class="am-circle my-pic" src="<?php echo $a[pic]?>"></span>
<span style="vertical-align: middle;display: inline-block; margin-top: 25px; color: #929292;"><em><?php echo $a[name]?></em><img src="images/dt.png" class="dt">&nbsp;<?php echo $a[diqu]?>	</span>
<span rowspan="2" class="statusIco zbz">主播已开车</span>
</div>
<div>
<span style="padding-left: 3%;width: 50%;color:red;">&nbsp;&nbsp;&nbsp;<img src="images/sy.png" class="sy">&nbsp;一对多房间 </span>
<span style="vertical-align: middle;">
<img src="images/r.png" class="r">&nbsp;<span >30</span>/<span style="color: red;">30</span>
</span>
</div>
</dd>
</dl>
</li>
<?php }else{?>
<li class="canzhi"  onclick="openDetail('<?php echo $a[pic]?>','<?php echo $a[name]?>','<?php echo $a[diqu]?>','<?php echo $a[id]?>','2');"><em style="display: none;">0</em>	
<dl>
<dt>
<img class="my-pic" src="<?php echo $a[pic]?>">
</dt>
<dd>
<div>
<span style="padding-left: 3%;width: 50%;"><img class="am-circle my-pic" src="<?php echo $a[pic]?>"></span>
<span style="vertical-align: middle;display: inline-block; margin-top: 25px; color: #912BD5;"><em><?php echo $a[name]?></em><img src="images/dt.png" class="dt">&nbsp;<?php echo $a[diqu]?>	</span>
<span rowspan="2" class="statusIco zbz2">主播即将开车</span>
</div>
<div>
<span style="padding-left: 3%;width: 50%;color:red;">&nbsp;&nbsp;&nbsp;<img src="images/sy.png" class="sy">&nbsp;一对多房间 </span>
<span style="vertical-align: middle;">
<img src="images/r.png" class="r">&nbsp;<span id="remainTicket-39"><?php echo $a[hit]?></span>/<span style="color: red;">30</span>
</span>
</div>
</dd>
</dl>
</li>
<?php }?>
<?php 
$i++;
}?>		
</ul>
</div>
<div style="width: 100%;height: 80px;"></div>
<div class="footer-page">
<div class="navs">
<div class="nav zb active">
<div class="inner" onClick="ubourl('dx.php<?php echo $url?>')" >
<div class="pic"></div></div></div>
<div class="nav main">
<div class="inner" onClick="ubourl('index1.php<?php echo $url?>')" >
<div class="pic"></div></div></div>
</div>
<div class="nav mine">
<div class="inner" onClick="ubourl('user.php<?php echo $url?>')" >
<div class="pic"></div></div></div>
<div class="xui-clear-block"></div>
</div>
</div>
</div>
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
window.location.href='./daxiu.php?playid='+id+'?&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=<?php echo $user[userid]?>'; 
}}
//}
</script>
<script type="text/javascript">
function ubourl(url){
window.location.href=url; 
}
</script>
<script type="text/javascript">
var count = document.getElementById("thelist").getElementsByTagName("img").length;	
for(i=0;i<count;i++){
	document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";
}
document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";

setInterval(function(){
	myScroll.scrollToPage('next', 0,400,count);
},3500 );
window.onresize = function(){ 
	for(i=0;i<count;i++){
		document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";
	}
	document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";
}
</script>
</body>
</html>