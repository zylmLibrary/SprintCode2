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
					<span class="l">�û�<font>��������</font></span>
					<span class="r"><a href="#"><i class="icon iconfont icon-dianyuan"></i>�˳�</a></span>
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
						<a href="Borrow renewal.php?RdId=<?php echo $RdId; ?>">
							<i class="icon iconfont icon-pinglun"></i>
							ͼ����Լ
						</a>
					</li>
					<li>
						<a href="news.php?RdId=<?php echo $RdId; ?>"class="active">
							<i class="icon iconfont icon-geren"></i>
							��Ϣ֪ͨ
						</a>
					</li>
				</ul>
			</div>
			<div class="right" id="mydiv">


 <div class="tap">
					 <span>��Ϣ֪ͨ</span>
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
						if($diff->format("%R%a")>0){//������
							echo "ͼ��:".$Book['BkName']." ���:".$renew['BkId']." ������ ".$diff->format("%a")." �죬�뾡��黹��<br><br>";
							
							
							
						}//û������
						else{
						echo "ͼ��:".$Book['BkName']." ���:".$renew['BkId']." ���黹����Ϊ".$renew['RT']."�������ڻ�ʣ ".$diff->format("%a")." �졣<br><br>";							
						}				
						}
                   
                    ?>                  
                    </div>
                    </div>



		</div>
	</body>

</html>