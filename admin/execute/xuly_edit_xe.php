<?php
    error_reporting(0);
    include("../includes/connect.php");

    if(isset($_POST['capnhatxe'])){
        $id_xe=$_POST['id_xe'];
        $id_loaixe=$_POST['id_loaixe'];
        $ten_xe=$_POST['ten_xe'];
        $tiennghi=$_POST['tien_nghi'];
        $biensoxe=$_POST['bienkiemsoat'];
        $soghe=$_POST['soghe'];
        $id_noidi=$_POST['fromLoc'];
        $id_noiden=$_POST['toLoc'];
        $status=$_POST['status']; 

        //Lấy thông tin đã lưu trong bảng XELUUHANH    
        $queryget = mysqli_query($conn,"SELECT * FROM xeluuhanh WHERE bid = '$id_xe'");
        $rowget = mysqli_fetch_assoc($queryget);

        //Lấy tên nơi đi từ ID nơi đi
        $query_noidi=mysqli_query($conn,"SELECT ten_noidi FROM noidi WHERE id_noidi='$id_noidi'");
        while($row_ten_noidi=mysqli_fetch_array($query_noidi)){
            if($row_ten_noidi['ten_noidi']==$rowget['ten_noidi']){
                $ten_noidi=$rowget['ten_noidi'];
            }else{
                $ten_noidi=$row_ten_noidi['ten_noidi'];    
            }
        }

        $query_noiden=mysqli_query($conn, "SELECT ten_noiden FROM noiden WHERE ten_noiden='$id_noiden'");
        while($row_ten_noiden=mysqli_fetch_array($query_noiden)){
            if($row_ten_noiden['ten_noiden']==$rowget['ten_noiden']){
                $ten_noiden=$rowget['ten_noiden'];
            }
            else{
                $ten_noiden=$row_ten_noiden['ten_noiden'];
            }
        }
      
        $get_ten_loaixe=mysqli_query($conn, "SELECT * FROM loaixe WHERE id_loaixe='$id_loaixe'");
        while($row_ten_loaixe=mysqli_fetch_array($get_ten_loaixe)){
            if($row_ten_loaixe['id_loaixe']==$rowget['id_loaixe']){
                $ten_loaixe=$rowget['id_loaixe'];
            }
            else{
            $ten_loaixe= $row_ten_loaixe['id_loaixe'];
            }
        }
      
        $get_soghe=mysqli_query($conn, "SELECT * FROM loaighe WHERE soghe='$soghe'");
        while($row_soghe=mysqli_fetch_array($get_soghe)){
            if($row_soghe['soghe']==$rowget['soghe']){
            $ten_soghe=$rowget['soghe'];
            }
            else{
            $ten_soghe=$row_soghe['soghe'];
            }
        }

        $get_tt=mysqli_query($conn, "SELECT * FROM trangthai WHERE id_trangthai='$status'");
        while($row_tt=mysqli_fetch_array($get_tt)){
            if($row_tt['ten_trangthai']==$rowget['status']){
            $ten_tt=$rowget['status'];
            }
            else{
            $ten_tt=$row_tt['ten_trangthai'];
            }
        }
        
        $update = mysqli_query($conn,"UPDATE xeluuhanh SET bid = '$id_xe', id_loaixe = '$id_loaixe', ten_xe = '$ten_xe', tiennghi = '$tiennghi', bienkiemsoat = '$biensoxe', soghe = '$ten_soghe',  ten_noidi='$ten_noidi', ten_noiden='$ten_noiden', status='$ten_tt' WHERE bid = '$id_xe'");
            if($update){
            echo "<script>if(confirm('Cập nhật thành công!')){document.location.href='../index.php?tab=dsx'};</script>";
            }
            else {
                echo '<script language="javascript">';
                echo 'alert("Cập nhật thất bại");window.history.back()';
                echo '</script>';
            }
            }
?>