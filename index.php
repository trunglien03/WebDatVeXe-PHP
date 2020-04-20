<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
    $('#noidi').on('change', function(){
        var id_noidi = $(this).val();
        if(id_noidi){
            $.ajax({
                type:'POST',
                url:'ajax1.php',
                data:'id_noidi='+id_noidi,
                success:function(html){
                    $('#noiden').html(html);
                    $('#loaixe').html('Chọn điểm khởi hành trước');
                }
            }); 
        }else{
            $('#noiden').html('<option value="">--Chọn nơi đi trước--</option>');
            $('#loaixe').html('<option value="">--Chọn điểm khởi hành trước--</option>');
        }
    });
    
    $('#noiden').on('change', function(){
        var id_noiden = $(this).val();
        if(id_noiden){
            $.ajax({
                type:'POST',
                url:'ajax1.php',
                data:'id_noiden='+id_noiden,
                success:function(html){
                    $('#loaixe').html(html);
                }
            }); 
        }
        else{
            $('#loaixe').html('<option value="">--Chọn điểm khởi hành trước--</option>');
        }
    });
});
</script>

<script>
$(document).ready(function(){
    $('#fromLoc').on('change', function(){
        var id_noidi = $(this).val();
        if(id_noidi){
            $.ajax({
                type:'POST',
                url:'ajax2.php',
                data:'id_noidi='+id_noidi,
                success:function(html){
                    $('#toLoc').html(html);
                    $('#loai_xe').html('Chọn điểm khởi hành trước');
                }
            }); 
        }else{
            $('#toLoc').html('<option value="">--Chọn nơi đi trước--</option>');
            $('#loai_xe').html('<option value="">--Chọn điểm khởi hành trước--</option>');
        }
    });
    
    $('#toLoc').on('change', function(){
        var id_noiden = $(this).val();
        if(id_noiden){
            $.ajax({
                type:'POST',
                url:'ajax2.php',
                data:'id_noiden='+id_noiden,
                success:function(html){
                    $('#loai_xe').html(html);
                }
            }); 
        }
        else{
            $('#loai_xe').html('<option value="">--Chọn điểm khởi hành trước--</option>');
        }
    });
});
</script>
<?php 
    include("includes/header.php");
    include("includes/modal.php");
?>
        <!--SEARCH-BAR-->
<div class="container" ng-controller="search">
    <div class="row" style="min-height:400px;margin-top:100px;">
        <div class="col-md-6">
            <form id="myForm" method="post" action="booking.php" name="bookingform">
                <section id="Search" class="LB XXCN  P20">
                    <div id="ticket">
                        <h1 class="bookTic XCN TextSemiBold"><i class="fa fa-bus"></i> MUA VÉ TRỰC TUYẾN</h1>
                        <div id="ticketform">
                            <div class="searchRow clearfix">
                                <!--
                                    <div id="option" style="width: 70%;">
                                    <label style="margin-right: 20px;">
                                    <input type="radio" name="colorCheckbox" value="red" checked> <strong>Một chiều</strong>
                                    </label>
                                    <label>
                                    <input type="radio" name="colorCheckbox" value="green"> <strong>Khứ hồi</strong>
                                    </label>
                                </div>
                                -->
                                <!--MỘT CHIỀU-->
                                <?php
                                    include("includes/connect.php");
                                    if(isset($_POST['buythis'])){
                                        $id_loaixe=$_POST['bid'];
                                        $fromLoc=$_POST['fromLoc'];
                                        $toLoc=$_POST['toLoc'];
                                        //lấy tên loại xe
                                        $get_loaixe=mysqli_query($conn, "SELECT * FROM loai_xe WHERE id_loaixe='$id_loaixe'");
                                        $execute=mysqli_fetch_assoc($get_loaixe);
                                        $ten_loaixe=$execute['ten_loaixe'];
                                        $sql=mysqli_query($conn, "SELECT * FROM lich_chay WHERE id_loaixe='$id_loaixe' and toLoc='$toLoc' and fromLoc='$fromLoc'");
                                        while($row=mysqli_fetch_array($sql)){
                                ?>
                                            <div class="form-a">
                                                <div class="LB">
                                                    <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Điểm khởi hành</strong></label>
                                                    <input value="<?=$row['fromLoc']?>" type="text" name="noidi" class="XXinput searching"/>
                                                    <div class="errorMessageFixed"> </div>
                                                </div>
                                                <span class="switchButton" id="switchButton"></span>

                                                <div class="searchRight NoPaddingRight">
                                                    <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Điểm đến</strong></label>
                                                    <input value="<?=$row['toLoc']?>" type="text" name="noiden" class="XXinput searching"/>
                                                    <div class="errorMessageFixed"> </div>
                                                </div>

                                                <div class="searchRow clearfix">
                                                    <div class="LB">
                                                        <label class="inputLabel" style="font-size: 15px;"><strong>Loại xe:</strong></label>
                                                        <input value="<?=$ten_loaixe?>" type="text" name="loaixe" class="XXinput searching"/>
                                                    </div>

                                                    <div class="searchRight retJouney">
                                                        <label class="inputLabel" style="font-size: 15px;"><strong>Ngày đi</strong></label>
                                                        <input id="Calenderfrom" name="ngaydi" class="XXinput" placeholder="Chọn ngày khởi hành" type="text"/>
                                                    </div>
                                                    <div class="LB">
                                                        <label class="inputLabel" style="padding-top:15px; font-size: 15px;"><strong>Số lượng vé</strong></label>
                                                        <select name="sove" class="XXinput searching" required>
                                                            <option value="1" selected>1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="LB">
                                                    <button type="submit" class="btn btn-success btn-flat" style="margin-top: 10px;" name="muave">
                                                        <i class="fa fa-arrow-right icon-flat bg-success"></i>Tiếp tục
                                                    </button>
                                                    
                                                    <input type="reset" value="Làm lại" class="btn btn-orange" id="resetBTN" style="margin-top: 2px;"/>
                                                    
                                                </div>
                                            </div>
                                            <?php 
                                                }
                                            }else{
                                            ?>
                                            <div class="form-a">
                                                <div class="LB">
                                                    <label class="inputLabel" style="font-size: 15px; padding-top: 15px;"><strong>Điểm khởi hành</strong></label>
                                                    <select id="noidi" name="noidi" class="XXinput searching" data-id="board_point" autocomplete="off" data-parsley-error-message="Vui lòng chọn điểm khởi hành!" required>
                                                        <option value="">--Chọn nơi đi--</option>
                                                            <?php
                                                                require("includes/connect.php");
                                                                $sql=mysqli_query($conn, "select * from noidi");
                                                                $num=mysqli_num_rows($sql);
                                                                if($num>0){
                                                                while ($row=mysqli_fetch_array($sql)){    
                                                            ?>
                                                        <option value= "<?php echo $row['id_noidi'];?>"><?php echo $row['ten_noidi'];?></option>
                                                            <?php } }?>
                                                    </select>
                                                    <div class="errorMessageFixed"> </div>
                                                </div>
                                                <span class="switchButton" id="switchButton"></span>

                                                <div class="searchRight NoPaddingRight">
                                                    <label class="inputLabel" style="font-size: 15px; padding-top: 15px;"><strong>Điểm đến</strong></label>
                                                    <select id="noiden" name="noiden" class="XXinput searching" data-parsley-error-message="Vui lòng chọn điểm khởi hành!" required>
                                                        <option value="">--Chọn điểm đi trước--</option>
                                                    </select>
                                                    <div class="errorMessageFixed"> </div>
                                                </div>

                                                <div class="searchRow clearfix">
                                                    <div class="LB">
                                                        <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Loại xe:</strong></label>
                                                        <select id="loaixe" name="loaixe" class="XXinput searching">
                                                            <option value=""></option>
                                                        </select>
                                                    </div>

                                                    <div class="searchRight retJouney">
                                                        <label class="inputLabel" style="font-size: 15px; padding-top: 15px;"><strong>Ngày đi</strong></label>
                                                        <input id="Calenderfrom" name="ngaydi" class="XXinput" placeholder="Chọn ngày khởi hành" type="text"/>
                                                    </div>
                                                    <div class="LB">
                                                        <label class="inputLabel" style="padding-top:15px; font-size: 15px;"><strong>Số lượng vé</strong></label>
                                                        <select name="sove" class="XXinput searching" required>
                                                            <option value="1" selected>1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="LB">
                                                    <button type="submit" class="btn btn-success btn-flat" style="margin-top: 10px;" name="buy">
                                                        <i class="fa fa-arrow-right icon-flat bg-success"></i>Mua vé
                                                    </button>
                                                    <input type="reset" value="Làm lại" class="btn btn-orange" id="resetBTN" style="margin-top: 2px;"/>
                                                </div>
                                            </div>
                                            <?php }?>
                                <!--HAI CHIỀU
                                <div class="form-b" style="display:none">
                                    <div class="LB">
                                        <label class="inputLabel" style="font-size: 15px;"><strong>Điểm khởi hành</strong></label>
                                        <select id="fromLoc" name="fromLoc" class="XXinput searching" data-id="board_point" autocomplete="off" data-parsley-error-message="Vui lòng chọn điểm khởi hành!" required>
                                            <option value="">--Chọn nơi đi--</option>
                                                
                                                    //require("includes/connect.php");
                                                    //$sql=mysqli_query($conn, "select * from noidi");
                                                    //$num=mysqli_num_rows($sql);
                                                    //if($num>0){
                                                    //while ($row=mysqli_fetch_array($sql)){    
                                                ?>
                                            <option value= ""</option>
                                        </select>
                                        <div class="errorMessageFixed"> </div>
                                    </div>
                                    <span class="switchButton" id="switchButton"></span>

                                    <div class="searchRight NoPaddingRight">
                                        <label class="inputLabel" style="font-size: 15px;"><strong>Điểm đến</strong></label>
                                        <select id="toLoc" name="toLoc" class="XXinput searching" data-parsley-error-message="Vui lòng chọn điểm khởi hành!" required>
                                            <option value="">--Chọn điểm đi trước--</option>
                                        </select>
                                        <div class="errorMessageFixed"> </div>
                                    </div>

                                    <div class="searchRow clearfix">
                                        <div class="LB">
                                            <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Loại xe:</strong></label>
                                            <select id="loai_xe" name="loai_xe" class="XXinput searching">
                                                <option value=""></option>
                                            </select>
                                        </div>

                                        <div class="searchRight retJouney">
                                            <label class="inputLabel" style="padding-top:15px; font-size: 15px;"><strong>Số lượng vé</strong></label>
                                                <select name="sove" class="XXinput searching" required>
                                                    <option value="1" selected>1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="searchRow clearfix">
                                        <div class="LB">
                                            <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Ngày khởi hành</strong></label>
                                            <input id="Calender" name="ngaydi" class="XXinput" placeholder="Chọn ngày khởi hành" type="text"/>
                                        </div>
                                        <div class="searchRight retJouney">
                                            <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><strong>Ngày về</strong></label>
                                            <input id="Calenderto" name="ngayve" class="XXinput" placeholder="Chọn ngày trở về" type="text"/>
                                        </div>
                                    </div>
                                </div>
                                -->
                            <div class="dateError">Vui lòng chọn ngày phù hợp!</div>
                            <!--<button class="RB Xbutton" id="searchBtn" ng-click="homesearch()">Mua vé</button>-->
                        </div>
                    </div>
                </div>
                <br>
                <p style="color: #31708f; padding-left:12px; line-height: 1.8;">
                    *** Quý hành khách có thể đặt vé qua tổng đài phục vụ <strong>24/24</strong> của chúng tôi 
                    (kể cả thứ 7 và Chủ Nhật): <strong>1900 6067</strong> hoặc mua vé tiện lợi ngay trên chiếc điện thoại thông 
                    minh của quý vị thông qua app <strong>TRUST Bus </strong>trên cả hai hệ điều hành phổ biến nhất hiện nay 
                    là iOS và Android.
                </p>
                    </section>
            </form>
                </div>
                <div class="col-md-6">
                    <div class="tb_bus">
                        <img src="images/giphy.gif">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="site-section">
        <div class="container" style="margin-top: -100px;">
            <div class="row">
                <h2 style="color:#31708f; font-weight: bold;">HỆ THỐNG XE AN TOÀN VÀ CHẤT LƯỢNG</h2>
            </div>
            <div class="row no-gutters">
            <div class="col-md-6 col-lg-3">
                <a href="images/slider/slide1.jpg" class="image-popup img-opacity"><img src="images/slider/slide1.jpg" alt="Image" class="img-fluid"></a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="images/slider/slide2.jpg" class="image-popup img-opacity"><img src="images/slider/slide2.jpg" alt="Image" class="img-fluid"></a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="images/slider/slide3.png" class="image-popup img-opacity"><img src="images/slider/slide3.png" alt="Image" class="img-fluid"></a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="images/slider/slide4.jpg" class="image-popup img-opacity"><img src="images/slider/slide4.jpg" alt="Image" class="img-fluid"></a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="images/slider/slide5.jpg" class="image-popup img-opacity"><img src="images/slider/slide5.jpg" alt="Image" class="img-fluid"></a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="images/slider/slide6.jpg" class="image-popup img-opacity"><img src="images/slider/slide6.jpg" alt="Image" class="img-fluid"></a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="images/slider/slide7.jpg" class="image-popup img-opacity"><img src="images/slider/slide7.jpg" alt="Image" class="img-fluid"></a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="images/slider/slide8.jpg" class="image-popup img-opacity"><img src="images/slider/slide8.jpg" alt="Image" class="img-fluid"></a>
            </div>
            </div>
      </div>
    </div>
    <!--ĐIỂM ĐẾN NHIỀU NHẤT-->
    <section id="star-city" class="container">
        <h2 class="heading">
            ĐIỂM KHỞI HÀNH TẠI CÁC THÀNH PHỐ LỚN
        </h2>
        <div class="row"> 
        <?php 
            include("includes/connect.php");
            $sel = mysqli_query($conn,"SELECT * FROM thanhpholon LIMIT 6");
            $count = mysqli_num_rows($sel);
            if($count>0) {
            while($row=mysqli_fetch_array($sel)){
        ?>
            <div class="col-md-4 startpoint-block">
            <a href="schedules.php?id_tp=<?php echo $row['id_tp']?>">   
                <img src="admin/<?php echo $row['hinhanh']?>">
                <div class="startpoint-text">
                    <p><i class="fa fa-bus text-primary"></i>&nbsp;Khởi hành từ: <span><?php echo $row['ten_tp']?></span></p>
                    <p><i class="fa fa-phone text-primary"></i>&nbsp;Hotline: <span>0886126195</span></p>
                    <p><i class="fa fa-map-marker text-primary"></i>&nbsp;Điểm đến: 
                    <span>
                        <?php echo $row['diem_den'];?> ,...</span>
                    </p>
                </div>
            </a>
            <div class="clearfix"></div>
            <a href="schedules.php">Chi tiết</a>
            </div>
            <?php }}?>                             
        </div>
    </section>
    <!--END ĐIỂM ĐẾN-->


        <!--SEARCH-BAR-END-->
        <!--operator-BAR-->

        <div class="tb_operator">
        <div class="container">
            <div class="tb_inner">
                <div class="row">
                    <div class="wrapper">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="tb_operator">
                            <img src="http://demo.truebus.co.in/assets/images/routte.png"> &nbsp;<span class="tb_operator1">Hơn 100<small class="smalls"> TUYẾN ĐƯỜNG </small></span>
                        </div>
                    </div>
                    <div class="col-md-4  col-sm-12 col-xs-12">
                        <div class="tb_operator left"> 
                            <img src="http://demo.truebus.co.in/assets/images/route.png">  &nbsp;<span class="tb_operator2">180<small class="smalls"> GIAO DỊCH VIÊN</small></span>
                        </div>
                    </div>
                    <div class="col-md-4  col-sm-12 col-xs-12">
                        <div class="tb_operator right"> 
                            <img src="http://demo.truebus.co.in/assets/images/ticket.png">  &nbsp;<span class="tb_operator3">6,00,000 + <small class="smalls">VÉ ĐƯỢC BÁN RA</small></span>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!--operator-BAR end-->
        <!--offers-BAR-->
        <div class="tb_offers">
        <div class="shadow"><img src="http://demo.truebus.co.in/assets/images/shadow.png"></div>
        <div class="outer">
            <div class="container">
                <div class="tb_inner">
                    <div class="row">
                    <div class="wrapper">
                        <div class="col-md-4">
                            <div class="tb_offers1">
                                <img src="http://demo.truebus.co.in/assets/images/rupees.png">
                                <div class="tb_list_offer">
                                <div class="ofer_list">KHUYẾN MÃI</div>
                                <div class="ofer_list_bold">VẬN CHUYỂN THÔNG MINH</div>
                                <div class="ofer_list_normal">Nhập mã Code: TBM120</div>
                                <div class="ofer_list_normal">Dùng cho vé thanh toán bằng tiền mặt</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="tb_offers1_top">
                                <img src="http://demo.truebus.co.in/assets/images/bed.png">
                                <div class="tb_list_offer" style=" border-right: 1px solid #dddddd;">
                                <div class="ofer_list">GIẢM 30% GIÁ VÉ</div>
                                <div class="ofer_list_bold">KHI ĐẶT PHÒNG TẠI LOCTHO HOTEL</div>
                                <div class="ofer_list_normal"> Nhập Code: TBRTM120</div>
                                <div class="ofer_list_normal">&nbsp;</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="tb_offers3">
                                <img src="http://demo.truebus.co.in/assets/images/phone.png">
                                <div class="tb_list_offer">
                                <div class="ofer_list"> KHUYẾN MÃI MUA VÉ QUA APP</div>
                                <div class="ofer_list_bold left"> TrustBus APP</div>
                                <div class="ofer_list_normal"> Mua vé bằng ứng dụng TrustBus</div>
                                <div class="ofer_list_normal"> Nhập mã code: ERHH54</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <hr class="border">
                
            </div>
        </div>
        </div>

        <script>
            $(document).ready(function(){
            var date_input=$('input[id="Calenderfrom"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            var options={
                format: 'dd/mm/yyyy',
                minDate: "today" + 1,
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
            })
        </script>

        <script>
        jQuery(function ($)
        {
        $.datepicker.regional["vi-VN"] =
        {
            closeText: "Đóng",
            prevText: "Trước",
            nextText: "Sau",
            currentText: "Hôm nay",
            monthNames: ["Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"],
            monthNamesShort: ["Một", "Hai", "Ba", "Bốn", "Năm", "Sáu", "Bảy", "Tám", "Chín", "Mười", "Mười một", "Mười hai"],
            dayNames: ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"],
            dayNamesShort: ["CN", "Hai", "Ba", "Tư", "Năm", "Sáu", "Bảy"],
            dayNamesMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
            weekHeader: "Tuần",
            dateFormat: "dd/mm/yy",
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ""
        };

        $.datepicker.setDefaults($.datepicker.regional["vi-VN"]);
    });
</script>
        <?php 
        include("includes/footer.php");
        include("includes/script.php");
        ?>