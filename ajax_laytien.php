<?php
    include("includes/connect.php");
	$id_loaixe=$_POST['id_loaixe'];
	$sql=mysqli_query($conn, "SELECT * FROM route INNER JOIN lich_chay ON route.bid=lich_chay.id_loaixe WHERE route.bid='$id_loaixe'");
    while($row_fare=mysqli_fetch_array($sql)){
        echo '<option value="'.$row_fare['fare'].'">'.$row_fare['fare'].'</option>';
    }
?>