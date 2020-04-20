	
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TrueBus -True Bus</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="http://demo.truebus.co.in/admin/assets/css/bootstrap.min.css">
	
	
	
		<link href="http://demo.truebus.co.in/admin//assets/css/charisma-app.css" rel="stylesheet">
	    <link href="http://demo.truebus.co.in/admin//assets/css/colorbox.css" rel="stylesheet">
	
	
	
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons 
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
     <!-- Select2 -->
    <link rel="stylesheet" href="http://demo.truebus.co.in/admin/assets/css/select2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="http://demo.truebus.co.in/admin/assets/css/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://demo.truebus.co.in/admin/assets/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="http://demo.truebus.co.in/admin/assets/css/pace.css">
    <link rel="stylesheet" href="http://demo.truebus.co.in/admin/assets/css/skin-red.css">
    
    <link rel="stylesheet" href="http://demo.truebus.co.in/admin/assets/css/custom-style.css">
	
	<!--time picker-->
	<link rel="stylesheet" href="http://demo.truebus.co.in/admin/assets/css/bootstrap-timepicker.min.css">
    <!--time picker-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!--[validation css]-->

		
	<script src="http://demo.truebus.co.in/admin/assets/js/jquery.min.js"></script>	
	<link href="http://demo.truebus.co.in/admin/assets/parsley/parsley.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!--[validation css]-->
  </head>
  

  <body class="hold-transition skin-red sidebar-mini">
  	<div class="wrapper">
	        <header class="main-header">
        <!-- Logo -->
        <a href="http://demo.truebus.co.in/admin/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>T</b>B</span>
          <!-- logo for regular state and mobile devices -->
          <span class="hidden-xs">True Bus</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
				
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">				          
                  <img src="http://techlabz.in/truebusupdate/admin/assets/uploads/profile_pic/admin/1511772739_man.png" class="user-image" >
                  <span class="hidden-xs">
                    admin                  </span>
                </a>
				
				
			                  <ul class="dropdown-menu">
                  <!-- User image --> 
                  <li class="user-header">
                      <img src="http://techlabz.in/truebusupdate/admin/assets/uploads/profile_pic/admin/1511772739_man.png" class="img-circle">
                  </li>				  
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                   <li class="user-footer">
                    <div class="pull-left">
				                                  <a href="http://demo.truebus.co.in/admin/Admin_detailsview/Admin_profile_view" class="btn btn-default btn-flat">Profile</a>
					 </div>

                    <div class="pull-right">
                      <a href="http://demo.truebus.co.in/admin/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>
        </nav>
      </header>
  
  <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
		  
	<div class="user-panel">
            <div class="pull-left image">
              <img src="http://techlabz.in/truebusupdate/admin/assets/uploads/profile_pic/admin/1511772739_man.png" class="user-image left-sid" >
            </div>
            <div class="pull-left info">
              <p>admin</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
		  
          <!-- sidebar menu: : style can be found in sidebar.less -->
             <ul class="sidebar-menu">
			 
			 
			       <li class="treeview">
					  <a href="#">
						<i class="fa fa-bus"></i> <span>Bus Management</span><i class="fa fa-angle-left pull-right"></i>
					  </a>
					  <ul class="treeview-menu">
						<li><a href="http://demo.truebus.co.in/admin/Bus_details/view_busdetails"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
						<li><a href="http://demo.truebus.co.in/admin/Bus_details/add_busdetails"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
						<li><a href="http://demo.truebus.co.in/admin/Bus_details/view_bustypedetails"><i class="fa fa-circle-o text-aqua"></i>Add Bus Type</a></li>
					  </ul>
                   </li>


                   
				 
				   
			       <li class="treeview">
					  <a href="#">
						<i class="fa fa-arrows-v"></i> <span>Route Details</span><i class="fa fa-angle-left pull-right"></i>
					  </a>
					  <ul class="treeview-menu">
						<li><a href="http://demo.truebus.co.in/admin/Route_details/view_routedetails"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
						<li><a href="http://demo.truebus.co.in/admin/Route_details/add_routedetails"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
					  </ul>
                   </li>
				    
						
				
				   
				    <li class="treeview">
					  <a href="#">
						<i class="fa fa-hand-o-up"></i> <span>Board Point Details</span><i class="fa fa-angle-left pull-right"></i>
					  </a>
					  <ul class="treeview-menu">
						<li><a href="http://demo.truebus.co.in/admin/Borderpoint_details/view_borderdetails"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
						<li><a href="http://demo.truebus.co.in/admin/Borderpoint_details/add_boardpointdetails"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
					  </ul>
                   </li>
				   
				         <li>
                            <a href="#">                     
							<i class="fa fa-tint" aria-hidden="true"></i>
                            <span>Drop Point Details</span><i class="fa fa-angle-left pull-right"></i> </a>
							<ul class="treeview-menu">
							<li><a href="http://demo.truebus.co.in/admin/Droppoint_details/view_dropdetails"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
							<li><a href="http://demo.truebus.co.in/admin/Droppoint_details/add_droppointdetails"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
						  </ul>
                        </li>

                        <li class="treeview">
					  <a href="#">
						<i class="fa fa-bus"></i> <span>Promo Management</span><i class="fa fa-angle-left pull-right"></i>
					  </a>
					  <ul class="treeview-menu">
						<li><a href="http://demo.truebus.co.in/admin/Promo_details/view_promodetails"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
						<li><a href="http://demo.truebus.co.in/admin/Promo_details/add_promodetails"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
						
					  </ul>
                   </li>
			
				   
				   
				  
				        <li>
                            <a href="http://demo.truebus.co.in/admin/gallery_details/add_gallery"><i class="glyphicon glyphicon-picture"></i><span>Gallery</span></a>
                        </li>
					
					 	
						
						 <li class="treeview">
					  <a href="#">
						<i class="fa fa-asterisk" aria-hidden="true"></i><span>Agent</span><i class="fa fa-angle-left pull-right"></i>
					  </a>
					  <ul class="treeview-menu">
						<li><a href="http://demo.truebus.co.in/admin/Agent_details/view_Agent_details"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
						<li><a href="http://demo.truebus.co.in/admin/Agent_details/add_agent_details"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
					  </ul>
                   </li>
                     
					  					   <li>
                            <a href="http://demo.truebus.co.in/admin/Settings_details/view_settings"><i class="fa fa-wrench" aria-hidden="true"></i><span>Settings</span></a>
                        </li>
																	   <li>
                            <a href="http://demo.truebus.co.in/admin/Customer_details/view_customerdetails"><i class="fa fa-users" aria-hidden="true"></i><span>Customer</span></a>
                        </li>
												
						<li>
                           <a href="#">                     
							<i class="fa fa-ban" aria-hidden="true"></i><span>Cancellation</span><i class="fa fa-angle-left pull-right"></i> </a>
							<ul class="treeview-menu">
							<li><a href="http://demo.truebus.co.in/admin/Cancellation_details/view_cancellation"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
							<li><a href="http://demo.truebus.co.in/admin/Cancellation_details/add_cancellation"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
						  </ul>
                        </li>
						
						
						<li>
						   <a href="http://demo.truebus.co.in/admin/Booking_details/view_bookingdetails"><i class="fa fa-book" aria-hidden="true"></i><span>Booking Details</span></a>                     
                        </li>
						

					   <li>
							<a href="http://demo.truebus.co.in/admin/seat_layout/index"><i class="fa fa-crosshairs" aria-hidden="true"></i>
							<span>Seat Layout</span></a>
                      </li>
                     <li>
						   <a href="http://demo.truebus.co.in/admin/Rating_details/view_ratingdetails"><i class="fa fa-star" aria-hidden="true"></i><span>Rating</span></a>                     
                      </li>					  
             </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        View Customer Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-book"></i>Home</a></li>
         <li><a href="#">Customer </a></li>
         <li class="active">View Customer Details</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
                     </div>
         <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View Customer Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Name</th>
                           <th>Email</th> 					   
                           <th>Mobile</th>				                                                   
                        <!--    <th>Email</th>				 -->		   
                        
                        </tr>
                     </thead>
                     <tbody>
                                                <tr>
                           <td class="hidden">0</td>
                           <td class="center">demo</td>
                           <td class="center">test@gmail.com</td>
                          <!--   <td class="center"></td>     -->                                                
                           <td class="center">9809876567</td>                                                 
                           <!-- <td class="center"></td>                                                 
                           <td class="center"></td>  
                                               -->
                          
                        </tr>
                                                <tr>
                           <td class="hidden">1</td>
                           <td class="center">tester</td>
                           <td class="center">test@gmail.com</td>
                          <!--   <td class="center"></td>     -->                                                
                           <td class="center">5623568956</td>                                                 
                           <!-- <td class="center"></td>                                                 
                           <td class="center"></td>  
                                               -->
                          
                        </tr>
                                                <tr>
                           <td class="hidden">2</td>
                           <td class="center">tinu</td>
                           <td class="center">tinuannavarughese@gmail.com</td>
                          <!--   <td class="center"></td>     -->                                                
                           <td class="center">9876543212</td>                                                 
                           <!-- <td class="center"></td>                                                 
                           <td class="center"></td>  
                                               -->
                          
                        </tr>
                                                <tr>
                           <td class="hidden">3</td>
                           <td class="center">jojo</td>
                           <td class="center">jojo@gmail.com</td>
                          <!--   <td class="center"></td>     -->                                                
                           <td class="center">987654321</td>                                                 
                           <!-- <td class="center"></td>                                                 
                           <td class="center"></td>  
                                               -->
                          
                        </tr>
                                             </tbody>
                     <tfoot>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Name</th>
                           <th>Email</th> 
                           <th>Mobile</th>                        
                           <<!-- th>Age</th>                     
                         
                           <th>Mobile</th>                                                               
                           <th>Email</th>    -->                
                       
                        </tr>
                     </tfoot>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>

<div class="modal fade modal-wide" id="popup-bookingpointModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">View Booking Details</h4>
         </div>
         <div class="modal-bookingbody">
         </div>
         <div class="business_info">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>

     
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2015-2016 <a href="#">Techware Solution</a>.</strong> All rights reserved.
      </footer>
    
    </div>
  	<script>
	
	base_url = "http://demo.truebus.co.in/admin/";
	config_url = "http://demo.truebus.co.in/admin/";
	</script>
    <!-- jQuery 2.1.4 -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
    <script src="http://demo.truebus.co.in/admin/assets/js/jQuery-2.1.4.min.js"></script>
	<!--<script src="assets/js/app.min.js"></script>-->
	 <script src="http://demo.truebus.co.in/admin/assets/js/sortables.js"></script>
	  <script src="http://demo.truebus.co.in/admin/assets/js/app.js"></script>
     <script src="http://demo.truebus.co.in/admin/assets/js/app-test.js"></script>
    
    <!-- Bootstrap 3.3.5 -->
    <script src="http://demo.truebus.co.in/admin/assets/js/bootstrap.min.js"></script>
    <script src="http://demo.truebus.co.in/admin/assets/js/pace.js"></script>
    <!-- Select2 -->
    <script src="http://demo.truebus.co.in/admin/assets/js/select2.min.js"></script>
    
    <!-- DataTables -->
    <script src="http://demo.truebus.co.in/admin/assets/js/jquery.dataTables.min.js"></script>
    <script src="http://demo.truebus.co.in/admin/assets/js/dataTables.bootstrap.min.js"></script>
	
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
	
	
	<!-- plugin for gallery image view Ragu -->
   <script src="http://demo.truebus.co.in/admin//assets/js/jquery.colorbox-min.js"></script>
   <!-- application script for Charisma demo Ragu -->
   <script src="http://demo.truebus.co.in/admin//assets/js/charisma.js"></script>
   <script src="http://demo.truebus.co.in/admin//assets/js/chosen.jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
	
    <!-- FastClick 
    <script src="../../plugins/fastclick/fastclick.min.js"></script>-->
    <!-- AdminLTE App -->
    <script src="http://demo.truebus.co.in/admin/assets/js/app.min.js"></script>
    
    <script src="http://demo.truebus.co.in/admin/assets/js/custom-script.js"></script>
	
	<script src="http://demo.truebus.co.in/admin/assets/js/immanucustom-script.js"></script>
	
	
	 <script src="http://demo.truebus.co.in/admin/assets/js/jquery.raty.min.js"></script>
	
	<!--time picker-->
    <script src="http://demo.truebus.co.in/admin/assets/js/bootstrap-timepicker.min.js"></script>
	<!--[validation js]-->
	 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script src="http://demo.truebus.co.in/admin/assets/js/parsley.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--[validation js]-->
	<script>
	 $(function () {
	   $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
    <script>
   $(function () {
    $( "#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
     $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
	<!--time picker-->
<!--Cancellation Time Picker-->	
	<script>
	 $(function () {
	   $("#timepicker_cancellation").timepicker({
          showInputs: false,
		  //defaultTime: false,
		  showMeridian: false,
		 /* $('#timepicker_cancellation').timepicker({
                minuteStep: 1,
                template: 'modal',
                appendWidgetTo: 'body',
                //showSeconds: false,
                //showMeridian: false,
                defaultTime: false
            });*/
		  
		  
		  
		  
		  
        });
 });
    </script>
<!--time picker-->

    
    <!-- CK Editor -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
		
		$('.datatable').DataTable({
			"ordering" : $(this).data("ordering"),
			"order": [[ 0, "desc" ]]
        });
		
	  });
	</script>
	
	 <script>
function doconfirm()
{
    job=confirm("Are you sure to delete permanently?");
     if(job!=true)
    {
        return false;
    }
}
</script>
	 <script>
 
//Multi Select Box 				   
$(document).ready(function() {			
				 
$(".js-example-basic-multiple").select2();   
				   
});
</script>
<script type="text/javascript">
    /*tinymce.init({
         selector: "textarea",
   
  height: 230,
  plugins: 'link image code',
  relative_urls: false,
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]

    });*/
</script>


	
	
	
	
  </body>
</html>
