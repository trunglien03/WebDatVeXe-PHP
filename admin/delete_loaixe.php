<?php
	include("includes/connect.php");
	 if(isset($_GET['id_loaixe'])){
	 	$id_loaixe= $_GET['id_loaixe'];
	 	$sql="DELETE FROM loai_xe WHERE id_loaixe='$id_loaixe'";
	 	mysqli_query($conn,$sql);
	 	header("Location: index.php?tab=cnlx");
			
	 }
?>