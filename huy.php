<?php
    include("includes/connect.php");
    if(isset($_POST['huy'])){
        $hoten = $_POST['hoten'];
        $CMND = $_POST['cmnd'];
        $id_phieu = $_POST['id_phieu'];

        
            $huy = mysqli_query($conn, "DELETE  FROM phieu_datve WHERE id_phieu='$id_phieu'");
            $xoa = mysqli_query($conn, "DELETE  FROM diem_ruockhach WHERE id_phieu='$id_phieu'");
            $capnhat = mysqli_query($conn, "UPDATE `lich_chay` SET `daban`='$daban',`giucho`= '$new_giucho',`conlai`='$new_conlai' WHERE id_phieu='$id_phieu'");

        
        if($huy && $xoa && $capnhat){
            echo'<script type="text/javascript">
                alert("Hủy vé thành công!");
                window.location = "/demo1/index.php";
            </script>';
        }
        else{
            
            echo'<script type="text/javascript">
            alert("Hủy vé thành công!");
            window.location = "/demo1/index.php";
        </script>';
        }
}
?>