<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('���������ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}
if(ubo($_POST[bfok])){
//////////////////////////////////////////////////////////////////////////////////////////////////////
$cfg_db_language = 'gbk';
$path = "../backup/";//��Ҫ��֤����ļ��д��ڣ����ҿ�д
$to_file_name =$path. $database . date('Ymjgi') . ".sql";
//�������ݿ�
$link = mysql_connect($localhost,$root,$password);
mysql_select_db($database);
//ѡ�����
mysql_query("set names ".$cfg_db_language);
//���ݿ�������Щ��
$tables = mysql_list_tables($database);
//����Щ���¼��һ������
$tabList = array();
while($row = mysql_fetch_row($tables)){
$tabList[] = $row[0];
}
//��ÿ����ı�ṹ�������ļ�
foreach($tabList as $val){
$sql = "show create table ".$val;
$res = mysql_query($sql,$link);
$row = mysql_fetch_array($res);
$info = "-- ----------------------------\r\n";
$info .= "-- Table structure for `".$val."`\r\n";
$info .= "-- ----------------------------\r\n";
$info .= "DROP TABLE IF EXISTS `".$val."`;\r\n";
$sqlStr = $info.$row[1].";\r\n\r\n";
//׷�ӵ��ļ�
file_put_contents($to_file_name,$sqlStr,FILE_APPEND);
//�ͷ���Դ
mysql_free_result($res);
}
//��ÿ��������ݵ������ļ�
foreach($tabList as $val){
$sql = "select * from ".$val;
$res = mysql_query($sql,$link);
//�������û�����ݣ��������һ�ű�
if(mysql_num_rows($res)<1) continue;
//
//��ȡ����
while($row = mysql_fetch_row($res)){
$sqlStr = "INSERT INTO `".$val."` VALUES (";
foreach($row as $zd){
$sqlStr .= "'".$zd."', ";
}
//ȥ�����һ�����źͿո�
$sqlStr = substr($sqlStr,0,strlen($sqlStr)-2);
$sqlStr .= ");\r\n";
file_put_contents($to_file_name,$sqlStr,FILE_APPEND);

}
//�ͷ���Դ
mysql_free_result($res);
file_put_contents($to_file_name,"\r\n",FILE_APPEND);
echo msglayerurl("���ݱ��ݳɹ�",8,"beifen.php");
}

}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>���ݱ���</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="css/layui.css" media="all">
<link rel="stylesheet" href="css/font-awesome.min.css">
<!--CSS����-->
<link rel="stylesheet" href="css/peizhi.css">
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
<li class="layui-this"><a href="beifen.php">���ݱ���</a></li>
<li class=""><a href="daoru.php">���ݵ���</a></li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<form class="layui-form form-container" action="" method="post" target="msgubotj">
<div class="layui-form-item">
<label class="layui-form-label">���ݿ��ַ</label>
<div class="layui-input-block">
<input type="text" name="host" value="<?php echo $localhost?>" required lay-verify="required" placeholder="���ݿ��ַ" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">���ݿ��û�</label>
<div class="layui-input-block">
<input type="text" name="user" value="<?php echo $root?>" required lay-verify="required" placeholder="���ݿ��û�" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">���ݿ�����</label>
<div class="layui-input-block">
<input type="text" name="password" value="<?php echo $password?>" required lay-verify="required" placeholder="���ݿ�����" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">���ݿ�����</label>
<div class="layui-input-block">
<input type="text" name="database" value="<?php echo $database?>" required lay-verify="required" placeholder="���ݿ�����" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">����·��</label>
<div class="layui-input-block">
<input type="text" name="u" value="/backup/" placeholder="/backup/" autocomplete="off" class="layui-input" readonly="readonly"  >
</div>
</div>

<div class="layui-form-item">
<div class="layui-input-block">
<input type="submit"  class="layui-btn"  value="�ύ" name= "bfok"   >
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<?php include_once('foot.php'); ?> 
</body>
</html>