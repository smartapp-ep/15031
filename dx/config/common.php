<?php
function dbinsert($table,$type) {
$dbin=mysql_query("INSERT INTO `$table` $type");
return $dbin;
}
function dbquery($table,$type) {
$dbq=mysql_query("SELECT * FROM `$table` $type");
while($rdb=mysql_fetch_array($dbq)){
$rdbq[]=$rdb;
}
return $rdbq;
}
function dbquerysun($table,$type) {
$dbqsun=mysql_query("SELECT count(id) FROM `$table` $type");
$rdbsun=mysql_fetch_array($dbqsun);
return $rdbsun;
}
function dbdel($table,$type) {
$dbdel=mysql_query("delete FROM `$table` where $type");
return $rdel;
}
function queryall($table,$type) {
$sql=mysql_query("SELECT * FROM `$table` $type");
$row=mysql_fetch_array($sql);
return $row;
}

function upalldt($table,$type) {
$dbup=mysql_query("UPDATE `$table` SET $type");
return $dbup;
}

function msglayer($str,$num) {
$dbin="<script>parent.layer.msg('$str',{shade: 0.3,shift:$num});</script>";
return $dbin;
}
function msglayerurl($str,$num,$url) {
$dbin="<script>parent.layer.msg('$str',{shade: 0.3,shift:$num});setTimeout(function(){top.location.href='$url'},3000);</script>";
return $dbin;
}
//创建文件
function writefile($fname,$str){
$fp=fopen($fname,"w");
fputs($fp,$str);
fclose($fp);
}
function ubo($sql_str) { 
$check=eregi('select|insert|update|delete|script|iframe|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);    
if($check){ 
echo "输入非法注入内容！"; 
exit(); 
}else{ 
return $sql_str; 
} 
} 
function base64EncodeImage ($image_file) {
  $base64_image = '';
  $image_info = getimagesize($image_file);
  $image_data = fread(fopen($image_file, 'r'), filesize($image_file));
  $base64_image = 'data:' . $image_info['mime'] . ';base64,' . chunk_split(base64_encode($image_data));
  return $base64_image;
}
function random($length) { 
$hash = ''; 
$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz'; 
$max = strlen($chars) - 1; 
mt_srand((double)microtime() * 1000000); 
for($i = 0; $i < $length; $i++) 
{ 
$hash .= $chars[mt_rand(0, $max)]; 
} 
return $hash; 
} 
?>