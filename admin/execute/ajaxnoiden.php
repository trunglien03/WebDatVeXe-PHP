<?php
	include("../includes/connect.php");
	$id_noidi=$_POST['id_noidi'];
	$result=mysqli_query($conn, "SELECT * FROM noiden WHERE id_noidi='$id_noidi'");
	while($row=mysqli_fetch_array($result)){
		echo "<option value=".$row['id_noiden'].">".$row['ten_noiden']."</option>";
	}
?>