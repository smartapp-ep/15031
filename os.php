<?php
error_reporting(0); 
include("config/common.php");
include("config/conn.php");
//读取网站配置
$type="where id='1'";
$wzpeizhi=queryall(wzpeizhi,$type);
$gb=$wzpeizhi[gb];
$tz=$wzpeizhi[tz];
$pcurl=$wzpeizhi[pcurl];
if($gb==1){
echo $wzpeizhi[tip];
exit;
}
$agent = $_SERVER['HTTP_USER_AGENT'];
if (strpos($agent, 'MicroMessenger') === true) {
if($wzpeizhi[pc]==1){
echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">';
echo '</head>';
echo '<body>';
echo '<title>抱歉，出错了</title>';
echo '<meta charset="gb2312">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">';
echo '<link rel="stylesheet" type="text/css" href="css/weui.css">';
echo '<div class="weui_msg"><div class="weui_icon_area"><i class="weui_icon_info weui_icon_msg"></i></div>';
echo '<div class="weui_text_area"><h4 class="weui_msg_title">请在微信客户端打开链接 </br>'.$wzpeizhi[pctip].' </h4></div></div>';
echo '</body>';
echo '</html>';
exit;
}else{
header("location:$pcurl");
exit;
}
}else{
}