<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	include_once("../ConnectToDatabase/conn.php");
	if (isset($_POST["submit"]) && $_POST["submit"]=='保存资料'){
		if(!$_POST['AdName'])
			echo "<script>alert('姓名不能为空！')</script>";
		else if(!$_POST['AdSex'])
			echo "<script>alert('性别不能为空！')</script>";
		else if(!$_POST['AdPW'])
			echo "<script>alert('密码不能为空！')</script>";
		else {
			$AdName = $_POST['AdName'];
			$AdSex = $_POST['AdSex'];
			$AdPW = $_POST['AdPW'];
			$id = $_POST['id'];

			$sql = "UPDATE admins set AdName ='".$AdName."', AdSex ='".$AdSex."',AdPW='".$AdPW."' WHERE AdId=".$id;

			mysqli_query($conn, $sql);

			echo "<script>alert('修改成功')</script>";

			echo "<script>location.href='../AdminPersonalCenter/AdminPersonalCenter.php?id="."$id';</script>";
		}
	}
	?>
</body>
</html>