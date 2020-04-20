<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php
    include("includes/header.php");
    include("includes/modal.php");
    include("includes/connect.php");
    if(isset($_POST['buy'])){
        if($_POST['noidi']=='' && $_POST['noiden']=='' && $_POST['loaixe']=='' && $_POST['ngaydi']==''){
            echo '<script language="javascript">';
            echo 'alert("Vui lòng điền đầy đủ thông tin");window.history.back()';
            echo '</script>';
        }
        else{
            $fromLoc=$_POST['noidi'];
            $toLoc=$_POST['noiden'];
            $ten_loaixe = $_POST['loaixe'];
            $dep_date=$_POST['ngaydi'];
            $ticket_number=$_POST['sove'];

            $sql1=mysqli_query($conn,"SELECT ten_noidi FROM noidi WHERE id_noidi='$fromLoc'");
            while($row1=mysqli_fetch_array($sql1)){
                $ten_noidi=$row1['ten_noidi'];
            }

            $sql2=mysqli_query($conn, "SELECT ten_noiden FROM noiden WHERE id_noiden='$toLoc'");
            while($row2=mysqli_fetch_array($sql2)){
                $ten_noiden=$row2['ten_noiden'];
            }

            /*$sql3=mysqli_query($conn, "SELECT * FROM loai_xe INNER JOIN lich_chay ON loai_xe.id_loaixe=lich_chay.id_loaixe WHERE lich_chay.fromLoc='$ten_noidi' and lich_chay.toLoc='$ten_noiden' and lich_chay.id_loaixe='$loaixe'");
            while($row3=mysqli_fetch_array($sql3)){
                $ten_loaixe=$row3['ten_loaixe'];
            }*/

            $sql3=mysqli_query($conn, "SELECT * FROM loai_xe INNER JOIN lich_chay ON loai_xe.id_loaixe=lich_chay.id_loaixe WHERE lich_chay.fromLoc='$ten_noidi' and lich_chay.toLoc='$ten_noiden' and loai_xe.ten_loaixe='$ten_loaixe'");
            while($row3=mysqli_fetch_array($sql3)){
                $id_loaixe=$row3['id_loaixe'];
            }

            $get_giave=mysqli_query($conn, "SELECT * FROM lich_chay WHERE fromLoc='$ten_noidi' and toLoc='$ten_noiden' and id_loaixe='$id_loaixe'");
                $row4=mysqli_fetch_assoc($get_giave);
                $giave=$row4['giave'];

            $get_thoigian=mysqli_query($conn, "SELECT DATE_FORMAT(thoigiandi, '%h:%i') as thoigiandi FROM lich_chay WHERE fromLoc='$ten_noidi' and toLoc='$ten_noiden' and id_loaixe='$id_loaixe'");
                $row5=mysqli_fetch_assoc($get_thoigian);
                $thoigiandi=$row5['thoigiandi'];

            $get_gioden=mysqli_query($conn, "SELECT gioden FROM lich_chay WHERE fromLoc='$ten_noidi' and toLoc='$ten_noiden' and id_loaixe='$id_loaixe'");
                $row6=mysqli_fetch_assoc($get_gioden);
                $gioden=$row6['gioden'];
        }
    }elseif(isset($_POST['muave'])){
        $ten_noidi=$_POST['noidi'];
        $ten_noiden=$_POST['noiden'];
        $ten_loaixe = $_POST['loaixe'];
        $dep_date=$_POST['ngaydi'];
        $ticket_number=$_POST['sove'];
        //lấy id_xe
        $sql4=mysqli_query($conn, "SELECT * FROM loai_xe WHERE ten_loaixe='$ten_loaixe'");
        $execute=mysqli_fetch_assoc($sql4);
        $id_loaixe=$execute['id_loaixe'];
        //Lấy giờ khởi hành
        $sql5=mysqli_query($conn, "SELECT * FROM lich_chay WHERE id_loaixe='$id_loaixe' and toLoc='$ten_noiden'");
        while($exe=mysqli_fetch_array($sql5)){
            $giokhoihanh=$exe['giokhoihanh'];
            $giotoi=$exe['gioden'];
        }
        //lấy giá tiền
        $get_giave=mysqli_query($conn, "SELECT * FROM lich_chay WHERE fromLoc='$ten_noidi' and toLoc='$ten_noiden' and id_loaixe='$loaixe'");
        $row4=mysqli_fetch_assoc($get_giave);
        $giave=$row4['giave'];

        //Lấy thời gian di chuyển
        $get_time=mysqli_query($conn, "SELECT DATE_FORMAT(thoigiandi, '%h:%i') as thoigiandi FROM lich_chay WHERE id_loaixe='$id_loaixe' and toLoc='$ten_noiden'");
        $row_time=mysqli_fetch_assoc($get_time);
        $thoigian=$row_time['thoigiandi'];
    }
?>

<div class="row" ng-controller="search" style="margin-top: 20px;">
    <input type="button" value="fsd" id="rating" ng-click="rating()" style="display:none;" >
    <div id="container" ng-init="getTripdetails()">
        <div class="col-md-12">
            <!--<ul class="tabs nav nav-pills">
                <li class="tab-link active"><a data-toggle="pill" href="#home">CHỌN TUYẾN</a></li>
                <li class="tab-link"><a data-toggle="pill" href="#menu1">THÔNG TIN CÁ NHÂN</a></li>
                <li class="tab-link"><a data-toggle="pill" href="#menu2">THANH TOÁN</a></li>
            </ul>-->
            <div id="tab-1" class="tab-content current" data-id="paytm" style="margin-top: 100px;">            
                <div class="tb_route_inner_txt" ng-show="tripDetails.length!='0'" ng-repeat="trips in tripDetails"> 
                    <div class="container" ng-controller="search">
                    <form method="post" action="thanhtoan.php">
                        <div class="row" style="margin-top: -20px; margin-left: -70px;">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-ms-12">
                                <section id="Search" class="LB XXCN  P20" style="width:105%;">
                                    <div id="ticket">
                                        <div id="ticketform">
                                            <div class="searchRow clearfix">
                                                <!--FORM MỘT CHIỀU-->
                                                <div class="form-a">
                                                <input type="hidden" value="<?=$ten_noidi?>" name="ten_noidi"/>
                                                <input type="hidden" value="<?=$ten_noiden?>" name="ten_noiden"/>
                                                <input type="hidden" value="<?=$dep_date?>" name="dep_date"/>
                                                <input type="hidden" value="<?=$ticket_number?>" name="sove"/>
                                                <input type="hidden" value="<?=$giave?>" name="tienve"/>
                                                <p class="text-center text-primary text-uppercase" style="color: #ef5222; font-size: 15px; font-weight: 550; padding-top: 10px;">TUYẾN: <?php echo $ten_noidi; echo "-"; echo $ten_noiden?>
                                                </p>
                                                <p class="text-center text-primary text-uppercase" style="color: #ef5222; font-size: 15px; font-weight: 550;">Ngày: <?php echo $dep_date;?></p>
                                                <!--Hiển thị loại xe-->
                                                <div class="row">
                                                    <div class="col col-md-12">
                                                        <div class="LB">
                                                            <label class="inputLabel" style="font-size: 15px; margin-top: 10px;"><i class="fa fa-bus text-primary"></i><strong>&nbsp; &nbsp;Loại xe:</strong><span class="text-primary" style="color:red"> *</span></label>
                                                            <input class="form-control" name="loaixe" value="<?=$ten_loaixe?>" readonly style="width: 200%;"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!--End-->
                                            
                                                <!--Hiển thị thông tin nơi đến-->
                                                <div class="row">
                                                    <div class="col col-md-12">    
                                                        <div class="LB">
                                                            <label class="inputLabel" style="font-size: 15px; margin-top: 10px;"><i class="fa fa-clock-o text-primary"></i><strong>&nbsp;&nbsp;Chọn giờ khởi hành:</strong><span class="text-primary" style="color:red"> *</span></label>
                                                            <select name="gio" id="gio" class="form-control" onchange="giodachon()" required style="width: 190%;">
                                                            <?php
                                                                $result=mysqli_query($conn, "SELECT * FROM lich_chay WHERE id_loaixe='$id_loaixe' and toLoc='$ten_noiden'");
                                                                while($row=mysqli_fetch_array($result)){
                                                                ?>
                                                                    <option value="<?=$row['id_lich']?>"><?=$row['giokhoihanh']?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!--End-->
                                                
                                                <!--Chọn điểm lên xe-->
                                                <div class="row">
                                                    <div class="col col-md-12">
                                                        <div class="LB">
                                                            <label class="inputLabel" style="font-size: 15px; margin-top: 15px;"><i class="fa fa-map-marker text-primary"></i><strong>&nbsp; &nbsp;Chọn điểm lên xe:</strong><span class="text-primary" style="color:red"> *</span></label>
                                                            <input class="form-control" name="diemlenxe" placeholder="VD: Bến xe Cần Thơ hoặc địa chỉ trung chuyển..." style="width: 145%;"/>
                                                            <p style="padding-top: 5px;"><small><i>(Có thể bỏ trống nếu không trung chuyển)</i></small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!--End-->
                                        
                                            <!--Chọn điểm xuống xe-->
                                            <div class="row" style="padding-top: 10px;">
                                                    <div class="col col-md-12">
                                                        <div class="LB">
                                                            <label class="inputLabel" style="font-size: 15px; margin-top: 10px;"><i class="fa fa-map-marker text-primary"></i><strong>&nbsp; &nbsp;Chọn điểm xuống xe:</strong><span class="text-primary" style="color:red"> *</span></label>
                                                            <input class="form-control" name="diemxuongxe" placeholder="VD: xuống tại trạm hoặc địa chỉ trung chuyển..." style="width: 145%;"/>
                                                            <p style="padding-top: 5px;"><small><i>(Có thể bỏ trống nếu không trung chuyển)</i></small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!--End-->

                                            <!--HÀNH LÝ-->
                                            <div class="row">
                                                <div class="col col-md-12">    
                                                    <div class="LB">
                                                        <label class="inputLabel" style="font-size: 15px; padding-top: 10px;"><i class="fa fa-sticky-note text-primary"></i><strong>&nbsp;&nbsp;Ghi chú:</strong></label>
                                                        <input class="form-control" name="yeucau" placeholder="Kèm hành lý, trẻ em..." style="width: 210%;"/>
                                                    </div>
                                                </div>
                                            </div>
                                                <!--end-->
                                            <!--Button-->
                                            <div class="row" style="margin-top: 15px;">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-ms-12">
                                                    <a href="index.php" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left icon-flat bg-btn-actived"></i> Quay lại</a>
                                                </div>
                                            </div>
                                            <!--End-->
                                        </div>
                                        <!--END FORM MỘT CHIỀU-->
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-4" style="border: 2px solid #31708f; border-radius: 25px; margin-top: 15px; margin-left: 10px; width: 440px;">
                            <section id="Search" class="LB XXCN  P20" style="width:105%;">
                                <div class="searchRow clearfix">
                                    <div class="form-a">
                                        <div class="row">
                                            <div class="col col-md-12">
                                                <label class="inputLabel" style="font-size: 17px; text-align: center;"><strong>CHỌN GHẾ</strong></label>
                                                <label class="inputLabel" style="font-size: 17px; text-align: center;"><strong><?=$ten_loaixe?></strong></label>
                                                <hr>
                                            </div>
                                        </div>
                                    
                                    <div class="row">
                                        <div class="col col-md-12">
                                            <label class="inputLabel" style="font-size: 18px; text-align: center; color: #ef5222;"><strong>SƠ ĐỒ CHỖ NGỒI</strong></label>
                                            <hr>
                                        </div>
                                    </div>
                                    
                                    <!--SƠ ĐỒ GHẾ-->
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div id="seat-map">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="front-indicator" style="float: left; margin-right: 10px;">TÀI XẾ</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="front-indicator" style="float: right;">CỬA LÊN</div>
                                                </div>
                                            </div>
                                            <strong><p style="padding-top: 20px; padding-left: 80px;">Tầng dưới</p></strong>
                                        </div>
                            
                                        <div id="seat-map2">
                                            <strong><p style="padding-left: 80px;">Tầng trên</p></strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="booking-details">
                                            <h2>Giá vé</h2>
                                            <h3> Ghế đã chọn (<span id="counter"></span>):</h3>
                                            <ul id="selected-seats"></ul>
                                            Tổng tiền: <b><span id="total" name="total">0 </span>&nbsp;VNĐ</b>
                                            <button type="submit" class="btn btn-success btn-flat" style="margin-top: 10px;" name="thanhtoan">
                                                <i class="fa fa-arrow-right icon-flat bg-success"></i>Thanh toán
                                            </button>
                                            <div id="legend"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--END-->                                       
                            </section>
                        </div>
                        <!--THÔNG TIN CHUYẾN ĐI-->
                        <div class="col-md-4" style="border: 2px solid #31708f; border-radius: 25px; margin-top: 15px; float: right; width: 30%; margin-right: -30px;">
                            <div class="form-a"> 
                                <div id="step-info">
                                    <p class="text-center text-primary text-uppercase" style="color: #ef5222; font-size: 15px; font-weight: 550; padding-top: 10px;">THÔNG TIN CHUYẾN ĐI</p>
                                        <table class="time-map table">                                                          
                                        <tbody>
                                        <tr>
                                            <td>
                                                <p>
                                                    <i class="fa fa-bus text-primary"></i> <strong>Xuất phát</strong>
                                                </p>
                                                <span style="margin-left:15px;"><?php echo $dep_date;?></span>
                                                <br>
                                                <p style="color: #ff4500; margin-left:15px; font-size: 18px; font-weight: 450;">
                                                <?php echo $ten_noidi;?><br>
                                                </p>
                                            </td>
                                            <td>
                                                <input type="text" id="giodachon" name="giokhoihanh" class="form-control" style="width: 90px; text-align: center;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>
                                                    <i class="fa fa-clock-o"></i>
                                                    <strong>Thời gian di chuyển:</strong>
                                                </h5>
                                            </td>
                                            <td>
                                                
                                                <input type="text" name="thoigiandi" class="form-control" style="width: 90px; text-align: center;" value="<?=$thoigiandi?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>
                                                    <i class="fa fa-bus text-primary"></i> <strong>Đến lúc</strong>
                                                </h5>
                                                <span style="margin-left: 15px;"><?php echo $dep_date;?></span><br>
                                                <p style="margin-left: 15px ;font-size: 18px; font-weight: 450; color:#ff4500;">
                                                    <?php echo $ten_noiden;?><br>
                                                </p>
                                            </td>
                                            <td>
                                                
                                                <input type="text" name="gioden" id="gioden" class="form-control" style="width: 90px; text-align:center"/>
                                            </td>
                            
                                            <td>
                                            
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p style="margin-top: -10px;">
                                    <h5><strong>Miễn phí &nbsp;</strong></h5>
                                    <span style="padding-left: 100px;">
                                        <span class="water sprite" title="Nước uống"></span>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('input[name="trungchuyen"]').on('click', function() {
            if ($(this).val() == 'xetrungchuyen') {
                $('#textbox').show();
            }
            else {
                $('#textbox').hide();
            }
        });
    });
</script>

<script>
    $(function() {
        $('input[name="xuongxe"]').on('click', function() {
            if ($(this).val() == 'trungchuyendennha') {
                $('#textbox2').show();
            }
            else {
                $('#textbox2').hide();
            }
        });
    });
</script>

<!--lấy giá trị đã chọn từ select box GIỜ DI CHUYỂN-->
<script>
    $("#gio").on("change",function(){
        //Getting Value
        var selValue = $("#gio :selected").text();
        //Setting Value
        $("#giodachon").val(selValue);
    });
</script>

<!--lấy giá trị đã chọn từ select box LOẠI GHẾ-->
<script>
    $("#loaixe").on("change",function(){
        //Getting Value
        var selValue = $("#loaixe :selected").text();
        //Setting Value
        $("#loaixedachon").val(selValue);
    });
</script>  
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script> 
<script src="assets/js/jquery.seat-charts.js"></script> 
<script>
			var firstSeatLabel = 1;
            var ticket="<?php echo $ticket_number; ?>";
			$(document).ready(function() { 
				var $cart = $('#selected-seats'),
					$counter = $('#counter'),
					$total = $('#total'),
					sc = $('#seat-map').seatCharts({
					map: [
						'fff',
						'fff',
						'eee',
						'e__e',
						'eee',
					],
					seats: {
						f: {
							price: <?php echo $giave?>,
							classes : 'first-class', //your custom CSS class
							category: 'First Class'
						},
						e: {
							price: <?php echo $giave?>,
							classes : 'economy-class', //your custom CSS class
							category: 'Economy Class'
						}					
					
					},
					naming : {
						top : false,
						getLabel : function (character, row, column) {
							return firstSeatLabel++;
						},
					},
					legend : {
						node : $('#legend'),
					    items : [
							[ 'e', 'available',   'Ghế trống'],
                            
							[ 'f', 'unavailable', 'Ghế có khách'],
					    ]					
					},
					click: function () {
						if (this.status() == 'available') {
							//let's create a new <li> which we'll add to the cart items
							$('<li name="vitrighe">'+'Vị trí ghế: '+this.settings.label+': <b>'+this.data().price+'</b> <a href="#" class="cancel-cart-item">[Hủy]</a></li>')
								.attr('id', 'cart-item-'+this.settings.id)
								.data('seatId', this.settings.id)
								.appendTo($cart);
							
							/*
							 * Lets update the counter and total
							 *
							 * .find function will not find the current seat, because it will change its stauts only after return
							 * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
							 */
							$counter.text(sc.find('selected').length+1);
							$total.text(recalculateTotal(sc)+this.data().price);
							
							return 'selected';
                            if($counter < ticket){
                                alert('Vui lòng chọn đúng số lượng vé!');
                            }
                                
						} else if (this.status() == 'selected') {
							//update the counter
							$counter.text(sc.find('selected').length-1);
							//and total
							$total.text(recalculateTotal(sc)-this.data().price);
						
							//remove the item from our cart
							$('#cart-item-'+this.settings.id).remove();
						
							//seat has been vacated
							return 'available';
						} else if (this.status() == 'unavailable') {
							//seat has been already booked
							return 'unavailable';
						} else {
							return this.style();
						}
					}
				});

				//this will handle "[cancel]" link clicks
				$('#selected-seats').on('click', '.cancel-cart-item', function () {
					//let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
					sc.get($(this).parents('li:first').data('seatId')).click();
				});

				//let's pretend some seats have already been booked
				sc.get(['1_2', '4_1', '7_1', '7_2', '5_1', '5_2']).status('unavailable');
		
		});

		function recalculateTotal(sc) {
			var total = 0;
		
			//basically find every selected seat and sum its price
			sc.find('selected').each(function () {
				total += this.data().price;
			});
			
			return total;
		}
		
        </script>

        <script>
			var firstSeatLabel = 1;
		
			$(document).ready(function() {
				var $cart = $('#selected-seats'),
					$counter = $('#counter'),
					$total = $('#total'),
					sc = $('#seat-map2').seatCharts({
					map: [
						'fff',
						'eee',
						'eee',
						'e__e',
						'eee',
					],
					seats: {
						f: {
							price   : <?php echo $giave?>,
							classes : 'first-class', //your custom CSS class
							category: 'First Class'
						},
						e: {
							price   : <?php echo $giave?>,
							classes : 'economy-class', //your custom CSS class
							category: 'Economy Class'
						}					
					
					},
					naming : {
						top : false,
						getLabel : function (character, row, column) {
							return firstSeatLabel++;
						},
					},
					legend : {
						node : $('#legend'),
					    items : [

					    ]					
					},
					click: function () {
						if (this.status() == 'available') {
							//let's create a new <li> which we'll add to the cart items
							$('<li>'+'Vị trí ghế: '+this.settings.label+': <b>'+this.data().price+'</b> <a href="#" class="cancel-cart-item">[Hủy]</a></li>')
								.attr('id', 'cart-item-'+this.settings.id)
								.data('seatId', this.settings.id)
								.appendTo($cart);
							
							/*
							 * Lets update the counter and total
							 *
							 * .find function will not find the current seat, because it will change its stauts only after return
							 * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
							 */
							$counter.text(sc.find('selected').length+1);
							$total.text(recalculateTotal(sc)+this.data().price);
							
							return 'selected';
						} else if (this.status() == 'selected') {
							//update the counter
							$counter.text(sc.find('selected').length-1);
							//and total
							$total.text(recalculateTotal(sc)-this.data().price);
						
							//remove the item from our cart
							$('#cart-item-'+this.settings.id).remove();
						
							//seat has been vacated
							return 'available';
						} else if (this.status() == 'unavailable') {
							//seat has been already booked
							return 'unavailable';
						} else {
							return this.style();
						}
					}
				});

				//this will handle "[cancel]" link clicks
				$('#selected-seats').on('click', '.cancel-cart-item', function () {
					//let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
					sc.get($(this).parents('li:first').data('seatId')).click();
				});

				//let's pretend some seats have already been booked
				sc.get(['1_2', '4_1', '7_1', '7_2']).status('unavailable');
		
		});

		function recalculateTotal(sc) {
			var total = 0;
		
			//basically find every selected seat and sum its price
			sc.find('selected').each(function () {
				total += this.data().price;
			});
			
			return total;
		}
		
        </script>

        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-36251023-1']);
            _gaq.push(['_setDomainName', 'jqueryscript.net']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>

        <script> 
            $(document).ready(function(){
            //giờ đến
            $('#gio').on('change', function(){
            var id_lich = $(this).val();
            if(id_lich){
                $.ajax({
                    type:'POST',
                    url:'ajax_gioden.php',
                    data:'id_lich='+id_lich,
                    success:function(data){
                    $('#gioden').val(data);
                    }
                }); 
            }
            });
            })
        </script>
<?php
    include("includes/script.php");
    include("includes/footer.php");
?>

