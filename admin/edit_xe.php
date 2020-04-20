
<?php 
  include("includes/header.php");
  include("includes/sidebar.php");
  include("includes/connect.php");
?>

<?php
    include("includes/connect.php");
    if(isset($_GET['id_xe'])){
    $id_xe= $_GET['id_xe'];
    }
    else{
    echo "Không tồn tại trong CSDL";
    }
    $qr_1 = mysqli_query($conn,"SELECT * FROM xeluuhanh WHERE bid='$id_xe'");
    $arrhs = mysqli_fetch_assoc($qr_1); 
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Sửa thông tin xe</h1>
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
          <form role="form" method="post" action="execute/xuly_edit_xe.php" enctype="multipart/form-data">
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID xe</label>
                        <input type="text" class="form-control" value="<?php echo $arrhs['bid']?>" readonly name="id_xe">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên loại xe</label>
                        <select class="form-control" style="width: 100%;" name="id_loaixe">
                        <?php
                          $query_ten_loaixe = mysqli_query($conn,"SELECT * FROM loai_xe");
                          while ( $row_ten_loaixe = mysqli_fetch_assoc($query_ten_loaixe)) {
                            if($arrhs['id_loaixe'] == $row_ten_loaixe['id_loaixe'] ){
                            ?>
                              <option value="<?=$row_ten_loaixe['id_loaixe']?>" selected="selected"><?=$row_ten_loaixe['ten_loaixe']?></option>
                            <?php }else{ ?>
                              <option value="<?=$row_ten_loaixe['id_loaixe']?>"><?=$row_ten_loaixe['ten_loaixe']?></option>
                              
                          <?php }}?>		  							  								  								  								  								  
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên xe</label>
                        <input type="text" class="form-control" name="ten_xe" value="<?php echo $arrhs['ten_xe']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tiện nghi</label>
                        <input type="text" class="form-control" name="tien_nghi" value="<?php echo $arrhs['tiennghi']?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="capnhatxe">CẬP NHẬT</button>
                    </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Biển số xe</label>
                           <input type="text" class="form-control" name="bienkiemsoat" value="<?php echo $arrhs['bienkiemsoat']?>">
                        </div>
                        <div class="form-group">
                        <label>Số ghế / giường</label>
                          <select class="form-control" style="width: 100%;" name="soghe">
                          <?php
                          $query_ten_loaighe = mysqli_query($conn,"SELECT * FROM loaighe");
                          while ( $row_ten_loaighe = mysqli_fetch_assoc($query_ten_loaighe)) {
                            if($arrhs['soghe'] == $row_ten_loaighe['soghe'] ){
                            ?>
                              <option value="<?=$row_ten_loaighe['soghe']?>" selected="selected"><?=$row_ten_loaighe['soghe']?></option>
                            <?php }else{ ?>
                              <option value="<?=$row_ten_loaighe['soghe']?>"><?=$row_ten_loaighe['soghe']?></option>
                              
                          <?php }}?>							  								  								  								  								  
                          </select>
                        </div>
                        <!--Tuyến xe-->
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tuyến xe</label>
                          <div class="row">
                            <div class="col col-md-6">
                              <select name="fromLoc" class="form-control required">
                                <?php
                                  $query_noidi=mysqli_query($conn, "select * from noidi");
                                  while ($row_noidi=mysqli_fetch_array($query_noidi)){  
                                    if($arrhs['ten_noidi']==$row_noidi['ten_noidi'])  {
                                ?>
                                  <option value="<?=$row_noidi['id_noidi']?>" selected="selected"><?=$row_noidi['ten_noidi']?></option>
                                  <?php }else {?>
                                  <option value= "<?php echo $row_noidi['id_noidi'];?>"><?php echo $row_noidi['ten_noidi'];?></option>
                                <?php }}?>
                              </select>
                        </div>
                        <div class="col col-md-6">
                          <select name="toLoc" class="form-control required" required>
                          <?php
                              $query_noiden=mysqli_query($conn, "SELECT DISTINCT ten_noiden FROM noiden");
                              while ($row_noiden=mysqli_fetch_array($query_noiden)){  
                                if($arrhs['ten_noiden']==$row_noiden['ten_noiden'])  {
                            ?>
                              <option value="<?=$row_noiden['ten_noiden']?>" selected="selected"><?=$row_noiden['ten_noiden']?></option>
                              <?php }else {?>
                              <option value="<?=$row_noiden['ten_noiden']?>"><?=$row_noiden['ten_noiden']?></option>
                            <?php }}?>
                          </select>
                        </div>
                      </div>
                      </div>
                      <!--End Tuyến xe-->
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
