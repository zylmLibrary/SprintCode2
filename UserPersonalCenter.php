<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gbk"/>
		<title>�û���������</title>
		<link rel="stylesheet" type="text/css" href="statics/css/iconfont.css" />
		<link rel="stylesheet" type="text/css" href="statics/css/style.css" />
	</head>
<?php 
$RdId=211600010;
header('Content-Type:text/html; charset=gbk');
$dbms='mysql';
$host="127.0.0.1";
$username="root";
$password="211605240";
$dbname = "library";
$connID=mysqli_connect($host,$username,$password,$dbname);
$result=mysqli_query($connID,"select * from Reader where RdId=$RdId;");
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
						<p class="tip">�����,<?php echo $Reader[1];?></p>
						<p class="account">
							<span>�ʻ�����<?php echo $Reader[1];?></span>
							<span>ѧ�ţ�<?php echo $Reader[0];?></span>
						</p>
					</div>
					<div class="user-modify">
						<a href="#">�޸�����></a>
					</div>
				</div>
			</div>
		</div>
		<div class="main w1200">
			<div class="left">
				<ul>
					<li>
						<a href="#" class="active">
							<i class="icon iconfont icon-lingdang"></i>
							���ļ�¼
						</a>
					</li>
					<li>
						<a href="#">
							<i class="icon iconfont icon-fangzidichan"></i>
							Ѻ�����
						</a>
					</li>
					<li>
						<a href="#">
							<i class="icon iconfont icon-pinglun"></i>
							ͼ����Լ
						</a>
					</li>
					<li>
						<a href="#">
							<i class="icon iconfont icon-geren"></i>
							��Ϣ֪ͨ
						</a>
					</li>
				</ul>
			</div>
			<div class="right">
				<div class="tap">
					<span>��Լ����</span>
				</div>
				<div class="container">
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
						if (isset($_POST["submit"]) && $_POST["submit"]=="�ύ"){
					$str=explode("-",$renew[3]);
					$str[2]=$str[2]+7;
					$string=implode("-",$str);
	$result=mysqli_query($connID,"update lend set RdName='$username',RdSex='$sex',RdPW='$password2' where RdId=$RdId;");
	
	
	?><script>location.href='PersonalWin.php';</script><?php

	}
					$result0=mysqli_query($connID,"select * from Lend where RdId=$RdId and Flag='No';");
					 while($renew=mysqli_fetch_array($result0)){?>
						<tr> 
						<td align="center"><span><?php echo $renew[1]; ?></span></td>
                        <td align="center"><span><?php 
						$result1=mysqli_query($connID,"select * from Book where BkId=$renew[1];");
						$Book=mysqli_fetch_array($result1);
						echo $Book[1];
						 ?></span></td> 
                        <td align="center"><span><?php echo $renew[2]; ?></span></td> 
                        <td align="center"><span><?php echo $renew[3]; ?></span></td> 
                        <td align="center"><span><input type="submit" value="����" name="submit"/></span></td> 
						</tr>
						
						
						<?php
						$str=explode("-",$renew[3]);
					$str[2]=$str[2]+7;
					echo $str[2];
						}
					?>
                    
                    </table>
                    <?php 
					
					
					
					
					
					echo "������ " . date("Y-m-d") . "<br>";?>
					</div>
				</div>
			</div>
		</div>
	</body>

</html>