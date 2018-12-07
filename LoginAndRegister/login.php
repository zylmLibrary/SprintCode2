<?php
	$uname=$_POST["uname"];
	$pwd=$_POST["pwd"];
	include_once("conn.php");
	$result = mysqli_query($conn,"select *  from Reader where RdId ='$uname' and RdPW='$pwd' ");
	if(mysqli_num_rows($result) != 0){
		echo "<script>alert('登录成功')</script>";
	}else{
		echo "<script>alert('用户名或密码错误!')</script>";

		//header('location:Login&&Register.php');
	}

?>