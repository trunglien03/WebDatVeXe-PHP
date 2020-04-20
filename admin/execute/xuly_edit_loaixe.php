<?php
    error_reporting(0);
    include("../includes/connect.php");

    if(isset($_POST['capnhatlx'])){
      $id_loaixe=$_POST['id_loaixe'];
      $id_hangxe=$_POST['hangxe'];
      $id_loaixe=$_POST['ten_loaixe'];
      $maxseat=$_POST['maxseat'];
      $status=$_POST['status'];     
      $queryget = mysqli_query($conn,"SELECT * FROM loaixe WHERE id_loaixe = '$id_loaixe'");
      $rowget = mysqli_fetch_assoc($queryget);
      
      $get_hangxe=mysqli_query($conn, "SELECT * FROM hangxe WHERE id_hangxe='$id_hangxe'");
      while($row_hangxe=mysqli_fetch_array($get_hangxe)){
        if($row_hangxe['ten_hangxe']==$rowget['ten_hangxe']){
            $ten_hangxe=$rowget['ten_hangxe'];
        }
        else{
          $ten_hangxe= $row_hangxe['ten_hangxe'];
        }
      }
      
      $get_soghe=mysqli_query($conn, "SELECT * FROM loaighe WHERE id_loaighe='$id_loaixe'");
      while($row_soghe=mysqli_fetch_array($get_soghe)){
        if($row_soghe['ten_loaighe']==$rowget['ten_loaixe']){
          $ten_loaixe=$rowget['ten_loaixe'];
        }
        else{
          $ten_loaixe=$row_soghe['ten_loaighe'];
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
      
      $update = mysqli_query($conn,"UPDATE loai_xe SET id_loaixe = '$id_loaixe', ten_hangxe = '$ten_hangxe', ten_loaixe = '$ten_loaixe', maxseat='$maxseat', status='$ten_tt' WHERE id_loaixe = '$id_loaixe'");
        if($update){
          echo "<script>if(confirm('Cập nhật thành công!')){document.location.href='../index.php?tab=cnlx'};</script>";
        }
          else {
            echo '<script language="javascript">';
            echo 'alert("Cập nhật thất bại");window.history.back()';
            echo '</script>';
          }
        }
?>