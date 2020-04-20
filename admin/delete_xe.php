<?php
	include("includes/connect.php");
	 if(isset($_GET['id_xe'])){
	 	$id_xe= $_GET['id_xe'];
	 	$sql="DELETE FROM xeluuhanh  WHERE bid='$id_xe'";
	 	mysqli_query($conn,$sql);
	 	header("Location: index.php?tab=dsx");
			
	 }
?>