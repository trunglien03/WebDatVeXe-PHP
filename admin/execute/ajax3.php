<?php
	include("../includes/connect.php");
	$id_loaixe=$_POST['id_loaixe'];
	$result=mysqli_query($conn, "SELECT DISTINCT ten_noidi FROM xeluuhanh WHERE id_loaixe='$id_loaixe'");
	while($row=mysqli_fetch_array($result)){
        echo "<option value=".$row['ten_noidi'].">".$row['ten_noidi']."</option>";
    }
?>