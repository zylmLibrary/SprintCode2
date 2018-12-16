<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gbk"/>
		<title>用户个人中心</title>
		<link rel="stylesheet" type="text/css" href="statics/css/iconfont.css" />
		<link rel="stylesheet" type="text/css" href="statics/css/style.css" />
 <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery
/jquery-1.4.min.js"></script>
	</head>  
<?php 
include "conn.php";
$RdId=$_GET['RdId'];
header('Content-Type:text/html; charset=gbk');
$result=mysqli_query($conn,"select * from Reader where RdId=$RdId;");
$Reader=mysqli_fetch_array($result);
?>
	<body>
		<div class="header">
			<div class="bar">
				<div class="w1200">
					<span class="l">用户<font>个人中心</font></span>
					<span class="r"><a href="#"><i class="icon iconfont icon-dianyuan"></i>退出</a></span>
				</div>
			</div>
			<div class="user-info">
				<div class="w1200">
					<div class="user-headface">
						<img src="statics/images/user_face.jpg"/>
					</div>
					<div class="user-account">
						<p class="tip">下午好,<?php echo $Reader['RdName'];?></p>
						<p class="account">
							<span>帐户名：<?php echo $Reader['RdName'];?></span>
							<span>学号：<?php echo $Reader['RdId'];?></span>
						</p>
					</div>
					<div class="user-modify">
						<a href="edit data.php?RdId=<?php echo $RdId; ?>">修改资料></a>
					</div>
				</div>
			</div>
		</div>
		<div class="main w1200">
			<div class="left">
				<ul id="menu">
					<li>
						<a href="Personal data.php?RdId=<?php echo $RdId; ?>">
							<i class="icon iconfont icon-lingdang" ></i>
							个人资料
						</a>
					</li>
					<li>
						<a href="Borrow record.php?RdId=<?php echo $RdId; ?>" class="active">
							<i class="icon iconfont icon-fangzidichan"></i>
							借阅记录
						</a>
					</li>
					<li>
						<a href="Borrow renewal.php?RdId=<?php echo $RdId; ?>">
							<i class="icon iconfont icon-pinglun"></i>
							图书续约
						</a>
					</li>
					<li>
						<a href="news.php?RdId=<?php echo $RdId; ?>">
							<i class="icon iconfont icon-geren"></i>
							消息通知
						</a>
					</li>
				</ul>
			</div>
			<div class="right" id="mydiv">


				 <div class="tap">
					 <span>借阅记录</span>
				</div>
				<div class="container">
					<div class="no-doc">                 
                    <?php
//借阅记录
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



		</div>
	</body>

</html>