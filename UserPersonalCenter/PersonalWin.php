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
					if (isset($_POST["submit"]) && $_POST["submit"]=="�ύ"){
	$username=$_POST["username"];
	$password1=$_POST["password1"];
	if($_POST["sex"]==1) $sex='��';else $sex='Ů';
	$result=mysqli_query($connID,"update Reader set RdName='$username',RdSex='$sex',RdPW='$password1' where RdId=$RdId;");
	?><script>location.href='PersonalWin.php';</script><?php
	}
					
					
					?>
                    <form action="PersonalWin.php" method="post">
	<br>
	ID��<?php echo $Reader[0];?><br><br>
    ������<input type="text" name="username" value="<?php echo $Reader[1];?>" size="10"/><br><br>
    �Ա�<input name="sex" type="radio" value="<?php 
	if($Reader[2]=='��')echo "1";else echo "0";
	?>" checked="checked" />��
    <input name="sex" type="radio" value="<?php 
	if($Reader[2]=='��')echo "0";else echo "1";
	?>" />Ů<br /><br>
    ���룺<input type="password" name="password1" value="<?php echo $Reader[3];?>" size="10" maxlength="20"/><br><br>
	<input type="submit" value="�ύ" name="submit"/>
    <input type="reset" value="����" name="reset" />
</form>

                    
                    
                    
                    
                    
					</div>
				</div>
			</div>
		</div>
	</body>

</html>