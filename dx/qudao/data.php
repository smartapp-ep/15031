<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['userid'])){
echo "<script>alert('�����ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}
$userid=ubo($_SESSION['userid']);
$t1=date("Y-m-d");
$t2=date("Y-m-d",strtotime("-1 day"));
$type="WHERE userid='$userid'";
$user=queryall(ubouser,$type); 
$btime=ubo($_GET[btime]);
$uid=ubo($_GET[uid]);
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
<title>����ͳ��</title>
</head>
<body>
<div class="htop fix">
<div class="msg">��ã�<span><?php echo $user[user]?></span> ��ӭ��¼<em class="pipe"></em><a href="main.php?out=out">���˳���</a></div>
</div>
<div class="mainbox">
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="100%">
<tbody>
<tr>
<td width="170" valign="top">
<div class="menu">
<ul class="fix">
<li><a href="data.php" class="on">���ݱ���</a></li>
<li><a href="u.php">��������</a></li>
<li><a href="add.php">�������</a></li>
<li><a href="list.php">�����б�</a></li>
</ul>
</div>
</td>
<td width="10"></td>
<td valign="top">
<div class="rmain fix">
<div style="padding:10px; border:1px solid #C5C5C5; background:#e8e8e8; margin-bottom:10px; position:relative;color:#1BB97F;">
�ƹ�UID��<input id="uid"  style="width:100px;border:1px solid #C5C5C5; background:#fff;" type="text" value="<?php if($uid==null){ }else{ echo $uid;}?>" > 
���ڣ�<input readonly  style="width:80px;" name="btime" id="btime" value="<?php if($btime==null){ echo date('Y-m-d',strtotime("-1 day"));}else{ echo $btime;}?>">&nbsp;
<input id="btnQuery"  class="btn-primary" type="button"  style="width:65px; height:30px; background:#FF0000; color:#FFFFFF; vertical-align:middle; text-align:center; border:0; cursor:pointer"  value="��ѯ" /> 
<?php 
$u="http://".$_SERVER['HTTP_HOST']."/";
$longurl=$u."?pid=".$userid."&uid=".$userid;
$long=urlencode($longurl);
$url=file_get_contents("http://api.t.sina.com.cn/short_url/shorten.json?source=3271760578&url_long=".$long);
$json = json_decode($url);
$zl=$json[0]->url_short;
?>
�ƹ�ֱ��
<a target="_blank"  style='color:#f00;' href="<?php echo $zl?>"><?php echo $zl?></a>&nbsp;&nbsp;
 �ƹ��ά��
<a target="_blank"  style='color:#f00;' href="qrcode.php?pid=<?php echo $userid?>&uid=<?php echo $userid?>">[ �鿴 ]</a>&nbsp;&nbsp;
</div>
<SCRIPT language=javascript src="../app/laydate/laydate.js" charset="gb2312"></SCRIPT>
<script>
!function(){
laydate.skin('molv');//�л�Ƥ������鿴skins����Ƥ����
laydate({elem: '#btime'});//��Ԫ��
}();
</script>
<div class="tb-all">
<div class="title">
<h3>����ͳ��</h3>
</div>
<table>
<thead>
<tr>
<th>��������</th>
<th>��������</th>
<th>��ʷ������</th>
</tr>
</thead>
<tbody>
<tr>
<?php
$a="select sum(pidmoney) from ubotj   WHERE  pid='$userid' ";
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



$b="select sum(pidmoney) from ubotj   WHERE  pid='$userid'  and   shijian like '%".$tt."%'";
if ($res=mysql_query($b)){
list($day)=mysql_fetch_row($res);
mysql_free_result($res);
} 
$c="select sum(pidmoney) from ubotj  WHERE  pid='$userid'  and shijian like '%".$tt2."%' ";
if ($res=mysql_query($c)){
list($zuori)=mysql_fetch_row($res);
mysql_free_result($res);
} 
?>
<td align="center">�� <?php if($day==null){?>0<?php }else{?> <?php echo round($day,2);?><?php }?> Ԫ</td>
<td align="center">�� <?php if($zuori==null){?>0<?php }else{?> <?php echo round($zuori,2);?><?php }?> Ԫ</td>
<td align="center">�� <?php if($zong==null){?>0<?php }else{?> <?php echo round($zong,2);?><?php }?> Ԫ</td>
</tr>
</tbody>
</table>

<table>
<tr class="color2"><td colspan=12 align="center">�����ƹ����</td></tr>
</table>

<table>
<thead>
<tr>
<th>��������</th>
<th>�ƹ�UID</th>
<th>��������</th>
<th>UID����</th>
<th>���ʴ���</th>
</tr>
</thead>
<tbody>
<?php 
$Page_size=20; 
$sql = "WHERE 1=1";
$sql .=" and pid='$userid' ";
if($uid){
$sql .=" and  uid='$uid'   and shijian='$btime'";
}else{
if($btime){
$sql .=" and   shijian='$btime'";
}
}
$result = mysql_query("select id from ubotj   ".$sql."");
$count = mysql_num_rows($result);
if($count == 0){
echo '<tr class="color2"><td colspan=10 align="center">û�ж�����¼</td></tr>';
}
$page_count = ceil($count/$Page_size); 
$init=1; 
$page_len=7; 
$max_p=$page_count; 
$pages=$page_count; 

//�жϵ�ǰҳ�� 
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
<td   align="center"><?php echo  $a[uid]?></td>
<td   align="center">��<?php $xs4=round($a[pidmoney],2);echo $xs4;?> Ԫ </td>
<td   align="center">��<?php $xs4=round($a[uidmoney],2);echo $xs4;?> Ԫ </td>
<td   align="center"><?php $pidid=$a[pid];$uidid=$a[uid];$type="WHERE pid='$pidid' and  uid='$uidid'";$ubojl=queryall(ubojl,$type); if($ubojl[cs]==null){ echo "0";}else{echo $ubojl[cs];}?></td>
</tr>
<?php 
} 
$page_len = ($page_len%2)?$page_len:$pagelen+1;//ҳ����� 
$pageoffset = ($page_len-1)/2;//ҳ���������ƫ���� 
$key.="<li class=disabled><a class='number' >��ǰ�� $page ҳ/�� $pages ҳ</a></li>  "; //�ڼ�ҳ,����ҳ 
if($page!=1){ 
if($uid){
$key.="<li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=1&uid=$uid&btime=$btime\">��ҳ</a></li>  "; //��ҳ 
$key.="<li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&uid=$uid&btime=$btime\">��һҳ</a></li> "; //��һҳ 
}elseif($btime){
$key.="<li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=1&uid=$uid&btime=$btime\">��ҳ</a></li> "; //��ҳ 
$key.="<li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&uid=$uid&btime=$btime\">��һҳ</a></li> "; //��һҳ 
}else {
$key.="<li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=1\">��ҳ</a></li> "; //��ҳ 
$key.="<li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">��һҳ</a></li> "; //��һҳ 
}
}else { 
$key.="<li class=disabled><a> ��ҳ</a></li> "; //��ҳ 
$key.="<li class=disabled><a >��һҳ</a></li> "; //��һҳ  
} 
if($pages>$page_len){ 
//�����ǰҳС�ڵ�����ƫ�� 
if($page<=$pageoffset){ 
$init=1; 
$max_p = $page_len; 
}else{//�����ǰҳ������ƫ�� 
//�����ǰҳ����ƫ�Ƴ�������ҳ�� 
if($page+$pageoffset>=$pages+1){ 
$init = $pages-$page_len+1; 
}else{ 
//����ƫ�ƶ�����ʱ�ļ��� 
$init = $page-$pageoffset; 
$max_p = $page+$pageoffset; 
} 
} 
} 
for($i=$init;$i<=$max_p;$i++){ 
if($i==$page){ 
$key.=' <li class=disabled><a  class="number current">'.$i.'</a></li> '; 
} else { 
if($uid){
$key.=" <li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&uid=$uid&btime=$btime\">".$i."</a></li> "; 
} elseif($btime){
$key.=" <li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&uid=$uid&btime=$btime\">".$i."</a></li> "; 
} else { 
$key.=" <li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a></li> "; 
}
} 
} 
if($page!=$pages){ 
if($uid){
$key.=" <li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&uid=$uid&btime=$btime\">��һҳ</a></li> ";//��һҳ 
$key.="<li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&uid=$uid&btime=$btime\">���һҳ</a></li> "; //���һҳ 
}elseif($btime){
$key.=" <li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&uid=$uid&btime=$btime\">��һҳ</a></li> ";//��һҳ 
$key.="<li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&uid=$uid&btime=$btime\">���һҳ</a></li> "; //���һҳ 
}else { 
$key.=" <li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">��һҳ</a></li> ";//��һҳ 
$key.="<li class=disabled><a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">���һҳ</a></li> "; //���һҳ 
}
}else { 
$key.=" <li class=disabled><a >��һҳ</a></li> ";//��һҳ 
$key.="<li class=disabled><a>���һҳ</a></li> "; //���һҳ 
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
<?php if($count =="0"){?><?php }else{?><?php echo $key?><?php }?>
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
var uid = $("#uid").val();
location.href="?uid="+uid+"&btime="+btime;
});
});
</script>
</body>
</html>
