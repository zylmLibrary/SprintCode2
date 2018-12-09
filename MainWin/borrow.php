<?php
    include_once("../ConnectToDatabase/conn.php");
    if(!empty($_GET['RdId']))
	{
		if(!($_GET['BkId']))
			echo "读者Id字段不能为空。点击<a href='javascript:onclick=history.go(-1)'>这里</a>返回";
		else if(!($_GET['AdId']))
			echo "管理员Id字段不能为空。点击<a href='javascript:onclick=history.go(-1)'>这里</a>返回";
		else if(!($_GET['Flag']))
			echo "标记字段不能为空。点击<a href='javascript:onclick=history.go(-1)'>这里</a>返回";
		else
		{
			date_default_timezone_set("Asia/Hong_Kong");
		    $sqlstr = "insert into lend(RdId,BkId,BT,RT,AdId,Flag) VALUES('".$_GET['RdId']."','".$_GET['BkId']."','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s',strtotime('+7 day'))."','".$_GET['AdId']."','".$_GET['Flag']."')";
			$result = mysqli_query($conn,$sqlstr);

			if($result)
			{
				$BkId = $_GET['BkId'];
				$sqlstr1 = "SELECT * From Book  where BkId=$BkId";
				$result_book = mysqli_query($conn, $sqlstr1);
				$myrow = mysqli_fetch_assoc($result_book);
				$booknumber = $myrow['BkRessidue']-1;
				$result_Book = mysqli_query($conn, "UPDATE Book SET BkRessidue=$booknumber
	where BkId=$BkId");
				if($result_Book)
					echo "<script>location='./mainAdmins.php';</script>";
				else
					echo "借阅失败.<br>$sqlstr1";
			}
			else
				echo "借阅失败.<br>$sqlstr";
		}	
	}
?>