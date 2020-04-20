<?php
    include("../includes/connect.php");
    include("../function.php");
    if(isset($_POST['xeplich'])){
        $id_lichchay= 'LC'.RandID(6);
        $id_loaixe = $_POST['loaixe'];
        $ten_noidi = $_POST['noidi'];
        $id_noiden = $_POST['noiden'];
        $biensoxe = $_POST['biensoxe'];
        $soghe = $_POST['soghe'];
        $taixe = $_POST['taixe'];
        $phuxe = $_POST['phuxe'];
        $giokhoihanh = $_POST['giokhoihanh'];
        $thoigiandichuyen = $_POST['thoigian'];
        $gioden = $_POST['gioden'];
        $ngaykhoihanh = implode(' , ', $_POST['ngaykhoihanh']);
        $diemdi = 'Bến xe Cần Thơ';
        $diemden = $_POST['diemden'];

        //Lấy tên nơi đến
        $get_noiden = mysqli_query($conn, "SELECT * FROM noiden WHERE id_noiden='$id_noiden'");
        $execute_noiden = mysqli_fetch_assoc($get_noiden);
        $ten_noiden = $execute_noiden['ten_noiden'];

        //Lấy giá tiền
        $get_tien = mysqli_query($conn, "SELECT * FROM route WHERE bid='$id_loaixe' and toLoc='$ten_noiden'");
        $execute_tien=mysqli_fetch_assoc($get_tien);
        $tien = $execute_tien['fare'];

        //Kiểm tra CSDL trong phpMyAdmin
        $check = mysqli_query($conn, "SELECT * FROM lich_chay WHERE ten_taixe='$taixe' and ten_phuxe='$phuxe' and giokhoihanh='$giokhoihanh' and id_loaixe='$id_loaixe'");
        if(mysqli_num_rows($check)==0){
            $insert = mysqli_query($conn, 
            "INSERT INTO `lich_chay`(`id_lich`, `fromLoc`, `toLoc`, `id_loaixe`, `biensoxe`, `ten_taixe`, `ten_phuxe`, `ngaydi`, `giokhoihanh`, `thoigiandi`, `gioden`,`diemdi`, `diemden`, `giave`, `daban`, `giucho`, `conlai`)
            VALUES ('$id_lichchay','$ten_noidi','$ten_noiden','$id_loaixe','$biensoxe','$taixe','$phuxe','$ngaykhoihanh','$giokhoihanh','$thoigiandichuyen','$gioden','$diemdi','$diemden','$tien','','', '$soghe')");
            if($insert){
                header("location:../index.php?tab=lcgn");
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