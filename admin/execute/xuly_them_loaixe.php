<?php
    include("../function.php");
    include("../includes/connect.php");
    if (isset($_POST['themloaixe'])) {
        $id_loaixe = 'LX'.RandID(6);
        $id_hangxe=$_POST['hangxe'];
        $ten_loaixe = $_POST['loaixe'];
        $maxseat=$_POST['soghe'];
        $status="Đang hoạt động";

        $get_hangxe=mysqli_query($conn, "SELECT * FROM hangxe WHERE id_hangxe='$id_hangxe'");
        while($row_hangxe=mysqli_fetch_array($get_hangxe)){
            $ten_hangxe=$row_hangxe['ten_hangxe'];
        }

        $get_soghe=mysqli_query($conn, "SELECT * FROM loaighe WHERE id_loaighe='$ten_loaixe'");
        while($row_soghe=mysqli_fetch_array($get_soghe)){
            $ten_loaixe=$row_soghe['ten_loaighe'];
        }
        
		$query = mysqli_query($conn,"INSERT INTO loai_xe VALUES('$id_loaixe','$ten_hangxe','$ten_loaixe', '$maxseat', '$status')");
		header('location:../index.php?tab=cnlx');
		
	}
?>