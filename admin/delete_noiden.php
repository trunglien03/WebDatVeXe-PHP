<?php
	include("includes/connect.php");
	 if(isset($_GET['id_noiden'])){
	 	$id_noiden= $_GET['id_noiden'];
	 	$sql="DELETE FROM noiden WHERE id_noiden=$id_noiden";
	 	mysqli_query($conn,$sql);
	 	header("Location: index.php?tab=tmnoidi");
			
	 }
?>