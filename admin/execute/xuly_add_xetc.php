<?php
  include("../function.php");
  include("../includes/connect.php");

  //Xử lý nút bấm submit thêm xe
  if(isset($_POST['themxetc'])){
    $id_xe = 'XTC'.RandID(6);
    
    $id_loaixe = $_POST['loaixe'];
    $tenxe = $_POST['tenxe'];
   
    $bsx = $_POST['biensoxe'];
    
    $status = 'Đang hoạt động';

    //Thêm dữ liệu vào bảng XELUUHANH
    $check = mysqli_query($conn, "SELECT * FROM xetrungchuyen WHERE bienkiemsoat='$bsx'");
    if(mysqli_num_rows($check)==0){
      $insert = mysqli_query($conn,"INSERT INTO `xetrungchuyen`
      VALUE('$id_xe', '$id_loaixe', '$tenxe', '$bsx', '$status')");
      if($insert){
        header('location:../danhsachxetrungchuyen.php');
      }
        else{
          echo '<script language="javascript">';
          echo 'alert("Thêm thất bại");window.history.back()';
          echo '</script>';
        }
    }
    else{
      echo '<script language="javascript">';
      echo 'alert("Biển số xe trùng nhau! Vui lòng kiểm tra lại");window.history.back()';
      echo '</script>';
    }

  }
?>