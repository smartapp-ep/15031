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
$type="where userid='$userid'";
$user=queryall(ubouser,$type);
if(ubo($_POST[sub])){
$tel=ubo($_POST[tel]);
$qq=ubo($_POST[qq]);
$alipayname=ubo($_POST[alipayname]);
$alipay=ubo($_POST[alipay]);
$bjid=ubo($_POST[id]);
$type="tel='$tel',qq='$qq',alipayname='$alipayname',alipay='$alipay'   where id='$bjid'";
upalldt(ubouser,$type);
echo msglayerurl("修改成功",4,"u.php");
}
if(ubo($_POST[sub1])){
$pass=ubo(md5($_POST[pass]));
$bjid=ubo($_POST[id]);
$passnew=ubo(md5($_POST[passnew]));
if($pass==$user[pass]){
$type="pass='$passnew' where id='$bjid'";
upalldt(ubouser,$type);
echo msglayerurl("修改成功",4,"u.php");
}else{
echo msglayerurl("原密码不对！",4,"u.php");
}}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" href="tj/base.css">
<script type="text/javascript" src="tj/jquery.js"></script>
<SCRIPT language=javascript src="../app/layer/layer.js"></SCRIPT>
<SCRIPT language=javascript src="../app/layer/diy.js"></SCRIPT>
<title>个人中心</title>
</head>
<body>
<div style="display:none"><iframe id="msgubotj" name="msgubotj" width=0 height=0></iframe></div>
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
<li><a href="u.php" class="on">个人中心</a></li>
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
<div class="title"><h3>基本信息</h3></div>
<div class="blank20"></div>
<table class="table-two" width="100%" border="0" cellspacing="0" cellpadding="0">
<tbody>
<FORM action="" method="post"  target="msgubotj">
<input type="hidden" name="id" value="<?php echo $user[id]?>">
<tr>
<td class="td-title w150"><label for="" class="ui-label">联系QQ</label></td>
<td>
<div class="ui-form-row">
<input type="text" name="qq" value="<?php echo $user[qq]?>"  class="ui-input w250" />
</div>
</td>
</tr>
<tr>
<td class="td-title w150"><label for="" class="ui-label">联系电话</label></td>
<td>
<div class="ui-form-row">
<input type="text" name="tel" value="<?php echo $user[tel]?>"  class="ui-input w250" />
</div>
</td>
</tr>
<tr>
<td class="td-title w150"><label for="" class="ui-label">收款姓名</label></td>
<td>
<div class="ui-form-row">
<input type="text" name="alipayname" value="<?php echo $user[alipayname]?>"    class="ui-input w250" />
</div>
</td>
</tr>
<tr>
<td class="td-title w150"><label for="" class="ui-label">收款帐号</label></td>
<td>
<div class="ui-form-row">
<input type="text" name="alipay" value="<?php echo $user[alipay]?>"  class="ui-input w250" />
</div>
</td>
</tr>
<tr>
<td class="td-title w130">&nbsp;</td>
<td>
<input  name= "sub"  value="提 交" class="ui-button-text" type="submit" id="btnPost" onClick=""> 
</td>
</tr>
</tbody>
</table>
</div>
</form>
<div class="blank10"></div>
<!--<div class="huoqu fix">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<FORM action="" method="post"  target="msgubotj">
<input type="hidden" name="id" value="<?php echo $user[id]?>">
<tbody><tr>
<th class="firstth"><span class="f16">密码修改</span></th>
</tr>
<tr>
<td class="td-title w100"><label for="" class="ui-label">原密码</label></td>
<td>
<div class="ui-form-row">
<input type="text" name="pass" value=""  class="ui-input w250" />
</div>
</td>
</tr>
<tr>
<td class="td-title w150"><label for="" class="ui-label">新密码</label></td>
<td>
<div class="ui-form-row">
<input type="text" name="passnew" value=""  class="ui-input w250" />
</div>
</td>
</tr>
<tr>
<td class="td-title w130">&nbsp;</td>
<td>
<input  name= "sub1"  value="提 交" class="ui-button-text" type="submit" id="btnPost" onClick=""> 
</td>
</tr>
</tbody>
</table>  
</form>
</div>-->
</div>
</td>
</tr>
</tbody>
</table>
</div>
<div class="blank20"></div>
</body>
</html>
