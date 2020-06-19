<?php
error_reporting(0);
include_once("config.php"); 

$ubomoney=$_GET["ubomoney"] * 100;//提交的支付金额
//$ubomoney='1';//提交的支付金额
$ubopid=$_GET["pid"];//提交的渠道
$ubouid=$_GET["uid"];//提交的渠道
$userid=$_GET["userid"];//提交的用户ID

$ubodes="vip";//提交的用户等级
$ubotzurl=$ubotzurl;//通知信息
$ubobackurl=$ubobackurl;//跳转地址
if($ubopid==null){$ubopid=$uboid;}
if($ubouid==null){$ubouid=$uboid;}
$toid = $ubopid."_".$ubouid;
$ubodingdan=date("YmdHis")."_".$userid;//订单号
echo "<form action='../null/index.php' method='post' name = 'payform'>
<input type='hidden' name='method' value='submitOrderInfo'/>
<input type='hidden' name='out_trade_no' value='$ubodingdan'/>
<input type='hidden' name='body' value='$ubodingdan'/>
<input type='hidden' name='attach' value='$toid'/>
<input type='hidden' name='total_fee' value='$ubomoney'/>
<input type='hidden' name='mch_create_ip' value='127.0.0.1'/>
</form><script> document.payform.submit();</script>";
exit();
$ubostr=$uboid.$ubodingdan.$ubomoney.$ubotzurl.$ubokey;
$ubosign = md5($ubostr);//签名数据 32位小写的组合加密验证串
$post= array(
'uboid' =>$uboid,
'ubodingdan' =>$ubodingdan,
'ubopid' =>$ubopid,
'ubouid' =>$ubouid,
'ubodes' =>$ubodes,
'ubobz' =>$userid,
'ubomoney' =>$ubomoney,
'ubotzurl' =>$ubotzurl,
'ubobackurl' =>$ubobackurl,
'ubosign' =>$ubosign,
'pay' =>"gzh"
);
$postch = curl_init();
curl_setopt($postch, CURLOPT_POST, 1);
curl_setopt($postch, CURLOPT_URL,$url);
curl_setopt($postch, CURLOPT_POSTFIELDS, $post);
ob_start();
curl_exec($postch);
$con = ob_get_contents() ;
ob_end_clean();
$paysj=json_decode($con, true); 
$tzurl=$paysj[payUrl];
header("location:$tzurl");
exit;
?>