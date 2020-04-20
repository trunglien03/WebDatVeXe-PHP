<?php
	include("../includes/connect.php");
	if(!empty($_POST['id_noiden'])){
		$id_noiden=$_POST['id_noiden'];
		$sql = mysqli_query($conn, "SELECT * FROM xeluuhanh INNER JOIN noiden ON xeluuhanh.ten_noiden=noiden.ten_noiden WHERE noiden.id_noiden='$id_noiden' and xeluuhanh.ten_noidi='Cần Thơ' and xeluuhanh.status='Đang hoạt động'");
		while($row=mysqli_fetch_array($sql)){
			echo "<option value=".$row['bienkiemsoat'].">".$row['bienkiemsoat']."</option>";
		}
	}
?>