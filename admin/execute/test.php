<?php
	include("../includes/connect.php");
    $id_loaixe=$_POST['id_loaixe'];
	$result=mysqli_query($conn, "SELECT * FROM xeluuhanh WHERE id_loaixe='$id_loaixe' and ten_noidi='Cần Thơ' and status='Đang hoạt động'");
	while($row=mysqli_fetch_array($result)){
        $ten_noidi=$row['ten_noidi'];
        $ten_noiden=$row['ten_noiden'];
    }
    //Lấy tên tài xế
    $get_taixe = mysqli_query($conn, "SELECT * FROM nhan_vien WHERE toLoc='$ten_noiden' and chucvu='Tài xế'");
    while($row_noiden = mysqli_fetch_array($get_taixe)){
        $toLoc = preg_replace_callback_array() $row_noiden['toLoc'];
    }
    $execute = mysqli_fetch_assoc($get_taixe);
    echo "<option value=".$execute['manv'].">".$execute['hoten']."</option>";
?>