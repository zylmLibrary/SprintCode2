<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gbk"/>
		<title>用户个人中心</title>
		<link rel="stylesheet" type="text/css" href="statics/css/iconfont.css" />
		<link rel="stylesheet" type="text/css" href="statics/css/style.css" />
 <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery
/jquery-1.4.min.js"></script>
	</head>  
<?php 
include "conn.php";
$RdId=$_GET['RdId'];
header('Content-Type:text/html; charset=gbk');
$result=mysqli_query($conn,"select * from Reader where RdId=$RdId;");
$Reader=mysqli_fetch_array($result);
?>
	<body>
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
						<a href="edit data.php?RdId=<?php echo $RdId; ?>">修改资料></a>
					</div>
				</div>
			</div>
		</div>
		<div class="main w1200">
			<div class="left">
				<ul id="menu">
					<li>
						<a href="Personal data.php?RdId=<?php echo $RdId; ?>">
							<i class="icon iconfont icon-lingdang" ></i>
							个人资料
						</a>
					</li>
					<li>
						<a href="Borrow record.php?RdId=<?php echo $RdId; ?>" >
							<i class="icon iconfont icon-fangzidichan"></i>
							借阅记录
						</a>
					</li>
					<li>
						<a href="Borrow renewal.php?RdId=<?php echo $RdId; ?>">
							<i class="icon iconfont icon-pinglun"></i>
							图书续约
						</a>
					</li>
					<li>
						<a href="news.php?RdId=<?php echo $RdId; ?>"class="active">
							<i class="icon iconfont icon-geren"></i>
							消息通知
						</a>
					</li>
				</ul>
			</div>
			<div class="right" id="mydiv">


 <div class="tap">
					 <span>消息通知</span>
				</div>
				<div class="container">
					<div class="no-doc">
					<?php
                    $result0=mysqli_query($conn,"select * from Lend where RdId=$RdId and Flag='No';");
                    while($renew=mysqli_fetch_array($result0)){
						$result1=mysqli_query($conn,"select * from Book where BkId=$renew[1];");
						$Book=mysqli_fetch_array($result1);
						$date1=date_create($renew['RT']);
						$date2=date_create(date("Y-m-d"));
						$diff=date_diff($date1,$date2);
						if($diff->format("%R%a")>0){//已逾期
							echo "图书:".$Book['BkName']." 书号:".$renew['BkId']." 已逾期 ".$diff->format("%a")." 天，请尽快归还！<br><br>";
							
							
							
						}//没有逾期
						else{
						echo "图书:".$Book['BkName']." 书号:".$renew['BkId']." 最后归还日期为".$renew['RT']."距离现在还剩 ".$diff->format("%a")." 天。<br><br>";							
						}				
						}
                   
                    ?>                  
                    </div>
                    </div>



		</div>
	</body>

</html>