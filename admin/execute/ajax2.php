<?php
	include("../includes/connect.php");
	$rid=$_POST['rid'];
	$result=mysqli_query($conn, "SELECT  maxseats FROM route WHERE rid='$rid'");
	while($row=mysqli_fetch_array($result)){
		echo "<option value=".$row['maxseats'].">".$row['maxseats']."</option>";
	}
?>