<!DOCTYPE html>
<html  ng-app='myFrontend'>
   <head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="La Quỳnh Như-B1505791s">
      <link rel="shortcut icon" type="image/png" href="images/logo1.png"/>
      <title>QN BUS | HỆ THỐNG ĐẶT VÉ XE TRỰC TUYẾN</title>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
      <!-- custom CSS -->
      <link href="http://demo.truebus.co.in/assets/css/bootstrap.css" rel="stylesheet">
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <link href="http://demo.truebus.co.in/assets/css/parsley.css" rel="stylesheet">
      <!--   <link href="http://demo.truebus.co.in/assets/css/datepicker3.css" rel="stylesheet"> -->
      <link href="http://demo.truebus.co.in/assets/css/datepick.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Bootstrap core CSS -->   
   <style>
   [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
   display: none !important;
   }
   </style>
   
   <script src="http://demo.truebus.co.in/assets/js/jquery.js"></script> 
   <!--script src="http://demo.truebus.co.in/assets/js/jquery.js"></script--> 

   <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
      
   <script src="http://demo.truebus.co.in/assets/js/jquery.raty.js"></script>
</head>

<body >
<!--HEADER-BAR-->
   <div class="tb_header">
      <div class="container-fluid">
         <div class="col-md-5" style="padding:0;">
            <div class="tb_logo"> 
               <a href="index.html">
                  <img src="images/Capture.PNG">
               </a>
            </div>
         </div>
            <div class="col-md-5" style="padding:0;">
               <div class="tb_navbar">
                  <ul>
                     <li>
                        <a href="index.html">Trang chủ &nbsp;<span style="color:#f0a2a3;"> |</span></a>
                     </li>
                     <li>
                        <a href="#howtobuy" data-toggle="modal" data-target="#howtobuy">Hướng dẫn mua vé &nbsp;<span style="color:#f0a2a3;"> |</span></a>
                     </li>
                     <li>
                        <a href="#myModals" data-toggle="modal" data-target="#myModals">Vé đã mua &nbsp;<span style="color:#f0a2a3;"> |</span></a>
                     </li>
                     <li>
                        <a href="#myModals" data-toggle="modal" data-target="#myModals">Hủy vé &nbsp;<span style="color:#f0a2a3;"></span></a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-md-2" style="padding:0;">
               <div class="signin_up">
                  <ul>
                     <li>
                        <a href="#myModals" data-toggle="modal" data-target="#myModals">Đăng nhập</a>  <span style="color:#f0a2a3;">/</span>
                     </li>
                     <li>
                        <a href="#myModal" data-toggle="modal" data-target="#myModal">Đăng ký</a>
                     </li>
                  </ul>
               </div>
            <!------logged end---------------->
            </div>
         </div>
         <div class="shadow"><img src="http://demo.truebus.co.in/assets/images/shadow.png"></div>
         </div>
         <!--HEADER-BAR-END-->
         <!-- Modal -->
         <div class="modal fade" id="howtobuy" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
               <!-- Modal content-->
               <button type="button" class="close_lft" data-dismiss="modal">&times;</button>
               <form id="howtobuy" data-parsley-validate="">
               <div class="login-block">
                  <h1>HƯỚNG DẪN MUA VÉ</h1>
                  <div class="list-type1">
                     <ol>
                        <li><a href="#">Chọn thông tin hành trình</a></li>
                        <li><a href="#">Chọn thông tin chuyến, giờ khởi hành, điểm rước và thông tin rước</a></li>
                        <li><a href="#">Chọn hình thức thanh toán</a></li>
                        <li><a href="#">Điền thông tin thanh toán phù hợp</a></li>
                     </ol>
                  </div>
               </div>
               </form>
            </div>
      </div>
         <div class="modal fade" id="myModals" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
               <!-- Modal content-->
               <button type="button" class="close_lft" data-dismiss="modal">&times;</button>
               <form id="login" data-parsley-validate="">
               <div class="login-block">
                  <h1>Đăng nhập</h1>
                  <input type="text" name="username" placeholder="Email" class ="username" id="username" required=""/>
                  <input type="password" class="password" name="password" placeholder="Password" id="password" required=""/>
                  <input type="checkbox" id="checkbox3" class="css-checkbox" name="rememberme"/>
                  <label for="checkbox3"   class="css-label lite-red-check">Ghi nhớ tài khoản</label>
                  
                  <input  type="button" value="Login" style="position: relative;" onclick="Login()">
                  <br>
                  <div class="small_loader" style="text-align:center;display:none"><img src="http://demo.truebus.co.in/assets/images/loader-small.gif"></div>
                  <div class="login_res" style="text-align:center;"></div>
                  <br>
                  <div class="forgot"><a data-dismiss="modal" href="#myModalf"data-toggle="modal" data-target="#myModalf">Quên mật khẩu?</a></div>
                  <div class="sign_in"><a  data-dismiss="modal" href="#myModal" data-toggle="modal" data-target="#myModal">Đăng ký</a></div>
               </div>
               </form>
            </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog">
               <!-- Modal content-->
               <button type="button" class="close_lft" data-dismiss="modal">&times;</button>
               <form id="signup" data-parsley-validate="">
                  <div class="login-block">
                     <h1>Đăng ký tài khoản</h1>
                     <input class="name" id="register_firstname" name="name"  placeholder="Name" data-parsley-required="true"  data-parsley-trigger="change"  
                     data-parsley-minlength="2" data-parsley-maxlength="20" data-parsley-pattern="^[a-zA-Z\  \/]+$" >
                     <input type="email" value=""class ="username" placeholder="Email" name="username"  required/>
                     <input class="mobile"  id="signup-username" type="text" name="mob" data-parsley-type="digits" data-parsley-required="true" data-parsley-trigger="change" required required minlength="3" data-parsley-minlength="3" data-parsley-maxlength="15" placeholder="Mobile">
                     <input type="password" value=""class="password" placeholder="Password" id="dfdfd" name="password" type="password" data-parsley-maxlength="15" data-parsley-minlength="6"required=""/>
                     <input type="password" data-parsley-maxlength="15" data-parsley-minlength="6" data-parsley-equalto="#dfdfd" data-parsley-equalto-message="Password confirmation must match the password." class ="password"  required="" placeholder="Repeat Password" id="password" /><br>
                     <span class="terms_tb">Đồng ý với các <a class="cond_tb" href="#">điều khoản và chính sách của chúng tôi</a></span> <br>
                  <br>
                  
                  <input  type="button" value="Sign up" style="position: relative;" onclick="Signup()">
                  <br>
                  <div class="small_loader" style="text-align:center;display:none"><img src="http://demo.truebus.co.in/assets/images/loader-small.gif"></div>
                  <div class="signup_res" style="text-align:center;"></div>
                  <br>
                  <div class="account"><a data-dismiss="modal" href="#myModals"data-toggle="modal" data-target="#myModals">Bạn đã có tài khoản?</a></div>
                  <div class="sign_in"><a data-dismiss="modal" href="#myModals"data-toggle="modal" data-target="#myModals">Đăng nhập!</a></div>
               </div>
               </form>
            </div>
         </div>
         <div class="modal fade" id="myModalf" role="dialog">
            <div class="modal-dialog">
               <!-- Modal content-->
               <button type="button" class="close_lft" data-dismiss="modal">&times;</button>
               <form id="forgot" data-parsley-validate="">
               <div class="login-block">
                  <h1>Quên mật khẩu?</h1>
                  <input type="email" name="email" placeholder="Email" class="username"  data-parsley-required="true"/>
               <!--    <span class="terms_tb">By signing up, you agree to our <a class="cond_tb" href="#">Terms and Conditions.</a></span> <br>
                  <br> -->
                  <input  type="button" value="RESET" style="position: relative;" onclick="Forgot()">
                  
                  <br>
                   <div class="small_loader" style="text-align:center;display:none"><img src="http://demo.truebus.co.in/assets/images/loader-small.gif"></div>
                  <div class="forgot_res" style="text-align:center;"></div>
                  <br>
                  <div class="account"><a href="#">Bạn đã có tài khoản?</a></div>
                  <div class="sign_in"><a data-dismiss="modal" href="#myModals"data-toggle="modal" data-target="#myModals">Đăng nhập!</a></div>
               </div>
               </form>
            </div>
        </div>
        
        <!--SEARCH-BAR-->
        <div class="container" ng-controller="search">
            <div class="row" style="min-height:400px;margin-top:100px; margin-bottom: 10px;">
                <div class="col-md-6">
                <form id="myForm" method="post" data-parsley-validate="" autocomplete="off">
                    <section id="Search" class="LB XXCN  P20">
                        <h1 class="bookTic XCN TextSemiBold">MUA VÉ TRỰC TUYẾN</h1>
                           <div class="searchRow clearfix">
                              <div style="width: 70%;">
                                 <label style="margin-right: 20px;">
                                    <input type="radio" name="colorCheckbox" value="red" checked> Một chiều
                                 </label>
                                 <label>
                                    <input type="radio" name="colorCheckbox" value="green"> Khứ hồi
                                 </label>
                              </div>
                              <div class="form-a">
                                 <div class="LB">
                                 <label class="inputLabel" style="font-size: 15px;"><strong>Điểm khởi hành</strong></label>
                                 <input id="board_point"  class="XXinput searching" placeholder="Enter a city" type="text"  data-id="board_point" autocomplete="off" data-parsley-error-message="Please select a source city" tabindex="1" required/>
                                 <div class="errorMessageFixed"> </div>
                                 </div>
                                 <span class="switchButton" id="switchButton"></span>
                                 <div class="searchRight NoPaddingRight">
                                    <label class="inputLabel" style="font-size: 15px;"><strong>Điểm đến</strong></label>
                                    <input id="Destination" class="XXinput searching" placeholder="Enter a city" type="text" tabindex="2" data-id="drop_point"  autocomplete="off" data-parsley-error-message="Please select a destination city" required />
                                    <div class="errorMessageFixed"> </div>
                                 </div>
                                 <div class="searchRow clearfix">
                                    <div class="LB">
                                       <label class="inputLabel" style="font-size: 15px;"><strong>Ngày khởi hành</strong></label>
                                       <span class="blackTextSmall"></span>
                                       <input id="Calenderfrom" class="XXinput calendar date-pick  pickup_date pickup_datef Calenderfrom" placeholder="dd-mm-yyyy" readonly type="text" title="Date in the format dd-mmm-yyyy"  tabindex="3" />
                                    </div>
                                    <div class="searchRight retJouney">
                                       <label class="inputLabel" style="font-size: 15px;"><strong>Số lượng vé</strong></label>
                                       <select name="people" class="XXinput searching" required>
                                          <option value="1" selected>1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
                                          <option value="7">7</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-b" style="display: none">
                                 <div class="LB">
                                    <label class="inputLabel" style="font-size: 15px;"><strong>Điểm khởi hành</strong></label>
                                    <input id="board_point"  class="XXinput searching" placeholder="Enter a city" type="text"  data-id="board_point" autocomplete="off" data-parsley-error-message="Please select a source city" tabindex="1" required/>
                                    <div class="errorMessageFixed"> </div>
                                 </div>
                                 <span class="switchButton" id="switchButton"></span>
                                 <div class="searchRight NoPaddingRight">
                                    <label class="inputLabel" style="font-size: 15px;"><strong>Điểm đến</strong></label>
                                    <input id="Destination" class="XXinput searching" placeholder="Enter a city" type="text" tabindex="2" data-id="drop_point"  autocomplete="off" data-parsley-error-message="Please select a destination city" required />
                                    <div class="errorMessageFixed"> </div>
                                 </div>
                                 <div class="searchRow clearfix">
                                    <div class="LB">
                                    <label class="inputLabel" style="font-size: 15px;"><strong>Ngày khởi hành</strong></label>
                                    <span class="blackTextSmall"></span>
                                    <input id="Calenderfrom" class="XXinput calendar date-pick  pickup_date pickup_datef Calenderfrom" placeholder="dd-mm-yyyy" readonly type="text" title="Date in the format dd-mmm-yyyy"  tabindex="3" />
                                 </div>
                                 <div class="searchRight retJouney">
                                    <label class="inputLabel" style="font-size: 15px;"><strong>Ngày về</strong><span class="opt">&nbsp;(Optional)</span></label>
                                    <input id="Calenderreturn" class="XXinput calendar date-pick pickup_dater" placeholder="dd-mm-yyyy" type="text" title="Date in the format dd-mmm-yyyy" readonly  tabindex="4" />
                                 </div>
                                 <div class="searchRow clearfix">
                                    <div class="LB">
                                       <label class="inputLabel" style="padding-top:10px; font-size: 15px;"><strong>Số lượng vé</strong></label>
                                       <select name="people" class="XXinput searching" required>
                                          <option value="1" selected>1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
                                          <option value="7">7</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        <div class="dateError">Vui lòng chọn ngày phù hợp!</div>
                           <button class="RB Xbutton" id="searchBtn" ng-click="homesearch()">Mua vé</button>
                           <button class="button reset_new" id="resetBtn" ng-click="resetbtn()">Làm lại</button>
                     </div>
                  </section>
                  </form>
               </div>
               <div class="col-md-6">
                  <div class="tb_bus">
                     <img src="http://demo.truebus.co.in/assets/images/bus.png">
                  </div>
               </div>

            <div class="row" style="margin-bottom: 10px;">
               <div class="col-md-12">
                  <p style="color: #e24648; padding-left:12px; line-height:2;">
                  *** Quý hành khách có thể đặt vé qua tổng đài phục vụ <strong>24/24</strong> của chúng tôi 
                  (kể cả thứ 7<br> và Chủ Nhật): <strong>1900 6067</strong> hoặc mua vé tiện lợi ngay trên chiếc điện thoại thông 
                  minh của<br> quý vị thông qua app <strong>TRUST Bus </strong>trên cả hai hệ điều hành phổ biến nhất hiện nay 
                  là IOS <br>và Android
               </p>  
               </div>
            </div>
        </div>
        </div>
         <!--SEARCH-BAR-END-->
         <!--operator-BAR-->
         <div class="tb_operator">
            <div class="container">
               <div class="tb_inner">
                  <div class="row">
                     <div class="wrapper">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                           <div class="tb_operator">
                              <img src="http://demo.truebus.co.in/assets/images/routte.png"> &nbsp;<span class="tb_operator1">Hơn 100<small class="smalls">TUYẾN ĐƯỜNG </small></span>
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
                  </hr>
               </div>
            </div>
         </div><!--list-BAR-->
         <div class="container">
            <div class="rb_list">
               <div class="row">
                  <div class="wrapper">
                     <div class="tb_inner">
                        <div class="col-md-3">
                           <div class="footer_main">
                              <h4 class="tb_head">CHẤP NHẬN THẺ</h4>
                              <div class="tb_route_list">
                                 <img src="images/PayUMoney.jpg" width="150" height="140">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="footer_main">
                              <h4 class="tb_head">VỀ CHÚNG TÔI</h4>
                              <div class="tb_route_list">
                                 <ul>
                                    <li><a href="#">Giới thiệu</a></li>
                                    <li><a href="#">Chính sách hoạt động </a></li>
                                    <li><a href="#">Chính sách bảo mật</a></li>
                                    <li><a href="#">Giới thiệu App </a> </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="footer_main">
                              <h4>&nbsp;DỊCH VỤ</h4>
                              <div class="tb_route_list">
                                 <ul>
                                    <li><a href="#">Vận chuyển hành khách</a></li>
                                    <li><a href="#">Vận chuyển hàng hóa</a></li>
                                    <li><a href="#">Dịch vụ taxi</a></li>
                                    <li><a href="#">Trạm dừng</a>  </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="footer_main">
                              <h4 class="tb_head">TUYỂN DỤNG</h4>
                              <div class="tb_route_list">
                                 <ul>
                                    <li><a href="#">Tài xế trung chuyển</a></li>
                                    <li><a href="#">Tài xế theo tuyến</a></li>
                                    <li><a href="#">Nhân viên bán vé</a></li>
                                    <li><a href="#">Nhân viên kinh doanh</a></li>
                                    <li><a href="#">Tiếp viên chăm sóc khách hàng</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <hr class="border2">
            </hr>
         </div>
         <!--list-BAR end-->
         <!--footer-BAR-->
         <div class="container">
         <div class="row">
         <div class="tb_inner">
         <div class="col-md-9">
         <div class="tb_footer">
         <ul>
         <li><a href="#">Giới thiệu &nbsp;|</a></li>
         <li><a href="#">Hỏi & đáp   &nbsp;|</a></li>
         <li><a href="#">Dịch vụ  &nbsp;|</a></li>
         <li><a href="#">Khuyến mãi  &nbsp; |</a></li>
         <li><a href="#">Liên hệ   &nbsp;|</a></li>
         <li><a href="#">Chính sách sử dụng   &nbsp;|</a></li>
         <li><a href="#">Chính sách bảo mật   &nbsp;|</a></li>
         <li><a href="#">Ứng dụng điện thoại .</a></li>
         </ul>
         </div>
         <div class="col-md-3">
         <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
         </div>
         </div>
         </div>
         </div> <script>
   
   </script>
   <!--   custom JavaScript -->

   <script src="http://demo.truebus.co.in/assets/js/angular/angular.js"></script>
   <script src="http://demo.truebus.co.in/assets/js/dirPagination.js"></script>
      <script src="http://demo.truebus.co.in/assets/js/search.js"></script>
      <script src="http://demo.truebus.co.in/assets/js/service.js"></script>
      <script src="http://demo.truebus.co.in/assets/js/truebus.js"></script>
      <script src="http://demo.truebus.co.in/assets/js/rating.js"></script>   
      <script src="http://demo.truebus.co.in/assets/js/bootstrap.js"></script>
      <script src="http://malsup.github.com/jquery.form.js"></script>
      

      <script src="http://demo.truebus.co.in/assets/js/jquery-datepicker.js"></script>
       
      <script src="http://demo.truebus.co.in/assets/js/custom.js"></script>
      
    
    <script src="http://demo.truebus.co.in/assets/js/parsley.min.js"></script>
    
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     
   <script>
      $( document ).ready(function() {
         
            $('#pickDate').click(function (e) {
               $(this).next().datepicker('show');
         });
      $(".pickup_date").datepicker({
      
            minDate: 0//this option for allowing user to select from year range
         }); 
            
      
         $(".returnsd").datepicker({
            
            minDate: new Date($(".datetimepicker4").val())
            
      //this option for allowing user to select from year range
         }); 
         $(".pickup_date").on('change',function(e){
         
         $("#Calenderreturn").datepicker({
            
            minDate: new Date($(".Calenderfrom").val())
            
      //this option for allowing user to select from year range
         }); 
         }); 
         /*$(".date_of_birth").datepicker({
            changeYear: 'true',
               changeMonth: 'true'
            
         });*/
         /* $(".datepicker").datepicker({
            autoclose:'true',
            changeYear: 'true',
            changeMonth: 'true',
            yearRange: "2005:2015"
            
         });*/
         /*  var sd = new Date();
            var new_date=sd-60;
         
            $( ".date_picker" ).datepicker({
               changeMonth: 'true',
               changeYear: true,
               
               maxDate:  new Date()
            

         });*/
         /* $('.datepicker').datepicker({
      minDate: new Date(2014, 10, 30),
      maxDate: new Date(2015, 2, 5),
      setDate: new Date(2014, 10, 30)
   });*/
         $('ul.tabs li').click(function(){
               var id = $(this).data('id');
               //alert(id);
         var tab_id = $(this).attr('data-tab');

               $('ul.tabs li').removeClass('current');
               $('.tab-content').removeClass('current');

               $(this).addClass('current');
               $("#"+tab_id).addClass('current');
               
               $('#pament_option').val(id);
         });
   });

   </script>
   <script type="text/javascript">
$(document).ready(function() {
  $('input[name=colorCheckbox]:radio').change(function(e) {
    let value = e.target.value.trim()

    $('[class^="form"]').css('display', 'none');

    switch (value) {
      case 'red':
        $('.form-a').show()
        break;
      case 'green':
        $('.form-b').show()
        break;
      default:
        break;
    }
  })
})
</script>
  </body>
</html>
