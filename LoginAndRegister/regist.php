<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="gbk">
	<title></title>
</head>
<body>
	<?php
		include_once("../ConnectToDatabase/conn.php");
		$uname = $_POST["uname"];
		$pwd = $_POST["pwd"];
		$pwd2 = $_POST["pwd2"];
		if (substr($uname, 0, 2) == '99' ){
			echo "<script>alert('用户名非法！')</script>";
			echo "<script>location.href='LoginAndRegister.php';</script>";
		}else{
			if(strlen($uname)>9){
				echo "<script>alert('用户名过长！')</script>";
				echo "<script>location.href='LoginAndRegister.php';</script>";
			}else{
				if($pwd != $pwd2){
					echo "<script>alert('两次输入的密码不同,请重新输入！')</script>";
					echo "<script>location.href='LoginAndRegister.php';</script>";
				}else{
					$result = mysqli_query($conn, "SELECT RdId FROM Reader WHERE RdId = $uname");
					if ( @mysqli_num_rows($result) != 0 ) {
						echo "<script>alert('用户已存在！')</script>";
						echo "<script>location.href='LoginAndRegister.php';</script>";
					}else{
						$sql = "INSERT INTO Reader VALUES($uname,'default','男',$pwd)";
						mysqli_query($conn, $sql);
						echo "<script>alert('注册成功！')</script>";
						echo "<script>location.href='LoginAndRegister.php';</script>";
					}
				}
			}
		}
	?>
</body>
</html>