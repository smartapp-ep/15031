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
$type="WHERE userid='$userid'";
$user=queryall(ubouser,$type); 
$uid=ubo($_GET[uid]);
$del=ubo($_GET[action]);
$delid=ubo($_GET[delid]);
if($del=="del"){
$type="id='$delid'";
dbdel(ubouid,$type);
$page=ubo($_GET["page"]);
if ($page){
echo "<script>alert('ɾ���ɹ�������ҳ��')</script><script>location.href='list.php?page=$page'</script>";
}else{
echo "<script>alert('ɾ���ɹ�������ҳ��')</script><script>location.href='list.php'</script>";
}
}
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
<title>�����б�</title>
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
<li><a href="data.php" >���ݱ���</a></li>
<li><a href="u.php">��������</a></li>
<li><a href="add.php">�������</a></li>
<li><a href="list.php"class="on">�����б�</a></li>
</ul>
</div>
</td>
<td width="10"></td>
<td valign="top">
<div class="rmain fix">
<div style="padding:10px; border:1px solid #C5C5C5; background:#e8e8e8; margin-bottom:10px; position:relative;color:#1BB97F;">
<form class="search" method="get" action="">&nbsp; &nbsp;
UID��<input id="uid" name="uid"  style="width:100px; height:30px; border:1px solid #C5C5C5; background:#fff;" type="text" value="<?php if($uid==null){ }else{ echo $uid;}?>" > 
<input type="submit" class="button" value="�ύ" style="width:65px; height:30px; background:#FF0000; color:#FFFFFF; vertical-align:middle; text-align:center; border:0; cursor:pointer" >
 &nbsp; &nbsp; &nbsp; &nbsp;
</form>
</div>
<div class="tb-all">
<div class="title">
<h3>�����б�</h3>
</div>
<table>
<thead>
<tr>
<th>�ƹ�ID</th>
<th>�û���</th>
<th>�û�����</th>
<th>�ֳɱ���</th>
<th>��ϵQQ</th>
<th>�տ���</th>
<th>�տ��˺�</th>
<th>���¶�ά��</th>
<th>��ͨ��ά��</th>
<th>�ƹ�ֱ��</th>
<th>����</th>
</tr>
</thead>
<tbody>
<?php 
$Page_size=8; 
$sql = "WHERE 1=1";
$sql .=" and pid='$userid'";
if($uid){
$sql .=" and userid='$uid' ";
}
$result = mysql_query("select id from ubouid   ".$sql."  ");
if($result == 0){
echo '<tr class="color2"><td colspan=18 align="center">��ѯ��������</td></tr>';
}
$count = mysql_num_rows($result); 
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
$query = mysql_query("select * from  ubouid   ".$sql." order by id desc   limit $offset, $Page_size");
while ($a=mysql_fetch_array($query)) { 
?> 
<tr class="color2">
<td align="center"><?php echo $a[userid]?></td>
<td align="center"><?php echo $a[user]?></td>
<td align="center"> <?php echo $a[pass]?></td>
<td align="center"> <?php echo $a[fc]?> %</td>
<td align="center"> <?php echo $a[qq]?></td>
<td align="center"> <?php echo $a[pay]?></td>
<td align="center"> <?php echo $a[kahao]?></td>
<td   align="center"><a target="_blank"  style='color:#f00;' href="qrcode.php?pid=<?php echo $a[pid]?>&uid=<?php echo $a[userid]?>">[ �鿴 ]</a></td>
<td   align="center"><a target="_blank"  style='color:#f00;' href="ewm.php?pid=<?php echo $a[pid]?>&uid=<?php echo $a[userid]?>">[ �鿴 ]</a></td>
<td   align="center">
<?php 
$u="http://".$_SERVER['HTTP_HOST']."/";
$longurl=$u."?pid=".$a[pid]."&uid=".$a[userid];
$long=urlencode($longurl);
$url=file_get_contents("http://api.t.sina.com.cn/short_url/shorten.json?source=3271760578&url_long=".$long);
$json = json_decode($url);
$zl=$json[0]->url_short;
?>
<a target="_blank"  style='color:#f00;' href="<?php echo $zl?>"><?php echo $zl?></a>&nbsp;&nbsp;
</td>
<td align="center"><a href="edit.php?id=<?php echo $a[id]?>&page=<?php echo $page?>" class="button">�༭</a>&nbsp;<a onClick="return window.confirm(&quot;������ȷ����������������ȡ����ֹͣ��&quot;);" href="?action=del&delid=<?php echo $a[id]?>&page=<?php echo $page?>" class="button" >ɾ��</a></td>
</tr>
<?php 
} 
$page_len = ($page_len%2)?$page_len:$pagelen+1;//ҳ����� 
$pageoffset = ($page_len-1)/2;//ҳ���������ƫ���� 
$key='<tr><td colspan=18><div class="pagination">'; 
$key.="<a class='number' >��ǰ�� $page ҳ/�� $pages ҳ</a> "; //�ڼ�ҳ,����ҳ 
if($page!=1){ 
if($uid){
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1&userid=$uid\">��ҳ</a> "; //��ҳ 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&userid=$uid\">��һҳ</a>"; //��һҳ 
}else {
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\">��ҳ</a> "; //��ҳ 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">��һҳ</a>"; //��һҳ 

}
}else { 
$key.="<a> ��ҳ</a> "; //��ҳ 
$key.="<a >��һҳ</a>"; //��һҳ  
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
$key.=' <a  class="number current">'.$i.'</a>'; 
} else { 
if($uid){
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&userid=$uid\">".$i."</a>"; 
} else { 
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a>"; 
}
} 
} 
if($page!=$pages){ 
if($uid){
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&userid=$uid\">��һҳ</a> ";//��һҳ 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&userid=$uid\">���һҳ</a>"; //���һҳ 
}else { 
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">��һҳ</a> ";//��һҳ 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">���һҳ</a>"; //���һҳ 
}
}else { 
$key.=" <a >��һҳ</a> ";//��һҳ 
$key.="<a>���һҳ</a>"; //���һҳ 
} 
$key.=''; 
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
<div class="blank20"></div>
</body>
</html>
