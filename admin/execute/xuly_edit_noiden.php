<?php
	include("../includes/connect.php");
	if (isset($_POST['suanoiden'])) {
        $id_noiden = $_POST['id_noiden'];
		$ten_noiden = $_POST['ten_noiden'];
		$query = mysqli_query($conn,"UPDATE noiden SET ten_noiden = '$ten_noiden' WHERE id_noiden = '$id_noiden'");
		header('location:../index.php?tab=tmnoidi');
	}
?>