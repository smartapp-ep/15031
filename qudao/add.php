<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['userid'])){
echo "<script>alert('������ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}
$userid=ubo($_SESSION['userid']);
$type="WHERE userid='$userid'";
$user=queryall(ubouser,$type); 
if(ubo($_POST[sub])){
$username=ubo($_POST[user]);
$fc=ubo($_POST[fc]);
$pay=ubo($_POST[pay]);
$qq=ubo($_POST[qq]);
$kh=ubo($_POST[kh]);
$type="WHERE user='$username'";
$u=queryall(ubouid,$type); 
if($u){
echo "<script>alert('�Ѿ�����')</script><script>location.href='list.php'</script>";
}else{
$newpass=ubo($_POST[pass]);
$type = "order by id DESC limit 0,1";
$user=queryall(ubouid,$type);
$uid=$user[userid];
if ($userid==null){
$uid=$userid."100";
}else{
$uid=$user[userid]+1;
}
$type="(`id`, `user`, `pass`,`userid`,`pid`,`fc`,`pay`,`qq`,`kahao`) VALUES (null,'$username','$newpass','$uid','$userid','$fc','$pay','$qq','$kh')"; 
dbinsert(ubouid,$type);
echo "<script>alert('���ӳɹ�')</script><script>location.href='list.php'</script>";
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" href="tj/base.css">
<script type="text/javascript" src="tj/jquery.js"></script>
<title>��������</title>
</head>
<body>
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
<li><a href="u.php">��������</a></li>
<li><a href="add.php" class="on">��������</a></li>
<li><a href="list.php">�����б�</a></li>
</ul>
</div>
</td><!---->
<td width="10"></td>
<!--�ұ�-->
<td valign="top">
<div class="rmain fix">
<div class="ui-form">
<div class="title"><h3>��������</h3></div>
<div class="blank20"></div>
<table class="table-two" width="100%" border="0" cellspacing="0" cellpadding="0">
<tbody>
<FORM action="" method="post">
<tr>
<td class="td-title w150"><label for="" class="ui-label">�û�����</label></td>
<td>
<div class="ui-form-row">
<input type="text" name="user" value=""  class="ui-input w250" />*����
</div>
</td>
</tr>
<tr>
<td class="td-title w150"><label for="" class="ui-label">���룺</label></td>
<td>
<div class="ui-form-row">
<input type="password"  value=""   name="pass" class="ui-input w250" />*����
</div>
</td>
</tr>
<tr>
<td class="td-title w150"><label for="" class="ui-label">��ϵQQ��</label></td>
<td>
<div class="ui-form-row">
<input type="text" name="qq" value=""  class="ui-input w250" />
</div>
</td>
</tr>
<tr>
<td class="td-title w150"><label for="" class="ui-label">�տ�������</label></td>
<td>
<div class="ui-form-row">
<input type="text" name="pay" value=""  class="ui-input w250" />
</div>
</td>
</tr>
<tr>
<td class="td-title w150"><label for="" class="ui-label">�տ��˺ţ�</label></td>
<td>
<div class="ui-form-row">
<input type="text" name="kh" value=""  class="ui-input w250" />
</div>
</td>
</tr>
<tr>
<td class="td-title w150"><label for="" class="ui-label">�ֳɱ�����</label></td>
<td><p>
<select name="fc"  class="inpMain"  >
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
<input  name= "sub"  value="�� ��" class="ui-button-text" type="submit" id="btnPost" onClick=""> 
</td>
</tr>
</tbody>
</table>
</div>
</form>
</body>
</html>