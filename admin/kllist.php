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
$btime=ubo($_GET["btime"]);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>�����б�</title>
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
<li class="layui-this"><a href="kllist.php">�����б�</a></li>
</ul>
<div class="layui-tab-content">
<form class="layui-form layui-form-pane" action="" method="get">
<div class="layui-inline">
<label class="layui-form-label">����ID</label>
<div class="layui-input-inline">
<input type="text" name="userid" value="<?php if($userid==null){ }else{ echo $userid;}?>" placeholder="����������ID" class="layui-input">
</div>
</div>
<div class="layui-inline">
<label class="layui-form-label">����</label>
<div class="layui-input-inline">
<input type="text" name="btime" id="btime"  value="<?php if($btime==null){ echo date('Y-m-d');}else{ echo $btime;}?>" placeholder="" class="layui-input"   >
</div>
</div>
<SCRIPT language=javascript src="../app/laydate/laydate.js" charset="utf-8"></SCRIPT>
<script>
!function(){
laydate.skin('molv');//�л�Ƥ������鿴skins����Ƥ����
laydate({elem: '#btime'});//��Ԫ��
}();
</script>
<div class="layui-inline">
<button class="layui-btn">����</button>
</div>
</form>
<hr>
<div class="layui-tab-item layui-show">
<table class="layui-table">
<?php 
if($btime){
$day=$btime;
$zuori=date("Y-m-d",strtotime("$day-1 day"));
}else{
$day=date("Y-m-d");
$zuori=date("Y-m-d",strtotime("$day-1 day"));
}
//���տ����ܽ��
$sql="select sum(money) from kllist  WHERE    shijian like '%".$day."%' ";
if ($res=mysql_query($sql)){
list($money1)=mysql_fetch_row($res);
mysql_free_result($res);
} 
//���տ����ܽ��
$sql="select sum(money) from kllist  WHERE    shijian like '%".$zuori."%' ";
if ($res=mysql_query($sql)){
list($money2)=mysql_fetch_row($res);
mysql_free_result($res);
} 
//���տ���
$sql = mysql_query("SELECT * FROM kllist  WHERE    shijian like '%".$day."%'");
$daydd = mysql_num_rows($sql);
//���տ���
$sql2 = mysql_query("SELECT * FROM kllist WHERE   shijian like '%".$zuori."%'  ");
$zdd = mysql_num_rows($sql2);
//��ʷ�ܿ���
$sql2 = mysql_query("SELECT * FROM kllist ");
$z = mysql_num_rows($sql2);
//��ʷ�ܽ��
$sql="select sum(money) from kllist";
if ($res=mysql_query($sql)){
list($money5)=mysql_fetch_row($res);
mysql_free_result($res);
} 
?>
<thead>
<tr>
<th align="center"><?php if($btime){?><?php echo $day?>��������<?php }else{?>���տ�������<?php }?></th>
<th align="center"><?php if($btime){?><?php echo $day?>��������<?php }else{?>���տ�������<?php }?></th>
<th align="center"><?php if($btime){?><?php echo $day?>�����ܽ��<?php }else{?>���տ����ܽ��<?php }?></th>
<th align="center"><?php if($btime){?><?php echo $zuori?>�����ܽ��<?php }else{?>���տ����ܽ��<?php }?></th>
<th align="center">��ʷ�ܱ���</th>
<th align="center">��ʷ�ܽ��</th>
</tr>
</thead>
<tbody>
<tr>
<td align="center"><?php echo $daydd?> ��</td>
<td align="center"><?php echo $zdd?> ��</td>
<td align="center"><?php if($money1 == null){ ?>��0Ԫ<?php }else{  ?>��<?php $xs1=round($money1,2);echo $xs1;?> Ԫ<?php } ?></td>
<td align="center"><?php if($money2 == null){ ?>��0Ԫ<?php }else{  ?>��<?php $xs1=round($money2,2);echo $xs1;?> Ԫ<?php } ?></td>
<td align="center"><?php echo $z?> ��</td>
<td align="center"><?php if($money5 == null){ ?>��0Ԫ<?php }else{  ?>��<?php $xs1=round($money5,2);echo $xs1;?> Ԫ<?php } ?></td>
</tr>
</tbody>
</table>
<hr>
<table class="layui-table">
<thead>
<tr>
<th align="center" >���ݱ��</th>
<th align="center" >����ID</th>
<th align="center" >����UID</th>
<th align="center" >������</th>
<th align="center" >�̻�������</th>
<th align="center" >��Ʒ����</th>
<th align="center" >��������</th>
<th align="center" >����״̬</th>
</tr>
</thead>
<tbody>
<?php 
$Page_size=17; 
$sql = "WHERE 1=1";
if($userid){
$sql .=" and   pid='$userid' ";
}else{
if($btime){
$sql .="   and shijian='$btime'";
}
}
$result = mysql_query("select id from kllist   ".$sql."");
$count = mysql_num_rows($result);
if($count == 0){
echo '<tr><td colspan=10 align="center">��ѯ��������</td></tr>';
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
$query = mysql_query("select * from kllist ".$sql." order by id desc   limit $offset, $Page_size");
while ($a=mysql_fetch_array($query)) { 
?> 
<tr>
<td align="center"><?php echo $a[id]?></td>
<td align="center"><?php echo $a[pid]?></td>
<td align="center"><?php echo $a[uid]?></td>
<td align="center"><?php echo $a[money]?></td>
<td align="center"><?php echo $a[ddh]?></td>
<td align="center"><?php echo $a[des]?></td>
<td align="center"><?php echo $a[shijian]?></td>
<td align="center"><?php echo $a[ddzt]?></td>
</tr>
<?php 
} 
$page_len = ($page_len%2)?$page_len:$pagelen+1;//ҳ����� 
$pageoffset = ($page_len-1)/2;//ҳ���������ƫ���� 
$key.="<li><a class='number' >��ǰ�� $page ҳ/�� $pages ҳ</a></li>"; //�ڼ�ҳ,����ҳ 
if($page!=1){ 
if($userid){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=1&userid=$userid&btime=$btime\">&laquo;</a></li>"; //��ҳ 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&userid=$userid&btime=$btime\">&lt;</a></li>"; //��һҳ 
}elseif($btime){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=1&userid=$userid&btime=$btime\">&laquo;</a></li>"; //��ҳ 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&userid=$userid&btime=$btime\">&lt;</a></li>"; //��һҳ 
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
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&userid=$userid&btime=$btime\">".$i."</a></li>"; 
}elseif($btime){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&userid=$userid&btime=$btime\">".$i."</a></li>"; 
} else { 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a></li>"; 
}
} 
} 
if($page!=$pages){ 
if($userid){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&userid=$userid&btime=$btime\">&gt;</a></li> ";//��һҳ 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&userid=$userid&btime=$btime\">&raquo;</a></li> "; //���һҳ 
}elseif($btime){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&userid=$userid&btime=$btime\">&gt;</a></li> ";//��һҳ 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&userid=$userid&btime=$btime\">&raquo;</a></li> "; //���һҳ 
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

</div>
</div>
</div>
<?php include_once('foot.php'); ?> 
</body>
</html>