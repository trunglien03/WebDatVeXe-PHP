<?php
    error_reporting(E_ALL & ~ E_NOTICE);
    session_start();
    ob_start();
    include("connect.php");
    include("function.php");

    if(isset($_POST['Dangky'])){
        $id_user= 'KH'.RandID(4);
        $hoten=$_POST['hoten'];
        $diachi=$_POST['diachi'];
        $sdt=$_POST['mob'];
        $cmnd=$_POST['cmnd'];
        $username=$_POST['name'];
        $password=md5($_POST['password']);
        $repassword=md5($_POST['repassword']);
        
        if($hoten=='' || $diachi=='' || $sdt=='' || $cmnd=='' || $username=='' || $password=='' || $repassword==''){
            echo '<script language="javascript">';
            echo 'alert("Vui lòng điền đầy đủ thông tin!");window.history.back()';
            echo '</script>';
        }
        else{
            if($password != $repassword){
                echo '<script language="javascript">';
                echo 'alert("Mật khẩu không trùng khớp!");window.history.back()';
                echo '</script>';
            }
            else{
                $sql=mysqli_query($conn, "SELECT * FROM users WHERE username='$username' and hoten='$hoten'");
                if(mysqli_num_rows($sql)==0){
                    $insert=mysqli_query($conn, "INSERT INTO `users`(`id_user`, `hoten`, `sdt`, `cmnd`, `diachi`, `username`, `password`, `repassword`) VALUES ('$id_user','$hoten','$sdt','$cmnd','$diachi','$username','$password','$repassword')");
                    if($insert){
                        $_SESSION['username']=$username;
                        header("location:../index.php");
                    }
                    else{
                        echo '<script language="javascript">';
                        echo 'alert("Lỗi hệ thống! Vui lòng đăng ký lại");window.history.back()';
                        echo '</script>';
                    }
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("Trùng tên đăng nhập hệ thống! Vui lòng dùng tên khác");window.history.back()';
                    echo '</script>';
                }
            }
        }
    }
        ?>