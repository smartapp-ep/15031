<?php
error_reporting(0);
include_once("config.php"); 

$ubomoney=$_GET["ubomoney"] * 100;//�ύ��֧�����
//$ubomoney='1';//�ύ��֧�����
$ubopid=$_GET["pid"];//�ύ������
$ubouid=$_GET["uid"];//�ύ������
$userid=$_GET["userid"];//�ύ���û�ID

$ubodes="vip";//�ύ���û��ȼ�
$ubotzurl=$ubotzurl;//֪ͨ��Ϣ
$ubobackurl=$ubobackurl;//��ת��ַ
if($ubopid==null){$ubopid=$uboid;}
if($ubouid==null){$ubouid=$uboid;}
$toid = $ubopid."_".$ubouid;
$ubodingdan=date("YmdHis")."_".$userid;//������
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
$ubosign = md5($ubostr);//ǩ������ 32λСд����ϼ�����֤��
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