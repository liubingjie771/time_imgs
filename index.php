<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>
<meta charset="utf-8">
<title>js时钟</title>
<?php
date_default_timezone_set("Asia/ShangHai");
?>

<style type="text/css">
body
{
	background:black;
	border:0px;
	border-style:none;
}
#VIEWDT
{
	position:fixed;
	top: 0px;
	bottom:0px;
	left:0px;
	right:0px;
	z-index:98;
	background:black;
	filter:alpha(Opacity=40);-moz-opacity:0.4;opacity: 0.4;
	cursor:default;
}
#VIEWTXT
{
	position:fixed;
	bottom:10px;
	left:10px;
	right:10px;
	font-size:350px;
	font-weight:bold;
	color:white;
	z-index:99;
	font-family:黑体;
	cursor:default;
	text-align:center;
}
.sec{
	font-size:100px;
	font-weight:bold;
	color:white;
}
#backgd
{
	position:fixed;
	background:black;
	top:0px;
	bottom:0px;
	left:0px;
	right:0px;
	z-index:0;
	cursor:default;
}
#compinfo
{
	position:fixed;
	background:black;
	bottom:10px;
	left:30%;
	right:30%;
	height:40px;
	font-size:16px;
	line-height:40px;
	font-family:黑体;
	color:yellow;
	filter:alpha(Opacity=50);-moz-opacity:0.5;opacity: 0.5;
	z-index:3;
	cursor:default;
	text-align:center;
}
#bgimg
{
	position:fixed;
	top:0px;
	bottom:0px;
	left:0px;
	right:0px;
	height:100%;
	width:100%;
	z-index:0;
	background:black;
}
#ul1{
	width:130px; 
	height:60px; 
	padding:10px 3px; 
	background:#fff; 
	border:red 3px solid; 
	display:none; position:absolute; 
	left:0;top:0;
	z-index:1000;
}  
#ul1 li{ 
	width:130px; 
	height:28px; 
	line-height:28px; 
	font-size:14px; 
	border-bottom:lightgray 1px solid; 
	text-align:center; 
	list-style:none;
}  
#ul1 li:hover{ 
	background:#316AC5;
	cursor:hand;
}  
</style>
<script type="text/javascript"> 
document.oncontextmenu=new Function("event.returnValue=false");  
document.onselectstart=new Function("event.returnValue=false"); 
window.onload=function()  
{  
var ul=document.getElementById("ul1")  
document.oncontextmenu=function(ev)  
{  
var ev=ev||window.event  
var l=ev.clientX  
var t=ev.clientY  
ul.style.display="block"  
ul.style.left=l+'px'  
ul.style.top=t-16+'px'  
return false;  
}  
document.onclick=function()  
{  
ul.style.display="none"  
}  
}  
// 或者直接返回整个事件
document.oncontextmenu = function(){
    return false;
}
 //时间数字小于10，则在之前加个“0”补位。
function check(i){
	//方法一，用三元运算符
	var num;
	i<10?num="0"+i:num=i;
	return num;
	
	//方法二，if语句判断
	//if(i<10){
	//    i="0"+i;
	//}
	//return i;
}
function weekcn(a)
{
	switch(a)
	{
		case 0: return "星期日"; break;
		case 1: return "星期一"; break;
	}
}
setInterval(function(){   
	var date = new Date();   
	var year = date.getFullYear();    //获取当前年份   
	var mon = date.getMonth()+1;      //获取当前月份   
	var da = date.getDate();          //获取当前日   
	var day = date.getDay();          //获取当前星期几   
	var h = date.getHours();          //获取小时   
	var m = date.getMinutes();        //获取分钟   
	var s = date.getSeconds();        //获取秒   
	if(m==0 && s==0 )
		location.reload();
	var e = document.getElementById('VIEWTXT');    
	e.innerHTML=check(h)+':'+check(m)+'<font class=\"sec\">:'+check(s)+"</font>";  
},1000);
</script>
</head>
<body>
<ul id="ul1">
<li onclick="javascript:location.reload();">刷新页面</li>
<li onclick="javascript:window.close();">关闭页面</li>
</ul>
<noscript> 
<iframe src="*.htm"></iframe> 
</noscript> 
<center>
    <div id="VIEWDT"></div>
	<div id="VIEWTXT"></div>
	<?php
	$h=date("H");
	switch($h)
	{
		case 7:
		case 8:
		case 9:
		case 10:
		case 11:
		case 12:
		case 13:
		case 14:
		case 15:
		case 16:
		case 17:
		case 18:
		case 19:
		case 20:
		case 21:
			echo "<div id='backgd'><iframe id='bgimg' name='bgimg' src='img.php?rtime=30'></iframe></div>"; break;
			//echo "<div id='backgd'><iframe id='bgimg' name='bgimg' src='video.php?url=LiuHui.m4v&play=yes&loop=yes&muted=yes'></iframe></div>"; break;
			//echo "<div id='backgd'><iframe id='bgimg' name='bgimg' src='img.php?rtime=30'></iframe></div>"; break;
		default: echo "<div id='backgd'><img height='100%' src='http://book.ly2016.club:10080/time_imgs/images/1.jpg' /></div>"; break;
	}
	?>
	<div id="compinfo"><span style="float:left;">&nbsp;&nbsp;&nbsp;&nbsp;&trade;山东龙口星云龙韵信息俱乐部&trade;</span><span style="float:right">&copy;lyclub2016&copy;&nbsp;&nbsp;&nbsp;&nbsp;</span></div>
</center>
</body>
