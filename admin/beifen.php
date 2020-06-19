<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('管理身份已失效请重新登录!')</script><script>location.href='index.php'</script>";
exit;
}
if(ubo($_POST[bfok])){
//////////////////////////////////////////////////////////////////////////////////////////////////////
$cfg_db_language = 'gbk';
$path = "../backup/";//你要保证这个文件夹存在，并且可写
$to_file_name =$path. $database . date('Ymjgi') . ".sql";
//链接数据库
$link = mysql_connect($localhost,$root,$password);
mysql_select_db($database);
//选择编码
mysql_query("set names ".$cfg_db_language);
//数据库中有哪些表
$tables = mysql_list_tables($database);
//将这些表记录到一个数组
$tabList = array();
while($row = mysql_fetch_row($tables)){
$tabList[] = $row[0];
}
//将每个表的表结构导出到文件
foreach($tabList as $val){
$sql = "show create table ".$val;
$res = mysql_query($sql,$link);
$row = mysql_fetch_array($res);
$info = "-- ----------------------------\r\n";
$info .= "-- Table structure for `".$val."`\r\n";
$info .= "-- ----------------------------\r\n";
$info .= "DROP TABLE IF EXISTS `".$val."`;\r\n";
$sqlStr = $info.$row[1].";\r\n\r\n";
//追加到文件
file_put_contents($to_file_name,$sqlStr,FILE_APPEND);
//释放资源
mysql_free_result($res);
}
//将每个表的数据导出到文件
foreach($tabList as $val){
$sql = "select * from ".$val;
$res = mysql_query($sql,$link);
//如果表中没有数据，则继续下一张表
if(mysql_num_rows($res)<1) continue;
//
//读取数据
while($row = mysql_fetch_row($res)){
$sqlStr = "INSERT INTO `".$val."` VALUES (";
foreach($row as $zd){
$sqlStr .= "'".$zd."', ";
}
//去掉最后一个逗号和空格
$sqlStr = substr($sqlStr,0,strlen($sqlStr)-2);
$sqlStr .= ");\r\n";
file_put_contents($to_file_name,$sqlStr,FILE_APPEND);

}
//释放资源
mysql_free_result($res);
file_put_contents($to_file_name,"\r\n",FILE_APPEND);
echo msglayerurl("数据备份成功",8,"beifen.php");
}

}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>数据备份</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="css/layui.css" media="all">
<link rel="stylesheet" href="css/font-awesome.min.css">
<!--CSS引用-->
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
<!--主体-->

<div class="layui-body">
<!--tab标签-->
<div class="layui-tab layui-tab-brief">
<ul class="layui-tab-title">
<li class="layui-this"><a href="beifen.php">数据备份</a></li>
<li class=""><a href="daoru.php">数据导入</a></li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<form class="layui-form form-container" action="" method="post" target="msgubotj">
<div class="layui-form-item">
<label class="layui-form-label">数据库地址</label>
<div class="layui-input-block">
<input type="text" name="host" value="<?php echo $localhost?>" required lay-verify="required" placeholder="数据库地址" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">数据库用户</label>
<div class="layui-input-block">
<input type="text" name="user" value="<?php echo $root?>" required lay-verify="required" placeholder="数据库用户" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">数据库密码</label>
<div class="layui-input-block">
<input type="text" name="password" value="<?php echo $password?>" required lay-verify="required" placeholder="数据库密码" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">数据库名称</label>
<div class="layui-input-block">
<input type="text" name="database" value="<?php echo $database?>" required lay-verify="required" placeholder="数据库名称" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">备份路径</label>
<div class="layui-input-block">
<input type="text" name="u" value="/backup/" placeholder="/backup/" autocomplete="off" class="layui-input" readonly="readonly"  >
</div>
</div>

<div class="layui-form-item">
<div class="layui-input-block">
<input type="submit"  class="layui-btn"  value="提交" name= "bfok"   >
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