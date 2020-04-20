<?php
    error_reporting(0);
    include("../includes/connect.php");

    if(isset($_POST['capnhattp'])){
      $id_tp=$_POST['id_tp'];
      $ten_tp=$_POST['ten_tp'];
      $queryget = mysqli_query($conn,"SELECT * FROM thanhpholon WHERE id_tp = '$id_tp'");
		  $rowget = mysqli_fetch_assoc($queryget);
        if($_FILES['hinh']['name'] != NULL) {
          $hinhanh = 'assets/images/'.$_FILES['hinh']['name'];
        }else{
          $hinhanh = $rowget['hinhanh'];
        }
        if($_POST['amenities']==''){
          $amenities = $rowget['diem_den'];
        }
        else{
          $amenities = implode(' , ', $_POST['amenities']);
        }
        $update = mysqli_query($conn,"UPDATE thanhpholon SET id_tp = '', ten_tp = '$ten_tp', hinhanh = '$hinhanh', diem_den = '$amenities' WHERE id_tp = '$id_tp'");
        if($update){
            //chuyen avatar
            $filename = $_FILES['hinh']['name'];
            move_uploaded_file($_FILES['hinh']['tmp_name'],'assets/images/'.$filename);
            echo "<script>if(confirm('Cập nhật thành công!')){document.location.href='../list_tp.php'};</script>";
        }
          else {
            echo '<script language="javascript">';
            echo 'alert("Cập nhật thất bại");window.history.back()';
            echo '</script>';
          }
        }
?>