<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('���������ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}
$userid=ubo($_GET["userid"]);
$del=ubo($_GET[action]);
$delid=ubo($_GET[delid]);
if($del=="del"){
$type="id='$delid'";
dbdel(ubouser,$type);
$page=ubo($_GET["page"]);
if ($page){
echo msglayerurl("ɾ���ɹ�",8,"user.php?page=$page");
}else{
echo msglayerurl("ɾ���ɹ�",8,"user.php");
}
}
$zuori=date("Y-m-d",strtotime("-1 day"));
$day=date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>�ƹ�����</title>
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
<li class="layui-this"><a href="user.php">�ƹ�����</a></li>
<li class=""><a href="adduser.php">�������</a></li>
<?php
$sql = mysql_query("SELECT * FROM ubouser");
$bs = mysql_num_rows($sql);
?>
<li class="layui">�������� <?php if($bs==null){?>0<?php }else{?><?php echo $bs?><?php }?> �� </li>
</ul>
<div class="layui-tab-content">
<form class="layui-form layui-form-pane" action="" method="get">
<div class="layui-inline">
<label class="layui-form-label">�ƹ�ID</label>
<div class="layui-input-inline">
<input type="text" name="userid" value="<?php if($userid==null){ }else{ echo $userid;}?>" placeholder="�ƹ�ID" class="layui-input">
</div>
</div>
<div class="layui-inline">
<button class="layui-btn">����</button>
</div>
</form>
<hr>
<div class="layui-tab-item layui-show">
<table class="layui-table">
<thead>
<tr>
<th align="center" >�ƹ�ID</th>
<th align="center">�û���</th>
<th align="center">��ϵ�ֻ�</th>
<th align="center">��ϵQQ</th>
<th align="center">�տ���</th>
<th align="center" >�տ��ʺ�</th>
<th align="center">�ֳɱ��� %</th>
<th align="center">����</th>
<th align="center">��������</th>
<th align="center" >��������</th>
<th align="center">������</th>
<th align="center">�鿴����</th>
<th align="center">����</th>
</tr>
</thead>
<tbody>

<?php 
$Page_size=18; 
$sql = "WHERE 1=1";
if($userid){
$sql .=" and userid='$userid' ";
}
$result = mysql_query("select id from ubouser   ".$sql."  ");
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
$query = mysql_query("select * from  ubouser   ".$sql." order by id desc   limit $offset, $Page_size");
while ($a=mysql_fetch_array($query)) { 
?> 	

<tr>
<td align="center"><?php echo $a[userid]?></td>
<td align="center"><?php echo $a[user]?></td>
<td align="center"> <?php echo $a[tel]?></td>
<td align="center"><?php echo $a[qq]?></td>
<td align="center"><?php echo $a[alipayname]?></td>
<td align="center"><?php echo $a[alipay]?></td>
<td align="center"><?php echo $a[fencheng]?> %</td>
<td align="center"><?php if($a[kl]=="0"){?>������<?php }else{?>ÿ <?php echo $a[kl]?> ��  �� 1 ��<?php }?></td>

<td align="center"><?php 
$userid2=$a[userid];
$sql="select sum(pidmoney) from ubotj where  pid='$userid2' and shijian like '%".$day."%' ";

if ($res=mysql_query($sql)){

list($money1)=mysql_fetch_row($res);

mysql_free_result($res);


} 
if($money1 == null){ ?>��0Ԫ<?php }else{  ?>��<?php $xs1=round($money1,2);echo $xs1;?> Ԫ<?php }
?>
</td>
<td align="center"><?php 
$userid2=$a[userid];
$sql="select sum(pidmoney) from ubotj where  pid='$userid2' and shijian like '%".$zuori."%' ";

if ($res=mysql_query($sql)){

list($money1)=mysql_fetch_row($res);

mysql_free_result($res);


} 
if($money1 == null){ ?>��0Ԫ<?php }else{  ?>��<?php $xs1=round($money1,2);echo $xs1;?> Ԫ<?php }
?>
</td>
<td align="center"><?php 
$userid2=$a[userid];
$sql="select sum(pidmoney) from ubotj where  pid='$userid2'";

if ($res=mysql_query($sql)){

list($money1)=mysql_fetch_row($res);

mysql_free_result($res);


} 
if($money1 == null){ ?>��0Ԫ<?php }else{  ?>��<?php $xs1=round($money1,2);echo $xs1;?> Ԫ<?php }
?>
</td>
<td align="center"><a href="chakan.php?id=<?php echo $a[userid]?>">�鿴</a></td>
<td align="center">
<a href="useredit.php?id=<?php echo $a[id]?>&page=<?php echo $page?>" class="layui-btn layui-btn-normal layui-btn-mini">�༭</a>
<a href="?action=del&delid=<?php echo $a[id]?>&page=<?php echo $page?>"  target="msgubotj" class="layui-btn layui-btn-danger layui-btn-mini ajax-delete">ɾ��</a></td>
</tr>
<?php 
} 
$page_len = ($page_len%2)?$page_len:$pagelen+1;//ҳ����� 
$pageoffset = ($page_len-1)/2;//ҳ���������ƫ���� 
$key.="<li><a class='number' >��ǰ�� $page ҳ/�� $pages ҳ</a></li>"; //�ڼ�ҳ,����ҳ 
if($page!=1){ 
if($userid){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=1&userid=$userid\">&laquo;</a></li>"; //��ҳ 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&userid=$userid\">&lt;</a></li>"; //��һҳ 
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
if($userid){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&userid=$userid\">".$i."</a></li>"; 
} else { 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a></li>"; 
}
} 
} 
if($page!=$pages){ 
if($userid){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&userid=$userid\">&gt;</a></li> ";//��һҳ 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&userid=$userid\">&raquo;</a></li> "; //���һҳ 
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