<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录注册</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<!--背景-->
	<div class="wel" id="background-3"></div>
	<!--左右两边云-->
	<div class="wel" id="box">
		<div class="box-1 lefp"></div>
		<div class="box-1">
			<div class="righp"></div>
		</div>
	</div>
	<!--荧光点点-->
	<div class="wel" id="git"></div>
	<!--登录注册表-->
	<div class="wel" id="from">
		<div class="box-2 le-1">
			<form action="Login.php" method="post">
				<div class="flrg">
					<h3>登录</h3>
					<div class="a">
						<!--<label>账号：</label>-->
						<input type="text" name="uname" class="in-1" placeholder="请输入账号">
					</div>
					<div class="a">
						<!--<label>密码：</label>-->
						<input type="password" name="pwd" class="in-1" placeholder="请输入密码">
					</div>
					<input type="hidden" value="">
					<div class="a">
						<button type="submit" name="submit">登录</button>
					</div>
					<div class="a">
						<div class="hr"></div>
					</div>
					<div class="a">
						<a href="#">忘记密码</a>
					</div>
					<div class="a">
						<a href="../MainWin/visitor.php">游客登录</a>
					</div>
				</div>
			</form>
		</div>

		<div class="box-2 le-2">
			<form action="regist.php" method="post">
				<div class="flrg-1">
					<h3>注册</h3>
					<div class="a">
						<input type="text" name="uname" class="in-1" placeholder="您的账号">
					</div>
					<div class="a">
						<input type="password" name="pwd" class="in-1" placeholder="输入密码">
					</div>
					<div class="a">
						<input type="password" name="pwd2" class="in-1" placeholder="再次确认密码">
					</div>
					
					<div class="a">
						<button type="submit">注册</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
