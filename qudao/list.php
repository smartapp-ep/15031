<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['userid'])){
echo "<script>alert('身份已失效请重新登录!')</script><script>location.href='index.php'</script>";
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
echo "<script>alert('删除成功，返回页面')</script><script>location.href='list.php?page=$page'</script>";
}else{
echo "<script>alert('删除成功，返回页面')</script><script>location.href='list.php'</script>";
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
<title>下线列表</title>
</head>
<body>
<div class="htop fix">
<div class="msg">你好，<span><?php echo $user[user]?></span> 欢迎登录<em class="pipe"></em><a href="main.php?out=out">【退出】</a></div>
</div>
<div class="mainbox">
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="100%">
<tbody>
<tr>
<td width="170" valign="top">
<div class="menu">
<ul class="fix">
<li><a href="data.php" >数据报表</a></li>
<li><a href="u.php">个人中心</a></li>
<li><a href="add.php">添加下线</a></li>
<li><a href="list.php"class="on">下线列表</a></li>
</ul>
</div>
</td>
<td width="10"></td>
<td valign="top">
<div class="rmain fix">
<div style="padding:10px; border:1px solid #C5C5C5; background:#e8e8e8; margin-bottom:10px; position:relative;color:#1BB97F;">
<form class="search" method="get" action="">&nbsp; &nbsp;
UID：<input id="uid" name="uid"  style="width:100px; height:30px; border:1px solid #C5C5C5; background:#fff;" type="text" value="<?php if($uid==null){ }else{ echo $uid;}?>" > 
<input type="submit" class="button" value="提交" style="width:65px; height:30px; background:#FF0000; color:#FFFFFF; vertical-align:middle; text-align:center; border:0; cursor:pointer" >
 &nbsp; &nbsp; &nbsp; &nbsp;
</form>
</div>
<div class="tb-all">
<div class="title">
<h3>下线列表</h3>
</div>
<table>
<thead>
<tr>
<th>推广ID</th>
<th>用户名</th>
<th>用户密码</th>
<th>分成比例</th>
<th>联系QQ</th>
<th>收款人</th>
<th>收款账号</th>
<th>精致二维码</th>
<th>普通二维码</th>
<th>推广直链</th>
<th>操作</th>
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
echo '<tr class="color2"><td colspan=18 align="center">查询不到数据</td></tr>';
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
<td   align="center"><a target="_blank"  style='color:#f00;' href="qrcode.php?pid=<?php echo $a[pid]?>&uid=<?php echo $a[userid]?>">[ 查看 ]</a></td>
<td   align="center"><a target="_blank"  style='color:#f00;' href="ewm.php?pid=<?php echo $a[pid]?>&uid=<?php echo $a[userid]?>">[ 查看 ]</a></td>
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
<td align="center"><a href="edit.php?id=<?php echo $a[id]?>&page=<?php echo $page?>" class="button">编辑</a>&nbsp;<a onClick="return window.confirm(&quot;单击“确定”继续。单击“取消”停止。&quot;);" href="?action=del&delid=<?php echo $a[id]?>&page=<?php echo $page?>" class="button" >删除</a></td>
</tr>
<?php 
} 
$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
$key='<tr><td colspan=18><div class="pagination">'; 
$key.="<a class='number' >当前第 $page 页/共 $pages 页</a> "; //第几页,共几页 
if($page!=1){ 
if($uid){
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1&userid=$uid\">首页</a> "; //首页 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&userid=$uid\">上一页</a>"; //上一页 
}else {
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\">首页</a> "; //首页 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">上一页</a>"; //上一页 

}
}else { 
$key.="<a> 首页</a> "; //首页 
$key.="<a >上一页</a>"; //上一页  
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
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&userid=$uid\">下一页</a> ";//下一页 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&userid=$uid\">最后一页</a>"; //最后一页 
}else { 
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">下一页</a> ";//下一页 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">最后一页</a>"; //最后一页 
}
}else { 
$key.=" <a >下一页</a> ";//下一页 
$key.="<a>最后一页</a>"; //最后一页 
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
