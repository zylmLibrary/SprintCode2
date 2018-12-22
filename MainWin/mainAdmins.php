<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="gbk">
	<title>图书信息列表</title>
	<link rel="stylesheet" type="text/css" href="./assets/main.css"/ >
</head>
<body>
	<?php
		include_once("../ConnectToDatabase/conn.php");

		if (!empty($_GET['keyId'])) {
			$keyId = $_GET['keyId'];
			$result = mysqli_query($conn, "SELECT * From Book WHERE Id LIKE '%$keyId%' group by id");
		} else if (!empty($_GET['keyName'])) {
			$keyName = $_GET['keyName'];
			$result = mysqli_query($conn, "SELECT * From Book WHERE BkName LIKE '%$keyName%' group by id");
		} else if (!empty($_GET['keyAuthor'])) {
			$keyAuthor = $_GET['keyAuthor'];
			$result = mysqli_query($conn, "SELECT * From Book WHERE BkAuthor LIKE '%$keyAuthor%' group by id");
		} else if (!empty($_GET['keyClassify'])) {
			$keyClassify = $_GET['keyClassify'];
			$result = mysqli_query($conn, "SELECT * From Book WHERE BkClassify='$keyClassify' group by id");
		} else if ( !empty($_GET['keyId']) && !empty($_GET['keyName']) ) {
			$keyId = $_GET['keyId'];
			$keyName = $_GET['keyName'];
			$result = mysqli_query($conn, "SELECT * From Book WHERE Id LIKE '%$keyId%' and BkName LIKE '%$keyName%' group by id");
		} else if ( !empty($_GET['keyId']) && !empty($_GET['keyAuthor']) ) {
			$keyId = $_GET['keyId'];
			$keyAuthor = $_GET['keyAuthor'];
			$result = mysqli_query($conn, "SELECT * From Book WHERE Id LIKE '%$keyId%' and BkAuthor LIKE '%$keyAuthor%' group by id");
		} else if ( !empty($_GET['keyId']) && !empty($_GET['keyClassify']) ) {
			$keyId = $_GET['keyId'];
			$keyClassify = $_GET['keyClassify'];
			$result = mysqli_query($conn, "SELECT * From Book WHERE Id LIKE '%$keyId%' and BkClassify='$keyClassify' group by id");
		} else if ( !empty($_GET['keyName']) && !empty($_GET['keyAuthor']) ) {
			$keyName = $_GET['keyName'];
			$keyAuthor = $_GET['keyAuthor'];
			$result = mysqli_query($conn, "SELECT * From Book WHERE BkName LIKE '%$keyName%' and BkAuthor LIKE '%$keyAuthor%' group by id");
		} else if ( !empty($_GET['keyName']) && !empty($_GET['keyClassify']) ) {
			$keyName = $_GET['keyName'];
			$keyClassify = $_GET['keyClassify'];
			$result = mysqli_query($conn, "SELECT * From Book WHERE BkName LIKE '%$keyName%' and BkClassify='$keyClassify' group by id");
		} else if ( !empty($_GET['keyAuthor']) && !empty($_GET['keyClassify']) ) {
			$keyAuthor = $_GET['keyAuthor'];
			$keyClassify = $_GET['keyClassify'];
			$result = mysqli_query($conn, "SELECT * From Book WHERE BkAuthor LIKE '%$keyAuthor%' and BkClassify='$keyClassify' group by id");
		} else {
			$result = mysqli_query($conn, "SELECT * From Book group by id");
		}

	?>
	<form action="./mainAdmins.php" method="get">
		<div class="box">
		<div class="title">图书信息列表</div>
		<div class="search">
			<span>书号：</span><input type="text" name="keyId"/>
			<span>书名：</span><input type="text" name="keyName"/>
			<span>作者：</span><input type="text" name="keyAuthor"/>
			<span>类别：</span>
				<select name="keyClassify">
					<option value="" selected> </option>
					<option value="哲学、宗教">哲学、宗教</option>
					<option value="社会科学总论">社会科学总论</option>
					<option value="政治、法律">政治、法律</option>
					<option value="军事">军事</option>
					<option value="经济">经济</option>
					<option value="文化、科学">文化、科学</option>
					<option value="语言、文字">语言、文字</option>
					<option value="文学">文学</option>
					<option value="艺术">艺术</option>
					<option value="历史、地理">历史、地理</option>
					<option value="自然科学总论">自然科学总论</option>
					<option value="数理科学和化学">数理科学和化学</option>
					<option value="天文学、地球科学">天文学、地球科学</option>
					<option value="生物科学">生物科学</option>
					<option value="医药、卫生">医药、卫生</option>
					<option value="农业科学">农业科学</option>
					<option value="工业技术">工业技术</option>
					<option value="交通运输">交通运输</option>
					<option value="航空、航天">航空、航天</option>
					<option value="环境科学、劳动保护科学（安全科学）">环境科学、劳动保护科学（安全科学）</option>
					<option value="综合性图书">综合性图书</option>
                    <option value="工学">工学</option>
				</select>&nbsp; &nbsp;
				<?php 
					if(!empty($_GET['id']))
					{
						$id = $_GET['id']; 
						?>
						<input type="hidden" name="id" <?php echo "value=$id"?>>
						<?php
					}	

				?>
				
			<input type="submit" value="查询"/>
		</div>
		<table border="1">
			<tr>
				<th>书号</th>
				<th>书名</th>
				<th>作者</th>
                <th>单价</th>
				<th>类别</th>
				<th>位置</th>
				<th>剩余量</th>
				<th>出版社</th>
			</tr>
<?php
		if( mysqli_num_rows($result) > 0 ){
			while($myrow = mysqli_fetch_assoc($result)){
	?>
				<tr>
					<td><span><?php $bkid=$myrow['id'];
					echo $myrow['id']; ?></span></td>
					<td><span><?php echo $myrow['BkName']; ?></span></td>
					<td><span><?php echo $myrow['BkAuthor']; ?></span></td>
					<td><span><?php echo $myrow['BkPrice']; ?></span></td>
					<td><span><?php echo $myrow['BkClassify']; ?></span></td>
					<td><span><?php echo $myrow['BkLocation']; ?></span></td>
					<td><span><?php 
					$result0 = mysqli_query($conn, "select count(*) from book where id='$bkid'");
					$myrow0 = mysqli_fetch_assoc($result0);
					echo $myrow0['count(*)'];
					?></span></td>
					<td><span><?php echo $myrow['BkPress']; ?></span></td>

				</tr>
	<?php
			}
		} else {
	?> 
			<tr><td colspan="8">查询的结果不存在！</td></tr>
	<?php 
		}
	?>
		</table>
	</form>
	<div class="r"><a href="../AdminPersonalCenter/AdminPersonalCenter.php?id=<?php echo $id ?>">个人中心</a></div>
</body>
</html>
