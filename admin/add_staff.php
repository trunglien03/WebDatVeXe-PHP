<?php
  session_start();
  error_reporting(0);
  if(!isset($_SESSION['user']))
  {
    header('location:login.php');
  }
?>
  <section class="content-header">
    <h1>Thêm nhân viên</h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-bus"></i>Quản lý chung</a></li>
      <li><a href="index.php?tab=dsnv">Quản lý nhân sự</a></li>
      <li class="active">Thêm tài xế và phụ xe</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Thêm tài xế và phụ xe</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="execute/xuly_add_staff.php" method="post">
            <div class="box-body">
              <div class="col-md-6">
              <!--Họ tên-->
                <div class="form-group">
                  <label for="exampleInputEmail1">Họ và tên</label>
                  <input type="text" class="form-control required" name="hovaten" required="" placeholder="Nhập họ tên nhân viên">
                </div>

              <!--Ngày sinh-->
                <div class="form-group">
                  <label>Ngày sinh</label>
                  <input type="date" class="form-control required" name="ngaysinh"/>
                </div>
              
              <!--Số CMND-->
                <div class="form-group">
                  <label for="exampleInputEmail1">Số CMND</label>
                  <input type="text" name="CMND" class="form-control" placeholder="Số CMND" required>
                </div>

                <!--Số ĐTDĐ-->
                <div class="form-group">
                  <label for="exampleInputEmail1">Điện thoại di động</label>
                  <input type="text" name="sdt" class="form-control" placeholder="Số điện thoại" required>
                </div>
                
                <!--Button THÊM-->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="themnv">THÊM</button>
                </div>
                <!--End button-->             
              </div>

              <div class="col-md-6">
                <!--Quê quán-->
                <div class="form-group">
                  <label>Quê quán</label>
                  <input name="quequan" class="form-control" placeholder="Nhập quê quán">
                </div>

              <!--Thường trú-->
                <div class="form-group">
                  <label for="exampleInputEmail1">Địa chỉ thường trú</label>
                  <textarea type="text" name="thuongtru" class="form-control" placeholder="Địa chỉ thường trú" required></textarea>
                </div> 
                
                <!--Ngày vào làm-->
                <div class="form-group">
                  <label for="exampleInputEmail1">Ngày vào làm</label>
                  <input type="date" class="form-control required" name="ngayvaolam" id="myDate" />
                </div>

                <!--Chức vụ và thời gian làm-->
                <div class="form-group has-feedback">
                  <div class="row">
                    <div class="col col-md-12">
                      <label for="exampleInputEmail1">Chức vụ</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col col-md-12">
                      <select name="chucvu" class="form-control" required>
                        <option value="Tài xế">Tài xế</option>
                        <option value="Phụ xe">Phụ xe</option>
                        <option value="Tài xế trung chuyển">Tài xế trung chuyển</option>
                      </select>
                      <span class="glyphicon  form-control-feedback" ></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-12">
                      <label for="exampleInputEmail1">Tuyến đường phụ trách</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col col-md-12">
                      <select name="fromLoc" class="form-control" placeholder="Chọn nơi đi">
                        <option value= "Cần Thơ">Cần Thơ</option>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col col-md-12">
                      <select id="toLoc" name="toLoc[]" class="form-control select2 js-example-basic-multiple" multiple="multiple">
                      <?php
                        $get_noiden=mysqli_query($conn, "SELECT * FROM noiden INNER JOIN noidi ON noiden.id_noidi=noidi.id_noidi WHERE noidi.ten_noidi='Cần Thơ'");
                        while($row_noiden=mysqli_fetch_array($get_noiden)){
                      ?>
                      <option value="<?=$row_noiden['ten_noiden']?>"><?=$row_noiden['ten_noiden'];?></option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
                
              </div>
            <!-- /.box-body -->
          </div>
        </form>
    </div>
  </div>
    <!-- /.box -->
  </div>
</div>
</div>
<!-- /.row -->
</section>

