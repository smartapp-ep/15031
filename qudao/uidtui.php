<?php
error_reporting(0); 
$out= $_GET[out];
switch($out){
case 'out':
if(isset($_SESSION['uid'])){
$_SESSION = array();
if(isset($_COOKIE[session_name()])){
setcookie(session_name(),'',time()-3600);
}
session_destroy();
}
echo "<script>location.href='index.php'</script>";
}
?>
