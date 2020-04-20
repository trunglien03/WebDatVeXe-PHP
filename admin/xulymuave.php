<style>
    .vitrighe{
        border-radius: 0;
        box-shadow: none;
        border-color:#d2d6de;
        display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color:
    #fff;
    background-image: none;
    border: 1px solid
    #ccc;
        border-top-color: rgb(204, 204, 204);
        border-right-color: rgb(204, 204, 204);
        border-bottom-color: rgb(204, 204, 204);
        border-left-color: rgb(204, 204, 204);
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;`
    }
</style>
<?php
    include("includes/header.php");
    include("includes/sidebar.php");
    include("includes/connect.php");

    if(isset($_POST['muave'])){
        if($_POST['hoten'] =='' || $_POST['CMND'] == '' || $_POST['sdt'] == ''){
            echo '<script language="javascript">';
            echo 'alert("Vui lòng điền đầy đủ thông tin!");window.history.back()';
            echo '</script>';
        }
        else{
            //Thông tin khách hàng
            $hoten = $_POST['hoten'];
            $diachi = $_POST['diachi'];
            $CMND = $_POST['CMND'];
            $sdt = $_POST['sdt'];
            $sove = $_POST['sove'];
            $diemruoc = $_POST['diemruoc'];
            $diemxuong = $_POST['diemxuong'];
            $ghichu = $_POST['ghichu'];

            //Thông tin vé
            $mave = $_POST['mave'];
            $giave = $_POST['giave'];
            $ngaydi= $_POST['ngaydi'];
            $giodi = $_POST['giodi'];
            $loaixe = $_POST['loaixe'];
            $id_xe = $_POST['id_xe'];
            $toLoc = $_POST['toLoc'];
            $biensoxe = $_POST['biensoxe'];

            //Kiểm tra
            if($diemruoc == ''){
                $lenxe = 'Bến xe Cần Thơ';
            }else{
                $lenxe = $diemruoc;
            }
    
            if($diemxuong == ''){
                $xuongxe = 'Tại bến';
            }
            else{
                $xuongxe = $diemxuong;
            }

            $abc = $sove*$giave;
            $thanhtoan = number_format($abc ,0 ,'.' ,'.') .'VNĐ';

            $ten_noidi = 'Cần Thơ';

            //get giờ đến
            $sql = mysqli_query($conn, "SELECT * FROM lich_chay WHERE toLoc='$toLoc' and id_loaixe='$id_xe' and giokhoihanh='$giodi'");
            $ex = mysqli_fetch_assoc($sql);
            $gioden = $ex['gioden'];
            
            if($toLoc=='Đà Lạt'){
                $ngayden = date('Y-m-d', strtotime($ngaydi. ' + 1 days'));
            }
        }
    }
?>
    <div class="content-wrapper">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fas fa-tools"></i>&nbsp;Quản lý chung</a></li>
                <li><a href="index.php?tab=themnv">Đặt/bán vé</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header" >
                            <center><h3 class="box-title">HỢP ĐỒNG BÁN VÉ</h3></center>
                        </div>
                        <div class="box-body">
                            <form method="post" action="xulythanhtoan.php">
                                <input type="hidden" value="<?=$hoten?>" name="hoten">
                                <input type="hidden" value="<?=$diachi?>" name="diachi">
                                <input type="hidden" value="<?=$CMND?>" name="CMND">
                                <input type="hidden" value="<?=$sdt?>" name="sdt">
                                <input type="hidden" value="<?=$sove?>" name="sove">
                                <input type="hidden" value="<?=$lenxe?>" name="lenxe">
                                <input type="hidden" value="<?=$ghichu?>" name="ghichu">
                                <input type="hidden" value="<?=$mave?>" name="mave">
                                <input type="hidden" value="<?=$giave?>" name="giave">
                                <input type="hidden" value="<?=$thanhtoan?>" name="tongcong">
                                <input type="hidden" value="<?=$ngaydi?>" name="ngaydi">
                                <input type="hidden" value="<?=$giodi?>" name="giodi">
                                <input type="hidden" value="<?=$loaixe?>" name="loaixe">
                                <input type="hidden" value="<?=$id_xe?>" name="id_xe">
                                <input type="hidden" value="<?=$toLoc?>" name="toLoc">
                                <input type="hidden" value="<?=$ten_noidi?>-<?=$toLoc?>" name="tuyenduong">
                                <input type="hidden" value="<?=$xuongxe?>" name="xuongxe">
                                <input type="hidden" value="<?=$biensoxe?>" name="biensoxe">

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-5">
                                        <section id="Search" class="LB XXCN">
                                            <?php
                                                if($sove>1){
                                                    $sokhach=$sove-1;
                                            ?>
                                            <h3 style="text-align: center; margin-top: -2px;">THÔNG TIN KHÁCH ĐI CÙNG</h3>
                                            <table class="table table-bordered" >
                                                <thead style="background-color: #bce8f1;">
                                                    <tr>
                                                        <th style="text-align: center;">Họ tên</th>
                                                        <th style="text-align: center;">Số điện thoại</th>
                                                        <th style="text-align: center;">Rước tại</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    for($i=1; $i<$sove; $i++){
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <input name="hotenkhach[]" type="text" class="form-control"/><br>        
                                                        </td>
                                                    
                                                        <td>
                                                            <input name="sodtkhach[]" type="text" class="form-control"/><br>        
                                                        </td>
                                                
                                                        <td>
                                                            <input name="dcttkhach[]" type="text" class="form-control"/><br>        
                                                        </td>
                                                    </tr>
                                                    <?php }?>
                                                    <input type="hidden" name="op" value="sent" />
                                                    <input type="hidden" name="op1" value="sent" />
                                                    <input type="hidden" name="op2" value="sent" />
                                                </tbody>
                                            </table>
                                            <br>
                                            <h3 style="text-align: center;">THÔNG TIN CHI TIẾT VÉ</h3>
                                            <div class="searchRow clearfix" style=" margin-bottom: 0px;">
                                                <div style="padding: 20px 20px;">  
                                                    <table class="table" style="background-color: white;">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="3">
                                                                
                                                                    <fieldset>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Tuyến:</label>
                                                                            <div class="col-md-8" style="margin-bottom: 10px;">
                                                                                <p  style="color:#F00" name="fromLoc" class="form-control"> Cần Thơ - <?=$toLoc?></p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Loại xe:</label>
                                                                            <div class="col-md-8" style="margin-bottom: 10px;">
                                                                                <p  style="color:#F00" name="loaixe" class="form-control"><?=$loaixe?></p>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Vị trí ghế:</label>
                                                                            <div class="col-md-8" style="margin-bottom: 10px;">
                                                                                <input name="vitrighe" type="text" class="vitrighe"/>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Thời gian:</label>
                                                                            <div class="col-md-8" style="margin-bottom: 10px;">
                                                                                <p style="color:#F00" name="thoigian" class="form-control"> <?=$ngaydi?> - <?=$giodi?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Điểm đón:</label>
                                                                            <div class="col-md-8 inputGroupContainer" style="margin-bottom: 25px;">
                                                                                <textarea style="color:#2b2b2b" class="form-control"><?=$lenxe?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Điểm trả:</label>
                                                                            <div class="col-md-8 inputGroupContainer" style="margin-bottom: 10px;">
                                                                                <p style="color:#2b2b2b" class="form-control"> <?=$xuongxe?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Giờ đến</label>
                                                                            <div class="col-md-8 inputGroupContainer" style="margin-bottom: 10px;">
                                                                                <p style="color:#2b2b2b" class="form-control"><?=$ngayden?> - <?=$gioden?></p>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Ghi chú</label>
                                                                            <div class="col-md-8 inputGroupContainer">
                                                                                <p style="color:#2b2b2b" class="form-control"> <?=$ghichu?></p>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <?php }else{?>
                                        </section>
                                        <section>
                                            <h3 style="text-align: center;">THÔNG TIN CHI TIẾT VÉ</h3>
                                            <div class="searchRow clearfix" style="margin-bottom: 0px; margin-top: -10px;">
                                                <div style="padding: 20px 20px;">  
                                                    <table style="background-color: white; width: 400px;">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="5">
                                                                    
                                                                        <fieldset>
                                                                            <div class="form-group">
                                                                                <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Tuyến:</label>
                                                                                <div class="col-md-8" style="margin-bottom: 10px;">
                                                                                    <p  style="color:#F00" class="form-control"> Cần Thơ - <?=$toLoc?></p>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="form-group">
                                                                                <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Loại xe:</label>
                                                                                <div class="col-md-8" style="margin-bottom: 10px;">
                                                                                    <p  style="color:#F00" class="form-control"><?=$loaixe?></p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="col-md-4 control-label">Số ghế:</label>
                                                                                <div class="col-md-8 inputGroupContainer" style="margin-top: 5px; margin-bottom: 10px;">
                                                                                    <input name="vitrighe" type="text"  class="vitrighe">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Thời gian:</label>
                                                                                <div class="col-md-8" style="margin-bottom: 10px;">
                                                                                    <p style="color:#F00" class="form-control"> <?=$ngaydi?> - <?=$giodi?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Điểm đón:</label>
                                                                                <div class="col-md-8 inputGroupContainer" style="margin-bottom: 25px;">
                                                                                    <p style="color:#2b2b2b" class="form-control"> <?=$lenxe?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Điểm trả:</label>
                                                                                <div class="col-md-8 inputGroupContainer" style="margin-bottom: 10px;">
                                                                                    <p style="color:#2b2b2b" class="form-control"> <?=$xuongxe?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-md-4 control-label">Giờ đến</label>
                                                                                <div class="col-md-8 inputGroupContainer" style="margin-bottom: 10px;">
                                                                                    <p style="color:#2b2b2b" class="form-control"> <?=$gioden?></p>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="form-group">
                                                                                <label class="col-md-4 control-label">Ghi chú</label>
                                                                                <div class="col-md-8 inputGroupContainer">
                                                                                    <p style="color:#2b2b2b" class="form-control"> <?=$ghichu?></p>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <?php }?>
                                        </section>
                                    </div>
                                    <!--End col-md-5-->

                                    <div class="col-md-7">
                                        <section id="Search" class="LB XXCN  P20" style="margin-left: 30px; background-color:#ddd; padding-bottom: 20px; margin-bottom: 10px">
                                            <h4 style="text-align: center; padding-top: 7px;">THÔNG TIN KHÁCH ĐẶT VÉ</h4>
                                                <div class="searchRow clearfix" style="background-color: whitesmoke">
                                                    <div style="padding: 0px 20px;">  
                                                        <div class="LB">
                                                            <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Họ tên</strong></label>
                                                            <input type="text" name="hoten" class="form-control" value="<?=$hoten?>"/>
                                                        </div>
                                                        <div class="searchRight">
                                                            <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Địa chỉ</strong></label>
                                                            <textarea name="diachi" class="form-control" style="color:#333; border:1px solid #c4c4c4;"><?=$diachi?></textarea>
                                                        </div>

                                                        <div class="searchRow clearfix">
                                                            <div class="LB">
                                                                <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Di động</strong></label>
                                                                <input type="text" name="sdt" class="form-control" value="<?=$sdt?>"/>
                                                            </div>

                                                            <div class="searchRight retJouney">
                                                                <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Số CMND</strong></label>
                                                                <input name="cmnd" class="form-control" type="text" value="<?=$CMND?>"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </section>
                                    
                                        <section class="LB XXCN  P20" style="margin-left: 30px; background-color:#ddd; margin-top: 20px; padding-bottom: 10px;">
                                            <h4 style="text-align: center; padding-top: 10px;">PHƯƠNG THỨC THANH TOÁN</h4>
                                                <div class="searchRow clearfix" style="background-color: whitesmoke">
                                                    <div style="padding: 0px 20px;">  
                                                        <div class="LB">
                                                            <div style="width: 100%; padding-top: 10px;">
                                                                <input type="radio" name="pttt" value="ATM"> <strong>Thanh toán bằng thẻ ATM (Internet Banking)</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="pttt" value="Booking"> <strong>Đặt vé</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="pttt" value="Cash"> <strong>Tiền mặt</strong>
                                                                
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="searchRow clearfix">
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 20px;"><strong>TỔNG CỘNG</strong></label>
                                                                <div class="col-md-8" style="margin-bottom: 10px; margin-top: 20px;">
                                                                    <p style="color:#F00" class="form-control"><?=$thanhtoan?></p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-primary" style="margin-top: 10px;" name="thanhtoan">
                                                                    Hoàn tất
                                                                </button>
                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </section>
                                    </div>
                                    <!--End col-md-7-->
                                </div>
                                <!--End row-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript">
			$(document).ready(function() {
				$('.vitrighe').keyup(function(event) {
						var user = $('.vitrighe').val();
						//alert(user);
						$.ajax({
						  url: "execute/check-username.php",
						  method: "POST",
						  data: { user : user },
						  success : function(response){
						  	if (response == 1) {
						  		$('.vitrighe').css({
						  			'background-color': 'rgba(255, 0, 0, 0.48)'
						  		});
						  	
						  			
						  	}if(response == 0){
						  		$('.vitrighe').css({
						  			'background-color': 'rgba(8, 123, 8, 0.43)'
						  		});
						  		;
						  	}
						  }
						});
				});
				
					
			});
		</script>

<?php
    include("includes/footer.php");
    include("includes/script.php");
?>