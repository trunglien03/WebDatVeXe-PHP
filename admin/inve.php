<?php
include('includes/connect.php');
if (isset($_GET['id_phieu'])) {
	$id_phieu = $_GET['id_phieu'];
	$sql1 = "SELECT * FROM phieu_datve WHERE id_phieu = '".$id_phieu."'";
	$query1 = mysqli_query($conn,$sql1);
	if($row1 = mysqli_fetch_array($query1)) {
        $khach= mysqli_query($conn, "SELECT * FROM diem_ruockhach WHERE id_phieu='$id_phieu'");
        $ex = mysqli_fetch_assoc($khach);
        $hoten = $ex['hoten'];
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | QUẢN LÝ HỆ THỐNG</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
	 <link rel="stylesheet" href='assets/css/print.css' >
     <link rel="license" href="https://www.opensource.org/licenses/mit-license/">
  </head>
		<header>
			<h2 style=" font-size: 130%; text-align: center;">VÉ XE ĐIỆN TỬ</h2><br>
			<address >
				<p style=" font-size: 80%;">TrustBus</p>
				<p style=" font-size: 80%;">192 Nguyễn Viết Xuân<br>phường Trà Nóc, quận Bình Thủy<br>Tp.Cần Thơ</p>
				<p style=" font-size: 80%;">+(84) 922 657 762</p>
			</address>
		</header>
		<article>
			
            <center>
                <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.google.com%2F&choe=UTF-8" style="height: 70px; width: 70px; margin-top: -50px"/>
                <p style="font-weight: bold;">Mã vé: <?=$row1['id_phieu']?></p><br>
            </center>
                
                <p style="margin-left: -10px;">Khách hàng: <?php echo $row1['hoten']?></p><br>
                <p style="margin-left: -10px;">Khách hàng: <?php echo $hoten?></p><br>
                <p style="margin-left: -10px;">Điện thoại: <?php echo $row1['didong']?></p>

		</article>
		<aside style="margin-top: -28px; margin-left: -10px;">
			<h4 style="font-weight: bold;">Tuyến đường: <?=$row1['tuyenduong']?></h4>
            <p style="font-weight: bold;">Khởi hành: <?=$row1['giodi']?> <?=$row1['ngaydi']?></p>
            <p style="margin-top: 8px; font-weight: bold;">Vị trí ghế: <?=$row1['vitrighe']?></p>
            <h4 style="margin-top: 10px;">Số vé: <?=$row1['sove']?></h4>
            <p style="margin-top: 8px; font-weight: bold;">Tổng cộng: <?=$row1['tongtien']?></p>
            <p style="margin-top: 20px; font-style: italic; text-align: center;">Quý khách vui lòng giữ vé để kiểm tra. Xin cảm ơn!</p>
        </aside>
<?php }}?>
