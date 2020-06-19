<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('管理身份已失效请重新登录!')</script><script>location.href='index.php'</script>";
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
echo msglayerurl("删除成功",8,"user.php?page=$page");
}else{
echo msglayerurl("删除成功",8,"user.php");
}
}
$zuori=date("Y-m-d",strtotime("-1 day"));
$day=date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>推广渠道</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="css/layui.css" media="all">
<link rel="stylesheet" href="css/font-awesome.min.css">
<!--CSS引用-->
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
<!--主体-->
<div class="layui-body">
<!--tab标签-->
<div class="layui-tab layui-tab-brief">
<ul class="layui-tab-title">
<li class="layui-this"><a href="user.php">推广渠道</a></li>
<li class=""><a href="adduser.php">添加渠道</a></li>
<?php
$sql = mysql_query("SELECT * FROM ubouser");
$bs = mysql_num_rows($sql);
?>
<li class="layui">共有渠道 <?php if($bs==null){?>0<?php }else{?><?php echo $bs?><?php }?> 个 </li>
</ul>
<div class="layui-tab-content">
<form class="layui-form layui-form-pane" action="" method="get">
<div class="layui-inline">
<label class="layui-form-label">推广ID</label>
<div class="layui-input-inline">
<input type="text" name="userid" value="<?php if($userid==null){ }else{ echo $userid;}?>" placeholder="推广ID" class="layui-input">
</div>
</div>
<div class="layui-inline">
<button class="layui-btn">搜索</button>
</div>
</form>
<hr>
<div class="layui-tab-item layui-show">
<table class="layui-table">
<thead>
<tr>
<th align="center" >推广ID</th>
<th align="center">用户名</th>
<th align="center">联系手机</th>
<th align="center">联系QQ</th>
<th align="center">收款人</th>
<th align="center" >收款帐号</th>
<th align="center">分成比例 %</th>
<th align="center">扣量</th>
<th align="center">今日收入</th>
<th align="center" >昨日收入</th>
<th align="center">总收入</th>
<th align="center">查看下线</th>
<th align="center">操作</th>
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
echo '<tr><td colspan=15 align="center">查询不到数据</td></tr>';
}
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
<td align="center"><?php if($a[kl]=="0"){?>不扣量<?php }else{?>每 <?php echo $a[kl]?> 笔  扣 1 笔<?php }?></td>

<td align="center"><?php 
$userid2=$a[userid];
$sql="select sum(pidmoney) from ubotj where  pid='$userid2' and shijian like '%".$day."%' ";

if ($res=mysql_query($sql)){

list($money1)=mysql_fetch_row($res);

mysql_free_result($res);


} 
if($money1 == null){ ?>￥0元<?php }else{  ?>￥<?php $xs1=round($money1,2);echo $xs1;?> 元<?php }
?>
</td>
<td align="center"><?php 
$userid2=$a[userid];
$sql="select sum(pidmoney) from ubotj where  pid='$userid2' and shijian like '%".$zuori."%' ";

if ($res=mysql_query($sql)){

list($money1)=mysql_fetch_row($res);

mysql_free_result($res);


} 
if($money1 == null){ ?>￥0元<?php }else{  ?>￥<?php $xs1=round($money1,2);echo $xs1;?> 元<?php }
?>
</td>
<td align="center"><?php 
$userid2=$a[userid];
$sql="select sum(pidmoney) from ubotj where  pid='$userid2'";

if ($res=mysql_query($sql)){

list($money1)=mysql_fetch_row($res);

mysql_free_result($res);


} 
if($money1 == null){ ?>￥0元<?php }else{  ?>￥<?php $xs1=round($money1,2);echo $xs1;?> 元<?php }
?>
</td>
<td align="center"><a href="chakan.php?id=<?php echo $a[userid]?>">查看</a></td>
<td align="center">
<a href="useredit.php?id=<?php echo $a[id]?>&page=<?php echo $page?>" class="layui-btn layui-btn-normal layui-btn-mini">编辑</a>
<a href="?action=del&delid=<?php echo $a[id]?>&page=<?php echo $page?>"  target="msgubotj" class="layui-btn layui-btn-danger layui-btn-mini ajax-delete">删除</a></td>
</tr>
<?php 
} 
$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
$key.="<li><a class='number' >当前第 $page 页/共 $pages 页</a></li>"; //第几页,共几页 
if($page!=1){ 
if($userid){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=1&userid=$userid\">&laquo;</a></li>"; //首页 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&userid=$userid\">&lt;</a></li>"; //上一页 
}else {
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=1\">&laquo;</a></li>"; //首页 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">&lt;</a></li>"; //上一页 
}
}else { 
$key.="<li><a>&laquo;</a> "; //首页 
$key.="<li><a >&lt;</a>"; //上一页  
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
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&userid=$userid\">&gt;</a></li> ";//下一页 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&userid=$userid\">&raquo;</a></li> "; //最后一页 
}else { 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">&gt;</a></li> ";//下一页 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">&raquo;</a></li> "; //最后一页 
}
}else { 
$key.="<li>&gt;</li>";//下一页 
$key.="<li>&raquo;</li>"; //最后一页 
} 
$key.=''; 
?> 
</tbody>
</table>
<!--分页-->
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