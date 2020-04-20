<?php 
  include("includes/connect.php");
?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Thêm điểm khởi hành từ các thành phố lớn</h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Thêm điểm đến từ các thành phố lớn</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="post" action="execute/xuly_add_city.php" enctype="multipart/form-data">
            <div class="box-body">
              <div class="col-md-6">

                <!--ID thành phố--> 
                <div class="form-group" >
                  <label>ID</label>
                  <?php 
                    require("includes/connect.php");
                    $get=mysqli_query($conn,"SELECT MAX(id_tp) as lastes_id FROM thanhpholon");
                    $got=mysqli_fetch_array($get);
                    $curr_id=$got['lastes_id'];
                  ?>
                  <input type="text" class="form-control"  tabindex="1" name="id_tp" value="<?php echo $curr_id;?>" readonly>
                  <span class="glyphicon  form-control-feedback" ></span>
                </div>
                <!--End ID thành phố-->

                <!--Tên thành phố--> 
                <div class="form-group" >
                  <label>Tên thành phố</label>
                  <input type="text" class="form-control"  tabindex="1" name="ten_tp" placeholder="Tên thành phố" required>
                  <span class="glyphicon  form-control-feedback" ></span>
                </div>
                <!--End thành phố-->                
                
                <!--Button THÊM-->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="themtp" id="themtp">THÊM</button>
                </div>
                <!--End button-->             
              </div>
                 
              <div class="col-md-6">
                <!--Điểm đến-->  
                <div class="form-group">
                  <label>Điểm đến:</label>
                  <select tabindex="9" class="form-control js-example-basic-multiple" style="width: 100%;" name="amenities[]" multiple="multiple" id="amenities" required>
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

                <!--Hình ảnh-->  
                <div class="form-group">
                  <label>Hình ảnh</label>
                  <input type="file" class="form-control" name="hinh" required>
                  <span class="glyphicon form-control-feedback"></span>
                </div>
                <!--End hình ảnh-->
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

