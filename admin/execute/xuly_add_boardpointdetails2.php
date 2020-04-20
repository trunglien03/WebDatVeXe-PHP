<?php
    include("../includes/connect.php");
    if (isset($_POST['themnoiden'])) {
        $id_noidi = $_POST['fromLoc'];
        $ten_noiden = $_POST['ten_noiden'];
        $date=date("Y-m-d H:i:s");
        $status="1";
        $kt=mysqli_query($conn, "SELECT * FROM noiden");
        if($kt){
		    $query = mysqli_query($conn,"INSERT INTO noiden VALUES('','$id_noidi', '$ten_noiden','$date', '$status')");
            header('location:../index.php?tab=tmnoidi');
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Nơi đi đã tồn tại trong hệ thống!");window.history.back()';
            echo '</script>';
        }
		
	}
   ?>