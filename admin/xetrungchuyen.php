<?php
  error_reporting(0);
  session_start();
  include("includes/header.php");
  include("includes/sidebar.php");
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Thêm xe trung chuyển</h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-bus"></i>Quản lý chung</a></li>
      <li><a href="index.php?tab=view_busdetails.php">Xe lưu hành</a></li>
      <li class="active">Thêm xe</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Thêm xe</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="execute/xuly_add_xetc.php" method="post">
            <div class="box-body">
              <div class="col-md-6">
              
               <!--END TUYẾN XE-->
                <!--Loại xe-->
                <div class="form-group">
                <label class="inputLabel" style="font-size: 15px;"><strong>Loại xe</strong></label>
                  <select class="form-control" id="loaixe" name="loaixe" required>
                   <?php 
                    $sql =mysqli_query($conn, "SELECT * FROM loai_xe WHERE ten_loaixe='Xe trung chuyển 16 chỗ'");
                    while($row=mysqli_fetch_array($sql)){
                   ?>
                   <option value="<?=$row['ten_loaixe']?>"><?=$row['ten_loaixe']?></option>
                    <?php }?>
                  </select>
                </div>
                <!--End loại xe-->
                <!--Tên xe-->
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên xe</label>
                  <input type="text" class="form-control required" name="tenxe" placeholder="Nhập tên xe">
                </div>
                <!--End tên xe-->
                <!--Năm sx
							  <div class="form-group">
							    <label>Năm sản xuất</label>
                  <div class="input-group">
								    <input type="text" id="datepicker1" name="datepicker1" class="form-control" style="width: 250%;">
							      </div>
							    </div>
                  End năm sx -->
                
                <!--Button THÊM-->
                           
              </div>

              <!--Biển số xe-->                   
              <div class="col-md-6">
               
                <div class="form-group has-feedback">
                  <label>Biển số xe</label>
                  <input type="text" class="form-control required" name="biensoxe" data-parsley-trigger="change"	
                  data-parsley-minlength="2" data-parsley-maxlength="15" required="" placeholder="Biển số xe">
                  <span class="glyphicon form-control-feedback"></span>
                </div>
                <!--End BSX-->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="themxetc">THÊM</button>
                </div>
                <!--End button-->  
                
               
              <!--End Tuyến xe-->
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
</div>
<script>
  function run(element) {
    document.getElementById("userYear").innerHTML = element.value;
        // document.getElementById("year").value;
   }
</script>
<?php 
    include("includes/footer.php");
    include("includes/scripts.php");
  ?>