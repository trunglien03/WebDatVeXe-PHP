<?php
  include("../function.php");
  include("../includes/connect.php");

  //Xử lý nút bấm submit thêm xe
  if(isset($_POST['themxe'])){
    $id_xe = 'XLH'.RandID(6);
    $noidi = $_POST['noidi'];
    $noiden = $_POST['toLoc'];
    $id_loaixe = $_POST['loaixe'];
    $tenxe = $_POST['tenxe'];
    $tiennghi = implode(', ', $_POST['amenities']);
    $bsx = $_POST['biensoxe'];
    $soghe = $_POST['soghe'];
    $status = 'Đang hoạt động';

    //Lấy tên nơi đến
    $get_ten_noiden = mysqli_query($conn, "SELECT DISTINCT toLoc FROM route WHERE rid = '$noiden'");
    while($exe=mysqli_fetch_array($get_ten_noiden)){
      $ten_noiden = $exe['toLoc'];
    }

    //Thêm dữ liệu vào bảng XELUUHANH
    $check = mysqli_query($conn, "SELECT * FROM xeluuhanh WHERE bienkiemsoat='$bsx'");
    if(mysqli_num_rows($check)==0){
      $insert = mysqli_query($conn,"INSERT INTO `xeluuhanh`
      VALUE('$id_xe', '$id_loaixe', '$tenxe', '$tiennghi', '$bsx', '$soghe', '$noidi', '$ten_noiden', '$status')");
      if($insert){
        header('location:../index.php?tab=dsx');
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