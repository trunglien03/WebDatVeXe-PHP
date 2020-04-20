<!-- Modal -->
<div class="modal fade" id="howtobuy" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <!-- Modal content-->
            <button type="button" class="close_lft" data-dismiss="modal">&times;</button>
            <form id="howtobuy" data-parsley-validate="">
            <div class="login-block">
                <h1 style="color: #31708f; font-weight: 550px;">HƯỚNG DẪN MUA VÉ</h1>
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
        <!--HEADER-BAR-END-->
        <!-- Modal -->
        <div class="modal fade" id="myModals" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <!-- Modal content-->
            <button type="button" class="close_lft" data-dismiss="modal">&times;</button>
            <form id="login" action="includes/xldn.php" method="POST" name="login">
            <div class="login-block">
                <h1>ĐĂNG NHẬP</h1>
                    <input type="text" name="username" placeholder="Tên đăng nhập" id="username" required=""/>
                    <input type="password"  name="password" placeholder="Mật khẩu" id="password" required=""/>
                    <input type="checkbox" id="checkbox3" class="css-checkbox" name="rememberme"/>
                    <label for="checkbox3" class="css-label lite-red-check">Ghi nhớ tài khoản</label>
                    <input  type="submit" value="Đăng nhập" style="position: relative;" name="Dangnhap">
                    <br>
                    <div class="small_loader" style="text-align:center;display:none"><img src="images/loader-small.gif"></div>
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
            <form data-parsley-validate="" action="includes/dangky.php" method="post">
                <div class="login-block">
                    <h1>ĐĂNG KÝ TÀI KHOẢN</h1>
                    
                    <input class="name"  name="hoten"  placeholder="Họ và tên" data-parsley-trigger="change"  
                    data-parsley-minlength="2" data-parsley-maxlength="20"/>

                    <input class="name"  name="diachi"  placeholder="Địa chỉ thường trú" data-parsley-trigger="change"/>
                    
                    <input class="mobile"  id="signup-username" type="text" name="mob" data-parsley-type="digits" data-parsley-required="true" data-parsley-trigger="change" required required minlength="3" data-parsley-minlength="3" data-parsley-maxlength="15" placeholder="Số di động">

                    <input type="text" class ="username" placeholder="Số CMND" name="cmnd"  required/>

                    <input class="name" id="register_firstname" name="name"  placeholder="Tên đăng nhập" data-parsley-required="true"  data-parsley-trigger="change"  
                    data-parsley-minlength="2" data-parsley-maxlength="20" data-parsley-pattern="^[a-zA-Z\  \/]+$" >
                    
                    <input type="password" value=""class="password" placeholder="Mật khẩu" id="dfdfd" name="password" type="password" data-parsley-maxlength="15" data-parsley-minlength="6"required=""/>
                    
                    <input type="password" data-parsley-maxlength="15" data-parsley-minlength="6" data-parsley-equalto="#dfdfd" data-parsley-equalto-message="Mật khẩu phải trùng khớp." class ="password"  required="" placeholder="Nhập lại mật khẩu" id="password" name="repassword"/><br>
                    
                    <span class="terms_tb">Đồng ý với các <a class="cond_tb" href="#">điều khoản và chính sách của chúng tôi</a></span> <br>
                    <br>
                    
                    <input type="submit" value="Đăng ký" style="position: relative;" name="Dangky" />
                    <br>
                    
                    <div class="small_loader" style="text-align:center;display:none"><img src="images/loader-small.gif"></div>
                    
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

