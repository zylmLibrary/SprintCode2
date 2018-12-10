<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title></title>
</head>

				 <div class="tap">
					 <span>个人资料</span>
				</div>
				<div class="container">
					<div class="no-doc">
                    <?php 
					include "conn.php";
					header('Content-Type:text/html; charset=gbk');
					$RdId=$_GET['RdId'];
					$result=mysqli_query($conn,"select * from Reader where RdId=$RdId;");
					$Reader=mysqli_fetch_array($result);
					?>
                    用户ID：<?php echo $Reader['RdId'];?><br><br>
    				姓名：<?php echo $Reader['RdName'];?><br><br>
    				性别：<?php echo $Reader['RdSex'];?>                    
                    </div>
                    </div>
<body>
</body>
</html>