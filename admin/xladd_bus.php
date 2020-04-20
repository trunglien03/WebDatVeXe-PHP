<?php
    include ("includes/connect.php");
    if(isset($_POST['them'])){
        $LOAI_XE=$_REQUEST['loaixe'];
        $HANG_XE=$_REQUEST['hangxe'];
        $NAM_SX=$_REQUEST['datepicker1'];
        $TIENNGHI=$_REQUEST['amenities'];
        $BIENSX=$_REQUEST['biensoxe'];
        $SO_DK = $_REQUEST['sodangkiem'];
        $SO_GHE=$_REQUEST['soghe'];
        $id_noidi=$_REQUEST['fromLoc'];
        $id_noiden=$_REQUEST['toLoc'];
        $status='1';

        $sql= "INSERT INTO `xeluuhanh`(`bid`, `id_loaixe`, `id_hangxe`, `nam_sx`, `tiennghi`, `bienkiemsoat`, `sodangkiem`, `soghe`, `id_noidi`, `id_noiden`, `status`) 
                VALUES ('','$LOAI_XE','$HANG_XE','$NAM_SX','$TIENNGHI','$BIENSX','$SO_DK','$SO_GHE','$id_noidi','$id_noiden','$status')";
        if(mysqli_query($conn,$sql)){
        $msg="Thêm xe mới thành công!";
        }
        else{
            $delmsg="Thêm mới thất bại! Vui lòng kiểm tra lại";
        }
    }
?>