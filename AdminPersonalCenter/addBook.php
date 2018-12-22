<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="gbk">
	<title>Document</title>
</head>
<body>
	<?php
	include_once("../ConnectToDatabase/conn.php");
	if (isset($_POST["submit"]) && $_POST["submit"]=='图书入库'){
		if(!$_POST['BkId'])
			echo "书号不能为空！";
		else if(!$_POST['BkName'])
			echo "书名不能为空！";
		else if(!$_POST['BkAuthor'])
			echo "作者不能为空！";
		else if(!$_POST['BkPrice'])
			echo "书的单价不能为空！";
		else if(!$_POST['BkClassify'])
			echo "书的分类不能为空！";
		else if(!$_POST['BkLocation'])
			echo "书的位置不能为空！";
		else if(!$_POST['BkRessidue'])
			echo "书的数量不能为空！";
		else if(!$_POST['Press'])
			echo "书的出版社不能为空！";
		else {
			$bkId = $_POST['BkId'];
			$bkName = $_POST['BkName'];
			$bkAuthor = $_POST['BkAuthor'];
			$bkPrice = $_POST['BkPrice'];
			$bkClassify = $_POST['BkClassify'];
			$bkLocation = $_POST['BkLocation'];
			$bkRessidue = $_POST['BkRessidue'];
			$press = $_POST['Press'];
			$id = $_POST['id'];
			for ($x=1; $x<=$bkRessidue; $x++) {
            $sql = "INSERT INTO Book(id,BkName,BkAuthor,BkPrice,BkClassify,BkLocation,BkPress)VALUES('$bkId','$bkName','$bkAuthor','$bkPrice','$bkClassify','$bkLocation','$press')";
			mysqli_query($conn, $sql);
			}
			
			$result = mysqli_query($conn,"select * from BookCollection where id=$bkId ");
			$add=mysqli_fetch_array($result);
			if(!$add){
				
			$sql = "INSERT INTO BookCollection VALUES('$bkId','$bkName','$bkAuthor','$bkPrice','$bkClassify','$press')";
			mysqli_query($conn, $sql);
				}
			
			echo "<script>alert('图书入库成功')</script>";
			echo "<script>location.href='../MainWin/mainAdmins.php?id="."$id';</script>";
		}
	}else 
	echo "<script>alert('图书入库失败')</script>";
	?>
</body>
</html>