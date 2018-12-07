<?php
	include_once("../ConnectToDatabase/conn.php");
		$uname = $_POST["uname"];
		$pwd = $_POST["pwd"];

		$result = mysqli_query($conn, "SELECT RdPW FROM Reader WHERE RdId = $uname");
		// var_dump(mysqli_num_rows($result));
		if ( @mysqli_num_rows($result) == 0 ) {
			$result = mysqli_query($conn, "SELECT AdPW FROM Admins WHERE AdId = $uname");
			// var_dump(mysqli_num_rows($result));
		}

		if ( @mysqli_num_rows($result) > 0 ) {
			$myrow = mysqli_fetch_row($result);
			if ($pwd == $myrow[0]) {
				echo "<script>alert('登录成功')</script>";
				if (substr($uname, 0, 2) == '99') {
					echo "<script>alert('到管理员主界面')</script>";
				} else {
					echo "<script>alert('到用户主界面')</script>";
				}
			} else {
				echo "<script>alert('密码错误！')</script>";
			}
		} else {
			echo "<script>alert('用户名不存在！')</script>";
		}

?>