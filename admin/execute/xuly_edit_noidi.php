<?php
	include("../includes/connect.php");
	if (isset($_POST['suanoidi'])) {
        $id_noidi = $_POST['id_noidi'];
		$ten_noidi = $_POST['ten_noidi'];
		$query = mysqli_query($conn,"UPDATE noidi SET ten_noidi = '$ten_noidi' WHERE id_noidi = '$id_noidi'");
		header('location:../index.php?tab=tmnoidi');
	}
?>