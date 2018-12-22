<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
</head>
	<?php
	include_once("../ConnectToDatabase/conn.php");
	if (isset($_POST["submit"]) && $_POST["submit"]=='图书归还'){
		if(!$_POST['RdId'])
			echo "<script>alert('读者ID不能为空！')</script>";
		else if(!$_POST['BkId'])
			echo "<script>alert('书号不能为空！')</script>";
		else if(!$_POST['bkid'])
			echo "<script>alert('图书唯一编号不能为空！')</script>";
        else if(!$_POST['location'])
			echo "<script>alert('图书位置不能为空！')</script>";
		else {
			$RdId = $_POST['RdId'];
			$BkId = $_POST['BkId'];
			$bkid=$_POST['bkid'];
			$id = $_POST['id'];
			$location = $_POST['location'];
//增加book表的内容，修改lend表的 内容 创建一个新的图书目录的数据库不记录只有重要信息。
			$result = mysqli_query($conn,"update lend set Flag='Yes' where BkId=$bkid;");
			$result = mysqli_query($conn,"select * from BookCollection where id=$BkId");
			$myrow = mysqli_fetch_assoc($result);
			$name = $myrow['BkName'];
			$BkAuthor = $myrow['BkAuthor'];
			$BkPrice = $myrow['BkPrice'];
			$BkClassify = $myrow['BkClassify'];
			$BkPress = $myrow['BkPress'];
			
			
			
			$result = mysqli_query($conn,"INSERT INTO Book VALUES('$bkid','$BkId','$name','$BkAuthor','$BkPrice','$BkClassify','$location','$BkPress')");

			echo "<script>alert('修改成功')</script>";

			echo "<script>location.href='../AdminPersonalCenter/AdminPersonalCenter.php?id="."$id';</script>";
		}
	}
	?>
<body>
</body>
</html>