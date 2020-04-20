<!DOCTYPE html>
<html  ng-app='myFrontend'>
   <head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
         <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">
      
	  <link rel="shortcut icon" type="image/png" href="http://demo.truebus.co.in/admin/assets/uploads/favicons/1495099426_bus1.jpg"/>
      <title>True Bus :Cancel your Bus Tickets  | Online Bus Ticket Booking, Book Volvo AC Bus Tickets, Reservation</title>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
      <!-- custom CSS -->
	  <link href="http://demo.truebus.co.in/assets/css/bootstrap.css" rel="stylesheet">
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
       <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <link href="http://demo.truebus.co.in/assets/css/truebus.css" rel="stylesheet">
      <link href="http://demo.truebus.co.in/assets/css/parsley.css" rel="stylesheet">
    <!--   <link href="http://demo.truebus.co.in/assets/css/datepicker3.css" rel="stylesheet"> -->
      <link href="http://demo.truebus.co.in/assets/css/datepick.css" rel="stylesheet">
      

	 
	  
      <!-- Bootstrap core CSS -->
      
      <style>
  [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
  display: none !important;
}
</style>
     
      
       
      <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
      <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
       
    
      <script src="http://demo.truebus.co.in/assets/js/jquery.js"></script> 
 <!--script src="http://demo.truebus.co.in/assets/js/jquery.js"></script--> 
	  
	  
      <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
	   
   <script src="http://demo.truebus.co.in/assets/js/jquery.raty.js"></script>
 
    
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
	    
   </head>
  

 
  <body >
  
	    
	   <!--HEADER-BAR-->
         <div class="tb_header">
            <div class="container">
               <div class="col-md-6" style="padding:0;">
                  <div class="tb_logo"> <a href="http://demo.truebus.co.in/home"><img src="http://demo.truebus.co.in/admin/assets/uploads/logo/1544094363_tb-logo.png"> </a> </div>
               </div>
               <div class="col-md-4" style="padding:0;">
                  <div class="tb_navbar">
                     <ul>
                        <li><a href="http://demo.truebus.co.in/">Home &nbsp;<span style="color:#f0a2a3;"> |</span></a></li>
                                            
                        <li> 
                           
                           <a href="http://demo.truebus.co.in/printsms">Print/SMS Ticket &nbsp;  <span style="color:#f0a2a3;"> |</span></a>
                                                     </li>
                        <li>
                            

                           <a href="http://demo.truebus.co.in/cancellation">Easy Cancel/Refund</a>


                           
                            </li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-2" style="padding:0;">
			   
								  
				  
				     <!------logged in---------------->
                            
                                 <div class="dropdown_lis">
<button onclick="myFunction()" class="dropbtn">Hai... demo  &nbsp; <i class="fa fa-user"></i></button>        
     
                 <div id="tabs" class="dropdown-content">
    <a href="http://demo.truebus.co.in/myaccount/index"> <i class="fa fa-bookmark"></i>&nbsp;
 My Trips</a>
  
   
    <a href="http://demo.truebus.co.in/logout"> <i class="fa fa-sign-out"></i>&nbsp;
 Sign out</a>
  </div>
</div>  
                             <!------logged end---------------->
               </div>
            </div>
            <div class="shadow"><img src="http://demo.truebus.co.in/assets/images/shadow.png"></div>
         </div>
         <!--HEADER-BAR-END-->
         <!-- Modal -->
         <div class="modal fade" id="myModals" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
               <!-- Modal content-->
               <button type="button" class="close_lft" data-dismiss="modal">&times;</button>
			   <form id="login" data-parsley-validate="">
               <div class="login-block">
                  <h1>Login</h1>
                  <input type="text" name="username" placeholder="Email" class ="username" id="username" required=""/>
                  <input type="password" class="password" name="password" placeholder="Password" id="password" required=""/>
                  <input type="checkbox" id="checkbox3" class="css-checkbox" name="rememberme"/>
                  <label for="checkbox3"   class="css-label lite-red-check">Remember Me</label>
                  
				  <input  type="button" value="Login" style="position: relative;" onclick="Login()">
				   <br>
                  <div class="small_loader" style="text-align:center;display:none"><img src="http://demo.truebus.co.in/assets/images/loader-small.gif"></div>
				  <div class="login_res" style="text-align:center;"></div>
                  <br>
                  <div class="forgot"><a data-dismiss="modal" href="#myModalf"data-toggle="modal" data-target="#myModalf">Forgot Password?</a></div>
                  <div class="sign_in"><a  data-dismiss="modal" href="#myModal" data-toggle="modal" data-target="#myModal">Sign Up</a></div>
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
                  <h1>Sign Up</h1>
                  <input class="name" id="register_firstname" name="name"  placeholder="Name" data-parsley-required="true"  data-parsley-trigger="change"  
                                data-parsley-minlength="2" data-parsley-maxlength="20" data-parsley-pattern="^[a-zA-Z\  \/]+$" >
                  <input type="email" value=""class ="username" placeholder="Email" name="username"  required/>
				  <input class="mobile"  id="signup-username" type="text" name="mob" data-parsley-type="digits" data-parsley-required="true" data-parsley-trigger="change" required required minlength="3"
data-parsley-minlength="3" data-parsley-maxlength="15" placeholder="Mobile">
                  <input type="password" value=""class="password" placeholder="Password" id="dfdfd" name="password" type="password" data-parsley-maxlength="15" data-parsley-minlength="6"required=""/>
                  <input type="password" data-parsley-maxlength="15" data-parsley-minlength="6" data-parsley-equalto="#dfdfd" data-parsley-equalto-message="Password confirmation must match the password." class ="password"  required="" placeholder="Repeat Password" id="password" /><br>
                  <span class="terms_tb">By signing up, you agree to our <a class="cond_tb" href="#">Terms and Conditions.</a></span> <br>
                  <br>
                  
				  <input  type="button" value="Sign up" style="position: relative;" onclick="Signup()">
                  <br>
				   <div class="small_loader" style="text-align:center;display:none"><img src="http://demo.truebus.co.in/assets/images/loader-small.gif"></div>
				  <div class="signup_res" style="text-align:center;"></div>
                  <br>
                  <div class="account"><a data-dismiss="modal" href="#myModals"data-toggle="modal" data-target="#myModals">Already have an account?</a></div>
                  <div class="sign_in"><a data-dismiss="modal" href="#myModals"data-toggle="modal" data-target="#myModals">Sign In</a></div>
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
                  <h1>Forgot Password</h1>
                  <input type="email" name="email" placeholder="Email" class="username"  data-parsley-required="true"/>
                
               <!--    <span class="terms_tb">By signing up, you agree to our <a class="cond_tb" href="#">Terms and Conditions.</a></span> <br>
                  <br> -->
                 
				  <input  type="button" value="RESET" style="position: relative;" onclick="Forgot()">
                  
                  <br>
				   <div class="small_loader" style="text-align:center;display:none"><img src="http://demo.truebus.co.in/assets/images/loader-small.gif"></div>
				  <div class="forgot_res" style="text-align:center;"></div>
                  <br>
                  <div class="account"><a href="#">Already have an account?</a></div>
                  <div class="sign_in"><a data-dismiss="modal" href="#myModals"data-toggle="modal" data-target="#myModals">Sign In</a></div>
               </div>
			   </form>
            </div>
         </div>
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   

  <div class="container">
            <div class="row" style="min-height:400px;margin-top:120px;">
      <div class="col-md-2"></div>
       <div class="col-md-8">
         <div class="cancellation_tb">
           <h4 class="ticket_cancel">Ticket cancellation and refund</h4>
           <p class="ticket_des">Follow our simple and hassle-free 2 step process to cancel your ticket. Once your ticket is cancelled, stay <br>constantly informed on the status of your refund. Get going with it right away! </p>
         </div>
         
         
         
           <div class="card"> Enter your details below </div>
  <div class="card">

    
     
     <form id="canceled" data-parsley-validate="">
      <div class="input-container">
        <input type="text" name="booking_id" id="booking_id" required=""/>
        <label for="Ticket Number">Ticket Number</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="email" name="username" id="email" required=""/>
        <label for="Password">email</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
       
       <input  type="button" value="Cancel" style="position: relative;" onclick="get_cancelticket()">
             <div class="small_loader" style="text-align:center;display:none"><img src="http://demo.truebus.co.in/assets/images/loader-small.gif"></div>
                <div class="login_res" style="text-align:center;"></div>
      </div>
    
     
    </form>
  </div>
         
        </div>
         <div class="col-md-2"></div>
        
            </div>
         </div><!--list-BAR-->
         <div class="container">
            <div class="rb_list">
               <div class="row">
                  <div class="wrapper">
                     <div class="tb_inner">
                        <div class="col-md-3">
                           <div class="footer_main">
                              <h4 class="tb_head">Top Bus Routers</h4>
                              <div class="tb_route_list">
                                 <ul>
                                    <li><a href="#">Hyderabad to Bangalore</a></li>
                                    <li><a href="#">Pune to Bangalore </a></li>
                                    <li><a href="#">Hyderabad to Chennai</a></li>
                                    <li><a href="#">Coimbatore to Bangalore </a> </li>
                                    <li><a href="#">Chennai to Madurai</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="footer_main">
                              <h4 class="tb_head">Top Cities</h4>
                              <div class="tb_route_list">
                                 <ul>
                                    <li><a href="#">Hyderabad to Bangalore</a></li>
                                    <li><a href="#">Pune to Bangalore </a></li>
                                    <li><a href="#">Hyderabad to Chennai</a></li>
                                    <li><a href="#">Coimbatore to Bangalore </a> </li>
                                    <li><a href="#">Chennai to Madurai</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="footer_main">
                              <h4>&nbsp;</h4>
                              <div class="tb_route_list">
                                 <ul>
                                    <li><a href="#">Hyderabad to Bangalore</a></li>
                                    <li><a href="#">Pune to Bangalore</a></li>
                                    <li><a href="#">Hyderabad to Chennai</a></li>
                                    <li><a href="#">Coimbatore to Bangalore</a>  </li>
                                    <li><a href="#">Chennai to Madurai</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="footer_main">
                              <h4 class="tb_head">Top Bus Operators</h4>
                              <div class="tb_route_list">
                                 <ul>
                                    <li><a href="#">Hyderabad to Bangalore</a></li>
                                    <li><a href="#">Pune to Bangalore</a></li>
                                    <li><a href="#">Hyderabad to Chennai</a></li>
                                    <li><a href="#">Coimbathroe to Bangalore</a></li>
                                    <li>
                                       <a href="#">
                                          Chennai to Madurai
                                    </li>
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
         <li><a href="#">About TrueBus &nbsp;|</a></li>
         <li><a href="#">FAQ   &nbsp;|</a></li>
         <li><a href="#">Careers  &nbsp;|</a></li>
         <li><a href="#">TrueBus Coupons  &nbsp; |</a></li>
         <li><a href="#">Contact Us   &nbsp;|</a></li>
         <li><a href="#">Terms of Use   &nbsp;|</a></li>
         <li><a href="#">Privacy Policy   &nbsp;|</a></li>
         <li><a href="#">TrueBus on Mobilenew .</a></li>
         </ul>
         </div>
         <div class="footer_con">  &#169;  2016 <a href="https://techware.co.in/" style="text-decoration:none;">Techware Solution</a></div>
         </div>
         <div class="col-md-3">
         <div class="tb_social">
         <ul>
         <li>  <a href="#"><img src="http://demo.truebus.co.in/assets/images/facebook.png"></a> </li> 
         <li>  <a href="#"> <img src="http://demo.truebus.co.in/assets/images/twitter.png"></a></li>
         <li>  <a href="#">  <img src="http://demo.truebus.co.in/assets/images/google.png"></a></li>
         </ul>
         </div>
		 <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
         </div>
         </div>
         </div>
         </div>	<script>
	
	base_url = "http://demo.truebus.co.in/";
	
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
  </body>
</html>
