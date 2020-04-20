<?php
    include("../function.php");
    include("../includes/connect.php");
    if(isset($_POST['themtđ'])){
        $rid= 'TD'.RandID(6);
        $loaixe = $_POST['loaixe'];
        $id_noidi = $_POST['fromLoc'];
        $id_noiden = $_POST['toLoc'];
        $giokhoihanh = implode(' , ', $_POST['thoigiankhoihanh']);
        $sochuyen = $_POST['sochuyen'];
        $giave = $_POST['giave'];
        $soghe = $_POST['soghe'];
        $status = 'Đang hoạt động';
        
        //Lấy nơi đi
        $query_noidi=mysqli_query($conn, "SELECT * FROM noidi WHERE id_noidi='$id_noidi'");
        while($row_noidi=mysqli_fetch_array($query_noidi)){
            $ten_noidi=$row_noidi['ten_noidi'];
        }

        //Lấy nơi đến
        $query_noiden=mysqli_query($conn, "SELECT * FROM noiden WHERE id_noiden='$id_noiden'");
        while($row_noiden=mysqli_fetch_array($query_noiden)){
            $ten_noiden=$row_noiden['ten_noiden'];
        }

        //Lấy số ghế
        $query_soghe=mysqli_query($conn, "SELECT * FROM loai_xe WHERE id_loaixe ='$soghe'");
        while($row=mysqli_fetch_array($query_soghe)){
            $get_soghe=$row['maxseat'];
        }

        $check = mysqli_query($conn, "SELECT * FROM route WHERE toLoc='$ten_noiden' and bid='$loaixe'and fare='$giave'");
        if(mysqli_num_rows($check)==0){
            $sql=mysqli_query($conn, "INSERT INTO `route`(`rid`, `bid`, `fromLoc`, `toLoc`, `thoigiankhoihanh` , `sochuyen`, `fare`, `maxseats`, `status`) VALUES ('$rid', '$loaixe', '$ten_noidi', '$ten_noiden', '$giokhoihanh', '$sochuyen','$giave','$get_soghe', '$status')");
            if($sql){
                header('location:../view_routedetails.php');
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("Thêm thất bại");window.history.back()';
                echo '</script>';
            }
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Tuyến đường đa tồn tại trong hệ thống");window.history.back()';
            echo '</script>';
        }
    }
        
?>