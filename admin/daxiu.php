<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('���������ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}
$name=ubo($_GET["name"]);
$del=ubo($_GET[action]);
$delid=ubo($_GET[delid]);
if($del=="del"){
$type="id='$delid'";
dbdel(daxiu,$type);
$page=ubo($_GET["page"]);
if ($page){
echo msglayerurl("ɾ���ɹ�",8,"daxiu.php?page=$page");
}else{
echo msglayerurl("ɾ���ɹ�",8,"daxiu.php");
}
}
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
<li class="layui-this"><a href="daxiu.php">������Դ</a></li>
<li class=""><a href="daxiutj.php">�����Դ</a></li>
<?php
$sql = mysql_query("SELECT * FROM daxiu");
$bs = mysql_num_rows($sql);
?>
<li class="layui">������Դ <?php if($bs==null){?>0<?php }else{?><?php echo $bs?><?php }?> �� </li>
</ul>
<div class="layui-tab-content">
<form class="layui-form layui-form-pane" action="" method="get">
<div class="layui-inline">
<label class="layui-form-label">��������</label>
<div class="layui-input-inline">
<input type="text" name="name" value="<?php if($name==null){ }else{ echo $name;}?>" placeholder="��������" class="layui-input">
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
<th align="center" >����</th>
<th align="center">��ַ</th>
<th align="center">�ȶ�</th>
<th align="center">����</th>
<th align="center">����</th>
</tr>
</thead>
<tbody>

<?php 
$Page_size=18; 
$sql = "WHERE 1=1";
if($name){
$sql .=" and name like '%$name%' ";
}
$result = mysql_query("select id from daxiu   ".$sql."  ");
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
$query = mysql_query("select * from  daxiu   ".$sql." order by id desc   limit $offset, $Page_size");
while ($a=mysql_fetch_array($query)) { 
?> 	

<tr>
<td align="center"><?php echo $a[name]?></td>	
<td align="center"><?php if($a[url]==null){ ?>����Ƶ��ַ<?php }else{ ?><?php echo $a[url]?><?php } ?></td>
<td align="center"><?php echo $a[hit]?></td>
<td align="center"><?php echo $a[diqu]?></td>
<td align="center">
<a href="daxiuedit.php?id=<?php echo $a[id]?>&page=<?php echo $page?>" class="layui-btn layui-btn-normal layui-btn-mini">�༭</a>
<a href="?action=del&delid=<?php echo $a[id]?>&page=<?php echo $page?>"  target="msgubotj" class="layui-btn layui-btn-danger layui-btn-mini ajax-delete">ɾ��</a></td>
</tr>
<?php 
} 
$page_len = ($page_len%2)?$page_len:$pagelen+1;//ҳ����� 
$pageoffset = ($page_len-1)/2;//ҳ���������ƫ���� 
$key.="<li><a class='number' >��ǰ�� $page ҳ/�� $pages ҳ</a></li>"; //�ڼ�ҳ,����ҳ 
if($page!=1){ 
if($name){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=1&name=$name\">&laquo;</a></li>"; //��ҳ 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&name=$name\">&lt;</a></li>"; //��һҳ 
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
if($name){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&name=$name\">".$i."</a></li>"; 
} else { 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a></li>"; 
}
} 
} 
if($page!=$pages){ 
if($name){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&name=$name\">&gt;</a></li> ";//��һҳ 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&name=$name\">&raquo;</a></li> "; //���һҳ 
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