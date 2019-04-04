<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title>电子相框</title>
<script language="javascript">
//document.oncontextmenu=new Function("event.returnValue=false");  
//document.onselectstart=new Function("event.returnValue=false"); 
</script>
<style type="text/css">
#vimg 
{
	position:fixed;
	background:black;
	top:0px;
	bottom:0px;
	left:0px;
	right:0px;
}
</style>
</head>
<body bgcolor="black">

<?php
//图片数字开始时间
$startnum=0;

//获取图片第几张
if($_GET["img"]=="")
{
	$imgnum=$startnum;
}
else
	$imgnum=$_GET["img"];
//设置刷新页面秒数
$uptime=30;
if($_GET["rtime"]!="")
	$uptime=$_GET["rtime"];
/*
//图片数字开始时间
$startnum=1;
//图片数字结束时间
$endnum=20;
//图片开头的地址
$qianurl="http://img.lyclub.f3322.net:82/FengJing/";
//图片结束时的扩展名
$houurl=".jpg";
if($imgnum<$endnum)
{
	$imgnum=$imgnum+1;
}
else
{
	$imgnum=1;
}
	printf("<img src='%s%d%s'/>",$qianurl,$imgnum,$houurl);
	echo "<meta http-equiv='refresh' content='".$uptime.";url= ?img=".$imgnum."' />";
*/
function dirview($path,$url)
{
	$dirlist=scandir($path);
	$a=0;
	$imgarr=array();
	for($i=0;$i<count($dirlist);$i++)
	{
		$filearr=explode(".",$dirlist[$i]);
		if(strtoupper($filearr[(count($filearr)-1)])=="JPG")
			$imgarr[$a]=$url.$dirlist[$i];
		else
			continue;
		$a=$a+1;
	}
	return $imgarr;
}
$viewimgarr=dirview("images/","/time_imgs/images/");
echo "<!--";
print_r($viewimgarr);
echo "-->";
//图片数字结束时间
$endnum=count($viewimgarr)-1;
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
echo "<script language='javascript'>\n";
echo "var img_url = '".$viewimgarr[$imgnum]."';";
echo <<<IMGEND
var img = new Image();
img.src = img_url;
img.onload = function(){
	if (document.body.clientWidth<img.width)
	{
		if(document.body.clientHeight>=img.height)
			document.getElementById('vimg').style.width="100%";
		else
			document.getElementById('vimg').style.height="100%";
	}
	else
	{
		if(document.body.clientWidth>=img.width)
			document.getElementById('vimg').style.height="100%";
		else
			document.getElementById('vimg').style.width="100%";
	}
	document.getElementById('vimg').src=img_url;
	if(document.body.clientWidth>document.getElementById('vimg').offsetWidth)
	{
		var iowl = parseInt((document.body.clientWidth/2) - (document.getElementById('vimg').offsetWidth/2));
		var iowr = parseInt((document.body.clientWidth/2) + (document.getElementById('vimg').offsetWidth/2));
		document.getElementById('vimg').style.left=iowl+"px";
		document.getElementById('vimg').style.right=iowr+"px";
	}
	
};
</script>\n
IMGEND;
echo "<img id='vimg' />\n";
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
if($imgnum<$endnum)
{
	$imgnum=$imgnum+1;
}
else
{
	$imgnum=$startnum;
}
echo "<meta http-equiv='refresh' content='".$uptime.";url= ?img=".$imgnum."&rtime=".$uptime."' />\n";
?>
</body>
</html>
