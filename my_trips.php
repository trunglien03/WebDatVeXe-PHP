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
                    <li class="tab-link current" data-tab="tab-1" data-id="d">Vé đã mua</li>
                    <li class="tab-link" data-tab="tab-3" data-id="d">Thông tin cá nhân</li>
                    <li class="tab-link" data-tab="tab-4c" data-id="d">Đổi mật khẩu</li>      
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
                <?php }elseif(
                    isset($_POST['search'])){
                    include("includes/connect.php");
                    $hoten_kh = $_POST['hoten'];
                    $soCMND = $_POST['soCMND'];
                    $id_phieu = $_POST['id_phieu'];

                    $sql = mysqli_query($conn, "SELECT * FROM phieu_datve WHERE id_phieu='$id_phieu' or hoten = '$hoten_kh' or soCMND='$soCMND'");
                    while($row=mysqli_fetch_array($sql)){
                        $id_loaixe = $row['loaixe'];
                        $pttt = $row['pttt'];
                        $vitrighe = $row['vitrighe'];
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
                            <div class="">
                                <div class="tb_tour">Điểm lên xe<br>
                                    <span class="tb_tour_type" >{<?=$row['diemlenxe']?>}</span>
                                </div>  
                            </div>
                                <!--<div class="tb_route_cnf">
                                    <div class="user">
                                        <img src="http://demo.truebus.co.in/assets/images/dot.png" class="dotss">
                                        <ul>
                                            <li><a href="http://demo.truebus.co.in/"><img src="http://demo.truebus.co.in/assets/images/booking.png">Book Again</a></li>
                                            <li><a href="http://demo.truebus.co.in/myaccount/rate_bus?idb={{trips.bus_id}}&du=0&oid={{trips.id}}"><img src="http://demo.truebus.co.in/assets/images/rate.png">Rate And Review</a></li>
                                            <li><a href="#" onClick="Memail(this)"  data-id="{{trips.booking_id}}"><img src="http://demo.truebus.co.in/assets/images/emails.png" >Email Ticket</a></li>
                                            <li><a href="#" onClick="Mprint(this)" data-id="{{trips.booking_id}}"><img src="http://demo.truebus.co.in/assets/images/ticketss.png" >Print Ticket</a></li>
                                        </ul>
                                    </div>
                                </div>-->               
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
 <!--ff-->
</div> 
</div> 
</div>
</div>
    
    <br>
    
</div>
                
</div>
<div class="container">
    <div id="tab-3" class="tab-content" data-id="paytm">
    
        <div class="tb_route_inner_txt" id="edit-hide">
            <div class="tb_route_inner">
                <div class="rb_balence">
                    <div class="balence">THÔNG TIN CÁ NHÂN <br>
                    </div>
                <?php if($_SESSION['username']){?>
                <div class="edit_pro" onClick="Edits();"><img src="http://demo.truebus.co.in/assets/images/edit.png"> edit
                </div>
            </div>
            <div class="ac-lft-main">
                <div class="ac-lft-list order">
                    <ul>
                        <li>
                            <div class="order_cnct_detail total_lft">Name </div>
                                <div class="order_cnct_detail total_dot">: </div>
                            <div class="order_contact_inf total_rht name">Your name</div>
                        </li>
                        <li>
                            <div class="order_cnct_detail total_lft"> Date of Birth</div>
                            <div class="order_cnct_detail total_dot">: </div>
                            <div class="order_contact_inf total_rht dob">mm / yyy  </div>
                        </li>
                        <li>
                            <div class="order_cnct_detail  total_lft"> Gender </div>
                            <div class="order_cnct_detail total_dot">: </div>
                            <div class="order_contact_inf  total_rht gender"> <input class="radio1" name="gender" type="radio" value="male" ><label> &nbsp; Male</label> </input>
                            <input class="radio2" name="gender" type="radio" value="female"><label> &nbsp;Female</label>    </div>
                        </li>
                    </ul>
                </div>
            </div> 
            
            <div class="balence">CONTACT DETAILS <br>
            </div>
                
        
            <div class="ac-lft-main">
                <div class="ac-lft-list order">      
                <ul>
                    <li>
                        <div class="order_cnct_detail total_lft">Mail </div>
                        <div class="order_cnct_detail total_dot">: </div>
                        <div class="order_contact_inf total_rht email">nixons@gmail.com</div>
                    </li>
                        
                    <li>
                        <div class="order_cnct_detail  total_lft">Mobile Number </div>
                        <div class="order_cnct_detail total_dot">: </div>
                        <div class="order_contact_inf  total_rht mobile">     </div>
                    </li>
                </ul>
            </div>
        </div> 
        <?php }else{?>
    </div>
    <br>
    <p style="text-align:center;"><i>Vui lòng đăng nhập để xem thông tin</i></p>
<?php }?>
</div>
</div>
<br>
<div class="tb_route_inner_txt hide" id="edit-show">
    <div class="tb_tan_in tab_one">
        <div class="balence" style="width:300px">CONTACT DETAILS <br></div>
        <div class="ac-lft-main">
            <div class="ac-lft-list order">
                <ul class="">
                    <li>
                        <div class="order_cnct_detail total_lft list_act">Email </div>
                        <div class="order_cnct_detail total_dot">: </div>
                        <div class="order_contact_inf total_rht list_act"><input class="pro_num email filwdth list_act" type="text" value=" " readonly></div>
                    </li>
                    <!--   <li>
                        <div class="order_cnct_detail total_lft list_act"> Password*</div>
                        <div class="order_cnct_detail total_dot">: </div>
                        <div class="order_contact_inf total_rht list_act "><input class="pro_num list_act" type="password" value="********" readonly></div>
                    </li> -->
                    <li>
                        <div class="order_cnct_detail  total_lft list_act">Mobile Number </div>
                        <div class="order_cnct_detail total_dot">: </div>
                        <div class="order_contact_inf  total_rht list_act"><input class="pro_num mobiles list_act" type="text" readonly > </div>
                    </li>
                    <li>&nbsp;<li>
                </ul>
            </div>
        </div><br>
        <div class="balence">MY PROFILE <br>
        </div>
                
        <div class="ac-lft-main">
        <form id="myForm" method="POST" action="http://demo.truebus.co.in/myaccount/edit_profile" enctype="multipart/form-data">
            <div class="ac-lft-list order">  
            <ul>
                <li>
                    <div class="order_cnct_detail total_lft">Name </div>
                        <div class="order_cnct_detail total_dot">: </div>
                    <div class="order_contact_inf total_rht"><input class="pro_num name" type="text" name="name" data-parsley-pattern="^[a-zA-Z]+$" required></div>
                </li>
                
                <br>
                
                <li>
                    <div class="order_cnct_detail total_lft"> Date of Birth</div>
                    <div class="order_cnct_detail total_dot">: </div>
                    <div class="order_contact_inf total_rht"><!-- <input class="pro_num XXinput calendar date_picker dob"  type="text" name="dob" required readonly> -->
                        <select class="date_of_birth  " name="year">
                            <option value="" class="year "selected  disabled=""></option>       
                            <option value="2001" >2001</option>
                                
                            <option value="2000" >2000</option>
                                
                            <option value="1999" >1999</option>
                                
                            <option value="1998" >1998</option>
                                
                            <option value="1997" >1997</option>
                                
                            <option value="1996" >1996</option>
                                
                            <option value="1995" >1995</option>
                                
                            <option value="1994" >1994</option>
                                
                            <option value="1993" >1993</option>
                                
                            <option value="1992" >1992</option>
                                
                            <option value="1991" >1991</option>
                                
                            <option value="1990" >1990</option>
                                
                            <option value="1989" >1989</option>
                                
                            <option value="1988" >1988</option>
                                
                            <option value="1987" >1987</option>
                                
                            <option value="1986" >1986</option>
                                
                            <option value="1985" >1985</option>
                                
                            <option value="1984" >1984</option>
                                
                            <option value="1983" >1983</option>
                                
                            <option value="1982" >1982</option>
                                
                            <option value="1981" >1981</option>
                                
                            <option value="1980" >1980</option>
                                
                            <option value="1979" >1979</option>
                                
                            <option value="1978" >1978</option>
                                
                            <option value="1977" >1977</option>
                                
                            <option value="1976" >1976</option>
                                
                            <option value="1975" >1975</option>
                                
                            <option value="1974" >1974</option>
                                
                            <option value="1973" >1973</option>
                                
                            <option value="1972" >1972</option>
                                
                            <option value="1971" >1971</option>
                                
                            <option value="1970" >1970</option>
                                
                            <option value="1969" >1969</option>
                                
                            <option value="1968" >1968</option>
                                
                            <option value="1967" >1967</option>
                                
                            <option value="1966" >1966</option>
                                
                            <option value="1965" >1965</option>
                                
                            <option value="1964" >1964</option>
                                
                            <option value="1963" >1963</option>
                                
                            <option value="1962" >1962</option>
                                
                            <option value="1961" >1961</option>
                                
                            <option value="1960" >1960</option>
                                
                            <option value="1959" >1959</option>
                                
                            <option value="1958" >1958</option>
                                
                            <option value="1957" >1957</option>
                                
                            <option value="1956" >1956</option>
                                
                            <option value="1955" >1955</option>
                                
                            <option value="1954" >1954</option>
                                
                            <option value="1953" >1953</option>
                                
                            <option value="1952" >1952</option>
                                
                            <option value="1951" >1951</option>
                                
                            <option value="1950" >1950</option>
                                
                            <option value="1949" >1949</option>
                                
                            <option value="1948" >1948</option>
                                
                            <option value="1947" >1947</option>
                                
                            <option value="1946" >1946</option>
                                
                            <option value="1945" >1945</option>
                                
                            <option value="1944" >1944</option>
                                
                            <option value="1943" >1943</option>
                                
                            <option value="1942" >1942</option>
                        </select>
                        <select class="date_of_birth " name="month" >
                            <option value="" class="month"selected disabled=""></option>
                            <option value=01>January</option>
                            <option value=02>February</option>
                            <option value=03>March</option>
                            <option value=04>April</option>
                            <option value=05>May</option>
                            <option value=06>June</option>
                            <option value=07>July</option>
                            <option value=08>August</option>
                            <option value=09>September</option>
                            <option value=10>October</option>
                            <option value=11>November</option>
                            <option value=12>December</option>
                        </select>
                        <select class="date_of_birth " name="day">
                            <option value="" class="day" selected disabled="" ></option>    
                            <option value="1" >1</option>
                            <option value="2" >2</option>
                            <option value="3" >3</option>
                            <option value="4" >4</option>
                            <option value="5" >5</option>
                            <option value="6" >6</option>
                            <option value="7" >7</option>
                            <option value="8" >8</option>
                            <option value="9" >9</option>
                            <option value="10" >10</option>
                            <option value="11" >11</option>
                            <option value="12" >12</option>
                            <option value="13" >13</option>
                            <option value="14" >14</option>
                            <option value="15" >15</option>
                            <option value="16" >16</option>
                            <option value="17" >17</option>
                            <option value="18" >18</option>
                            <option value="19" >19</option>
                            <option value="20" >20</option>
                            <option value="21" >21</option>
                            <option value="22" >22</option>
                            <option value="23" >23</option>
                            <option value="24" >24</option>
                            <option value="25" >25</option>
                            <option value="26" >26</option>
                            <option value="27" >27</option>
                            <option value="28" >28</option>
                            <option value="29" >29</option>
                            <option value="30" >30</option>
                            <option value="31" >31</option> 
                        </select>
                    </div>
                </li>
                <li>
                    <div class="order_cnct_detail  total_lft"> Gender </div>
                    <div class="order_cnct_detail total_dot">: </div>
                    <div class="order_contact_inf  total_rht"> 
                        <input class="radio1" name="gender" type="radio" value="male" required><label>&nbsp; Male</label> </input>
                        <input class="radio2" name="gender" type="radio" value="female"><label>&nbsp;  Female</label> </input>
                    </div>
                </li>
            <!--<li>
                <div class="order_cnct_detail total_lft"> Photo</div>
                <div class="order_cnct_detail total_dot">: </div>
                <div class="order_contact_inf  total_rht">
                <input type="file" name="image"/>
                </div>
                </li> -->
                <li class="reset_res" style="margin: 4px 5px 11px;width: 37%;"></li>
                <li><input type="submit" onClick="fileUpload();" value="Submit" id="btn_update" style="width:100px;height:38px;padding: 0px 20px;"/><span class="alertp" style="padding-right: 10px;float:left"><input type="button" value="Cancel" onClick="Edits_show();" style="width:100px;height:38px;padding: 0px 20px;"/></span></li>
                <li><span class="alertp" style="padding:0px;float:left"></span></li>                        
            </ul>
        </div>
    </form>
</div> 
</div>
</div>
</div>
<div id="tab-4c" class="tab-content" data-id="paytm">
     <div class="tb_route_inner_txt low" >
        <div class="tb_route_inner">
                <div class="amount_pay">
                <?php if($_SESSION['username']){
                    $username = $_SESSION['username'];
                ?>
                    <form method="post" class="book_now">
                    
                        <p class="ch_pwd">ĐỔI MẬT KHẨU</p>
                        <div class="em_inpt">
                            <span class="img_lock"></span>
                            <p><input type="password" class="ch_opt" placeholder="Mật khẩu cũ" name="mkc" required=""></p>
                        </div>
                        <div class="em_inpt">   
                            <span class="img_lock"></span>
                            <p><input type="password" class="ch_opt" placeholder="Mật khẩu mới" name="mkm"></p>
                        </div>
                        <div class="em_inpt">
                            <span class="img_lock"></span>
                            <p><input type="password" class="ch_opt" name="xnmkm" placeholder="Xác nhận mật khẩu"></p>
                        </div>
                        <input type="hidden" value="0" name="id">
                        <div class="em_inpt">
                            <p class="reset_pass" style="width: 25%;"></p>
                        </div>
                        <br>
                        <div class="book_now"><button class="tb_nowbook" name="change">Đổi</button></div>
                       
                    </form>
                <?php }else{?>
                    <p>Vui lòng đăng nhập để đổi mật khẩu</p>
                <?php }?>
                </div>
            </div>
        </div>  
    </div>
    <?php
        if(isset($_POST['change'])){
            $mkc= $_POST['mkc'];
            $mkm = $_POST['mkm'];
            $xnmkm = $_POST['xnmkm'];

            //mã hóa mk
            $mahoa = md5($mkc);
            $mahoamkm = md5($mkm);
            $mahoaxnmkm = md5($xnmkm);

            //kiểmtra
            $mk = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
            while($execute=mysqli_fetch_array($mk)){
                $matkhaucu = $execute['password'];
            }
            if($mahoa == $matkhaucu && $mahoamkm == $mahoaxnmkm){
                $update = mysqli_query($conn, "UPDATE `users` SET `password`='$mahoamkm',`repassword`='$mahoaxnmkm' WHERE username='$username'");
                if($update){
                    echo 
                        '<script type="text/javascript">
                            alert("Đổi mới mật khẩu thành công!");
                            window.location = "/demo1/my_trips.php";
                        </script>';
                }
                else{
                    echo 
                        '<script type="text/javascript">
                            alert("Lỗi hệ thống, vui lòng thực hiện lại!");
                            window.location = "/demo1/index.php";
                        </script>';
                }
            }
            else{
                echo 
                    '<script type="text/javascript">
                        alert("Mật khẩu không trùng khớp, vui lòng kiểm tra lại!");
                        window.location = "/demo1/index.php";
                    </script>';
            }
        }
    ?>
<?php
    include("includes/script.php");
    include("includes/footer.php");
?>