<?php
	include("includes/connect.php");
	 if(isset($_GET['id_tp'])){
	 	$id_tp= $_GET['id_tp'];
	 	$sql="DELETE FROM thanhpholon WHERE id_tp='$id_tp'";
	 	mysqli_query($conn,$sql);
	 	header("Location: index.php?tab=tpl");
			
	 }
?>