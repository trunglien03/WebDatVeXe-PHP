<?php
	include("includes/connect.php");
	 if(isset($_GET['rid'])){
	 	$rid= $_GET['rid'];
	 	$sql="DELETE FROM route WHERE rid='$rid'";
	 	mysqli_query($conn,$sql);
	 	header("Location: index.php?tab=dstđ");
			
	 }
?>