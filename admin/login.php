<?php
  session_start();
  if(isset($_SESSION['user'])){
    header("location: index.php");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ĐĂNG NHẬP HỆ THỐNG</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="http://techlabz.in/truebus/admin/assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://techlabz.in/truebus/admin/assets/css/AdminLTE.min.css">
  </head>
  <body class="hold-transition login-page">
      <div class="login-box">
        <div class="login-logo">
          <a href="login.php"><b>TRUST BUS</b></a>
            </div><!-- /.login-logo -->
                <div class="login-box-body">
                  <p class="login-box-msg">Đăng nhập để truy cập hệ thống</p>
            <form action="" method="post">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
              <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
            <label class="inputLabel" style="font-size: 15px;">Chức vụ: </label>
              <select name="position" class="form-control" required>
                <option value="admin" selected>Admin</option>
                <option value="staff">Nhân viên</option>
              </select>
            </div>
            <div class="row">
            <!-- /.col -->
            <div class="col-xs-12 right">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
          </div><!-- /.col -->
        </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
  </body>
</html>

<?php
  include('includes/connect.php');

  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $position=mysqli_real_escape_string($conn, $_POST['position']);
    if($position=='admin'){

    //kiểm tra tên đăng nhập, mật khẩu
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $password=mysqli_real_escape_string($conn, md5($_POST['password']));
    

    //Truy vấn CSDL
    $sql= "SELECT id FROM login WHERE username='$username' and password='$password' and position='$position'";
    $result= mysqli_query($conn, $sql);
    $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active=$row['active'];
    $count = mysqli_num_rows($result);

    if($count==1)
    {
      $_SESSION['user']=$username;
      
        header("location: index.php");
    
    }
      else{
        echo '<script>alert("Không tồn tại tài khoản! Vui lòng đăng nhập lại");</script>';
    }
  }
  elseif($position=='staff'){
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);

    $sql= "SELECT * FROM nhanvien WHERE username='$username' and password='$password'";
    $result= mysqli_query($conn, $sql);
    $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active=$row['active'];
    $count = mysqli_num_rows($result);
    if($count==1)
    {
      $_SESSION['user']=$username;
      header("location: index_staff.php");
    }else{
      echo '<script>alert("Không tồn tại tài khoản! Vui lòng đăng nhập lại");</script>';
  }
}
}
?>