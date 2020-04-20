<?php
    error_reporting(0);
    include("../includes/connect.php");

    if(isset($_GET['manv'])){
        $manv = $_GET['manv'];
        $passwordold = $_POST['password'];
        $passwordnew =  RandPass(8);
        $sql=mysqli_query($conn, "UPDATE nhanvien SET password = '$passwordnew' WHERE manv = $manv");
        if($sql){
            echo "<script>if(confirm('Cập nhật thành công!')){document.location.href='edit_staff.php'};</script>";
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Cập nhật thất bại");window.history.back()';
            echo '</script>';
        }
    }
?>