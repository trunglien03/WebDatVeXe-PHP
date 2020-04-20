<?php 
    include("../includes/connect.php");
 
if(!empty($_POST["id_loaixe"])){ 
    
	$id_loaixe=$_POST['id_loaixe'];
	$result=mysqli_query($conn, "SELECT * FROM noiden INNER JOIN xeluuhanh ON noiden.ten_noiden=xeluuhanh.ten_noiden WHERE xeluuhanh.id_loaixe='$id_loaixe' and noiden.id_noidi='7' and xeluuhanh.status='Đang hoạt động'");
	while($row=mysqli_fetch_array($result)){
        echo "<option value=".$row['id_noiden'].">".$row['ten_noiden']."</option>";
    }
}elseif(!empty($_POST["id_noiden"])){ 
    $id_noiden=$_POST['id_noiden'];
    $sql = mysqli_query($conn, "SELECT * FROM xeluuhanh INNER JOIN noiden ON xeluuhanh.ten_noiden=noiden.ten_noiden WHERE noiden.id_noiden='$id_noiden' and xeluuhanh.ten_noidi='Cần Thơ' and xeluuhanh.status='Đang hoạt động'");
    while($row=mysqli_fetch_array($sql)){
        echo "<option value=".$row['bienkiemsoat'].">".$row['bienkiemsoat']."</option>";
    }
}
?>