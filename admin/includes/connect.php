<?php
	$conn = mysqli_connect("localhost","root","","nln") or die("Lỗi kết nối cơ sở dữ liệu");
	mysqli_select_db($conn,"nln");
	mysqli_query($conn,"SET NAMES 'UTF8'");
?>