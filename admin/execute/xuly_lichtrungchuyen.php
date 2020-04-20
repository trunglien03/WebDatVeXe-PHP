<?php
    include("../includes/connect.php");
    include("../function.php");
    if(isset($_POST['trungchuyen'])){
        $id_lichchay= 'TC'.RandID(6);
        $ten_noidi = $_POST['noidi'];
        
        $biensoxe = $_POST['biensoxe'];
        
        $taixe = $_POST['taixe'];
        
        $giokhoihanh = $_POST['giokhoihanh'];
        
        $ngaykhoihanh = implode(' , ', $_POST['ngaykhoihanh']);

        

        //Kiểm tra CSDL trong phpMyAdmin
        $check = mysqli_query($conn, "SELECT * FROM lich_trungchuyen WHERE ten_taixe='$taixe' and giokhoihanh='$giokhoihanh'");
        if(mysqli_num_rows($check)==0){
            $insert = mysqli_query($conn, 
            "INSERT INTO `lich_trungchuyen`(`id_lich`, `biensoxe`, `noidi`, `giokhoihanh`, `ten_taixe`) VALUES ('$id_lichchay','$biensoxe','$ten_noidi','$giokhoihanh','$taixe')");
            if($insert){
                header("location:../lichchaytrungchuyen.php");
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("Thêm mới thất bại");window.history.back()';
                echo '</script>';
            }
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Tài xế '.$taixe.' đã có lịch chạy vào thời gian '.$giokhoihanh.'. Vui lòng chọn tài xế khác!");window.history.back()';
            echo '</script>';
        }
    }
?>