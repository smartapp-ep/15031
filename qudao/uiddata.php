<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['uid'])){
echo "<script>alert('身份已失效请重新登录!')</script><script>location.href='index.php'</script>";
exit;
}
$userid=$_SESSION['uid'];
$url=$_SERVER['HTTP_HOST'];
$t1=date("Y-m-d");
$t2=date("Y-m-d",strtotime("-1 day"));
$type="WHERE userid='$userid'";
$user=queryall(ubouid,$type); 
$btime=ubo($_GET[btime]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" href="tj/base.css">
<link rel="stylesheet" href="tj/js/jquery.cxcalendar.css">
<script type="text/javascript" src="tj/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="tj/js/jquery.validate.min.js"></script>
<script src="tj/js/jquery.cxcalendar.min.js"></script>
<title>数据统计</title>
</head>
<body>
<div class="htop fix">
<div class="msg">你好，<span><?php echo $user[user]?></span> 欢迎登录<em class="pipe"></em><a href="uidtui.php?out=out">【退出】</a></div>
</div>
<div class="mainbox">
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="100%">
<tbody>
<tr>
<td width="170" valign="top">
<div class="menu">
<ul class="fix">
<li><a href="uiddata.php" class="on">数据报表</a></li>
</ul>
</div>
</td>
<td width="10"></td>
<td valign="top">
<div class="rmain fix">
<div style="padding:10px; border:1px solid #C5C5C5; background:#e8e8e8; margin-bottom:10px; position:relative;color:#1BB97F;">
日期：<input readonly  style="width:80px;" name="btime" id="btime" value="<?php if($btime==null){ echo date('Y-m-d',strtotime("-1 day"));}else{ echo $btime;}?>">&nbsp;
<input id="btnQuery"  class="btn-primary" type="button"  style="width:65px; height:30px; background:#FF0000; color:#FFFFFF; vertical-align:middle; text-align:center; border:0; cursor:pointer"  value="查询" /> 

<?php 
$u="http://".$_SERVER['HTTP_HOST']."/";
$longurl=$u."?pid=".$user[pid]."&uid=".$userid;
$long=urlencode($longurl);
$url=file_get_contents("http://api.t.sina.com.cn/short_url/shorten.json?source=3271760578&url_long=".$long);
$json = json_decode($url);
$zl=$json[0]->url_short;
?>
推广直链
<a target="_blank"  style='color:#f00;' href="<?php echo $zl?>"><?php echo $zl?></a>&nbsp;&nbsp;
 推广二维码
<a target="_blank"  style='color:#f00;' href="qrcode.php?pid=<?php echo $user[pid]?>&uid=<?php echo $userid?>">[ 查看 ]</a>&nbsp;&nbsp;


</div>
<SCRIPT language=javascript src="../app/laydate/laydate.js" charset="gb2312"></SCRIPT>
<script>
!function(){
laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
laydate({elem: '#btime'});//绑定元素
}();
</script>
<div class="tb-all">
<div class="title">
<h3>数据统计</h3>
</div>
<table>
<thead>
<tr>
<th>今日收入</th>
<th>昨日收入</th>
<th>历史总收入</th>
<th>精致二维码</th>
<th>普通二维码</th>
</tr>
</thead>
<tbody>
<tr>
<?php
$a="select sum(uidmoney) from ubotj   WHERE  uid='$userid' ";
if ($res=mysql_query($a)){
list($zong)=mysql_fetch_row($res);
mysql_free_result($res);
} 
if($btime){
$tt=$btime;
}else{
$tt=$t1;
}
if($btime){
$tt2=date("Y-m-d",strtotime("$btime-1 day"));
}else{
$tt2=$t2;
}
$b="select sum(uidmoney) from ubotj   WHERE  uid='$userid'  and   shijian like '%".$tt."%'";
if ($res=mysql_query($b)){
list($day)=mysql_fetch_row($res);
mysql_free_result($res);
} 
$c="select sum(uidmoney) from ubotj   WHERE  uid='$userid'  and shijian like '%".$tt2."%' ";
if ($res=mysql_query($c)){
list($zuori)=mysql_fetch_row($res);
mysql_free_result($res);
} 
?>
<td align="center">￥ <?php if($day==null){?>0<?php }else{?> <?php echo round($day,2);?><?php }?> 元</td>
<td align="center">￥ <?php if($zuori==null){?>0<?php }else{?> <?php echo round($zuori,2);?><?php }?> 元</td>
<td align="center">￥ <?php if($zong==null){?>0<?php }else{?> <?php echo round($zong,2);?><?php }?> 元</td>
<td   align="center"><a target="_blank"  style='color:#f00;' href="qrcode.php?pid=<?php echo $user[pid]?>&uid=<?php echo $userid?>">[ 查看 ]</a></td>
<td   align="center"><a target="_blank"  style='color:#f00;' href="ewm.php?pid=<?php echo $user[pid]?>&uid=<?php echo $userid?>">[ 查看 ]</a></td>
</tr>
</tbody>
</table>
<table>
<tr class="color2"><td colspan=12 align="center">渠道推广概览</td></tr>
</table>
<table>
<thead>
<tr>
<th>订单日期</th>
<th>收入</th>
</tr>
</thead>
<tbody>
<?php 
$Page_size=20; 
$sql = "WHERE 1=1";
$sql .=" and uid='$userid' ";
if($btime){
$sql .=" and   shijian='$btime'";
}
$result = mysql_query("select id from ubotj   ".$sql."");
if($result == 0){
echo '<tr class="color2"><td colspan=12 align="center">查询不到数据</td></tr>';
}
$count = mysql_num_rows($result); 
$page_count = ceil($count/$Page_size); 
$init=1; 
$page_len=7; 
$max_p=$page_count; 
$pages=$page_count; 

//判断当前页码 
if(empty($_GET['page'])||$_GET['page']<0){ 
$page=1; 
}else { 
$page=$_GET['page']; 
} 
$offset=$Page_size*($page-1); 
$query = mysql_query("select * from ubotj ".$sql." order by id desc   limit $offset, $Page_size");
while ($a=mysql_fetch_array($query)) { 
?> 
<tr>
<td   align="center"><?php echo  $a[shijian]?></td>

<td align="center">￥ <?php echo $a[uidmoney]?> 元</td>
</tr>
<?php 
} 
$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
$key.="<li class=disabled><a class='number' >当前第 $page 页/共 $pages 页</a></li>  "; //第几页,共几页 
if($page!=1){ 
if($btime){
$key.="<li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=1&btime=$btime\">首页</a></li> "; //首页 
$key.="<li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&btime=$btime\">上一页</a></li> "; //上一页 
}else {
$key.="<li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=1\">首页</a></li> "; //首页 
$key.="<li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">上一页</a></li> "; //上一页 
}
}else { 
$key.="<li class=disabled><a> 首页</a></li> "; //首页 
$key.="<li class=disabled><a >上一页</a></li> "; //上一页  
} 
if($pages>$page_len){ 
//如果当前页小于等于左偏移 
if($page<=$pageoffset){ 
$init=1; 
$max_p = $page_len; 
}else{//如果当前页大于左偏移 
//如果当前页码右偏移超出最大分页数 
if($page+$pageoffset>=$pages+1){ 
$init = $pages-$page_len+1; 
}else{ 
//左右偏移都存在时的计算 
$init = $page-$pageoffset; 
$max_p = $page+$pageoffset; 
} 
} 
} 
for($i=$init;$i<=$max_p;$i++){ 
if($i==$page){ 
if($btime){
$key.=" <li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&btime=$btime\">".$i."</a></li> "; 
} else { 
$key.=' <li class=disabled><a  class="number current">'.$i.'</a></li> '; 
}
} else { 
$key.=" <li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a></li> "; 
} 
} 
if($page!=$pages){ 
if($btime){
$key.=" <li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&btime=$btime\">下一页</a></li> ";//下一页 
$key.="<li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&btime=$btime\">最后一页</a></li> "; //最后一页 
}else { 

$key.=" <li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">下一页</a></li> ";//下一页 
$key.="<li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">最后一页</a></li> "; //最后一页 
}
}else { 
$key.=" <li class=disabled><a >下一页</a></li> ";//下一页 
$key.="<li class=disabled><a>最后一页</a></li> "; //最后一页 
} 
$key.=""; 
?> 
</tbody>
</table>
</div>
</div>
</div>
<div class="pager">
<ul class="pagination">
<?php echo $key?>
</ul>
</div>
</div>
<script type="text/javascript" src="tj/jquery.js"></script>
<script type="text/javascript" src="tj/WdatePicker.js"></script>
<div class="blank20"></div>
<script type="text/javascript">
$(document).ready(function(){
$("#btnQuery").click(function(){
var btime = $("#btime").val();
location.href="?btime="+btime;
});
});
</script>
</body>
</html>
