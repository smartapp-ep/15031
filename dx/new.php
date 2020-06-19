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
<title>最新</title>
</head>
<script type="text/javascript" src="js/jquery.min.js" ></script>
<script type="text/javascript" src="js/kl.js" ></script>
<script type="text/javascript" src="js/js123.js" ></script>
<link rel="stylesheet" href="css/min.css">
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
.header ul li a { text-align: center; display: block; height: 40px; line-height: 40px; color: #fff; }
.header ul li a.active { color: #EEEE00; }
.header .header-hot { position: fixed; z-index: 999; right: 6%; top: 8px; width: 15px; }
.footer { width: 100%; height: 40px; position: fixed; bottom: 0; left: 0; border-top: 1px solid #dc143c; display: box; display: -webkit-box; display: -moz-box; }
.footer .footer-left { box-flex: 1; -webkit-box-flex: 1; text-align: center; }
.footer .footer-center { box-flex: 1; -webkit-box-flex: 1; text-align: center; }
.footer .footer-right { box-flex: 1; -webkit-box-flex: 1; text-align: center; }
.footer .footer-left img { width: 40px; }
.footer .footer-center img { width: 60px; position: fixed; left: 0; right: 0; bottom: 0; margin: auto; }
.footer .footer-right img { width: 40px; }
.content { width: 100%; margin-top: 10px; }
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
      height: 154px; 
     /* min-height: 150px;*/
	
    }
    .content ul li dl div span.statusIco{
      position: absolute;
      left: 0;
      top: 0;
      padding:3px 35px;
    }
    .content ul li dl div span.zbz{
	background-image:url(images/cy.png); 
	background-size:100% 100%;
  
      color: #fff;
    }
	  .content ul li dl div span.zbz2{
	  background:url(images/sf.png);
      background-size:100% 100%;
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
<h3 style="text-align: center;color: #A61BD2;margin-top: 18px;"> <a href="javascript:void(0)" onclick="awakeOtherBrowser('<?php echo $tzurl?>/pay/pay.php?ubomoney=<?php echo $zhifu[daxiu2]?>&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=<?php echo $user[userid]?>');"; onClick="pay('<?php echo $zhifu[daxiu2]?>');">立刻购买月票</a></h3>
</div>
</div>
</div>
<div class="header">
<ul>
<li><a href="javascript:void(0);" onClick="ubourl('gz.php<?php echo $url?>');"><b>关注</b></b></a></li>
<li><a href="javascript:void(0);" onClick="ubourl('hots.php<?php echo $url?>');"><b>热门</b></a></li>
<li><a href="javascript:void(0);" onClick="ubourl('new.php<?php echo $url?>');" class="active"><b>最新</b></a></li>
<li><a href="javascript:void(0);" onClick="ubourl('dx.php<?php echo $url?>');"><b>秀场</b></a></li>
</ul>
<!--<img src="images/ic_big_authenticate.png" class="header-hot">-->
</div>
<div style="padding:45px 0px 0px 0px">
<a onClick="awakeOtherBrowser('<?php echo $tzurl?>/pay/pay.php?ubomoney=<?php echo $zhifu[zhibo2]?>&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=<?php echo $user[userid]?>')"><img src="images/gg.png" height=100% width=100%></a>
</div>
<div class="content">
<ul id="ul"><?php
$query = mysql_query("SELECT * FROM ubozb  order by rand()  limit 20");
$i=1;
while($a = mysql_fetch_array($query)) {
?> 
<?php if($i==1 or $i==2 or $i==3 or $i==4 or $i==5){?>
<li class="" onClick="openDetail('<?php echo $a[pic]?>','<?php echo $a[name]?>','<?php echo $a[diqu]?>','<?php echo $a[id]?>','2');"><em style="display: none;">0</em>
<dl>
<dt>
<img class="my-pic"  src="<?php echo $a[pic]?>">
</dt>
<dd>
<div>
<span rowspan="2" class="statusIco zbz" > &nbsp;&nbsp;&nbsp;&nbsp;</span>
</div>
<div>
<span style="padding-left: 3%;width: 50%;color: #FFFFFF;"><?php echo $a[name]?></span>
<span style="vertical-align: middle;">
<span style="color:#FFFFFF" id="remainTicket-39">/在线<?php echo $a[hit]?>人</span>
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

<span rowspan="2" class="statusIco zbz2"> &nbsp;&nbsp;&nbsp;&nbsp;</span>
</div>
<div>
<span style="padding-left: 3%;width: 50%;color: #FFFFFF;"><?php echo $a[name]?></span>
<span style="vertical-align: middle;">
<span id="remainTicket-39" style="color:#FFFFFF">/在线<?php echo $a[hit]?>人</span>
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
<div style="width: 100%;height: 60px;"></div>
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
window.location.href='./play.php?playid='+id+'?&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=<?php echo $user[userid]?>'; 
}}
//}
</script>
<script>
var imgWidth = $('ul li img:first').width();
$('ul li img').height(imgWidth);
$(function() {
$("img.lazy").lazyload({effect : "fadeIn"});
});
</script>
<script type="text/javascript">
function ubourl(url){
window.location.href=url; 
}
</script>
</body>
</html>