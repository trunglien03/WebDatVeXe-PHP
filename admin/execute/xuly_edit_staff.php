<?php
    error_reporting(0);
    include("../includes/connect.php");

    if(isset($_POST['capnhatnv'])){
        $manv       = $_POST['manv'];
        $hoten 		= $_POST['hovaten'];
        $ngaysinh	= $_POST['ngaysinh'];
        $soCMND 	= $_POST['CMND'];
        $sdt 		= $_POST['sdt'];
        $quequan 	= $_POST['quequan'];
        $thuongtru 	= $_POST['thuongtru'];
        $ngayvaolam = $_POST['ngayvaolam'];
        $chucvu		= $_POST['chucvu'];
        $id_noidi   = '7';
        $ten_noidi 	= $_POST['fromLoc'];
        $ten_noiden = implode(" , ", $_POST['toLoc']);
        $password   = $_POST['password'];
        //Truy xuất dữ liệu trong MYSQL
        $queryget = mysqli_query($conn,"SELECT * FROM nhanvien WHERE manv = '$manv'");
        $rowget = mysqli_fetch_assoc($queryget);

        $sql1=mysqli_query($conn,"SELECT ten_noidi FROM noidi WHERE ten_noidi='$ten_noidi'");
        while($row_ten_noidi=mysqli_fetch_array($sql1)){
            if($row_ten_noidi['ten_noidi']==$rowget['fromLoc']){
                $ten_noidi=$rowget['fromLoc'];
            }else{
                $ten_noidi=$row_ten_noidi['ten_noidi'];    
            }
        }

        $sql3=mysqli_query($conn, "SELECT ten_chucvu FROM chucvu WHERE id_chucvu = '$chucvu'");
        while($row3=mysqli_fetch_array($sql3)){
            if($row3['ten_chucvu']==$rowget['chucvu']){
                $ten_chucvu = $rowget ['chucvu'];
            }
            else{
                $ten_chucvu = $row3['ten_chucvu'];
            }
        }

        $update = mysqli_query($conn, "UPDATE `nhanvien` SET `manv`='$manv',`hoten`='$hoten',`soCMND`='$soCMND',`ngaysinh`='$ngaysinh',`quequan`='$quequan',`thuongtru`='$quequan',`sdt`='$sdt',`ngayvaolam`='$ngayvaolam',`chucvu`='$ten_chucvu',`fromLoc`='$ten_noidi',`toLoc`='$ten_noiden',`username`='',`password`='$password', `id_noidi`='$id_noidi' WHERE manv = '$manv'");
        if($update){
            echo "<script>if(confirm('Cập nhật thành công!')){document.location.href='../list_staff.php'};</script>";
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Cập nhật thất bại");window.history.back()';
            echo '</script>';
        }
    }
?>