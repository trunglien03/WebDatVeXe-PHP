<?php
    include("includes/connect.php");
    if(!empty($_POST["id_noidi"])){
        $id_noidi = $_POST['id_noidi'];
        $result=mysqli_query($conn, "SELECT * FROM noiden WHERE id_noidi='$id_noidi'");
        while($row=mysqli_fetch_array($result)){
            echo '<option value="'.$row['id_noiden'].'">'.$row['ten_noiden'].'</option>';
        }
    }
    elseif(!empty($_POST['id_noiden'])){
        $id_noiden = $_POST['id_noiden'];
        //Lấy tên nơi đến
        $get_noiden = mysqli_query($conn, "SELECT * FROM noiden WHERE id_noiden = '$id_noiden'");
        $execute = mysqli_fetch_assoc($get_noiden);
        $ten_noiden = $execute['ten_noiden'];
        //Lấy loại xe
        $sql = mysqli_query($conn, "SELECT DISTINCT ten_loaixe FROM loai_xe INNER JOIN lich_chay ON loai_xe.id_loaixe =lich_chay.id_loaixe WHERE lich_chay.toLoc='$ten_noiden'");
        if(mysqli_num_rows($sql)==0){
            echo '<script language="javascript">';
            echo 'alert("Tuyến đường này chưa mở đặt vé online. Anh/Chị vui lòng thông cảm cho sự bất tiện này");';
            echo '</script>';
        }
        else{
            while($execute_loaixe=mysqli_fetch_array($sql)){
                echo '<option value="'.$execute_loaixe['ten_loaixe'].'">'.$execute_loaixe['ten_loaixe'].'</option>';
            }
        } 
    }
?>
