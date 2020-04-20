<?php
include '../includes/connect.php';
	if(isset($_POST['user'])){
		$user = $_POST['user'];
		$sql = "SELECT * FROM phieu_datve WHERE vitrighe LIKE '%$user%' or vitrighe='$user'";
 		$query = mysqli_query($conn,$sql);
 		$count = mysqli_num_rows($query);
 		if ($count > 0) {
 			echo 1;
 		}else{
 			echo 0;
 		}
	}

?>