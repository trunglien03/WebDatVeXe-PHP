<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
<script> 
    $(document).ready(function(){
        $('#fromLoc').change(function(){
            id=$('#fromLoc').val();
            $.ajax({
                url: "../ajax.php",
                type:"post",
                data: "id_noidi="+id,
                async: true,
                success: function(kq){
                    $('#toLoc').html(kq);
                }
            });
            return false;
        });
    })
</script>

  <section class="content-header">
    <h1>
      Thêm mới tuyến đường
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-arrows-v"></i> Quản lý chung</a></li>
      <li><a href="index.php?tab=dstđ">Tuyến đường</a></li>
      <li class="active">Thêm mới tuyến đường</li>
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
          <!-- /.box-header -->
          <!-- form start -->
			    <form role="form" action="execute/xuly_add_routedetails.php" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">
            <div class="box-body">
              <div class="col-md-6">
                <!--Loại xe-->
                <div class="form-group">
                  <label>Loại xe</label>
                  <select class="form-control" style="width: 100%;" name="loaixe">
                  <?php
                    $query_loaixe=mysqli_query($conn, "SELECT * FROM loai_xe WHERE status='Đang hoạt động'");
                    while($row_loaixe=mysqli_fetch_array($query_loaixe)){
                  ?>
                    <option value="<?=$row_loaixe['id_loaixe']?>"><?=$row_loaixe['ten_loaixe']?></option>
                  <?php } ?>							  								  
                  </select>
                </div>
                <!--End loại xe-->

                <!--Nơi đi-->
                <!--<sup style="color: red;">*<sup>-->
                <div class="form-group has-feedback">
                  <label>Nơi đi</label>
                  <select name="fromLoc" id="fromLoc" class="form-control required" placeholder="Chọn nơi đi" data-id="board_point" tabindex="6" required>
                    <?php
                      require("includes/connect.php");
                      $sql=mysqli_query($conn, "select * from noidi");
                      $num=mysqli_num_rows($sql);
                      if($num>0){
                      while ($row=mysqli_fetch_array($sql)){    
                    ?>
                    <option value= "<?php echo $row['id_noidi'];?>"><?php echo $row['ten_noidi'];?></option>
                    <?php } }?>
                  </select>
                  <span class="glyphicon  form-control-feedback"></span>
                </div>

                <!--Nơi đến-->
                <div class="form-group has-feedback">
                  <label>Nơi đến</label>
                  <select name="toLoc" id="toLoc" class="form-control required" tabindex="6" required>
                    <option value=''></option>
                  </select>
                  <span class="glyphicon  form-control-feedback"></span>
                </div>

                <div class="box-footer">
                  <button tabindex="7" type="submit" class="btn btn-primary" name="themtđ">THÊM</button>
                </div>             
              </div>                   
              <div class="col-md-6">
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Giá vé</label>
                  <input tabindex="2" type="text" class="form-control required" name="giave" data-parsley-trigger="change"	
                  data-parsley-minlength="2" data-parsley-maxlength="15" data-parsley-pattern="^[a-zA-Z0-9\  \/]+$" required="" placeholder="Giá vé">
                  <span class="glyphicon  form-control-feedback"></span>
                </div>

				      	<div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Số ghế</label>
                  <select class="form-control" style="width: 100%;" name="soghe">
                  <?php
                    $query_loaixe=mysqli_query($conn, "SELECT * FROM loai_xe");
                    while($row_loaixe=mysqli_fetch_array($query_loaixe)){
                  ?>
                    <option value="<?=$row_loaixe['id_loaixe']?>"><?=$row_loaixe['maxseat']?></option>
                  <?php } ?>							  								  
                  </select>
                </div>
                
                <div class="form-group hidden">
                  <label>Tiện nghi kèm theo:</label>
                  <select tabindex="9" class="form-control select2 js-example-basic-multiple" style="width: 100%;" name="amenities[]" multiple="multiple1" id="amenities" >
                    <option value="WIFI">WIFI</option>								  
                    <option value="Nước suối">Nước suối</option>								  
                    <option value="Chăn đắp">Chăn đắp</option>								  
                    <option value="Bánh ngọt">Bánh ngọt</option>								  								  								  
                    <option value="Gối">Gối</option>
                    <option value="Tivi cá nhân">Tivi cá nhân</option>								  								  
                    <option value="Ổ sạc">Ổ sạc</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Thời gian khởi hành:</label>
                  <select class="form-control select2 js-example-basic-multiple" style="width: 100%;" name="thoigiankhoihanh[]" multiple="multiple">
                    <?php
                      $get_time = mysqli_query($conn, "SELECT * FROM time");
                      while($row_time = mysqli_fetch_array($get_time)){
                    ?>
                      <option value="<?=$row_time['time']?>"><?=$row_time['time']?></option>
                      <?php }?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Số chuyến trong ngày</label>
                  <input type="number" class="form-control" min="5" max="20" name="sochuyen"/>
                </div>
						  </div>     
              <!-- /.box-body -->
            </div>
				  </div>
        </form>
      </div>
    <!-- /.box -->
    </div>
  </div>
<!-- /.row -->
</section>
<!-- /.content -->

<script>
//Multi Select Box 				   
$(document).ready(function() {			
				 
$(".js-example-basic-multiple").select2();   
				   
});
</script>
