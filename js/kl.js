//确保contextPath有值
if (!window.contextPath) {
	window.contextPath = "/" + window.location.pathname.split("/")[1];
	window.ctx = window.contextPath;
}
if(contextPath.indexOf("dianying")<0){
	contextPath="";
}
function GetRandomNum(){   
var Min=10,Max=9999;
var Range = Max - Min;   
var Rand = Math.random();   
return(Min + Math.round(Rand * Range));   
}   
function myreturn(){
history.go(-1);
}



function pay(ubomoney){
var pid = $("#pid").val();
var uid=$("#uid").val();
var userid=$("#userid").val();
var url=$("#url").val();
window.location.href=url+"/pay/pay.php?ubomoney="+ubomoney+"&pid="+pid+"&uid="+uid+"&userid="+userid;
}
$(function() {
var  pid= localStorage.getItem('pid');
if(pid ==null||pid==''||pid=='undefined'){
localStorage.setItem("pid",$("#pid").val());
}
});


