<?php
	include("../includes/connect.php");
    $id_loaixe=z;
    $get_ten = mysqli_query($conn, "SELECT * FROM loai_xe WHERE id_loaixe='$id_loaixe'");
    while($exe = mysqli_fetch_assoc($get_ten)){
        echo "<option value=".$exe['maxseat'].">".$exe['maxseat']."</option>";
    }
    
?>