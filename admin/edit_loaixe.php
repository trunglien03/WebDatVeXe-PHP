<?php 
  include("includes/header.php");
  include("includes/sidebar.php");
  include("includes/connect.php");
?>

<?php
    include("includes/connect.php");
    if(isset($_GET['id_loaixe'])){
    $id_loaixe= $_GET['id_loaixe'];
    }
    else{
    echo "Không tồn tại trong CSDL";
    }
    $qr_1 = mysqli_query($conn,"SELECT * FROM loai_xe WHERE id_loaixe='$id_loaixe'");
    $arrhs = mysqli_fetch_assoc($qr_1); 
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Sửa loại xe</h1>
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
          <form role="form" method="post" action="execute/xuly_edit_loaixe.php" enctype="multipart/form-data">
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID loại xe</label>
                        <input type="text" class="form-control" value="<?php echo $arrhs['id_loaixe']?>" readonly name="id_loaixe">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tên hãng xe</label>
                      <select class="form-control" style="width: 100%;" name="hangxe">
                        <?php
                          $query_ten_hangxe = mysqli_query($conn,"SELECT * FROM hangxe");
                          while ( $row_ten_hangxe = mysqli_fetch_assoc($query_ten_hangxe)) {
                            if($arrhs['ten_hangxe'] == $row_ten_hangxe['ten_hangxe'] ){
                            ?>
                              <option value="<?=$row_ten_hangxe['id_hangxe']?>" selected="selected"><?=$row_ten_hangxe['ten_hangxe']?></option>
                            <?php }else{ ?>
                              <option value="<?=$row_ten_hangxe['id_hangxe']?>"><?=$row_ten_hangxe['ten_hangxe']?></option>
                              
                          <?php }}?>					  							  								  								  								  								  
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tên loại xe</label>
                      <select class="form-control" style="width: 100%;" name="ten_loaixe">
                        <?php
                        $query_ten_loaighe = mysqli_query($conn,"SELECT * FROM loaighe");
                        while ( $row_ten_loaighe = mysqli_fetch_assoc($query_ten_loaighe)) {
                          if($arrhs['ten_loaixe'] == $row_ten_loaighe['ten_loaighe'] ){
                          ?>
                            <option value="<?=$row_ten_loaighe['id_loaighe']?>" selected="selected"><?=$row_ten_loaighe['ten_loaighe']?></option>
                          <?php }else{ ?>
                            <option value="<?=$row_ten_loaighe['id_loaighe']?>"><?=$row_ten_loaighe['ten_loaighe']?></option>
                            
                        <?php }}?>							  								  								  								  								  
                      </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="capnhatlx">CẬP NHẬT</button>
                    </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Số ghế / giường</label>
                           <input type="text" class="form-control" name="maxseat" value="<?php echo $arrhs['maxseat']?>">
                        </div>
                        <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="form-control" style="width: 100%;" name="status">
                        <?php
                          $query_ten_tt = mysqli_query($conn,"SELECT * FROM trangthai");
                          while ( $row_ten_tt = mysqli_fetch_assoc($query_ten_tt)) {
                            if($arrhs['status'] == $row_ten_tt['ten_trangthai'] ){
                            ?>
                              <option value="<?=$row_ten_tt['id_trangthai']?>" selected="selected"><?=$row_ten_tt['ten_trangthai']?></option>
                            <?php }else{ ?>
                              <option value="<?=$row_ten_tt['id_trangthai']?>"><?=$row_ten_tt['ten_trangthai']?></option>
                              
                          <?php }}?>
                        </select>
                        </div>
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
