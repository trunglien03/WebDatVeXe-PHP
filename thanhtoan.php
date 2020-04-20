<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<?php 
    include("includes/header.php");
    include("includes/modal.php");
    include("includes/connect.php");
    if(isset($_POST['thanhtoan'])){
        $username = $_SESSION['username'];
        $ten_noidi=$_POST['ten_noidi'];
        $ten_noiden=$_POST['ten_noiden'];
        $dep_date=$_POST['dep_date'];
        $loaixe=$_POST['loaixe'];
        $yeucau=$_POST['yeucau'];
        $vitrighe=$_POST['vitrighe'];
        $sove=$_POST['sove'];
        $giave=$_POST['tienve'];
        $tongtien=$sove*$giave;
        $thanhtoan=number_format($tongtien ,0 ,'.' ,'.').' VNĐ';
        $diemlenxe=$_POST['diemlenxe'];
        $diemxuongxe=$_POST['diemxuongxe'];

        if($diemlenxe == ''){
            $diemruoc = 'Bến xe Cần Thơ';
        }else{
            $diemruoc = $diemlenxe;
        }

        if($diemxuongxe == ''){
            $diemtra = 'Tại bến';
        }
        else{
            $diemtra = $diemxuongxe;
        }
        $giokhoihanh=$_POST['giokhoihanh'];
        $gioden=$_POST['gioden'];

        if($sove=='1'){
            $soghe='4';
        }elseif($sove=='2'){
            $soghe='4,5';
        }
        //Lấy thông tin KH
        $get_KH=mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
            while($row_KH=mysqli_fetch_array($get_KH)){
                $hoten_KH = $row_KH['hoten'];
                $dd = $row_KH['sdt'];
            }
        

        //Lấy id xe
        $get_idxe=mysqli_query($conn, "SELECT * FROM loai_xe WHERE ten_loaixe='$loaixe'");
        $row_idxe=mysqli_fetch_assoc($get_idxe);
        $id_loaixe=$row_idxe['id_loaixe'];

        /*
        $get_benden=mysqli_query($conn, "SELECT DISTINCT diemdi, diemden FROM lich_chay WHERE fromLoc='$ten_noidi' and toLoc='$ten_noiden' and id_loaixe='$id_loaixe'"); 
        while($execute=mysqli_fetch_array($get_benden)){
            $bendi=$execute['diemdi'];
            $benden=$execute['diemden'];
        }
        if(isset($_POST['trungchuyen'])){
            $trungchuyen=$_POST['trungchuyen'];
            if($trungchuyen=='xetrungchuyen'){
                $diachidon = $_POST['diachitt'];
            }
            elseif($trungchuyen=='tudentram'){
                $diachidon = $bendi;
            }
        }
        else{
            $diachidon = $bendi;
        }
        if(isset($_POST['xuongxe'])){
            $xuongxe = $_POST['xuongxe'];
            if($xuongxe == 'trungchuyendennha'){
                $diachi = $_POST['diachi'];
            }
            elseif($xuongxe == 'xuongtaitram'){
                $diachi = $benden;
            }
        }
        else{
            $diachi = $benden;
        }*/
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center><img src="assets/images/bus.jpg" style="width: 1170px;  height: 350px;"></center>
        </div>
    </div>
    <div class="row" style="margin-top: 15px;">
        <div class="col-md-12">
            <h3 style="text-align: center; color:#31708f; font-size: 28px; font-weight: 550px;">THÔNG TIN THANH TOÁN</h3>
        </div>
    </div>
    <hr>
    
    <form method="post" action="xulythanhtoan.php">
        <input value="<?=$giokhoihanh?>" name="giokhoihanh" type="hidden">
        <input value="<?=$ten_noidi?>" name="ten_noidi" type="hidden">
        <input value="<?=$yeucau?>" name="yeucau" type="hidden">
        <input value="<?=$ten_noiden?>" name="ten_noiden" type="hidden">
        <input value="<?=$ten_noidi?> - <?=$ten_noiden?>" type="hidden" name="tuyenduong"> 
        <input value="<?=$id_loaixe?>" name="loaixe" type="hidden">
        <input value="<?=$diemtra?>" name="diemtra"type="hidden">
        <input value="<?=$diemruoc?>" name="diemruoc" type="hidden">
        <input name="sove" value="<?=$sove?>" type="hidden">    
        <input name="ngaydi" value="<?=$dep_date?>" type="hidden">  
        <input name="giodi" value="<?=$giokhoihanh?>" type="hidden">    
        <input name="tongcong" value="<?=$thanhtoan?>" type="hidden">
        <input name="sove" value="<?=$sove?>" type="hidden">
        <input name="username" value="<?=$username?>" type="hidden">
        <div class="row" style="margin-top: 10px;">
            <div class="col-md-5">
                <section id="Search" class="LB XXCN">
                    <?php
                        if($sove>1){?>
                            <h3 style="text-align: center; margin-top: -2px;">THÔNG TIN KHÁCH ĐI CÙNG</h3>
                                <table class="table table-bordered" style="margin-top: 15px; height: 220px;">
                                    <thead style="background-color: #bce8f1;">
                                        <tr>
                                            <th style="text-align: center;">Họ tên</th>
                                            <th style="text-align: center;">Số điện thoại</th>
                                            <th style="text-align: center;">Rước tại</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        for($i=1; $i<=$sove; $i++){
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
                                                        <form class="well form-horizontal">
                                                            <fieldset>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Tuyến:</label>
                                                                    <div class="col-md-8" style="margin-bottom: 10px;">
                                                                        <p  style="color:#F00" name="fromLoc" class="form-control"> <?=$ten_noidi?> - <?=$ten_noiden?></p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Loại xe:</label>
                                                                    <div class="col-md-8" style="margin-bottom: 10px;">
                                                                        <p  style="color:#F00" name="loaixe" class="form-control"><?=$loaixe?></p>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Số ghế:</label>
                                                                    <div class="col-md-8" style="margin-bottom: 10px;">
                                                                        <p  style="color:#F00" class="form-control" id="soghe">4, 5</p>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Thời gian:</label>
                                                                    <div class="col-md-8" style="margin-bottom: 10px;">
                                                                        <p style="color:#F00" name="thoigian" class="form-control"> <?=$dep_date?> - <?=$giokhoihanh?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Điểm đón:</label>
                                                                    <div class="col-md-8 inputGroupContainer" style="margin-bottom: 25px;">
                                                                        <p style="color:#2b2b2b" class="form-control"><?=$diemruoc?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Điểm trả:</label>
                                                                    <div class="col-md-8 inputGroupContainer" style="margin-bottom: 10px;">
                                                                        <p style="color:#2b2b2b" class="form-control"> <?=$diemtra?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Giờ đến</label>
                                                                    <div class="col-md-8 inputGroupContainer" style="margin-bottom: 10px;">
                                                                        <p style="color:#2b2b2b" name="gioden" class="form-control"> <?=$gioden?></p>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Ghi chú</label>
                                                                    <div class="col-md-8 inputGroupContainer">
                                                                        <p style="color:#2b2b2b" name="yeucau" class="form-control"> <?=$yeucau?></p>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </form>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            </section>
                            <?php }
                                else{
                                ?>
                            <section>
                                <h3 style="text-align: center;">THÔNG TIN CHI TIẾT VÉ</h3>
                                <div class="searchRow clearfix" style="margin-bottom: 0px; margin-top: -10px;">
                                    <div style="padding: 20px 20px;">  
                                        <table style="background-color: white; width: 400px;">
                                            <tbody>
                                                <tr>
                                                    <td colspan="5">
                                                    <form class="well form-horizontal">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Tuyến:</label>
                                                                <div class="col-md-8" style="margin-bottom: 10px;">
                                                                    <p  style="color:#F00" name="fromLoc" class="form-control"> <?=$ten_noidi?> - <?=$ten_noiden?></p>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Loại xe:</label>
                                                                <div class="col-md-8" style="margin-bottom: 10px;">
                                                                    <p  style="color:#F00" name="loaixe" class="form-control"><?=$loaixe?></p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label">Số ghế:</label>
                                                                <div class="col-md-8 inputGroupContainer" style="margin-top: 5px; margin-bottom: 10px;">
                                                                    <p style="color:#2b2b2b" name="soghe" id="soghe" class="form-control">1</p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Thời gian:</label>
                                                                <div class="col-md-8" style="margin-bottom: 10px;">
                                                                    <p style="color:#F00" name="thoigian" class="form-control"> <?=$dep_date?> - <?=$giokhoihanh?></p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Điểm đón:</label>
                                                                <div class="col-md-8 inputGroupContainer" style="margin-bottom: 25px;">
                                                                    <p style="color:#2b2b2b" name="diemlenxe" class="form-control"> <?=$diemruoc?></p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label" style="margin-bottom: 10px; margin-top: 5px;">Điểm trả:</label>
                                                                <div class="col-md-8 inputGroupContainer" style="margin-bottom: 10px;">
                                                                    <p style="color:#2b2b2b" name="diemxuongxe" class="form-control"> <?=$diemtra?></p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label">Giờ đến</label>
                                                                <div class="col-md-8 inputGroupContainer" style="margin-bottom: 10px;">
                                                                    <p style="color:#2b2b2b" name="gioden" class="form-control"> <?=$gioden?></p>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label">Ghi chú</label>
                                                                <div class="col-md-8 inputGroupContainer">
                                                                    <p style="color:#2b2b2b" name="yeucau" class="form-control"> <?=$yeucau?></p>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            
                        </section>
                    <?php }?>
                </div>
                <div class="col-md-7">
                    <section id="Search" class="LB XXCN  P20" style="margin-left: 30px; background-color:#ddd; margin-top: 15px;">
                        <h4 style="text-align: center;">THÔNG TIN KHÁCH ĐẶT VÉ</h4>
                        <?php
                            if($username){
                                //Lấy thông tin khách hàng
                                $sql=mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
                                while($row=mysqli_fetch_array($sql)){
                                    $id_user = $row['id_user'];
                        ?>
                            <h5 style="font-style: italic; padding: 0px 20px; color:#ef5222;">Xin chào <strong><?=$username?></strong>, bạn vui lòng xác nhận lại thông tin trước khi thanh toán</h5>
                            <input type="hidden" name="id_user" value="<?=$id_user?>">
                        <div class="searchRow clearfix" style="background-color: whitesmoke">
                            <div style="padding: 0px 20px;">  
                                <div class="LB">
                                    <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Họ tên</strong></label>
                                    <input value="<?=$row['hoten']?>" type="text" name="hoten" class="XXinput searching"/>
                                </div>
                                <div class="searchRight">
                                    <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Địa chỉ</strong></label>
                                    <textarea name="diachi" class="XXinput searching" style="color:#333; border:1px solid #c4c4c4;"><?=$row['diachi']?></textarea>
                                </div>

                                <div class="searchRow clearfix">
                                    <div class="LB">
                                        <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Di động</strong></label>
                                        <input value="<?=$row['sdt']?>" type="text" name="sdt" class="XXinput searching"/>
                                    </div>

                                    <div class="searchRight retJouney">
                                        <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Số CMND</strong></label>
                                        <input name="cmnd" class="XXinput" type="text" value="<?=$row['cmnd']?>"/>
                                    </div>
                                </div>
                        </div>
                        <?php }}else{?>
                            <h5 style="font-style: italic; padding: 0px 20px; color:#ef5222;">Xin chào, bạn vui lòng điền đầy đủ thông tin trước khi thanh toán</h5>
                            <div class="searchRow clearfix" style="background-color: whitesmoke">
                                <div style="padding: 0px 20px;">  
                                    <div class="LB">
                                        <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Họ tên</strong></label>
                                        <input type="text" name="hoten" class="XXinput searching"/>
                                    </div>
                                    <div class="searchRight">
                                        <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Địa chỉ</strong></label>
                                        <textarea name="diachi" class="XXinput searching" style="color:#333; border:1px solid #c4c4c4;"></textarea>
                                    </div>

                                    <div class="searchRow clearfix">
                                        <div class="LB">
                                            <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Di động</strong></label>
                                            <input type="text" name="sdt" class="XXinput searching"/>
                                        </div>

                                        <div class="searchRight retJouney">
                                            <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Số CMND</strong></label>
                                            <input name="cmnd" class="XXinput" type="text"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php  }?>
                    </div>
                </section>

                <section class="LB XXCN  P20" style="margin-left: 48px; background-color:#ddd; margin-top: 15px;">
                    <h4 style="text-align: center;">PHƯƠNG THỨC THANH TOÁN</h4>
                        <div class="searchRow clearfix" style="background-color: whitesmoke">
                            <div style="padding: 0px 20px;">  
                                <div class="LB">
                                    <div style="width: 100%; padding-top: 10px;">
                                        <input type="radio" name="pttt" value="ATM"> <strong>Thanh toán bằng thẻ ATM (Internet Banking)</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="pttt" value="Booking"> <strong>Đặt vé</strong>
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
                                            Thanh toán
                                        </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>  

    
       

<?php 
    include("includes/footer.php");
    include("includes/script.php");
?>