<?php
	include("../includes/connect.php");
    $id_noiden=$_POST['id_noiden'];
	$result=mysqli_query($conn, "SELECT * FROM noiden INNER JOIN lich_chay ON noiden.ten_noiden=lich_chay.toLoc WHERE noiden.id_noiden='$id_noiden'");
	while($row=mysqli_fetch_array($result)){
		$ten_noiden = $row['ten_noiden'];
    }

    //Lấy id loại xe
	$get_idlx = mysqli_query($conn,"SELECT DISTINCT ten_loaixe FROM loai_xe INNER JOIN lich_chay ON loai_xe.id_loaixe =lich_chay.id_loaixe WHERE lich_chay.toLoc='$ten_noiden'");
    while($execute = mysqli_fetch_array($get_idlx)){
        echo "<option value=".$execute['ten_loaixe'].">".$execute['ten_loaixe']."</option>";
    }
    
    
?>