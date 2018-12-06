<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gbk"/>
		<title>用户个人中心</title>
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
						<p class="tip">下午好,<?php echo $Reader[1];?></p>
						<p class="account">
							<span>帐户名：<?php echo $Reader[1];?></span>
							<span>学号：<?php echo $Reader[0];?></span>
						</p>
					</div>
					<div class="user-modify">
						<a href="#">修改资料></a>
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
							借阅记录
						</a>
					</li>
					<li>
						<a href="#">
							<i class="icon iconfont icon-fangzidichan"></i>
							押金缴纳
						</a>
					</li>
					<li>
						<a href="#">
							<i class="icon iconfont icon-pinglun"></i>
							图书续约
						</a>
					</li>
					<li>
						<a href="#">
							<i class="icon iconfont icon-geren"></i>
							消息通知
						</a>
					</li>
				</ul>
			</div>
			<div class="right">
				<div class="tap">
					<span>阅览记录</span>
				</div>
				<div class="container">
					<div class="no-doc">
                    <?php 
					if (isset($_POST["submit"]) && $_POST["submit"]=="提交"){
	$username=$_POST["username"];
	$password1=$_POST["password1"];
	if($_POST["sex"]==1) $sex='男';else $sex='女';
	$result=mysqli_query($connID,"update Reader set RdName='$username',RdSex='$sex',RdPW='$password1' where RdId=$RdId;");
	?><script>location.href='PersonalWin.php';</script><?php
	}
					
					
					?>
                    <form action="PersonalWin.php" method="post">
	<br>
	ID：<?php echo $Reader[0];?><br><br>
    姓名：<input type="text" name="username" value="<?php echo $Reader[1];?>" size="10"/><br><br>
    性别：<input name="sex" type="radio" value="<?php 
	if($Reader[2]=='男')echo "1";else echo "0";
	?>" checked="checked" />男
    <input name="sex" type="radio" value="<?php 
	if($Reader[2]=='男')echo "0";else echo "1";
	?>" />女<br /><br>
    密码：<input type="password" name="password1" value="<?php echo $Reader[3];?>" size="10" maxlength="20"/><br><br>
	<input type="submit" value="提交" name="submit"/>
    <input type="reset" value="重置" name="reset" />
</form>

                    
                    
                    
                    
                    
					</div>
				</div>
			</div>
		</div>
	</body>

</html>