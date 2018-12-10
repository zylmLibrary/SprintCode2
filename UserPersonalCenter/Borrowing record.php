<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title></title>
</head>

				 <div class="tap">
					 <span>借阅记录</span>
				</div>
				<div class="container">
					<div class="no-doc">                 
                    <?php
//借阅记录
					include "conn.php";
					header('Content-Type:text/html; charset=gbk');
					$RdId=$_GET['RdId'];
					$result=mysqli_query($conn,"select * from Reader where RdId=$RdId;");
					$Reader=mysqli_fetch_array($result);
                    $result=mysqli_query($conn,"select * from Lend where RdId=$RdId;");
					$Lend=mysqli_fetch_array($result);
					
					if(!$Lend){ ?>
						<img src="statics/images/no_doc.jpg"/>
						<p>你还没有借过书哦~</p>
                        <?php }
						else {
						?><table border="1">
						<tr>
                        <th width="5%">ID</th>
                        <th width="5%">姓名</th>
                        <th width="5%">书名</th>
                        <th width="5%">借阅日期</th>
                        <th width="5%">是否归还</th>
                        </tr>
                        <?php
						$result=mysqli_query($conn,"select * from Lend where RdId=$RdId;");
                        while($Lend=mysqli_fetch_array($result)){?>
						<tr> 
						<td align="center"><span><?php echo $Lend[0]; ?></span></td> 
                        <td align="center"><span><?php echo $Reader[1]; ?></span></td>
                        <td align="center"><span><?php 
						$result0=mysqli_query($conn,"select * from Book where BkId=$Lend[1];");
						$Book=mysqli_fetch_array($result0);
						echo $Book[1];
						 ?></span></td> 
						<td align="center"><span><?php echo $Lend[2]; ?></span></td> 
                        <td align="center"><span><?php if($Lend[5]=='Yes')echo "是";else echo "否"; ?></span></td> 
						</tr>
						
						
						<?php
						
						}
?>
						
						</table>
						<?php
						
						
						}?>
                                          
                    </div>
                    </div>
<body>
</body>
</html>