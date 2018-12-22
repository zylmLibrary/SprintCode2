<!DOCTYPE html>
<html>
<head>
	<meta charset="gbk">
	<title>管理员个人中心</title>
	<link rel="stylesheet" type="text/css" href="statics/css/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="statics/css/style.css" />
	<link rel="stylesheet" type="text/css" href="statics/css/table.css" />
	<script type="text/javascript">
		function $(id){
			return document.getElementById(id);
		}
		function change(){
			$('message').innerHTML='系统消息';
			$('box1').style.display="block";
			$('box2').style.display="none";
			$('box3').style.display="none";
			$('box4').style.display="none";
			$('box5').style.display="none";
			$('box6').style.display="none";
		}
		function change1(){
			$('message').innerHTML='新书入库';
			$('box1').style.display="none";
			$('box2').style.display="block";
			$('box3').style.display="none";
			$('box4').style.display="none";
			$('box5').style.display="none";
			$('box6').style.display="none";
			
		}
		function change2(){
			$('message').innerHTML='图书借出表';
			$('box1').style.display="none";
			$('box2').style.display="none";
			$('box3').style.display="none";
			$('box4').style.display="none";
			$('box5').style.display="block";
			$('box6').style.display="none";
		}
		function change3(){
			$('message').innerHTML='个人资料';
			$('box1').style.display="none";
			$('box2').style.display="none";
			$('box3').style.display="block";
			$('box4').style.display="none";
			$('box5').style.display="none";
			$('box6').style.display="none";
		}
		function change4(){
			$('message').innerHTML='修改资料';
			$('box1').style.display="none";
			$('box2').style.display="none";
			$('box3').style.display="none";
			$('box4').style.display="block";
			$('box5').style.display="none";
			$('box6').style.display="none";
		}
				function change5(){
			$('message').innerHTML='图书归还';
			$('box1').style.display="none";
			$('box2').style.display="none";
			$('box3').style.display="none";
			$('box4').style.display="none";
			$('box5').style.display="none";
			$('box6').style.display="block";
		}
	</script>
</head>
<body>
	<div class="header">
		<div class="bar">
			<div class="w1200">
				<span class="l">管理员<font>个人中心</font></span>
				<span class="r"><a href="../MainWin/mainAdmins.php?id=<?php echo $_GET['id'];?>">返回</a>&nbsp;&nbsp;&nbsp;<a href="../LoginAndRegister/LoginAndRegister.php">退出</a></span>
			</div>
		</div>
		<div class="user-info">
			<div class="w1200">
				<div class="user-headface">
					<img src="statics/images/user_face.jpg"/>
				</div>
					<input type="hidden" name="id" value='<?php echo $_GET['id']; ?>'>
					<?php
					include_once("../ConnectToDatabase/conn.php");
					$flag = mysqli_query($conn, "SELECT * From admins WHERE AdId=".$_GET['id']);
					$id = mysqli_fetch_assoc($flag);
					?>
				<div class="user-account">
				
					<p class="tip">下午好，<?php echo $id['AdName']; ?></p>
					<p class="account">
						<span>帐户名：<?php echo $id['AdName']; ?></span>
						<span>职工号：<?php echo $id['AdId']; ?></span>
					</p>
				</div>
				<div class="user-modify">
					<a href="#" onclick="change4()">修改资料></a>
				</div>
			</div>
		</div>
	</div>
	<div class="main w1200">
		<div class="left">
			<ul>
				<li>
					<a href="#" id="xx" onclick="change()">
						<i class="icon iconfont icon-lingdang"></i>
						消息
					</a>
				</li>
				<li>
					<a href="#"  onclick="change1()" id="button2">
						<i class="icon iconfont icon-fangzidichan"></i>
						图书入库
					</a>
				</li>
				<li>
					<a href="#" onclick="change2()">
						<i class="icon iconfont icon-pinglun"></i>
						图书借出表
					</a>
				</li>
				<li>
					<a href="#" onclick="change3()">
						<i class="icon iconfont icon-geren"></i>
						个人资料
					</a>
				</li>
                <li>
					<a href="#" onclick="change5()">
						<i class="icon iconfont icon-pinglun"></i>
						图书归还
					</a>
				</li>
			</ul>
		</div>
		<div class="right">
			<div class="tap">
				<span id="message">系统消息</span>
			</div>
			<div class="container">
				<div class="no-doc show" id="box1">
					<img src="statics/images/no_doc.jpg"/>
					<p>您还没有消息哦~</p>
				</div>
				<div class="no-doc" id="box2">
					<form method="post" action="addBook.php">
					<table class="profile-table">
						<tr><th>书号：</th><td><input type="text" name="BkId" value="" /></td></tr>
						<tr><th>书名：</th><td><input type="text" name="BkName" value=""/></td></tr>
						<tr><th>作者：</th><td><input type="text" name="BkAuthor" value=""></td></tr>
						<tr><th>单价：</th><td><input type="text" name="BkPrice"  value=""></td></tr>
						<tr><th>类别：</th><td><input type="text" name="BkClassify"  value=""></td></tr>
						<tr><th>位置：</th><td><input type="text" name="BkLocation"  value=""></td></tr>
						<tr><th>入库数量：</th><td><input type="text" name="BkRessidue"  value=""></td></tr>
						<tr><th>出版社：</th><td><input type="text" name="Press"  value=""></td></tr>
						<tr><td colspan="2" class="td-btn">
						<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
						<input type="submit" name="submit" value="图书入库" class="button" />
						<input type="reset" value="重新填写" class="button" />
						</td></tr>
					</table>
					</form>
				</div>

				<div class="no-doc show1" id="box3">
					<form method="post" action="addBook.php">
					<table class="profile-table">
						<tr><th>管理员ID：</th><td><?php echo $id['AdId']; ?></td></tr>
						<tr><th>姓名：</th><td><?php echo $id['AdName']; ?></td></tr>
						<tr><th>性别：</th><td><?php echo $id['AdSex']."性"; ?></td></tr>
						</td></tr>
					</table>
					</form>
				</div>

				<div class="no-doc show2" id="box4">
					<form method="post" action="./updateAdmin.php">
						<table class="profile-table">
							<tr><th>管理员ID：</th><td><?php echo $id['AdId']; ?></td></tr>
							<tr><th>姓名：</th><td><input type="text" name="AdName" value="<?php echo $id['AdName']; ?>"/></td></tr>
							<tr><th>性别：</th><td><input type="text" name="AdSex" value="<?php echo $id['AdSex']; ?>"/></td></tr>
							<tr><th>密码修改：</th><td><input type="password" name="AdPW" value="<?php echo $id['AdPW']; ?>"/></td></tr>
							<tr><td colspan="3" class="td-btn">
								<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
								<input type="submit" name="submit" value="保存资料" class="button" />
								<input type="reset" value="重新填写" class="button" />
							</td></tr>
						</table>
					</form>
				</div>

			
				<div class="no-doc show3" id="box5">
					<div class="boxs">	
					<table>
					<tr>
						<th>读者ID</th>
						<th>图书ID</th>
						<th>借出时间</th>
		                <th>归还时间</th>
						<th>管理员ID</th>
						<th>是否归还</th>
					</tr>
					<?php
						$result = mysqli_query($conn, "SELECT * From Lend");
						if( mysqli_num_rows($result) > 0 ){
							while($myrow = mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td><span><?php echo $myrow['RdId']; ?></span></td>
						<td><span><?php echo $myrow['id']; ?></span></td>
						<td><span><?php echo $myrow['BT']; ?></span></td>
						<td><span><?php echo $myrow['RT']; ?></span></td>
						<td><span><?php echo $myrow['AdId']; ?></span></td>
						<td><span><?php echo $myrow['Flag']; ?></span></td>
						</tr>
						<?php
								}
							} 
						?>
					</table>
					</div>

				</div>


                    <div class="no-doc show6" id="box6">
					<form method="post" action="returnBook.php">
						<table class="profile-table">
							<tr><th>读者ID：</th><td><input type="text" name="RdId" value=""/></td></tr>
							<tr><th>图书书号：</th><td><input type="text" name="BkId" value=""/></td></tr>
                            <tr><th>图书唯一书号：</th><td><input type="text" name="bkid" value=""/></td></tr>
                            <tr><th>图书位置：</th><td><input type="text" name="location" value=""/></td></tr>
							<tr><td colspan="3" class="td-btn">
								<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
								<input type="submit" name="submit" value="图书归还" class="button" />
								<input type="reset" value="重新填写" class="button" />
							</td></tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
