<?php
$call=ubo($_SERVER["REQUEST_URI"]);
$call=parse_url($call);
$call=$call[path];
$call = substr ($call, strrpos($call,'/'), -4);
$call= substr ($call, 1); 
?>
<!--�����-->
<div class="layui-side layui-bg-black" id="menus_area">
<div class="layui-side-scroll">
<style type="text/css">
.menus_area{width:200px;height:auto !important;overflow:visible !important;position:fixed;height:100% !important;background-color:#393D49;color:#c2c2c2}
.menus_area li{line-height:33px;font-size:14px;color:#333;float:left;width:100%;}
.menus_area li ul{display:none;color:#666;padding:5px 0 5px 30px;}
.menus_area li ul li{float:none;background-image:none;height:26px;line-height:26px;margin-top:0px;font-size:12px;}
.menus_area li ul li a{padding-left:30px;display:block;color:#c2c2c2;line-height:20px;}
.menus_area li ul li a.cur{color: #fff;text-decoration:none;}
.menus_area li ul a:hover{color:#6fb600;}
.menus_area dt img{position:absolute;right:10px;top:20px;}
.menus_area dt{padding-left:40px;padding-right:10px;background-repeat:no-repeat;background-position:10px center;background-color: #393D49;color:#c2c2c2;font-size:14px;position:relative;line-height:48px;cursor:pointer;}
</style>
<div class="menus_area">
<ul class="clearfix" >
<li><dt><i class="fa fa-home"></i>   ����˵�<img src="images/select_xl01.png"></dt>
<ul  <?php if ($call=="home"){?>style="display:block;" <?php }?> >               
<li><a href="home.php" <?php if ($call=="home"){?>class="cur"<?php }?>>��վ����</a></li>               
</ul>
</li>
<li><dt><i class="fa fa-gears"></i>   ϵͳ����<img src="images/select_xl01.png"></dt>
<ul <?php if ($call=="system"  or $call=="beifen"  or $call=="daoru"  or $call=="tzurl" or $call=="zhifu"){?>style="display:block;" <?php }?>>               
<li><a href="system.php" <?php if ($call=="system"){?>class="cur"<?php }?>>��������</a></li>    
<li><a href="zhifu.php" <?php if ($call=="zhifu"){?>class="cur"<?php }?>>�������</a></li> 
<li><a href="tzurl.php" <?php if ($call=="tzurl"){?>class="cur"<?php }?>>��ת����</a></li>          
<li><a href="beifen.php" <?php if ($call=="beifen" or $call=="daoru"  ){?>class="cur"<?php }?>>���ݱ���</a></li>  
</ul>
</li>
<li><dt><i class="fa fa-bar-chart"></i>  ��������<img src="images/select_xl01.png"></dt>
<ul <?php if ($call=="dingdan" or $call=="kllist"){?>style="display:block;" <?php }?> >               
<li><a href="dingdan.php" <?php if ($call=="dingdan"){?>class="cur"<?php }?>>�����б�</a></li>  
<li><a href="kllist.php" <?php if ($call=="kllist"){?>class="cur"<?php }?>>�����б�</a></li>              
</ul>
</li>
<li><dt><i class="fa fa-user"></i> �ƹ�����<img src="images/select_xl01.png"></dt>
<ul <?php if ($call=="user"  or $call=="useredit" or $call=="adduser" ){?>style="display:block;" <?php }?>>
<li><a href="user.php" <?php if ($call=="user"){?>class="cur"<?php }?>>�ƹ�����</a></li>               
</ul>
</li>
<li><dt><i class="fa fa-star"></i>  ��Ƶ�б�<img src="images/select_xl01.png"></dt>
<ul <?php if ($call=="zhibo" or $call=="zhibotj" or $call=="zhiboedit" or $call=="daxiu" or $call=="daxiutj" or $call=="daxiuedit"){?>style="display:block;" <?php }?>>               
<li><a href="zhibo.php" <?php if ($call=="zhibo" or $call=="zhibotj" or $call=="zhiboedit"){?>class="cur"<?php }?>>ֱ����Դ</a></li>  
<li><a href="daxiu.php" <?php if ($call=="daxiu" or $call=="daxiutj" or $call=="daxiuedit"){?>class="cur"<?php }?>>������Դ</a></li>  
</ul>
</li>
</ul>
</div>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
$(function () {
$(".menus_area ul li").click(function(){
var thisSpan=$(this);
$(".menus_area ul li ul").prev("a").removeClass("cur");
$("ul", this).prev("a").addClass("cur");
$(this).children("ul").slideDown("fast");
$(this).siblings().children("ul").slideUp("fast");
})
});
</script>
</div>
</div>