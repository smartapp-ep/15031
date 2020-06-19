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
$u="http://".$_SERVER['HTTP_HOST']."/";
$pid=ubo($_GET[pid]);
$uid=ubo($_GET[uid]);
if($pid){
$longurl=$u."?pid=".$pid."&uid=".$uid;
//$url=urlencode($longurl);
$url=$longurl;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>二维码</title>
</head>
<body>
<div id="output"></div>
<script src="jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="jquery.qrcode.min.js"></script>
<script>
jQuery(function(){
jQuery('#output').qrcode("<?php echo $url?>");
})
</script>
</body>
</html>

