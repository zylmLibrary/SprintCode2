<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="gbk">
	<title></title>
</head>
<body>
	<?php
		// header("Content-Type: text/html; charset=utf-8");
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
				echo "<script>alert('��¼�ɹ�')</script>";
				if (substr($uname, 0, 2) == '99') {
					echo "<script>location.href='../MainWin/mainAdmins.php?id=$uname';</script>";
				} else {
					echo "<script>location.href='../MainWin/main.php?id=$uname';</script>";
				}
			} else {
				echo "<script>alert('�������')</script>";
				echo "<script>location.href='LoginAndRegister.php';</script>";
			}
		} else {
			echo "<script>alert('�û��������ڣ�')</script>";
			echo "<script>location.href='LoginAndRegister.php';</script>";
		}
	?>
</body>
</html>
