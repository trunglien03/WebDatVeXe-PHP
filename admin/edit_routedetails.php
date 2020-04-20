<?php 
  include("includes/header.php");
  include("includes/sidebar.php");
  include("includes/connect.php");
?>

<?php
    include("includes/connect.php");
    if(isset($_GET['rid'])){
    $rid= $_GET['rid'];
    }
    else{
    echo "Không tồn tại trong CSDL";
    }
    $qr_1 = mysqli_query($conn,"SELECT * FROM route WHERE rid='$rid'");
    $arrhs = mysqli_fetch_assoc($qr_1);
    $tgkh = explode(" , ", $arrhs['thoigiankhoihanh']);
    
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Cập nhật tuyến đường</h1>
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
          <form role="form" method="post" action="execute/xuly_edit_routedetails.php" enctype="multipart/form-data">
            <div class="box-body">
              <div class="col-md-6">

                <!--ID tuyến đường--> 
                <div class="form-group" >
                  <label>ID tuyến đường</label>
                  <input type="text" class="form-control"  tabindex="1" name="rid" value="<?php echo $arrhs['rid'];?>" readonly>
                  <span class="glyphicon  form-control-feedback" ></span>
                </div>

                <!--Tên loại xe-->
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên loại xe</label>
                  <select class="form-control" style="width: 100%;" name="loaixe">
                  <?php
                    $query_ten_loaixe = mysqli_query($conn,"SELECT * FROM loai_xe");
                    while ( $row_ten_loaixe = mysqli_fetch_assoc($query_ten_loaixe)) {
                      if($arrhs['bid'] == $row_ten_loaixe['id_loaixe'] ){
                      ?>
                        <option value="<?=$row_ten_loaixe['id_loaixe']?>" selected="selected"><?=$row_ten_loaixe['ten_loaixe']?></option>
                      <?php }else{ ?>
                        <option value="<?=$row_ten_loaixe['id_loaixe']?>"><?=$row_ten_loaixe['ten_loaixe']?></option> 
                    <?php }}?>		  							  								  								  								  								  
                  </select>
                </div>

                <!--Nơi đi--> 
                <div class="form-group" >
                  <label>Nơi đi</label>
                  <select name="fromLoc" class="form-control required">
                    <?php
                      $query_noidi=mysqli_query($conn, "select * from noidi");
                      while ($row_noidi=mysqli_fetch_array($query_noidi)){  
                        if($arrhs['fromLoc']==$row_noidi['ten_noidi'])  {
                    ?>
                      <option value="<?=$row_noidi['id_noidi']?>" selected="selected"><?=$row_noidi['ten_noidi']?></option>
                      <?php }else {?>
                      <option value= "<?php echo $row_noidi['id_noidi'];?>"><?php echo $row_noidi['ten_noidi'];?></option>
                    <?php }}?>
                  </select>
                  <span class="glyphicon  form-control-feedback" ></span>
                </div>
                              
                <!--Điểm đến-->  
                <div class="form-group" >
                  <label>Nơi đến</label>
                  <select name="toLoc" class="form-control required">
                    <?php
                      $query_noiden=mysqli_query($conn, "SELECT DISTINCT ten_noiden FROM noiden");
                      while ($row_noiden=mysqli_fetch_array($query_noiden)){  
                        if($arrhs['toLoc']==$row_noiden['ten_noiden'])  {
                    ?>
                      <option value="<?=$arrhs['toLoc']?>" selected="selected"><?=$arrhs['toLoc']?></option>
                      <?php }else {?>
                      <option value= "<?php echo $row_noiden['ten_noiden'];?>"><?php echo $row_noiden['ten_noiden'];?></option>
                    <?php }}?>
                  </select>
                  <span class="glyphicon  form-control-feedback" ></span>
                </div>
              </div>
                 
              <div class="col-md-6">
                <!--Số chuyển-->  
                <div class="form-group">
                    <label>Số chuyến</label>
                    <input type="number" class="form-control" min="5" max="20" name="sochuyen" value="<?php echo $arrhs['sochuyen'];?>">
                </div>
                <!--Giá vé-->  
                <div class="form-group">
                    <label>Giá vé</label>
                    <input type="text" class="form-control" name="giave" value="<?php echo $arrhs['fare'];?>">
                </div>

                <!--Số ghể-->
                <div class="form-group">
                  <label>Số ghế</label>
                  <select class="form-control" style="width: 100%;" name="soghe">
                    <?php
                    $query_ten_loaighe = mysqli_query($conn,"SELECT * FROM loaighe");
                    while ( $row_ten_loaighe = mysqli_fetch_assoc($query_ten_loaighe)) {
                      if($arrhs['maxseats'] == $row_ten_loaighe['soghe'] ){
                      ?>
                        <option value="<?=$row_ten_loaighe['id_loaighe']?>" selected="selected"><?=$row_ten_loaighe['soghe']?></option>
                      <?php }else{ ?>
                        <option value="<?=$row_ten_loaighe['id_loaighe']?>"><?=$row_ten_loaighe['soghe']?></option>  
                    <?php }}?>							  								  								  								  								  
                  </select>
                  <span class="glyphicon form-control-feedback"></span>
                </div>

                <!--Trạng thái-->
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
            
                <!--Giờ khởi hành-->
                <div class="form-group">
                  <label>Thời gian khởi hành:</label>
                  <select class="form-control select2 js-example-basic-multiple" style="width: 100%;" name="thoigiankhoihanh[]" multiple="multiple">
                        <option value="<?=$arrhs['thoigiankhoihanh']?>"><?=$arrhs['thoigiankhoihanh']?></option>
                        <option value="0:00 AM">0:00 AM</option>								  
                        <option value="0:30 AM">0:30 AM</option>								  
                        <option value="1:00 AM">1:00 AM</option>								  
                        <option value="1:30 AM">1:30 AM</option>								  								  								  
                        <option value="2:00 AM">2:00 AM</option>
                        <option value="2:30 AM">2:30 AM</option>								  								  
                        <option value="3:00 AM">3:00 AM</option>
                        <option value="3:30 AM">3:30 AM</option>
                        <option value="4:00 AM">4:00 AM</option>
                        <option value="4:30 AM">4:30 AM</option>
                        <option value="5:00 AM">5:00 AM</option>
                        <option value="5:30 AM">5:30 AM</option>
                        <option value="6:00 AM">6:00 AM</option>
                        <option value="6:30 AM">6:30 AM</option>
                        <option value="7:00 AM">7:00 AM</option>
                        <option value="7:30 AM">7:30 AM</option>
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="8:30 AM">8:30 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="9:30 AM">9:30 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="10:30 AM">10:30 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="12:30 PM">12:30 PM</option>
                        <option value="13:00 PM">13:00 PM</option>
                        <option value="13:30 PM">13:30 PM</option>
                        <option value="14:00 PM">14:00 PM</option>
                        <option value="14:30 PM">14:30 PM</option>
                        <option value="15:00 PM">15:00 PM</option>
                        <option value="15:30 PM">15:30 PM</option>
                        <option value="16:00 PM">16:00 PM</option>
                        <option value="16:30 PM">16:30 PM</option>
                        <option value="17:00 PM">17:00 PM</option>
                        <option value="17:30 PM">17:30 PM</option>
                        <option value="18:00 PM">18:00 PM</option>
                        <option value="18:30 PM">18:30 PM</option>
                        <option value="19:00 PM">19:00 PM</option>
                        <option value="20:00 PM">20:00 PM</option>
                        <option value="21:00 PM">21:00 PM</option>
                        <option value="22:00 PM">22:00 PM</option>
                        <option value="23:00 PM">23:00 PM</option>
                      </select>
                </div>

                <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="capnhattd">CẬP NHẬT</button>
              </div>
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
