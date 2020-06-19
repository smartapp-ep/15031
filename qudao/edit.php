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
$bjid=ubo($_GET[id]);
$type="where id='$bjid'";
$xg=queryall(ubouid,$type);
$page=ubo($_GET["page"]);
if(ubo($_POST[edit])){
if(ubo($_POST[pass])==null){
echo "<script>alert('密码不能为空')</script><script>location.href='list.php'</script>";
}else{
$newpass=ubo($_POST[pass]);
$qq=ubo($_POST[qq]);
$pay=ubo($_POST[pay]);
$kahao=ubo($_POST[kahao]);
$fc=ubo($_POST[fc]);
$type="pass='$newpass',qq='$qq',pay='$pay',kahao='$kahao',fc='$fc'  where id='$bjid'";
upalldt(ubouid,$type);
if ($page){
echo "<script>alert('修改成功，返回页面')</script><script>location.href='list.php?page=$page'</script>";
}else{
echo "<script>alert('修改成功，返回页面')</script><script>location.href='list.php'</script>";
}
}}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" href="tj/base.css">
<script type="text/javascript" src="tj/jquery.js"></script>
<title>修改下线信息</title>
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
<li><a href="list.php">下线列表</a></li>
</ul>
</div>
</td><!---->
<td width="10"></td>
<!--右边-->
<td valign="top">
<div class="rmain fix">
<div class="ui-form">
<div class="title"><h3>修改下线信息</h3></div>
<div class="blank20"></div>
<table class="table-two" width="100%" border="0" cellspacing="0" cellpadding="0">
<tbody>
<FORM action="" method="post"><input type="hidden" name="id" value="<?php echo $xg[id]?>">
<tr class="color2">
<td class="td-title w150"><label for="" class="ui-label">密码：</label></td>
<td><p><input name="pass" type="password"   class="ui-input w250"    value=""> </p></td>
</tr>
<tr class="color3">
<td class="td-title w150"><label for="" class="ui-label">联系QQ：</label></td>
<td><p><input name="qq" type="text"   class="ui-input w250"   value="<?php echo $xg[qq]?>" ></p></td>
</tr>
<tr class="color2">
<td class="td-title w150"><label for="" class="ui-label">收款姓名：</label></td>
</p></td>
<td><p><input name="pay" type="text"  class="ui-input w250"  value="<?php echo $xg[pay]?>"  > </p></td>
</tr>
<tr class="color2">
<td class="td-title w150"><label for="" class="ui-label">收款账号：</label></td>
</p></td>
<td><p><input name="kahao" type="text"   class="ui-input w250"  value="<?php echo $xg[kahao]?>"  > </p></td>
</tr>
<tr class="color2">
<td class="td-title w150"><label for="" class="ui-label">分成比例：</label></td>
</p></td>
<td><p>
<select name="fc"     >
<option value='<?php echo $xg[fc]?>'><?php echo $xg[fc]?> % </option>
<?php 
for($i=0;$i<101;$i++){
echo "<option value='$i'>$i % </option>";
}
?>
</select>
</p></td>
</tr>
<tr>
<td class="td-title w130">&nbsp;</td>
<td>
<input  name= "edit"  value="提 交" class="ui-button-text" type="submit"> 
</td>
</tr>
</tbody>
</table>
</div>
</form>
</body>
</html>
