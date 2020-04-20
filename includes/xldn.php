<!--==XỬ LÝ ĐĂNG NHẬP==-->        
<?php
    error_reporting(E_ALL & ~ E_NOTICE);
    session_start();
    ob_start();
    include ('connect.php');

    if(isset($_POST['Dangnhap'])){

        //Lấy thông tin từ form
        $username = $_POST['username'];
        $password = $_POST['password'];

        //Mã hóa mật khẩu
        $password = md5($password);

        //Truy vấn SQL
        $sql = "SELECT username, password FROM users WHERE username='$username' and password='$password'";
        $result = mysqli_query($conn, $sql);

        //Đọc mẫu tin từ câu truy vấn
        $row = mysqli_fetch_array($result);

        //Kiểm tra thông tin
        if($row['username'] != $username || $row['password'] != $password){
			echo '<script language="javascript">';
			echo 'alert("Không tồn tại tài khoản! Vui lòng đăng nhập lại");window.location = "../index.php";</script>';
        }
        else{
            $_SESSION['username'] = $username;
            header("location:../index.php");
        }
        $conn-> close();
    }
    

?>