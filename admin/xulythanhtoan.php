<!--XỬ LÝ-->
<?php
    include("includes/connect.php");
    include("function.php");

    if(isset($_POST['thanhtoan'])){    
        $id_user = 'KH'.RandID(4);
        $hoten = $_POST['hoten'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $soCMND = $_POST['CMND'];
        
        //Thông tin chuyến đi
        $biensoxe = $_POST['biensoxe'];
        $toLoc = $_POST['toLoc'];
        $sove = $_POST['sove'];
        $sokhach_dicung = $sove-1;
        $tuyenduong = $_POST['tuyenduong'];
        $ngaydi = $_POST['ngaydi'];
        $giodi = $_POST['giodi'];
        $ghichu = $_POST['ghichu'];
        $tongcong = $_POST['tongcong'];
        $pttt = $_POST['pttt'];
        $loaixe = $_POST['loaixe'];
        $id_loaixe = $_POST['id_xe'];
        $diemlenxe = $_POST['lenxe'];
        $diemxuongxe = $_POST['xuongxe'];
        $pttt = $_POST['pttt'];
        $vitrighe = $_POST['vitrighe'];

            //Lấy số lượng vé còn lại
            $get_concho = mysqli_query($conn, "SELECT * FROM lich_chay WHERE fromLoc='Cần Thơ' and toLoc='$toLoc' and id_loaixe='$id_loaixe' and giokhoihanh='$giodi'");
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
            }elseif($pttt == 'Cash'){
                $id_phieu = 'TM'.RandID(4);
                $conlai = $concho-$sove;
                $daban = $sove+$daban; 
            }

            //Thông tin khách đi cùng
            if($sove > 1){
                if (!empty($_POST['op'])) {
                    for ($i = 0; $i <$sove; $i++){
                        if ($_POST['hotenkhach'][$i] != '' || $_POST['sodtkhach'][$i] != '') {
                            $hoten_khach = $_POST['hotenkhach'][$i];
                            $sdt_khach = $_POST['sodtkhach'][$i];
                            $dctt_khach = $_POST['dcttkhach'][$i];
                            if($dctt_khach==''){
                                $diemlen_kh = 'Bến xe Cần Thơ';
                            }
                            else{
                                $diemlen_kh = $dctt_khach;
                            }

                            //Thêm thông tin Khách đi cùng vào CSDL
                            
                            //$khach_dicung = mysqli_query($conn, "INSERT INTO `khachdicung`(`STT`, `id_KH`, `id_phieu`, `hoten`, `sdt`, `vitrighe` ,`diemruoc`, `ngaydi`) VALUES ('','$id_khach','$id_phieu','$hoten_khach','$sdt_khach','$vitrighe','$dctt_khach', '$ngaydi')"); 
                            
                            //Thêm dữ liệu vào trung chuyển
                            $id_khach = 'K'.RandID(5);
                            $id_diem = 'RC'.RandID(4);
                            $trungchuyen = mysqli_query($conn, "INSERT INTO `diem_ruockhach`(`id_diem`, `id_kh`, `id_phieu`,`hoten`, `sdt`, `diachiruoc`, `ngaydi`) 
                            VALUES ('$id_diem','$id_khach','$id_phieu','$hoten_khach','$sdt_khach','$diemlen_kh','$ngaydi')");
                        }
                    }
                }
                //Cập nhật số lượng vé còn lại trong lịch chạy
                $update = mysqli_query($conn, "UPDATE `lich_chay` SET `daban`='$daban',`giucho`= '$giucho',`conlai`='$conlai' WHERE fromLoc='Cần Thơ' and toLoc='$toLoc' and id_loaixe='$id_loaixe' and giokhoihanh = '$giodi'");
                
                //Trung chuyển
                $id_diem = 'RC'.RandID(4);
                $trungchuyen = mysqli_query($conn, "INSERT INTO `diem_ruockhach`(`id_diem`, `id_kh`, `id_phieu`,`hoten`, `sdt`, `diachiruoc`, `ngaydi`) 
                VALUES ('$id_diem','$id_user','$id_phieu','$hoten','$sdt','$diemlenxe','$ngaydi')");

                //Thêm dữ liệu vào phiếu đặt vé
                $insert = mysqli_query($conn, "INSERT INTO `phieu_datve`(`id_phieu`, `ma_kh`, `hoten`, `diachi`, `didong`, `soCMND`, `tuyenduong`, `loaixe`, `biensoxe`,`ngaydi`, `giodi`, `diemlenxe`, `diemxuongxe`, `sokhach_dicung`, `sove`, `vitrighe`,`ghichu`, `pttt`, `tongtien`, `ngaydatve`) VALUES 
                ('$id_phieu','$id_user','$hoten','$diachi','$sdt','$soCMND','$tuyenduong','$id_loaixe','$biensoxe','$ngaydi','$giodi','$diemlenxe','$diemxuongxe','$sokhach_dicung','$sove','$vitrighe','$ghichu', '$pttt','$tongcong','')");

                if($insert && $update && $trungchuyen){
                    if($pttt == 'Cash'){
                        echo "<script>
                        if(confirm('Tiến hành in vé'))
                        {document.location.href='inve.php?id_phieu=".$id_phieu."'};</script>";
                        }
                    else{
                        echo 
                            '<script type="text/javascript">
                                alert("Mã đặt/mua vé của bạn là: '.$id_phieu.' dùng mã này để kiểm tra thông tin vé!");
                                window.location = "/demo1/admin/index.php";
                            </script>';
                    }
                }
                else{
                    echo 
                        '<script type="text/javascript">
                            alert("Lỗi hệ thống! Vui lòng thực hiện lại thao tác!");
                            window.location = "/demo1/admin/index.php";
                        </script>';
                }

            }elseif($sove == '1'){
                $sove = '1';
                $sokhach_dicung = '0';
                //Cập nhật số vé còn lại
                $update = mysqli_query($conn, "UPDATE `lich_chay` SET `daban`='$daban',`giucho`= '$giucho',`conlai`='$conlai' WHERE fromLoc='Cần Thơ' and toLoc='$toLoc' and id_loaixe='$id_loaixe' and giokhoihanh='$giodi'");
                
                //Thêm dữ liệu vào phiếu đặt vé
                $insert = mysqli_query($conn, "INSERT INTO `phieu_datve`(`id_phieu`, `ma_kh`, `hoten`, `diachi`, `didong`, `soCMND`, `tuyenduong`, `loaixe`, `biensoxe`,`ngaydi`, `giodi`, `diemlenxe`, `diemxuongxe`, `sokhach_dicung`, `sove`, `vitrighe`,`ghichu`, `pttt`, `tongtien`, `ngaydatve`) VALUES 
                ('$id_phieu','$id_user','$hoten','$diachi','$sdt','$soCMND','$tuyenduong','$id_loaixe','$biensoxe','$ngaydi','$giodi','$diemlenxe','$diemxuongxe','$sokhach_dicung','$sove','$vitrighe','$ghichu', '$pttt','$tongcong','')");
                
                $id_diem = 'RC'.RandID(4);
                $trungchuyen = mysqli_query($conn, "INSERT INTO `diem_ruockhach`(`id_diem`, `id_kh`, `id_phieu`,`hoten`, `sdt`, `diachiruoc`, `ngaydi`) 
                VALUES ('$id_diem','$id_user','$id_phieu','$hoten','$sdt','$diemlenxe','$ngaydi')");
                if($insert && $update){
                    if($pttt=='Cash'){
                        echo "<script>
                        if(confirm('Tiến hành in vé'))
                        {document.location.href='inve.php?id_phieu=".$id_phieu."'};</script>";
                    }
                    else{
                        echo 
                            '<script type="text/javascript">
                                alert("Mã đặt/mua vé của bạn là:'.$id_phieu.' dùng mã này để kiểm tra thông tin vé!");
                                window.location = "/demo1/admin/index.php";
                            </script>';
                    }
                }
                    else{
                        echo 
                            '<script type="text/javascript">
                                alert("Lỗi hệ thống! Vui lòng thực hiện lại thao tác!");
                                window.location = "/demo1/admin/index.php";
                            </script>';
                    }

                }
            }
?>