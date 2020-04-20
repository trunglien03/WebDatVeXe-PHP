<?php
    include("../function.php");
    include("../includes/connect.php");
        if(isset($_POST['themnv'])){
            $hoten 		= $_POST['hovaten'];
            $ngaysinh	= $_POST['ngaysinh'];
            $soCMND 	= $_POST['CMND'];
            $sdt 		= $_POST['sdt'];
            $quequan 	= $_POST['quequan'];
            $thuongtru 	= $_POST['thuongtru'];
            $ngayvaolam = $_POST['ngayvaolam'];
			$chucvu		= $_POST['chucvu'];
			$id_noidi='7';
			$ten_noidi 	= $_POST['fromLoc'];
			$ten_noiden = implode(" , ", $_POST['toLoc']);
			

				$cek = mysqli_query($conn, "SELECT * FROM nhan_vien WHERE hoten='$hoten'");
				if(mysqli_num_rows($cek) == 0){
					if($chucvu=='Tài xế'){
                        $manv = 'TX'.RandID(6);
						$username = $manv;
					}
					elseif ($chucvu=='Phụ xe') {
						$manv = 'PX'.RandID(6);
						$username = $manv;
					}
					elseif($chucvu =='Tài xế trung chuyển'){
						$manv = 'TC'.RandID(6);
						$username = $manv;
					}
					$password =  RandPass(8);
		
					$insert = mysqli_query($conn, "INSERT INTO `nhanvien`(`manv`, `hoten`, `soCMND`, `ngaysinh`, `quequan`, `thuongtru`, `sdt`, `ngayvaolam`, `chucvu`, `fromLoc`, `toLoc`,`username`, `password`, `id_noidi`)
						VALUES('$manv','$hoten','$soCMND', '$ngaysinh', '$quequan', '$thuongtru', '$sdt', '$ngayvaolam','$chucvu', '$ten_noidi', '$ten_noiden', '$username', '$password', '$id_noidi')");
					
					if($insert){
						header("location:../list_staff.php");
					}
					else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Lỗi! Vui lòng thực hiện thao tác lại!</div>';
					}
				} 
				else{
					echo '<script language="javascript">';
					echo 'alert("Tên nhân viên đã tồn tại trong hệ thống!");window.history.back()';
					echo '</script>';
				}
			}
			?>