<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="gbk">
	<title>Document</title>
</head>
<body>
	<?php
	include_once("../ConnectToDatabase/conn.php");
	if (isset($_POST["submit"]) && $_POST["submit"]=='ͼ�����'){
		if(!$_POST['BkId'])
			echo "��Ų���Ϊ�գ�";
		else if(!$_POST['BkName'])
			echo "��������Ϊ�գ�";
		else if(!$_POST['BkAuthor'])
			echo "���߲���Ϊ�գ�";
		else if(!$_POST['BkPrice'])
			echo "��ĵ��۲���Ϊ�գ�";
		else if(!$_POST['BkClassify'])
			echo "��ķ��಻��Ϊ�գ�";
		else if(!$_POST['BkLocation'])
			echo "���λ�ò���Ϊ�գ�";
		else if(!$_POST['BkRessidue'])
			echo "�����������Ϊ�գ�";
		else if(!$_POST['Press'])
			echo "��ĳ����粻��Ϊ�գ�";
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
			
			echo "<script>alert('ͼ�����ɹ�')</script>";
			echo "<script>location.href='../MainWin/mainAdmins.php?id="."$id';</script>";
		}
	}else 
	echo "<script>alert('ͼ�����ʧ��')</script>";
	?>
</body>
</html>