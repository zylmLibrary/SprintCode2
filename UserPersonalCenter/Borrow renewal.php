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
include_once("../ConnectToDatabase/conn.php");
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
					<span class="r"><a href="../MainWin/main.php?id=<?php echo $RdId;?>">返回</a>&nbsp;&nbsp;&nbsp;<a href="../LoginAndRegister/LoginAndRegister.php">退出</a></span>
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
						<a href="Borrow renewal.php?RdId=<?php echo $RdId; ?>"class="active">
							<i class="icon iconfont icon-pinglun"></i>
							图书续约
						</a>
					</li>
					<li>
						<a href="news.php?RdId=<?php echo $RdId; ?>">
							<i class="icon iconfont icon-geren"></i>
							消息通知
						</a>
					</li>
				</ul>
			</div>
			<div class="right" id="mydiv">


  <div class="tap" >
				 <span>图书续约</span>
				</div>
				<div class="container" id="mydiv">
					<div class="no-doc">
                  
                    <table border="1">
						<tr>
                        <th width="5%">书号</th>
                        <th width="5%">书名</th>
                        <th width="5%">借阅日期</th>
                        <th width="5%">归还日期</th>
                        <th width="5%">操作</th>
                        </tr>

                    <?php 
					if (isset($_GET["id"])){
					if(($_GET["id"])=='renew'){
					$returntime=$_GET["id2"];
					$booknumber=$_GET["id1"];
					$bt=$_GET["id3"];
					$date=date_create($returntime);
					date_add($date,date_interval_create_from_date_string("30 days"));
					$returntime=date_format($date,"Y-m-d");
					$date=date_create($bt);
					date_add($date,date_interval_create_from_date_string("61 days"));
					$bt=date_format($date,"Y-m-d");
					if($returntime>$bt){
					?><script>alert("借阅失败！")</script>
					<?php }
					else{
					$result=mysqli_query($conn,"update Lend set RT='$returntime' where RdId=$RdId and BkId=$booknumber;");
					 }
	 }
}
					$result0=mysqli_query($conn,"select * from Lend where RdId=$RdId and Flag='No';");?>
					
					<?php
					 while($renew=mysqli_fetch_array($result0)){?>
						<tr> 
						<td align="center"><span><?php echo $renew['id']; ?></span></td>
                        <td align="center"><span><?php 
						$result1=mysqli_query($conn,"select * from BookCollection where id=$renew[1];");
						$Book=mysqli_fetch_array($result1);
						echo $Book['BkName'];
						 ?></span></td> 
                        <td align="center"><span><?php echo $renew['BT']; ?></span></td> 
                        <td align="center"><span><?php echo $renew['RT']; ?></span></td> 
                        <td align="center"><span><a href='Borrow renewal.php?id=renew&&id1=<?php echo $renew['BkId']; ?>&&id2=<?php echo $renew['RT']; ?>&&id3=<?php echo $renew['BT']; ?>&&RdId=<?php echo$RdId?>'>续约</a></span></td> 
						</tr>
						
						
						<?php
						}
					?>
                    
                    </table>

					</div>
				</div>



		</div>
	</body>

</html>