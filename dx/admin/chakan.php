<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('���������ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}
$pid=ubo($_GET[id]);
$zuori=date("Y-m-d",strtotime("-1 day"));
$day=date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>��ѯ��¼</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="css/layui.css" media="all">
<link rel="stylesheet" href="css/font-awesome.min.css">
<!--CSS����-->
<link rel="stylesheet" href="css/admin.css">
<!--[if lt IE 9]>
<script src="js/html5shiv.min.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<SCRIPT language=javascript src="../app/layer/jquery-1.9.1.min.js"></SCRIPT>
<SCRIPT language=javascript src="../app/layer/layer.js"></SCRIPT>
</head>
<body>
<div class="layui-layout layui-layout-admin">
<?php include_once('header.php'); ?> 
<?php include_once('left.php'); ?> 
<!--����-->
<div class="layui-body">
<!--tab��ǩ-->
<div class="layui-tab layui-tab-brief">
<ul class="layui-tab-title">
<li class="layui-this"><?php echo $pid?>��ѯ��¼</li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<table class="layui-table">
<thead>
<tr>
<th align="center">UID</th>
<th align="center">��������</th>
<th align="center">����������</th>
<th align="center">������</th>
<th align="center">�û���</th>
<th align="center">����</th>
</tr>
</thead>
<tbody>

<?php 
$Page_size=20; 
$sql = "WHERE 1=1";
$sql .=" and pid='$pid' ";
$result = mysql_query("select id from ubouid   ".$sql."  ");
$count = mysql_num_rows($result); 
if($count == 0){
echo '<tr><td colspan=15 align="center">��ѯ��������</td></tr>';
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
$query = mysql_query("select * from  ubouid   ".$sql." order by id desc   limit $offset, $Page_size");
while ($a=mysql_fetch_array($query)) { 
?> 	
<tr>
<td align="center"><?php echo $a[userid]?></td>
<td align="center"><?php 
$userid=$a[userid];
$sql="select sum(uidmoney) from ubotj where  uid='$userid' and shijian like '%".$day."%' ";

if ($res=mysql_query($sql)){

list($money1)=mysql_fetch_row($res);

mysql_free_result($res);


} 
if($money1 == null){ ?>��0Ԫ<?php }else{  ?>��<?php $xs1=round($money1,2);echo $xs1;?> Ԫ<?php }
?>
</td>
<td align="center"><?php 
$userid=$a[userid];
$sql="select sum(uidmoney) from ubotj where  uid='$userid' and shijian like '%".$zuori."%' ";

if ($res=mysql_query($sql)){

list($money1)=mysql_fetch_row($res);

mysql_free_result($res);


} 
if($money1 == null){ ?>��0Ԫ<?php }else{  ?>��<?php $xs1=round($money1,2);echo $xs1;?> Ԫ<?php }
?>
</td>
<td align="center"><?php 
$userid=$a[userid];
$sql="select sum(uidmoney) from ubotj where  uid='$userid'  ";

if ($res=mysql_query($sql)){

list($money1)=mysql_fetch_row($res);

mysql_free_result($res);


} 
if($money1 == null){ ?>��0Ԫ<?php }else{  ?>��<?php $xs1=round($money1,2);echo $xs1;?> Ԫ<?php }
?>
</td>
<td align="center"><?php echo $a[user]?></td>
<td align="center"> <?php echo $a[pass]?></td>
</tr>
<?php 
} 
$page_len = ($page_len%2)?$page_len:$pagelen+1;//ҳ����� 
$pageoffset = ($page_len-1)/2;//ҳ���������ƫ���� 
$key.="<li><a class='number' >��ǰ�� $page ҳ/�� $pages ҳ</a></li>"; //�ڼ�ҳ,����ҳ 
if($page!=1){ 
if($pid){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=1&id=$pid\">&laquo;</a></li>"; //��ҳ 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&id=$pid\">&lt;</a></li>"; //��һҳ 
}else {
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=1\">&laquo;</a></li>"; //��ҳ 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">&lt;</a></li>"; //��һҳ 
}
}else { 
$key.="<li><a>&laquo;</a> "; //��ҳ 
$key.="<li><a >&lt;</a>"; //��һҳ  
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
$key.='<li class="active"><span>'.$i.'</span></li>'; 
} else { 
if($pid){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&id=$pid\">".$i."</a></li>"; 
} else { 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a></li>"; 
}
} 
} 
if($page!=$pages){ 
if($pid){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&id=$pid\">&gt;</a></li> ";//��һҳ 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&id=$pid\">&raquo;</a></li> "; //���һҳ 
}else { 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">&gt;</a></li> ";//��һҳ 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">&raquo;</a></li> "; //���һҳ 
}
}else { 
$key.="<li>&gt;</li>";//��һҳ 
$key.="<li>&raquo;</li>"; //���һҳ 
} 
$key.=''; 
?> 
</tbody>
</table>
<!--��ҳ-->
<ul class="pagination">
<?php if($count =="0"){?><?php }else{?><?php echo $key?><?php }?>
</ul>
</div>
</form>
</div>
</div>
</div>
<?php include_once('foot.php'); ?> 
</body>
</html>