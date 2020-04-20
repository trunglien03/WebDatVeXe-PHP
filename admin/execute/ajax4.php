<?php
	include("../includes/connect.php");
	$id_loaixe=$_POST['id_loaixe'];
	$result=mysqli_query($conn, "SELECT * FROM noiden INNER JOIN xeluuhanh ON noiden.ten_noiden=xeluuhanh.ten_noiden WHERE xeluuhanh.id_loaixe='$id_loaixe' and noiden.ten_noidi='Cần Thơ' and xeluuhanh.status='Đang hoạt động'");
	while($row=mysqli_fetch_array($result)){
        echo "<option value=".$row['id_noiden'].">".$row['ten_noiden']."</option>";
    }
?>