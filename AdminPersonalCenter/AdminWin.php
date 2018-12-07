<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员个人中心</title>
</head>
<style>
	body{background-color:#eee;margin:0;padding:0;font-family: 宋体;}
	.box{
		position: absolute;
			align-self: center;
			top: 50px;
			left: 50px;
			height: 450px;
			width: 900px;
			background-repeat: no-repeat;
			border:2px solid red;
	}
	#test{
			position: absolute;
			align-self: center;
			top: 50px;
			left: 500px;
			height: 450px;
			width: 450px;
			background-repeat: no-repeat;
			border:2px solid green;
		
	}
	#photo{
			position: absolute;
			align-self: center;
			top: 25px;
			left: 35px;
			height: 100px;
			width: 100px;
			background-repeat: no-repeat;
			border:2px solid blue;
	}

	#update{
			position: absolute;
			align-self: center;
			top:100px;
			left: 170px;
			/*height: 100px;
			width: 100px;*/
			background-repeat: no-repeat;
			/*border:2px solid blue;*/
	}

	#messsage{
			position: absolute;
			align-self: center;
			top: 55px;
			left: 175px;
			height: 60px;
			width: 150px;
			background-repeat: no-repeat;
			/*border:2px solid green;*/
	}
	#num1{
			position: absolute;
			align-self: center;
			top: 180px;
			left: 145px;
			height: 130px;
			width: 80px;
			background-repeat: no-repeat;
			/*border:2px solid pink;*/
	}
	.button1{
		background-color:#0099ff;
		border:1px solid #0099ff;
		color:#fff;
		width:80px;
		height:25px;
		margin:5px;
		cursor:pointer;
	}
	.button2{
		background-color:#0099ff;
		border:1px solid #0099ff;
		color:#fff;
		width:80px;
		height:25px;
		margin:5px;
		cursor:pointer;
	}
	.button3{
		background-color:#0099ff;
		border:1px solid #0099ff;
		color:#fff;
		width:80px;
		height:25px;
		margin:5px;
		cursor:pointer;
	}
	.button4{
		background-color:#0099ff;
		border:1px solid #0099ff;
		color:#fff;
		width:80px;
		height:25px;
		margin:5px;
		cursor:pointer;
	}
/*	.box{margin:15px auto;padding:20px;border:1px solid #ccc;background-color:#fff;}
	.box h1{font-size:20px;text-align:center;}
	.profile-table{margin:0 auto;}
	.profile-table th{font-weight:normal;text-align:right;}
	.profile-table input[type="text"]{width:180px;border:1px solid #ccc;height:22px;padding-left:4px;}
	.profile-table .button{background-color:#0099ff;border:1px solid #0099ff;color:#fff;width:80px;height:25px;margin:0 5px;cursor:pointer;}
	.profile-table .td-btn{text-align:center;padding-top:10px;}
	.profile-table th,.profile-table td{padding-bottom:10px;}
	.profile-table td{font-size:14px;}
	.profile-table .txttop{vertical-align:top;}
	.profile-table select{border:1px solid #ccc;min-width:80px;height:25px;}
	.profile-table .description{font-size:13px;width:250px;height:60px;border:1px solid #ccc;}*/
</style>
<body>
	<div id="test"></div>
	<div class="box">
	<div id="photo"></div>

	<div id="messsage">
		<div>用户名：小明同学</div>
		<div>职工号：211606xxx</div>
	</div>
		
	<div id="update"><input type="submit" name="submit" value="编辑资料" class="button1" /><br></div>

	<div id="num1">
		<input type="submit" name="submit1" value="图书入库" class="button2" /><br>
		<input type="submit" name="submit2" value="图书借出表" class="button3" /><br>
		<input type="submit" name="submit3" value="退出登录" class="button4" /><br>
	</div>
	</div>
</body>
</html>