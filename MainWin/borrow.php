<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
</head>
<?php
    include_once("../ConnectToDatabase/conn.php");

		if (isset($_GET["RdId"])){
		$RdId=$_GET["RdId"];
		$BkId=$_GET["BkId"];//唯一书号
		$bkid=$_GET["bkid"];
		$date=date("Y-m-d");
		$date1=date_create($date);
		date_add($date1,date_interval_create_from_date_string("30 days"));
		$date1=date_format($date1,"Y-m-d");

		$result = mysqli_query($conn,"SELECT * From Book where BkId=$BkId;");
		$myrow = mysqli_fetch_assoc($result);
		$id=$myrow['id'];
		if($bkid==$id){
		$result = mysqli_query($conn,"INSERT INTO Lend VALUES('$RdId','$id','$BkId','$date','$date1','99123','No')");
		$result = mysqli_query($conn,"delete from book where BkId='$BkId';");
		//第一，book表中删除信息。第二lend表中增加信息
		echo "<script>alert('借阅成功！')</script>";
		echo "<script>location.href='main.php?id=$RdId';</script>";
		}
        else{
        echo "<script>alert('借阅失败！')</script>";
		echo "<script>location.href='main.php?id=$RdId';</script>";
        }
		}
		
?>
<body onload="number()">
</body>
</html>