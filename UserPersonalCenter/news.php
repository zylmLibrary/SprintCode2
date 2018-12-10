<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title></title>
</head>

				 <div class="tap">
					 <span>消息通知</span>
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
					<?php
                    $result0=mysqli_query($conn,"select * from Lend where RdId=$RdId and Flag='No';");
                    while($renew=mysqli_fetch_array($result0)){
						$result1=mysqli_query($conn,"select * from Book where BkId=$renew[1];");
						$Book=mysqli_fetch_array($result1);
						$date1=date_create($renew['RT']);
						$date2=date_create(date("Y-m-d"));
						$diff=date_diff($date1,$date2);
						if($diff->format("%R%a")>0){//已逾期
							echo "图书:".$Book['BkName']." 书号:".$renew['BkId']." 已逾期 ".$diff->format("%a")." 天，请尽快归还！<br><br>";
							
							
							
						}//没有逾期
						else{
						echo "图书:".$Book['BkName']." 书号:".$renew['BkId']." 最后归还日期为".$renew['RT']."距离现在还剩 ".$diff->format("%a")." 天。<br><br>";							
						}				
						}
                   
                    ?>                  
                    </div>
                    </div>
<body>
</body>
</html>