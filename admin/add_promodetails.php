 <?php
  include("includes/header.php");
  include("includes/sidebar.php");
 ?>

<!-- Add promo code Management in admin-side created by Anju MS on 08-12-2016-->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>THÊM MỚI KHUYẾN MÃI</h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="glyphicon glyphicon-th-list"></i>Đặt chỗ/Bán vé</a></li>
        <li><a href="view_promodetails.php">Khuyến mãi</a></li>
        <li class="active">Thêm khuyến mãi</li>
      </ol>
   </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12"></div>
        <div class="col-md-12">
          <!-- general form elements -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Chi tiết khuyến mãi</h3>
              </div>
            <!-- /.box-header -->
            <!-- form start -->
			        <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="col-md-6">
                    <div class="form-group has-feedback">
                      <label for="exampleInputEmail1">ID khuyến mãi</label>
                        <input tabindex="1"type="text" class="form-control required" data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="id_khuyenmai"  placeholder="Mã khuyến mãi">
                        <span class="glyphicon  form-control-feedback"></span>
                    </div>   
                    <div class="form-group has-feedback">
                      <label for="exampleInputEmail1">Trạng thái</label>
                      <!-- <input type="text" class="form-control required" data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="status"  placeholder="Type"> -->
                        <select  tabindex="3"class="form-control required" name="trangthai">
                          <option value="">Chọn trạng thái</option>
                          <option value="Đang áp dụng">Đang áp dụng</option>
                          <option value="Ngưng áp dụng">Ngưng áp dụng</option>
                        </select>
                      <span class="glyphicon  form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                      <label for="exampleInputEmail1">Giá trị</label>
                      <input  tabindex="2"type="text" class="form-control required" name="giatri" data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\  \/]+$" required="" placeholder="Giá trị">
                      <span class="glyphicon  form-control-feedback"></span>
                    </div>         
						
            <!-- <div class="form-group">
            <label>Promo Type</label>
							<select class="form-control select2 required"  style="width: 100%;" name="bus_type_id"></select>
            </div> -->
					
            <div class="box-footer">
              <button tabindex="5" type="submit" class="btn btn-primary">THÊM</button>
            </div>             
          </div>                   
          <div class="col-md-6">
            <div class="form-group has-feedback">
              <label for="exampleInputEmail1">Ngày bắt đầu</label>
              <input tabindex="4" type="text" class="form-control required" id="datepicker" name="start_date" data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-maxlength="15" required="" placeholder="YYYY-MM-DD">
              <span class="glyphicon  form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
              <label for="exampleInputEmail1">Ngày hết hạn</label>
              <input tabindex="4" type="text" class="form-control required" id="datepicker" name="expire_date" data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-maxlength="15" required="" placeholder="YYYY-MM-DD">
              <span class="glyphicon  form-control-feedback"></span>
            </div>
            <!-- /.box-body -->         
				  </div>
        </form>
      </div>
    <!-- /.box -->
    </div>
  </div>
</div> 
<!-- /.row -->
</section>
<!-- /.content -->
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
