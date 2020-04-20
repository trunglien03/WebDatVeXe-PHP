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
    $sql = mysqli_query($conn, "SELECT * FROM noiden WHERE id_noiden='$id_noiden'");
    while($row=mysqli_fetch_array($sql)){
        $ten_noiden = $row['ten_noiden'];
    }
    //Lấy giờ khởi hành
    $get_gkh = mysqli_query($conn, "SELECT * FROM route WHERE toLoc='$ten_noiden'");
    $execute = mysqli_fetch_assoc($get_gkh);
    $time=explode(' , ', $execute['thoigiankhoihanh']);
    foreach($time as $thoigiankhoihanh){
        //the out put from your explode loop array needs to go here
        echo '<option value="'.$thoigiankhoihanh.'">'.$thoigiankhoihanh.'</option>';
   } 
}
?>