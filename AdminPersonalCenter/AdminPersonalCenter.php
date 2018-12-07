<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>管理员个人中心</title>
	<link rel="stylesheet" type="text/css" href="statics/css/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="statics/css/style.css" />
	<link rel="stylesheet" type="text/css" href="statics/css/table.css" />
	<script type="text/javascript">
		function $(id){
			return document.getElementById(id);
		}
	</script>
</head>
<body>
	<div class="header">
		<div class="bar">
			<div class="w1200">
				<span class="l">管理员<font>个人中心</font></span>
				<span class="r"><a href="#"><i class="icon iconfont icon-dianyuan"></i>退出</a></span>
			</div>
		</div>
		<div class="user-info">
			<div class="w1200">
				<div class="user-headface">
					<img src="statics/images/user_face.jpg"/>
				</div>
				<div class="user-account">
					<p class="tip">下午好，吴文清</p>
					<p class="account">
						<span>帐户名：吴文清</span>
						<span>职工号：211606382</span>
					</p>
				</div>
				<div class="user-modify">
					<a href="#">修改资料></a>
				</div>
			</div>
		</div>
	</div>
	<div class="main w1200">
		<div class="left">
			<ul>
				<li>
					<a href="#" class="active" id="xx">
						<i class="icon iconfont icon-lingdang"></i>
						消息
					</a>
				</li>
				<li>
					<a href="#">
						<i class="icon iconfont icon-fangzidichan"></i>
						图书入库
					</a>
				</li>
				<li>
					<a href="#">
						<i class="icon iconfont icon-pinglun"></i>
						图书借出表
					</a>
				</li>
				<li>
					<a href="#">
						<i class="icon iconfont icon-geren"></i>
						个人资料
					</a>
				</li>
			</ul>
		</div>
		<div class="right">
			<div class="tap">
				<span>系统消息</span>
			</div>
			<div class="container">
				<div class="no-doc">
					<div class="box">
						<form method="post" action="addBook.php">
						<table class="profile-table">
							<tr><th>书号：</th><td><input type="text" name="BkId" value="" /></td></tr>
							<tr><th>书名：</th><td><input type="text" name="BkName" value=""/></td></tr>
							<tr><th>作者：</th><td><input type="text" name="BkAuthor" value=""></td></tr>
							<tr><th>单价：</th><td><input type="text" name="BkPrice"  value=""></td></tr>
							<tr><th>类别：</th><td><input type="text" name="BkClassify"  value=""></td></tr>
							<tr><th>位置：</th><td><input type="text" name="BkLocation"  value=""></td></tr>
							<tr><th>剩余量：</th><td><input type="text" name="BkRessidue"  value=""></td></tr>
							<tr><th>出版社：</th><td><input type="text" name="Press"  value=""></td></tr>
							<tr><td colspan="2" class="td-btn">
							<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
							<input type="submit" name="submit" value="图书入库" class="button" />
							<input type="reset" value="重新填写" class="button" />
							</td></tr>
						</table>
						</form>
					</div>
					<!-- <img src="statics/images/no_doc.jpg"/>
					<p>您还没有消息哦~</p> -->
				</div>
			</div>
		</div>
	</div>
</body>
</html>
