<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gbk"/>
		<title>用户个人中心</title>
		<link rel="stylesheet" type="text/css" href="statics/css/iconfont.css" />
		<link rel="stylesheet" type="text/css" href="statics/css/style.css" />
 <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery
/jquery-1.4.min.js"></script>
<script type="text/javascript">
var xmlhttp;
function loadXMLDoc(RdId,number)
{
  if(number==2)
  var url="Borrowing record.php?RdId="+RdId+"&i="+Math.random();
  else if(number==4)
  var url="news.php?RdId="+RdId+"&i="+Math.random();
  else if(number==5)
  var url="edit data.php?RdId="+RdId+"&i="+Math.random();
  else
  var url="Personal data.php?RdId="+RdId+"&i="+Math.random();
try{
	xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
	try{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}catch(e){xmlhttp=false;
	}}
	if(!xmlhttp && typeof XMLHttpRequest!='undefined'){
		xmlhttp=new XMLHttpRequest();}
	
	xmlhttp.onreadystatechange=getresult;
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
  
}
function getresult(){
	if(xmlhttp.readyState===4 && xmlhttp.status===200){
		document.getElementById("mydiv").innerHTML=xmlhttp.responseText;
	}else
	document.getElementById("mydiv").innerHTML='';
}
$(document).ready(function (){
         $("a").each(function(index){
                                      
                $(this).click(function(){        
                $("a").removeClass("active");
                $("a").eq(index).addClass("active");
                });
                });
        });
</script>
	</head>  
<?php 
include "conn.php";
$number=1;
$RdId=211600010;
header('Content-Type:text/html; charset=gbk');
$result=mysqli_query($conn,"select * from Reader where RdId=$RdId;");
$Reader=mysqli_fetch_array($result);
if (isset($_GET["number"])){
	$number=$_GET["number"];}
?>
	<body onLoad="loadXMLDoc(<?php echo $RdId;?>,<?php echo $number;?>)">
		<div class="header">
			<div class="bar">
				<div class="w1200">
					<span class="l">用户<font>个人中心</font></span>
					<span class="r"><a href="#"><i class="icon iconfont icon-dianyuan"></i>退出</a></span>
				</div>
			</div>
			<div class="user-info">
				<div class="w1200">
					<div class="user-headface">
						<img src="statics/images/user_face.jpg"/>
					</div>
					<div class="user-account">
						<p class="tip">下午好,<?php echo $Reader['RdName'];?></p>
						<p class="account">
							<span>帐户名：<?php echo $Reader['RdName'];?></span>
							<span>学号：<?php echo $Reader['RdId'];?></span>
						</p>
					</div>
					<div class="user-modify">
						<a href="edit data.php?RdId=<?php echo $RdId;?>">修改资料></a>
					</div>
				</div>
			</div>
		</div>
		<div class="main w1200">
			<div class="left">
				<ul id="menu">
					<li>
						<a href="javascript:loadXMLDoc(<?php echo $RdId;?>,1)" class="active" id="1">
							<i class="icon iconfont icon-lingdang"></i>
							个人资料
						</a>
					</li>
					<li>
						<a href="javascript:loadXMLDoc(<?php echo $RdId;?>,2)" id="2">
							<i class="icon iconfont icon-fangzidichan"></i>
							借阅记录
						</a>
					</li>
					<li>
						<a href="Book renewal.php?RdId=<?php echo $RdId;?>" id="3">
							<i class="icon iconfont icon-pinglun"></i>
							图书续约
						</a>
					</li>
					<li>
						<a href="javascript:loadXMLDoc(<?php echo $RdId;?>,4)" id="4">
							<i class="icon iconfont icon-geren"></i>
							消息通知
						</a>
					</li>
				</ul>
			</div>
			<div class="right" id="mydiv">

		</div>
	</body>

</html>