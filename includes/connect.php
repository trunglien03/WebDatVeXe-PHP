<?php
	$conn = mysqli_connect("localhost","root","","") or die("Lỗi kết nối cơ sở dữ liệu");
	mysqli_select_db($conn,"quanlyvexe");
	mysqli_query($conn,"SET NAMES 'UTF8'");
?>