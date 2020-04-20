<?php
    include("../includes/connect.php");
    if(!empty($_POST['id_noiden'])){
    
    $id_noiden=$_POST['id_noiden'];
    $sql = mysqli_query($conn, "SELECT * FROM noiden WHERE id_noiden='$id_noiden'");
    while($row=mysqli_fetch_array($sql)){
        $ten_noiden = $row['ten_noiden'];
    }
    //Lấy giờ khởi hành
    $get_gkh = mysqli_query($conn, "SELECT * FROM route WHERE toLoc='$ten_noiden'");
    $execute = mysqli_fetch_assoc($get_gkh);
    $time=explode(' , ', $execute['thoigiankhoihanh']);
    foreach($time as $thoigiankhoihanh){
        //the out put from your explode loop array needs to go here
        echo '<option value="'.$thoigiankhoihanh.'">'.$thoigiankhoihanh.'</option>';
   }
}
?>