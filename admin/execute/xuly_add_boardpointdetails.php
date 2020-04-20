<?php
    include("../includes/connect.php");
    if (isset($_POST['themnoidi'])) {
        $ten_noidi = $_POST['ten_noidi'];
        $date=date("Y-m-d H:i:s");
        $status="1";
        $kt=mysqli_query($conn, "SELECT * FROM noidi WHERE ten_noidi='$ten_noidi'");
        if(mysqli_num_rows($kt)==0){
		    $query = mysqli_query($conn,"INSERT INTO noidi VALUES('','$ten_noidi','$date', '$status')");
            header('location:../index.php?tab=tmnoidi');
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Nơi đi đã tồn tại trong hệ thống!");window.history.back()';
            echo '</script>';
        }
		
	}
   ?>