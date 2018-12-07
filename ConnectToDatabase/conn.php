<?php
	header("Content-Type: text/html; charset=utf-8");
	require_once "config.php";
	$conn = mysqli_connect($host,$username,$pw) or die("连接数据库服务器失败！".mysqli_error());
	mysqli_query($conn, "set names utf8");

	// 选择数据库、建库
	if(mysqli_select_db($conn, $dbName)){
		// echo "连接数据库成功<br><br>";
	} else {
		echo "连接数据库失败<br><br>";
		$sql = 'CREATE DATABASE '.$dbName;
		$retval = mysqli_query($conn, $sql) or die("创建数据库失败！".mysqli_error());
		if($retval){
			if(mysqli_select_db($conn, $dbName)){
				// echo "连接数据库成功<br><br>";
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

		$sql = "INSERT INTO Reader VALUES('211600000','张三','男','123456789')";
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
				BkId char(6) NOT NULL,
				BkName varchar(10) NOT NULL,
				BkAuthor varchar(10) NOT NULL,
				BkPrice char(6) NOT NULL,
				BkClassify varchar(15) NOT NULL,
				BkLocation varchar(10) NOT NULL,
				BkRessidue int NOT NULL,
				BkPress varchar(10) NOT NULL,
				PRIMARY KEY(BkId));";
		mysqli_query($conn, $sql);
		// echo "完成创建<br>";
									
		$sql = "INSERT INTO Book VALUES('208963','形式与政策','李四','78.2','马克思','9列4排','8','清华出版社')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO Book VALUES('208111','大学物理','张三','50','大学','6列5排','6','河北出版社')";
		mysqli_query($conn,$sql);

		$sql = "INSERT INTO Book VALUES('201122','C语言300题','李林','80','软件','6列7排','6','河北出版社')";
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
		// echo "完成创建<br>";
						 						
		$sql = "INSERT INTO Admins VALUES('211604896','李武','男','abcd1234')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO Admins VALUES('211606301','赵武','男','123456')";
		mysqli_query($conn,$sql);

		$sql = "INSERT INTO Admins VALUES('211602345','李雪','女','abcdefg')";
		mysqli_query($conn,$sql);

		// $result = mysqli_query($conn, "SELECT * FROM Admins");
	}

	// 建Lend表
	$result = mysqli_query($conn, "SELECT * FROM Lend");
	if(!$result){
		// echo "开始创建 Lend<br>";
		$sql = "CREATE TABLE IF NOT EXISTS Lend ( 
				RdId char(9) REFERENCES Reader(RdId),
				BkId char(6) REFERENCES Book(BkId),
				BT datetime NOT NULL, /* borrow time */
				RT datetime NOT NULL, /* return time */
				AdId char(9) NOT NULL,
				Flag char(6) NOT NULL CHECK(Flag='Yes' or Flag='No'),
				PRIMARY KEY(RdId, BkId));";
		mysqli_query($conn, $sql);
		// echo "完成创建<br>";

		$sql = "INSERT INTO Lend VALUES('211601526','225952','2017-10-02','2017-10-22','211604896','Yes')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO Lend VALUES('211600010','201122','2017-09-28','2017-11-17','211606303','Yes')";
		mysqli_query($conn,$sql);

		$sql = "INSERT INTO Lend VALUES('211669518','208963','2018-10-28','2018-11-13','211606309','No')";
		mysqli_query($conn,$sql);

		// $result = mysqli_query($conn, "SELECT * FROM Lend");
	}

?>