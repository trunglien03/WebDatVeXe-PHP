<?php 
  include("includes/header.php");
  include("includes/sidebar.php");
  include("includes/connect.php");
?>

<?php
    include("includes/connect.php");
    if(isset($_GET['id_tp'])){
    $id_tp= $_GET['id_tp'];
    }
    else{
    echo "Không tồn tại trong CSDL";
    }
    $qr_1 = mysqli_query($conn,"SELECT * FROM thanhpholon WHERE id_tp='$id_tp'");
    $arrhs = mysqli_fetch_assoc($qr_1); 
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Sửa điểm khởi hành từ các thành phố lớn</h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-warning">
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="post" action="execute/xuly_edit_tp.php" enctype="multipart/form-data">
            <div class="box-body">
              <div class="col-md-6">

                <!--ID thành phố--> 
                <div class="form-group" >
                  <label>ID</label>
                  <input type="text" class="form-control"  tabindex="1" name="id_tp" value="<?php echo $arrhs['id_tp'];?>" readonly>
                  <span class="glyphicon  form-control-feedback" ></span>
                </div>
                <!--End ID thành phố-->

                <!--Tên thành phố--> 
                <div class="form-group" >
                  <label>Tên thành phố</label>
                  <input type="text" class="form-control required" name="ten_tp" value="<?php echo $arrhs['ten_tp'];?>">
                  <span class="glyphicon  form-control-feedback" ></span>
                </div>
                <!--End thành phố-->                
                <!--Điểm đến-->  
                <div class="form-group">
                  <label>Điểm đến:</label>
                  <input type="text" class="form-control required" value="<?php echo $arrhs['diem_den'];?>" readonly>
                  <br>
                  <label>Cập nhật điểm đến:</label>
                  <select tabindex="9" class="form-control js-example-basic-multiple" style="width: 100%;" name="amenities[]" multiple="multiple" id="amenities">
                    <option value="An Giang (Châu Đốc, Long Xuyên)">An Giang (Châu Đốc, Long Xuyên)</option>
                    <option value="Bạc Liêu">Bạc Liêu</option>
                    <option value="Bến Tre">Bến Tre</option>
                    <option value="Cao Lãnh">Cao Lãnh</option>
                    <option value="Cà Mau">Cà Mau</option>
                    <option value="Châu Đốc">Châu Đốc</option>
                    <option value="Cần Thơ">Cần Thơ</option>
                    <option value="Đà Lạt">Đà Lạt</option>
                    <option value="Hà Tiên">Hà Tiên</option>
                    <option value="Hậu Giang">Hậu Giang</option>
                    <option value="Kiên Giang">Kiên Giang</option>
                    <option value="Tp Hồ Chí Minh">Tp Hồ Chí Minh</option>
                  </select>
                </div>
                    <!--End điểm đến-->             
              </div>
                 
              <div class="col-md-6">
                <!--Hình ảnh-->  
                <div class="form-group">
                    <label>Hình ảnh:</label>
                    <img class="img-responsive" src="../admin/<?php echo $arrhs['hinhanh'];?>">
                </div>
                <!--End hình ảnh-->
                <!--CẬP NHẬT ẢNH MỚI-->
                <div class="form-group">
                  <label>Hình ảnh mới</label>
                  <input type="file" class="form-control" name="hinh">
                  <span class="glyphicon form-control-feedback"></span>
                </div>
                <!--END CẬP NHẬT ẢNH-->
            </div>
            <!--Button THÊM-->
            <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="capnhattp" id="capnhattp">CẬP NHẬT</button>
                </div>
                <!--End button-->
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

//Multi Select Box 				   
$(document).ready(function() {			
        
$(".js-example-basic-multiple").select2();   
          
});
</script>
</body>
</html>
