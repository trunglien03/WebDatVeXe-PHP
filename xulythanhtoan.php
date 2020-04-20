<!--XỬ LÝ-->
<?php
    include("includes/connect.php");
    include("includes/function.php");

    if(isset($_POST['thanhtoan'])){
        if($_POST['hoten'] == '' || $_POST['diachi'] == '' || $_POST['sdt'] == '' || $_POST['cmnd'] == ''){
            echo '<script language="javascript">';
            echo 'alert("Vui lòng điền đầy đủ thông tin");window.history.back()';
            echo '</script>';
        }
        else{
            //Thông tin người đặt vé
            //Kiểm tra người dùng có đăng nhập không
            if($_POST['username']){
                $hoten = $_POST['hoten'];
                $diachi = $_POST['diachi'];
                $sdt = $_POST['sdt'];
                $soCMND = $_POST['cmnd'];
                $id_user = $_POST['id_user'];
                $vitrighe = 4;
            }
            else{
                $id_user = 'KH'.RandID(4);
                $hoten = $_POST['hoten'];
                $diachi = $_POST['diachi'];
                $sdt = $_POST['sdt'];
                $soCMND = $_POST['cmnd'];
                $vitrighe = 4;
            }

            //Thông tin chuyến đi
            $giokhoihanh = $_POST['giokhoihanh'];
            $ten_noidi = $_POST['ten_noidi'];
            $ten_noiden = $_POST['ten_noiden'];
            $sove = $_POST['sove'];
            $sokhach_dicung = $sove-1;
            $tuyenduong = $_POST['tuyenduong'];
            $ngaydi = $_POST['ngaydi'];
            $giodi = $_POST['giodi'];
            $yeucau = $_POST['yeucau'];
            $tongcong = $_POST['tongcong'];
            $pttt = $_POST['pttt'];
            $id_loaixe = $_POST['loaixe'];
            $diemlenxe = $_POST['diemruoc'];
            $diemxuongxe = $_POST['diemtra'];

            //Lấy số lượng vé còn lại
            $get_concho = mysqli_query($conn, "SELECT * FROM lich_chay WHERE fromLoc='$ten_noidi' and toLoc='$ten_noiden' and id_loaixe='$id_loaixe' and giokhoihanh='$giokhoihanh'");
            while($rowcho=mysqli_fetch_array($get_concho)){
                $concho = $rowcho['conlai'];
                $giucho = $rowcho['giucho'];
                $daban = $rowcho['daban'];
            }

            if($pttt == 'ATM'){
                $id_phieu = 'TT'.RandID(4);
                $conlai = $concho-$sove;
                $daban = $sove+$daban;
            }
            elseif($pttt == 'Booking'){
                $id_phieu = 'BK'.RandID(4);
                $giucho = $sove+$giucho;
                $conlai = $concho-$sove;
            }

            //Thông tin khách đi cùng
            if($sove > 1){
                if (!empty($_POST['op'])) {
                    for ($i = 0; $i < $sove; $i++) {
                        if ($_POST['hotenkhach'][$i] != '' && $_POST['sodtkhach'][$i] != '') {
                            $hoten_khach = $_POST['hotenkhach'][$i];
                            $sdt_khach = $_POST['sodtkhach'][$i];
                            $dctt_khach = $_POST['dcttkhach'][$i];
                            $vitrighe = "4,5";

                            if($dctt_khach==''){
                                $diemlen_kh = 'Bến xe Cần Thơ';
                            }
                            else{
                                $diemlen_kh = $dctt_khach;
                            }
                            //Thêm thông tin Khách đi cùng vào CSDL
                            $id_khach = 'K'.RandID(5);
                            $ma_phieu = $id_phieu;
                            
                            //Thêm dữ liệu vào trung chuyển
                            $id_diem = 'RC'.RandID(4);
                            $trungchuyen = mysqli_query($conn, "INSERT INTO `diem_ruockhach`(`id_diem`, `id_kh`, `id_phieu`,`hoten`, `sdt`, `diachiruoc`, `ngaydi`) 
                            VALUES ('$id_diem','$id_khach','$ma_phieu','$hoten_khach','$sdt_khach','$diemlen_kh','$ngaydi')");
                        }
                    }
                }
                //Lấy biển số xe
                $get_bsx = mysqli_query($conn, "SELECT * FROM lich_chay WHERE fromLoc='Cần Thơ' and toLoc='$ten_noiden' and id_loaixe='$id_loaixe' and giokhoihanh = '$giokhoihanh'");
                $exe = mysqli_fetch_assoc($get_bsx);
                $biensoxe = $exe['biensoxe'];
                //Cập nhật số lượng vé còn lại trong lịch chạy
                $update = mysqli_query($conn, "UPDATE `lich_chay` SET `daban`='$daban',`giucho`= '$giucho',`conlai`='$conlai' WHERE fromLoc='$ten_noidi' and toLoc='$ten_noiden' and id_loaixe='$id_loaixe' and giokhoihanh = '$giokhoihanh'");
                
                //Thêm dữ liệu vào phiếu đặt vé
                $insert = mysqli_query($conn, "INSERT INTO `phieu_datve`(`id_phieu`, `ma_kh`, `hoten`, `diachi`, `didong`, `soCMND`, `tuyenduong`, `loaixe`, `biensoxe`,`ngaydi`, `giodi`, `diemlenxe`, `diemxuongxe`, `sokhach_dicung`, `sove`, `vitrighe`,`ghichu`, `pttt`, `tongtien`, `ngaydatve`) VALUES 
                ('$id_phieu','$id_user','$hoten','$diachi','$sdt','$soCMND','$tuyenduong','$id_loaixe','$biensoxe','$ngaydi','$giodi','$diemlenxe','$diemxuongxe','$sokhach_dicung','$sove','$vitrighe','$yeucau', '$pttt','$tongcong','')");

                if($insert && $update && $trungchuyen){
                    echo 
                        '<script type="text/javascript">
                            alert("Mã đặt/mua vé của bạn là: '.$id_phieu.' dùng mã này để kiểm tra thông tin vé!");
                            window.location = "/demo1/index.php";
                        </script>';
                }
                else{
                    echo 
                        '<script type="text/javascript">
                            alert("Lỗi hệ thống! Vui lòng thực hiện lại thao tác!");
                            window.location = "/demo1/index.php";
                        </script>';
                }

            }elseif($sove == '1'){
                //Cập nhật số vé còn lại
                $update = mysqli_query($conn, "UPDATE `lich_chay` SET `daban`='$daban',`giucho`= '$giucho',`conlai`='$conlai' WHERE fromLoc='$ten_noidi' and toLoc='$ten_noiden' and id_loaixe='$id_loaixe' and giokhoihanh='$giokhoihanh'");
                
                //Lấy biển số xe
                $get_bsx = mysqli_query($conn, "SELECT * FROM lich_chay WHERE fromLoc='Cần Thơ' and toLoc='$ten_noiden' and id_loaixe='$id_loaixe' and giokhoihanh = '$giokhoihanh'");
                $exe = mysqli_fetch_assoc($get_bsx);
                $biensoxe = $exe['biensoxe'];

                //Thêm dữ liệu vào phiếu đặt vé
                $insert = mysqli_query($conn, "INSERT INTO `phieu_datve`(`id_phieu`, `ma_kh`, `hoten`, `diachi`, `didong`, `soCMND`, `tuyenduong`, `loaixe`, `biensoxe`,`ngaydi`, `giodi`, `diemlenxe`, `diemxuongxe`, `sokhach_dicung`, `sove`, `vitrighe`,`ghichu`, `pttt`, `tongtien`, `ngaydatve`) VALUES 
                ('$id_phieu','$id_user','$hoten','$diachi','$sdt','$soCMND','$tuyenduong','$id_loaixe','$biensoxe','$ngaydi','$giodi','$diemlenxe','$diemxuongxe','$sokhach_dicung','$sove','$vitrighe','$yeucau', '$pttt','$tongcong','')");

                if($insert && $update){
                    
                    echo 
                        '<script type="text/javascript">
                            alert("Mã đặt/mua vé của bạn là:'.$id_phieu.' dùng mã này để kiểm tra thông tin vé!");
                            window.location = "/demo1/index.php";
                        </script>';
                }
                    else{
                        echo 
                            '<script type="text/javascript">
                                alert("Lỗi hệ thống! Vui lòng thực hiện lại thao tác!");
                                window.location = "/demo1/index.php";
                            </script>';
                    }

                }
            }
        }
?>