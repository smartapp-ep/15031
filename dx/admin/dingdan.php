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
$btime=ubo($_GET["btime"]);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>订单列表</title>
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
<li class="layui-this"><a href="dingdan.php">订单列表</a></li>
</ul>
<div class="layui-tab-content">
<form class="layui-form layui-form-pane" action="" method="get">
<div class="layui-inline">
<label class="layui-form-label">渠道ID</label>
<div class="layui-input-inline">
<input type="text" name="userid" value="<?php if($userid==null){ }else{ echo $userid;}?>" placeholder="请输入渠道ID" class="layui-input">
</div>
</div>
<div class="layui-inline">
<label class="layui-form-label">日期</label>
<div class="layui-input-inline">
<input type="text" name="btime" id="btime"  value="<?php if($btime==null){ echo date('Y-m-d');}else{ echo $btime;}?>" placeholder="" class="layui-input"   >
</div>
</div>
<SCRIPT language=javascript src="../app/laydate/laydate.js" charset="utf-8"></SCRIPT>
<script>
!function(){
laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
laydate({elem: '#btime'});//绑定元素
}();
</script>
<div class="layui-inline">
<button class="layui-btn">搜索</button>
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
//今日订单总金额
$sql="select sum(money) from dingdan  WHERE    shijian like '%".$day."%' ";
if ($res=mysql_query($sql)){
list($money1)=mysql_fetch_row($res);
mysql_free_result($res);
} 
//昨日订单总金额
$sql="select sum(money) from dingdan  WHERE    shijian like '%".$zuori."%' ";
if ($res=mysql_query($sql)){
list($money2)=mysql_fetch_row($res);
mysql_free_result($res);
} 
//今日订单
$sql = mysql_query("SELECT * FROM dingdan  WHERE    shijian like '%".$day."%'");
$daydd = mysql_num_rows($sql);
//昨日订单
$sql2 = mysql_query("SELECT * FROM dingdan WHERE   shijian like '%".$zuori."%'  ");
$zdd = mysql_num_rows($sql2);
//历史总订单
$sql2 = mysql_query("SELECT * FROM dingdan ");
$z = mysql_num_rows($sql2);
//历史总金额
$sql="select sum(money) from dingdan";
if ($res=mysql_query($sql)){
list($money5)=mysql_fetch_row($res);
mysql_free_result($res);
} 
?>
<thead>
<tr>
<th align="center"><?php if($btime){?><?php echo $day?>订单笔数<?php }else{?>今日订单笔数<?php }?></th>
<th align="center"><?php if($btime){?><?php echo $day?>订单笔数<?php }else{?>昨日订单笔数<?php }?></th>
<th align="center"><?php if($btime){?><?php echo $day?>订单总金额<?php }else{?>今日订单总金额<?php }?></th>
<th align="center"><?php if($btime){?><?php echo $zuori?>订单总金额<?php }else{?>昨日订单总金额<?php }?></th>
<th align="center">历史总笔数</th>
<th align="center">历史总金额</th>
</tr>
</thead>
<tbody>
<tr>
<td align="center"><?php echo $daydd?> 笔</td>
<td align="center"><?php echo $zdd?> 笔</td>
<td align="center"><?php if($money1 == null){ ?>￥0元<?php }else{  ?>￥<?php $xs1=round($money1,2);echo $xs1;?> 元<?php } ?></td>
<td align="center"><?php if($money2 == null){ ?>￥0元<?php }else{  ?>￥<?php $xs1=round($money2,2);echo $xs1;?> 元<?php } ?></td>
<td align="center"><?php echo $z?> 笔</td>
<td align="center"><?php if($money5 == null){ ?>￥0元<?php }else{  ?>￥<?php $xs1=round($money5,2);echo $xs1;?> 元<?php } ?></td>
</tr>
</tbody>
</table>
<hr>
<table class="layui-table">
<thead>
<tr>
<th align="center" >数据编号</th>
<th align="center" >渠道ID</th>
<th align="center" >渠道UID</th>
<th align="center" >付款金额</th>
<th align="center" >商户订单号</th>
<th align="center" >商品名称</th>
<th align="center" >订单日期</th>
<th align="center" >订单状态</th>
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
$result = mysql_query("select id from dingdan   ".$sql."");
$count = mysql_num_rows($result);
if($count == 0){
echo '<tr class="color2"><td colspan=10 align="center">查询不到数据</td></tr>';
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
$query = mysql_query("select * from dingdan ".$sql." order by id desc   limit $offset, $Page_size");
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
<td align="center"><?php if($a[ddzt]=='SUCCESS'){ ?>支付成功<?php }else{?>支付失败<?php }?></td>
</tr>
<?php 
} 
$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
$key.="<li><a class='number' >当前第 $page 页/共 $pages 页</a></li>"; //第几页,共几页 
if($page!=1){ 
if($userid){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=1&userid=$userid&btime=$btime\">&laquo;</a></li>"; //首页 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&userid=$userid&btime=$btime\">&lt;</a></li>"; //上一页 
}elseif($btime){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=1&userid=$userid&btime=$btime\">&laquo;</a></li>"; //首页 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&userid=$userid&btime=$btime\">&lt;</a></li>"; //上一页 
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
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&userid=$userid&btime=$btime\">&gt;</a></li> ";//下一页 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&userid=$userid&btime=$btime\">&raquo;</a></li> "; //最后一页 
}elseif($btime){
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&userid=$userid&btime=$btime\">&gt;</a></li> ";//下一页 
$key.="<li><a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&userid=$userid&btime=$btime\">&raquo;</a></li> "; //最后一页 
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

</div>
</div>
</div>
<?php include_once('foot.php'); ?> 
</body>
</html>