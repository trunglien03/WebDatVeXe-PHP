<?php

    include('connect.php');
    // Check if user has requested to get detail
    if (isset($_POST["get_data"]))
    {
        // Get the ID of customer user has selected
        $id_tp = $_POST["id_tp"];

         // Getting specific customer's detail
        $sql = "SELECT * FROM thanhpholon WHERE id_tp='$id_tp'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_object($result);
        
        // Important to echo the record in JSON format
        echo json_encode($row);

        // Important to stop further executing the script on AJAX by following line
        exit();
    }
?>