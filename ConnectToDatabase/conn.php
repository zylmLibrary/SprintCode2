<?php
	header("Content-Type: text/html; charset=gbk");
	require_once "config.php";
	$conn = mysqli_connect($host,$username,$pw) or die("连接数据库服务器失败！".mysqli_error());
	

	// 选择数据库、建库
	if(mysqli_select_db($conn, $dbName)){
	
	} else {
		echo "连接数据库失败<br><br>";
		$sql = 'CREATE DATABASE '.$dbName;
		$retval = mysqli_query($conn, $sql) or die("创建数据库失败！".mysqli_error());
		if($retval){
			if(mysqli_select_db($conn, $dbName)){
				echo "连接数据库成功<br><br>";
			}else{
				echo "连接数据库失败<br><br>";
				return ;
			}
		}
	}

	// 建Reader表
	$result = mysqli_query($conn, "SELECT * FROM Reader");
	if(!$result){
		// echo "开始创建 Reader<br>";
		$sql = "CREATE TABLE IF NOT EXISTS Reader ( 
			    RdId char(9) NOT NULL,
				RdName varchar(10) NOT NULL,
				RdSex char(6) NOT NULL CHECK(RdSex='男' or RdSex='女'),
				RdPW varchar(10) NOT NULL,
				PRIMARY KEY(RdId));";
		mysqli_query($conn, $sql);
		// echo "完成创建<br>";

		$sql = "INSERT INTO Reader VALUES('211600000','张三','男','123456789');";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO Reader VALUES('211600010','王五','男','123465239')";
		mysqli_query($conn,$sql);

		$sql = "INSERT INTO Reader VALUES('211600156','李四','女','123456963')";
		mysqli_query($conn,$sql);

		// $result = mysqli_query($conn, "SELECT * FROM Reader");
	}

	// 建Book表
	$result = mysqli_query($conn, "SELECT * FROM Book");
	if(!$result){
		// echo "开始创建 Book<br>";
		$sql = "CREATE TABLE IF NOT EXISTS Book ( 
			    BkId int auto_increment primary key,
				id char(6) NOT NULL,
				BkName varchar(10) NOT NULL,
				BkAuthor varchar(10) NOT NULL,
				BkPrice char(6) NOT NULL,
				BkClassify varchar(15) NOT NULL,
				BkLocation varchar(10) NOT NULL,
				BkPress varchar(10) NOT NULL);";
		mysqli_query($conn, $sql);
		echo "完成创建<br>";
									
		$sql = "INSERT INTO Book(id,BkName,BkAuthor,BkPrice,BkClassify,BkLocation,BkPress)VALUES('208963','形式与政策','李四','78.2','哲学、宗教','9列4排','清华出版社')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO Book(id,BkName,BkAuthor,BkPrice,BkClassify,BkLocation,BkPress) VALUES('208111','大学物理','张三','50','数理科学和化学','6列5排','河北出版社')";
		mysqli_query($conn,$sql);

		$sql = "INSERT INTO Book(id,BkName,BkAuthor,BkPrice,BkClassify,BkLocation,BkPress) VALUES('201122','C语言300题','李林','80','工学','6列7排','河北出版社')";
		mysqli_query($conn,$sql);
		$sql = "INSERT INTO Book(id,BkName,BkAuthor,BkPrice,BkClassify,BkLocation,BkPress) VALUES('225952','离散数学','屈婉玲','80','数理科学和化学','6列7排','河北出版社')";
		mysqli_query($conn,$sql);

		// $result = mysqli_query($conn, "SELECT * FROM Book");
	}
	
	
	
	$result = mysqli_query($conn, "SELECT * FROM BookCollection");
	if(!$result){
		// echo "开始创建 BookCollection<br>";
		$sql = "CREATE TABLE IF NOT EXISTS BookCollection( 
				id char(6) NOT NULL primary key,
				BkName varchar(10) NOT NULL,
				BkAuthor varchar(10) NOT NULL,
				BkPrice char(6) NOT NULL,
				BkClassify varchar(15) NOT NULL,
				BkPress varchar(10) NOT NULL);";
		mysqli_query($conn, $sql);
		echo "完成创建<br>";
									
		$sql = "INSERT INTO BookCollection VALUES('208963','形式与政策','李四','78.2','哲学、宗教','清华出版社')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO BookCollection VALUES('208111','大学物理','张三','50','数理科学和化学','河北出版社')";
		mysqli_query($conn,$sql);

		$sql = "INSERT INTO BookCollection VALUES('201122','C语言300题','李林','80','工学','河北出版社')";
		mysqli_query($conn,$sql);
		$sql = "INSERT INTO BookCollection VALUES('225952','离散数学','屈婉玲','80','数理科学和化学','河北出版社')";
		mysqli_query($conn,$sql);

		// $result = mysqli_query($conn, "SELECT * FROM Book");
	}

	// 建Admins表
	$result = mysqli_query($conn, "SELECT * FROM Admins");
	if(!$result){
		// echo "开始创建 Admins<br>";
		$sql = "CREATE TABLE IF NOT EXISTS Admins ( 
				AdId char(9) NOT NULL,
				AdName varchar(10) NOT NULL,
				AdSex char(6) NOT NULL CHECK(AdSex='男' or AdSex='女'),
				AdPW varchar(10) NOT NULL,
				PRIMARY KEY(AdId));";
		mysqli_query($conn, $sql);
		echo "完成创建<br>";
						 						
		$sql = "INSERT INTO Admins VALUES('991604896','李武','男','abcd1234')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO Admins VALUES('991606301','赵武','男','123456')";
		mysqli_query($conn,$sql);

		$sql = "INSERT INTO Admins VALUES('991602345','李雪','女','abcdefg')";
		mysqli_query($conn,$sql);

		// $result = mysqli_query($conn, "SELECT * FROM Admins");
	}

	// 建Lend表
	$result = mysqli_query($conn, "SELECT * FROM Lend");
	if(!$result){
		// echo "开始创建 Lend<br>";
		$sql = "CREATE TABLE IF NOT EXISTS Lend ( 
				RdId char(9) REFERENCES Reader(RdId),
				id char(6) NOT NULL, 
				BkId char(6) REFERENCES Book(BkId),
				BT date NOT NULL, 
				RT date NOT NULL,
				AdId char(9) NOT NULL,
				Flag char(6) NOT NULL CHECK(Flag='Yes' or Flag='No'),
				PRIMARY KEY(RdId, BkId));";
		mysqli_query($conn, $sql);
		echo "完成创建<br>";
										//读者id，书号，借阅日期，应归还日期
		$sql = " INSERT INTO Lend VALUES('211600010','208963','6','2017-10-02','2017-11-01','211604896','No');";
		mysqli_query($conn, $sql);

		// $result = mysqli_query($conn, "SELECT * FROM Lend");
	}
	
?>