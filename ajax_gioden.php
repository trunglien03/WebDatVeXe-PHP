<?php
    include("includes/connect.php");
    if(!empty($_POST["id_lich"])){
        $id_lich = $_POST['id_lich'];
        $result=mysqli_query($conn, "SELECT * FROM lich_chay WHERE id_lich='$id_lich'");
        while($row=mysqli_fetch_array($result)){
            $gioden=$row['gioden'];
            echo $gioden;
        }

    }
?>
