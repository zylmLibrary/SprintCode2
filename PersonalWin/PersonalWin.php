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
					<span>������¼</span>
				</div>
				<div class="container">
					<div class="no-doc">
                    <?php
                    $result=mysqli_query($connID,"select * from Lend where RdId=$Reader[0];");
					$Lend=mysqli_fetch_array($result);
					
					if(!$Lend){ ?>
						<img src="statics/images/no_doc.jpg"/>
						<p>�㻹û�н����Ŷ~</p>
                        <?php }
						else {
						?><table border="1">
						<tr>
                        <th width="5%">ID</th>
                        <th width="5%">����</th>
                        <th width="5%">����</th>
                        <th width="5%">��������</th>
                        <th width="5%">�Ƿ�黹</th>
                        </tr>
                        <?php
						$result=mysqli_query($connID,"select * from Lend where RdId=$Reader[0];");
                        while($Lend=mysqli_fetch_array($result)){?>
						<tr> 
						<td align="center"><span><?php echo $Lend[0]; ?></span></td> 
                        <td align="center"><span><?php echo $Reader[1]; ?></span></td>
                        <td align="center"><span><?php 
						$result0=mysqli_query($connID,"select * from Book where BkId=$Lend[1];");
						$Book=mysqli_fetch_array($result0);
						echo $Book[1];
						 ?></span></td> 
						<td align="center"><span><?php echo $Lend[2]; ?></span></td> 
                        <td align="center"><span><?php if($Lend[5]=='Yes')echo "��";else echo "��"; ?></span></td> 
						</tr>
						
						
						<?php
						
						}
?>
						
						</table>
						<?php
						
						
						}?>
                        
					</div>
				</div>
			</div>
		</div>
	</body>

</html>