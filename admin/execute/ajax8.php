<?php
	include("../includes/connect.php");
    if(!empty($_POST['id_noiden'])){
        $id_noiden=$_POST['id_noiden'];
        //Lấy tên tài xế
        $get_taixe = mysqli_query($conn, "SELECT * FROM nhanvien INNER JOIN noiden ON nhanvien.id_noidi = noiden.id_noidi WHERE noiden.id_noiden='$id_noiden' and nhanvien.fromLoc='Cần Thơ' and nhanvien.chucvu='Phụ xe'");
        $get_ten_noiden = mysqli_query($conn, "SELECT * FROM noiden WHERE id_noiden='$id_noiden'");
        $execute_noiden = mysqli_fetch_assoc($get_ten_noiden);
        $ten_noiden = $execute_noiden['ten_noiden'];
        while($execute = mysqli_fetch_array($get_taixe)){
            $noiden = explode(' , ', $execute['toLoc']);
            foreach($noiden as $toLoc){    
            if( $toLoc == $ten_noiden){
                $phuxe = $execute['hoten'];
                echo '<option value="'.$phuxe.'">'.$phuxe.'</option>';
            }
        }
    }
}
    
?>