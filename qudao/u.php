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
echo msglayerurl("�޸ĳɹ�",4,"u.php");
}
if(ubo($_POST[sub1])){
$pass=ubo(md5($_POST[pass]));
$bjid=ubo($_POST[id]);
$passnew=ubo(md5($_POST[passnew]));
if($pass==$user[pass]){
$type="pass='$passnew' where id='$bjid'";
upalldt(ubouser,$type);
echo msglayerurl("�޸ĳɹ�",4,"u.php");
}else{
echo msglayerurl("ԭ���벻�ԣ�",4,"u.php");
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
<title>��������</title>
</head>
<body>
<div style="display:none"><iframe id="msgubotj" name="msgubotj" width=0 height=0></iframe></div>
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
<li><a href="u.php" class="on">��������</a></li>
<li><a href="add.php">�������</a></li>
<li><a href="list.php">�����б�</a></li>
</ul>
</div>
</td><!---->
<td width="10"></td>
<!--�ұ�-->
<td valign="top">
<div class="rmain fix">
<div class="ui-form">
<div class="title"><h3>������Ϣ</h3></div>
<div class="blank20"></div>
<table class="table-two" width="100%" border="0" cellspacing="0" cellpadding="0">
<tbody>
<FORM action="" method="post"  target="msgubotj">
<input type="hidden" name="id" value="<?php echo $user[id]?>">
<tr>
<td class="td-title w150"><label for="" class="ui-label">��ϵQQ</label></td>
<td>
<div class="ui-form-row">
<input type="text" name="qq" value="<?php echo $user[qq]?>"  class="ui-input w250" />
</div>
</td>
</tr>
<tr>
<td class="td-title w150"><label for="" class="ui-label">��ϵ�绰</label></td>
<td>
<div class="ui-form-row">
<input type="text" name="tel" value="<?php echo $user[tel]?>"  class="ui-input w250" />
</div>
</td>
</tr>
<tr>
<td class="td-title w150"><label for="" class="ui-label">�տ�����</label></td>
<td>
<div class="ui-form-row">
<input type="text" name="alipayname" value="<?php echo $user[alipayname]?>"    class="ui-input w250" />
</div>
</td>
</tr>
<tr>
<td class="td-title w150"><label for="" class="ui-label">�տ��ʺ�</label></td>
<td>
<div class="ui-form-row">
<input type="text" name="alipay" value="<?php echo $user[alipay]?>"  class="ui-input w250" />
</div>
</td>
</tr>
<tr>
<td class="td-title w130">&nbsp;</td>
<td>
<input  name= "sub"  value="�� ��" class="ui-button-text" type="submit" id="btnPost" onClick=""> 
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
<th class="firstth"><span class="f16">�����޸�</span></th>
</tr>
<tr>
<td class="td-title w100"><label for="" class="ui-label">ԭ����</label></td>
<td>
<div class="ui-form-row">
<input type="text" name="pass" value=""  class="ui-input w250" />
</div>
</td>
</tr>
<tr>
<td class="td-title w150"><label for="" class="ui-label">������</label></td>
<td>
<div class="ui-form-row">
<input type="text" name="passnew" value=""  class="ui-input w250" />
</div>
</td>
</tr>
<tr>
<td class="td-title w130">&nbsp;</td>
<td>
<input  name= "sub1"  value="�� ��" class="ui-button-text" type="submit" id="btnPost" onClick=""> 
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
