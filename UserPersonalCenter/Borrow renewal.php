<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gbk"/>
		<title>�û���������</title>
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
					<span class="l">�û�<font>��������</font></span>
					<span class="r"><a href="../MainWin/main.php?id=<?php echo $RdId;?>">����</a>&nbsp;&nbsp;&nbsp;<a href="../LoginAndRegister/LoginAndRegister.php">�˳�</a></span>
				</div>
			</div>
			<div class="user-info">
				<div class="w1200">
					<div class="user-headface">
						<img src="statics/images/user_face.jpg"/>
					</div>
					<div class="user-account">
						<p class="tip">�����,<?php echo $Reader['RdName'];?></p>
						<p class="account">
							<span>�ʻ�����<?php echo $Reader['RdName'];?></span>
							<span>ѧ�ţ�<?php echo $Reader['RdId'];?></span>
						</p>
					</div>
					<div class="user-modify">
						<a href="edit data.php?RdId=<?php echo $RdId; ?>">�޸�����></a>
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
							��������
						</a>
					</li>
					<li>
						<a href="Borrow record.php?RdId=<?php echo $RdId; ?>" >
							<i class="icon iconfont icon-fangzidichan"></i>
							���ļ�¼
						</a>
					</li>
					<li>
						<a href="Borrow renewal.php?RdId=<?php echo $RdId; ?>"class="active">
							<i class="icon iconfont icon-pinglun"></i>
							ͼ����Լ
						</a>
					</li>
					<li>
						<a href="news.php?RdId=<?php echo $RdId; ?>">
							<i class="icon iconfont icon-geren"></i>
							��Ϣ֪ͨ
						</a>
					</li>
				</ul>
			</div>
			<div class="right" id="mydiv">


  <div class="tap" >
				 <span>ͼ����Լ</span>
				</div>
				<div class="container" id="mydiv">
					<div class="no-doc">
                  
                    <table border="1">
						<tr>
                        <th width="5%">���</th>
                        <th width="5%">����</th>
                        <th width="5%">��������</th>
                        <th width="5%">�黹����</th>
                        <th width="5%">����</th>
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
					?><script>alert("����ʧ�ܣ�")</script>
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
                        <td align="center"><span><a href='Borrow renewal.php?id=renew&&id1=<?php echo $renew['BkId']; ?>&&id2=<?php echo $renew['RT']; ?>&&id3=<?php echo $renew['BT']; ?>&&RdId=<?php echo$RdId?>'>��Լ</a></span></td> 
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