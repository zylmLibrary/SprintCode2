<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>图书信息列表</title>
	<link rel="stylesheet" type="text/css" href="./assets/main.css"/ >
</head>
<body>
	<?php
		include_once("conn.php");
		$sort = "desc";

		if (!empty($_GET['keyword'])) {
			$keyword = $_GET['keyword'];
			$result = mysqli_query($conn, "SELECT * From Book WHERE Name LIKE '%$keyword%'");
		} else if (!empty($_GET['order']) && !empty($_GET['sort'])) {
			$order = $_GET['order'];
			$sort = $_GET['sort'];
			$result = mysqli_query($conn, "SELECT * From Book ORDER BY $order $sort");
			if ($sort == "desc")
				$sort = "asc";
			else
				$sort = "desc";
		} else {
			$result = mysqli_query($conn, "SELECT * From Book");
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
					<option value="">哲学、宗教</option>
					<option value="">社会科学总论</option>
					<option value="">政治、法律</option>
					<option value="">军事</option>
					<option value="">经济</option>
					<option value="">文化、科学、教育、体育</option>
					<option value="">语言、文字</option>
					<option value="">文学</option>
					<option value="">艺术</option>
					<option value="">历史、地理</option>
					<option value="">自然科学总论</option>
					<option value="">数理科学和化学</option>
					<option value="">天文学、地球科学</option>
					<option value="">生物科学</option>
					<option value="">医药、卫生</option>
					<option value="">农业科学</option>
					<option value="">工业技术</option>
					<option value="">交通运输</option>
					<option value="">航空、航天</option>
					<option value="">环境科学、劳动保护科学（安全科学）</option>
					<option value="">综合性图书</option>
				</select>&nbsp; &nbsp;
			<input type="submit" value="查询"/>
		</div>
		<table border="1">
			<tr>
				<th><a href="./mainAdmins.php?order=Section&sort=<?php echo $sort; ?>">书号</a></th>
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
					<td><span><?php echo $myrow['BkId']; ?></span></td>
					<td><span><?php echo $myrow['BkName']; ?></span></td>
					<td><span><?php echo $myrow['BkAuthor']; ?></span></td>
					<td><span><?php echo $myrow['BkPrice']; ?></span></td>
					<td><span><?php echo $myrow['BkClassify']; ?></span></td>
					<td><span><?php echo $myrow['BkLocation']; ?></span></td>
					<td><span><?php echo $myrow['BkRessidue']; ?></span></td>
					<td><span><?php echo $myrow['BkPress']; ?></span></td>
				</tr>
	<?php
			}
		} else {
	?> 
			<tr><td colspan="9">查询的结果不存在！</td></tr>
	<?php 
		} 
	?>
		</table>
	</form>
</body>
</html>