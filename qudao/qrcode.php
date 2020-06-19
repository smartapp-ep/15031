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
$pid=ubo($_GET[pid]);
$uid=ubo($_GET[uid]);
if($pid){
$link="?pid=".$pid."&uid=".$uid;
}else{
$link="";
}
$u="http://".$_SERVER['HTTP_HOST']."/";
$longurl=$u.$link;
//$tzurl=urlencode($longurl);
$tzurl=$longurl;
?>
<!doctype html>
<meta http-equiv="Content-Type" content="text/html;charset=gb2312">
<head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="img/bootstrap.min.css">
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/Watermark.js"></script>
<script> 
var newImgs = new Image();
var newImgsa = new Image();
var newImgsb = new Image();
var newImgsc = new Image();
var newImgsd = new Image();
var newImgse = new Image();
var newImgsf = new Image();
var newImgsg = new Image();
var newImgsh = new Image();
var newImgsi = new Image();
var newImgsj = new Image();
var newImgsk = new Image();
var newImgsl = new Image();
var newImgsm = new Image();
var newImgsn = new Image();
var newImgso = new Image();
var newImgsp = new Image();
var newImgsq = new Image();
newImgs.src = "img/1.jpg";//
newImgsa.src = "img/2.jpg";//
newImgsb.src = "img/3.jpg";//
newImgsc.src = "img/4.jpg";//
newImgsd.src = "img/5.jpg";//
newImgse.src = "img/6.jpg";//
newImgsf.src = "img/7.jpg";//
newImgsg.src = "img/8.jpg";//
newImgsh.src = "img/9.jpg";//
newImgsi.src = "img/10.jpg";//
newImgsj.src = "img/11.jpg";//
newImgsk.src = "img/12.jpg";//
newImgsl.src = "img/13.jpg";//
newImgsm.src = "img/14.jpg";//
newImgsn.src = "img/15.jpg";//
newImgso.src = "img/16.jpg";//
newImgsp.src = "img/17.jpg";//
newImgsq.src = "img/18.jpg";//

var newImgs2 = new Image();
var newImgs3 = new Image();
var newImgs4 = new Image();
var newImgs5 = new Image();
var newImgs6 = new Image();
var newImgs7 = new Image();
var newImgs8 = new Image();
var newImgs9 = new Image();
var newImgs10 = new Image();
var newImgs11 = new Image();
var newImgs12 = new Image();
var newImgs13 = new Image();
var newImgs14 = new Image();
var newImgs15 = new Image();
var newImgs16 = new Image();
var newImgs17 = new Image();
var newImgs18 = new Image();
var newImgs19 = new Image();
newImgs2.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
newImgs3.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
newImgs4.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
newImgs5.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
newImgs6.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
newImgs7.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
newImgs8.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
newImgs9.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
newImgs10.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
newImgs11.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
newImgs12.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
newImgs13.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
newImgs14.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
newImgs15.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
newImgs16.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
newImgs17.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
newImgs18.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
newImgs19.src = "http://pan.baidu.com/share/qrcode?w=180&h=180&url=<?php echo $tzurl?>";
window.onload = function() { 
var canvas1 = document.getElementById('thecanvas1');
var canvas2 = document.getElementById('thecanvas2');
var canvas3 = document.getElementById('thecanvas3');
var canvas4 = document.getElementById('thecanvas4');
var canvas5 = document.getElementById('thecanvas5');
var canvas6 = document.getElementById('thecanvas6');
var canvas7 = document.getElementById('thecanvas7');
var canvas8 = document.getElementById('thecanvas8');
var canvas9 = document.getElementById('thecanvas9');
var canvas10 = document.getElementById('thecanvas10');
var canvas11 = document.getElementById('thecanvas11');
var canvas12 = document.getElementById('thecanvas12');
var canvas13 = document.getElementById('thecanvas13');
var canvas14 = document.getElementById('thecanvas14');
var canvas15 = document.getElementById('thecanvas15');
var canvas16 = document.getElementById('thecanvas16');
var canvas17 = document.getElementById('thecanvas17');
var canvas18 = document.getElementById('thecanvas18');
var img1 = new Watermark(canvas1,newImgs,{arrImg:newImgs2,left:200,top:420,
width:newImgs2.width,
height:newImgs2.height
});
var img2 = new Watermark(canvas2,newImgsa,{arrImg:newImgs3,left:200,top:420,
width:newImgs3.width,
height:newImgs3.height
});
var img3 = new Watermark(canvas3,newImgsb,{arrImg:newImgs4,left:200,top:420,
width:newImgs4.width,
height:newImgs4.height
});
var img4 = new Watermark(canvas4,newImgsc,{arrImg:newImgs5,left:200,top:420,
width:newImgs5.width,
height:newImgs5.height
});
var img5 = new Watermark(canvas5,newImgsd,{arrImg:newImgs6,left:200,top:420,
width:newImgs6.width,
height:newImgs6.height
});
var img6 = new Watermark(canvas6,newImgse,{arrImg:newImgs7,left:200,top:420,
width:newImgs7.width,
height:newImgs7.height
});
var img7 = new Watermark(canvas7,newImgsf,{arrImg:newImgs4,left:200,top:420,
width:newImgs8.width,
height:newImgs8.height
});
var img8 = new Watermark(canvas8,newImgsg,{arrImg:newImgs4,left:200,top:420,
width:newImgs9.width,
height:newImgs9.height
});
var img9 = new Watermark(canvas9,newImgsh,{arrImg:newImgs10,left:200,top:420,
width:newImgs10.width,
height:newImgs10.height
});
var img10 = new Watermark(canvas10,newImgsi,{arrImg:newImgs11,left:200,top:420,
width:newImgs11.width,
height:newImgs11.height
});
var img11 = new Watermark(canvas11,newImgsj,{arrImg:newImgs12,left:200,top:420,
width:newImgs12.width,
height:newImgs12.height
});
var img12 = new Watermark(canvas12,newImgsk,{arrImg:newImgs13,left:200,top:420,
width:newImgs13.width,
height:newImgs13.height
});
var img13 = new Watermark(canvas13,newImgsl,{arrImg:newImgs14,left:200,top:420,
width:newImgs14.width,
height:newImgs14.height
});
var img14 = new Watermark(canvas14,newImgsm,{arrImg:newImgs15,left:200,top:420,
width:newImgs15.width,
height:newImgs15.height
});
var img15 = new Watermark(canvas15,newImgsn,{arrImg:newImgs16,left:200,top:420,
width:newImgs16.width,
height:newImgs16height
});
var img16 = new Watermark(canvas16,newImgso,{arrImg:newImgs17,left:200,top:420,
width:newImgs17.width,
height:newImgs17.height
});
var img17 = new Watermark(canvas17,newImgsp,{arrImg:newImgs18,left:200,top:420,
width:newImgs18.width,
height:newImgs18.height
});
var img18 = new Watermark(canvas18,newImgsq,{arrImg:newImgs19,left:200,top:420,
width:newImgs19.width,
height:newImgs19.height
});
//document.getElementById('saveImageBtn1').onclick = function(){//保存图片水印
//var url = img1.downImg();
//alert(url);
//}
}; 
</script> 
</head> 
<body bgcolor="#E6E6FA"> 
<div class="container">
<div class="row">
<div class="col-xs-12 col-md-6"> 
<h2>第一张</h2>
<canvas width=384 height=640 id="thecanvas1" ></canvas>
</div> 
<div class="col-xs-12 col-md-6"> 
<h2>第二张</h2>
<canvas width=384 height=640 id="thecanvas2" ></canvas>
</div> 
<div class="col-xs-12 col-md-6"> 
<h2>第三张</h2>
<canvas width=384 height=640 id="thecanvas3" ></canvas>
</div> 
<div class="col-xs-12 col-md-6"> 
<h2>第四张</h2>
<canvas width=384 height=640 id="thecanvas4" ></canvas>
</div> 
<div class="col-xs-12 col-md-6"> 
<h2>第五张</h2>
<canvas width=384 height=640 id="thecanvas5" ></canvas>
</div> 
<div class="col-xs-12 col-md-6"> 
<h2>第六张</h2>
<canvas width=384 height=640 id="thecanvas6" ></canvas>
</div> 
<div class="col-xs-12 col-md-6"> 
<h2>第七张</h2>
<canvas width=384 height=640 id="thecanvas7" ></canvas>
</div> 
<div class="col-xs-12 col-md-6"> 
<h2>第八张</h2>
<canvas width=384 height=640 id="thecanvas8" ></canvas>
</div> 
<div class="col-xs-12 col-md-6"> 
<h2>第九张</h2>
<canvas width=384 height=640 id="thecanvas9" ></canvas>
</div> 
<div class="col-xs-12 col-md-6"> 
<h2>第十张</h2>
<canvas width=384 height=640 id="thecanvas10" ></canvas>
</div> 
<div class="col-xs-12 col-md-6"> 
<h2>第十一张</h2>
<canvas width=384 height=640 id="thecanvas11" ></canvas>
</div> 
<div class="col-xs-12 col-md-6"> 
<h2>第十二张</h2>
<canvas width=384 height=640 id="thecanvas12" ></canvas>
<br />
<div><a href="1.php?pid=6666uid=111&id=12">下载</a></div>
</div> 
<div class="col-xs-12 col-md-6"> 
<h2>第十三张</h2>
<canvas width=384 height=640 id="thecanvas13" ></canvas>
</div> 
<div class="col-xs-12 col-md-6"> 
<h2>第十四张</h2>
<canvas width=384 height=640 id="thecanvas14" ></canvas>
<!--<br />-->
<!--<div><a href="1.php?pid=6666uid=111&id=14">下载</a></div>-->
</div>
</div>
</div>
</body> 
</html> 

