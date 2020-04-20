<?php
    error_reporting(0);
?>
<?php
    include("includes/header.php");
    include("includes/modal.php");
?>
<div class="container">
    <div class="row" ng-controller="search" style="margin-top: 100px;">
        <input type="button" value="fsd" id="rating" ng-click="rating()" style="display:none;" >
        <div class="container" ng-init="getTripdetails()">
            <div class="col-md-12">
                <ul class="tabs">
                    <li class="tab-link current" data-tab="tab-1" data-id="d">HỦY VÉ</li>
                        
                </ul>
	            <div id="tab-1" class="tab-content current" data-id="paytm">
                <form method="post">
                    <div class="tb_route_inner_txt">
                        <div class="tb_route_inner">
                            <p><i>Vui lòng nhập họ tên hoặc số CMND và mã số vé đã mua / đặt</i></p>
                            <div class="tb_route_from">
                                <div class="tb_tour">
                                    <label><span class="text-primary" style="color:red"> </span></label>
                                    <input class="form-control" type="hidden">
                                </div>
                            </div>

                            <div class="tb_route_from">
                                <div class="tb_tour">
                                    <label>Họ tên<span class="text-primary" style="color:red"> *</span></label>
                                    <input class="form-control" name="hoten">
                                </div>
                            </div>
            
                            <div class="tb_route_to">
                                <div class="tb_tour">
                                    <label>Số CMND<span class="text-primary" style="color:red"> *</span></label>
                                    <input class="form-control" name="soCMND">
                                </div>     
                            </div>

                            <div class="tb_route_date">
                                <div class="tb_tour">
                                    <label>Mã số vé đã mua/đặt<span class="text-primary" style="color:red"> *</span></label>
                                    <input class="form-control" name="id_phieu">
                                </div>   
                            </div>
                            <div class="tb_route_cnf">
                                <div class="tb_tour">
                                    <button class="btn btn-orange" name='search' style="margin-top: 27px;">Tìm</button>
                                </div> 
                            </div>
                        </div>
                        </form>
                    </div>    
                    <br>
                    &nbsp;
                    <?php
                        if(!isset($_POST['search'])){
                    ?>
                <div class="tb_route_inner_txt" ng-show="tripDetails.length=='0'" >
                    <div class="no_dtl"><i>Chưa có dữ liệu</i></div>
                </div>
                <?php }
                elseif(isset($_POST['search'])){
                    include("includes/connect.php");
                    $hoten_kh = $_POST['hoten'];
                    $soCMND = $_POST['soCMND'];
                    $id_phieu = $_POST['id_phieu'];

                    $sql = mysqli_query($conn, "SELECT * FROM phieu_datve WHERE id_phieu='$id_phieu' or hoten = '$hoten_kh' or soCMND='$soCMND'");
                    while($row=mysqli_fetch_array($sql)){
                        $id_loaixe = $row['loaixe'];
                        $pttt = $row['pttt'];
                        $vitrighe = $row['vitrighe'];
                        $sove = $row['sove'];
                        if($pttt=='ATM' || $pttt=='Cash'){
                            $status = 'Mua vé thành công';
                            $tenpt = 'Thanh toán qua thẻ ngân hàng (Internet Banking)';
                        }
                        elseif($pttt=='Booking'){
                            $status = 'Đặt vé thành công';
                            $tenpt = 'Đặt vé (Thanh toán tại nhà xe)';
                        }
                        
                        $get_lx = mysqli_query($conn, "SELECT * FROM loai_xe WHERE id_loaixe='$id_loaixe'");
                        $get = mysqli_fetch_assoc($get_lx);
                        $ten_loaixe = $get['ten_loaixe'];
                        
                        if($sove>1){
                            //lấy thông tin khách đi cùng
                            $khach = mysqli_query($conn, "SELECT * FROM diem_ruockhach WHERE id_phieu='$id_phieu' and $hoten_kh!='hoten'");
                            while($tt = mysqli_fetch_array($khach)){
                                $hoten = $tt['hoten'];
                                $sdt = $tt['sdt'];
                                $diemruoc = $tt['diachiruoc'];
                            }
                        }
                    ?>
                    <form method="post" action="huy.php">
                    <input type="hidden" name="hoten" value="<?=$hoten_kh?>">
                    <input type="hidden" name="cmnd" value="<?=$soCMND?>">
                    <input type="hidden" name="id_phieu" value="<?=$id_phieu?>">
                    <div class="tb_route_inner_txt" ng-show="tripDetails.length!='0'" ng-repeat="trips in tripDetails">
                        <div class="tb_route_inner" data-toggle="collapse" data-target="#demo{{$index}}" style="cursor:pointer;">
                            <div class="tb_route_from">
                                <div class="tb_tour">
                                    <?=$row['tuyenduong'];?>
                                    <br>
                                    <span class="tb_tour_type" >{<?=$row['giodi'];?>}</span>
                                </div>
                            </div>
                            
                            
                            <div class="tb_route_date" style="margin-left: 50px;">
                                <div class="tb_tour">Ngày khởi hành<br>
                                <span class="tb_tour_type" >{<?=$row['ngaydi'];?>}</span> 
                                </div>   
                            </div>
                            <div class="tb_route_name">
                                <div class="tb_tour">Loại xe<br>
                                    <span class="tb_tour_type" >{<?=$ten_loaixe?>}</span>
                                </div>  
                            </div>
                            <div class="tb_route_name">
                                <div class="tb_tour">Điểm lên xe<br>
                                    <span class="tb_tour_type" >{<?=$row['diemlenxe']?>}</span>
                                </div>  
                            </div>

                            <div class="tb_route_name">
                                
                                <button class="btn" name='huy' style="margin-top: 27px;">Hủy vé</button>
                                  
                            </div>
                                        
                            </div>
                        <div class="trip_details " >
                            <!-- <div class="trip_details_inner"> <br>TICKET DETAILS </br></div> -->
                            <div class="trip_details_inner align_left">
                                Số vé: <b>{<?=$row['sove']?>}</b>
                                <br>
                                Số khách đi cùng: <b>{<?=$row['sokhach_dicung']?>}</b>
                                <br>
                                Vị trí ghế: <b>{<?=$vitrighe?>}</b>
                            </div>
                            <div class="trip_details_inner align_left">Trạng thái : <label class="label label-success" style="font-size: 15px;"><?=$status?></label></div>
                        </div>    
                
                    <div class="trip_details">
                        <div class="trip_details_inner">
                            THÔNG TIN KHÁCH HÀNG<br>
                            <hr>
				 
                            <div class="tb_seats_list nobord" ng-repeat ="details in trips.customer_details">
                                
                            <div class="tb_seats_list1 width">
                            <div class="tb_seats_list1_inner">
                                <img src="http://demo.truebus.co.in/assets/images/user.png">
                                
                                <div class="tb_tour top"><?=$row['hoten']?><br>
                                    <span class="tb_tour_type" ><?=$row['didong']?></span>
                                    <br>
                                    <span class="tb_tour_type" >Điểm rước: <?=$row['diemlenxe']?></span>
                                </div>
                            </div>
                        </div>
                        <div class="tb_seats_list2 width3">
                            <div class="tb_seats_list1_inner left">
                                <div class="tb_tour">Khách đi cùng<br>
                                    <span class="tb_tour_type" >
                                        <strong><?=$hoten?></strong>
                                        <br>
                                        <?=$sdt?>
                                        <br>
                                        <strong>Điểm rước: <?=$diemruoc?></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- 
                        <div class="tb_seats_list5 width2">
                            <div class="tb_seats_list1_inner">
                                <div class="tb_tour">{{trips.status}}<br>
                                    <span class="tb_tour_type" ></span>
                                </div>
                            </div>
                        </div> -->
                    </div>            
                </div>    
            </div>

            <div class="trip_details">
                <div class="trip_details_inner">
                THÔNG TIN THANH TOÁN<br>
                <hr>
                    <div class="tb_seats_list  nobord">    
                        <div class="tb_seats_list1 width">
                            <div class="tb_seats_list1_inner">
                                <img src="http://demo.truebus.co.in/assets/images/pay.png">
                                <div class="tb_tour top">Phương thức thanh toán<br>
                                    <span class="tb_tour_type" >{<?=$tenpt?>}</span>
                                </div>
                            </div>
                        </div>
                
                        <div class="" style="float:right;">
                            <div class="tb_seats_list1_inner">
                        
                                <div class="tb_tour"><br>
                                    <span class="tb_tour_type" >Ngày đặt: <?=$row['ngaydatve']?></span>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            <br>
            <br>
            <div class="total_amount">
                <div class="total_amount_lft">  &nbsp; </div>
                <div class="total_amount_rht">
                    <div class="total_amount_rht1">
                        &nbsp;  &nbsp;
                    </div> 
            
                    <div class="total_amount_rht2">
                        TỔNG CỘNG: <span class="rs_left"> <?=$row['tongtien'];?></span>
                    </div> 
                </div> 
            </div> 
        </div>
        <?php }?>   
    </div>
    <?php } ?>
    <br>
    &nbsp;
</div>
</form>
 <!--ff-->
</div> 
</div> 
</div>
</div>
    
    <br>
    
</div>
                
</div>

</div>
<br>

    </form>
</div> 
</div>
</div>
</div>

<?php
    include("includes/script.php");
    include("includes/footer.php");
?>