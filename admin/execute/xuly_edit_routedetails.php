<?php
    include("../function.php");
    include("../includes/connect.php");
    if(isset($_POST['capnhattd'])){
        $rid= $_POST['rid'];
        $loaixe = $_POST['loaixe'];
        $noidi = $_POST['fromLoc'];
        $noiden = $_POST['toLoc'];
        $giokhoihanh = implode(' , ', $_POST['thoigiankhoihanh']);
        $sochuyen = $_POST['sochuyen'];
        $giave = $_POST['giave'];
        $soghe = $_POST['soghe'];
        $status = $_POST['status'];
        $queryget = mysqli_query($conn,"SELECT * FROM route WHERE rid = '$rid'");
        $rowget = mysqli_fetch_assoc($queryget);

        $query_noidi=mysqli_query($conn,"SELECT ten_noidi FROM noidi WHERE id_noidi='$noidi'");
        while($row_ten_noidi=mysqli_fetch_array($query_noidi)){
            if($row_ten_noidi['ten_noidi']==$rowget['fromLoc']){
                $ten_noidi=$rowget['fromLoc'];
            }else{
                $ten_noidi=$row_ten_noidi['ten_noidi'];    
            }
        }

        $query_noiden=mysqli_query($conn, "SELECT ten_noiden FROM noiden WHERE ten_noiden='$noiden'");
        while($row_ten_noiden=mysqli_fetch_array($query_noiden)){
            if($row_ten_noiden['ten_noiden']==$rowget['toLoc']){
                $ten_noiden=$rowget['toLoc'];
            }
            else{
                $ten_noiden=$row_ten_noiden['ten_noiden'];
            }
        }
      
        $get_ten_loaixe=mysqli_query($conn, "SELECT * FROM loai_xe WHERE id_loaixe='$loaixe'");
        while($row_ten_loaixe=mysqli_fetch_array($get_ten_loaixe)){
            if($row_ten_loaixe['id_loaixe']==$rowget['bid']){
                $ten_loaixe=$rowget['bid'];
            }
            else{
                $ten_loaixe= $row_ten_loaixe['id_loaixe'];
            }
        }
      
        $get_soghe=mysqli_query($conn, "SELECT * FROM loaighe WHERE id_loaighe='$soghe'");
        while($row_soghe=mysqli_fetch_array($get_soghe)){
            if($row_soghe['soghe']==$rowget['maxseats']){
            $ten_soghe=$rowget['maxseats'];
            }
            else{
            $ten_soghe=$row_soghe['soghe'];
            }
        }
        
        $get_tt=mysqli_query($conn, "SELECT * FROM trangthai WHERE id_trangthai='$status'");
        while($row_tt=mysqli_fetch_array($get_tt)){
            if($row_tt['ten_trangthai']==$rowget['status']){
            $ten_tt=$rowget['status'];
            }
            else{
            $ten_tt=$row_tt['ten_trangthai'];
            }
        }
        
        $update = mysqli_query($conn,"UPDATE route SET rid = '$rid', bid = '$loaixe', fromLoc = '$ten_noidi', toLoc = '$ten_noiden', thoigiankhoihanh = '$giokhoihanh', sochuyen = '$sochuyen',fare = '$giave', maxseats = '$ten_soghe', status='$ten_tt' WHERE rid = '$rid'");
            if($update){
            echo "<script>if(confirm('Cập nhật thành công!')){document.location.href='../view_routedetails.php'};</script>";
            }
            else {
                echo '<script language="javascript">';
                echo 'alert("Cập nhật thất bại");window.history.back()';
                echo '</script>';
            }
    }
        
?>