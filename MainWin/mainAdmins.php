<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="gbk">
	<title>ͼ����Ϣ�б�</title>
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
		<div class="title">ͼ����Ϣ�б�</div>
		<div class="search">
			<span>��ţ�</span><input type="text" name="keyId"/>
			<span>������</span><input type="text" name="keyName"/>
			<span>���ߣ�</span><input type="text" name="keyAuthor"/>
			<span>���</span>
				<select name="keyClassify">
					<option value="" selected> </option>
					<option value="��ѧ���ڽ�">��ѧ���ڽ�</option>
					<option value="����ѧ����">����ѧ����</option>
					<option value="���Ρ�����">���Ρ�����</option>
					<option value="����">����</option>
					<option value="����">����</option>
					<option value="�Ļ�����ѧ">�Ļ�����ѧ</option>
					<option value="���ԡ�����">���ԡ�����</option>
					<option value="��ѧ">��ѧ</option>
					<option value="����">����</option>
					<option value="��ʷ������">��ʷ������</option>
					<option value="��Ȼ��ѧ����">��Ȼ��ѧ����</option>
					<option value="�����ѧ�ͻ�ѧ">�����ѧ�ͻ�ѧ</option>
					<option value="����ѧ�������ѧ">����ѧ�������ѧ</option>
					<option value="�����ѧ">�����ѧ</option>
					<option value="ҽҩ������">ҽҩ������</option>
					<option value="ũҵ��ѧ">ũҵ��ѧ</option>
					<option value="��ҵ����">��ҵ����</option>
					<option value="��ͨ����">��ͨ����</option>
					<option value="���ա�����">���ա�����</option>
					<option value="������ѧ���Ͷ�������ѧ����ȫ��ѧ��">������ѧ���Ͷ�������ѧ����ȫ��ѧ��</option>
					<option value="�ۺ���ͼ��">�ۺ���ͼ��</option>
                    <option value="��ѧ">��ѧ</option>
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
				
			<input type="submit" value="��ѯ"/>
		</div>
		<table border="1">
			<tr>
				<th>���</th>
				<th>����</th>
				<th>����</th>
                <th>����</th>
				<th>���</th>
				<th>λ��</th>
				<th>ʣ����</th>
				<th>������</th>
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
			<tr><td colspan="8">��ѯ�Ľ�������ڣ�</td></tr>
	<?php 
		}
	?>
		</table>
	</form>
	<div class="r"><a href="../AdminPersonalCenter/AdminPersonalCenter.php?id=<?php echo $id ?>">��������</a></div>
</body>
</html>
