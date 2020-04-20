<?php
	include("../includes/connect.php");
	$rid=$_POST['rid'];
	$result=mysqli_query($conn, "SELECT bid FROM route WHERE rid='$rid'");
	while($row=mysqli_fetch_array($result)){
		$bid=$row['bid'];
	}

	//Lấy id loại xe
	$get_idlx = mysqli_query($conn,"SELECT * FROM loai_xe WHERE id_loaixe='$bid'");
	$execute = mysqli_fetch_assoc($get_idlx);
	echo "<option value=".$execute['id_loaixe'].">".$execute['ten_loaixe']."</option>";
?>