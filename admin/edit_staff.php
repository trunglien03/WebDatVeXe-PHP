<?php 
  include("includes/header.php");
  include("includes/sidebar.php");
?>

    <?php
        include("includes/connect.php");
        if (isset($_GET['manv'])) {
            $manv = $_GET['manv'];
            $query = mysqli_query($conn,"SELECT * FROM nhan_vien  WHERE manv = '".$manv."'");
            $row1 = mysqli_fetch_assoc($query);
            $noiden = $row1['toLoc'];
        }

    ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Cập nhật thông tin nhân viên</h1>
        <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-bus"></i>Quản lý chung</a></li>
        <li><a href="index.php?tab=dsnv">Quản lý nhân sự</a></li>
        <li class="active">Danh sách tài xế và phụ xe</li>
        </ol>
    </section>
  <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-warning">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="execute/xuly_edit_staff.php">
                <div class="box-body">
                <div class="col-md-6">
                <!--ID-->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã nhân viên</label>
                        <input type="text" class="form-control required" name="manv" value="<?=$row1['manv']?>" readonly>
                    </div>
                <!--Họ tên-->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Họ và tên</label>
                        <input type="text" class="form-control required" name="hovaten" value="<?=$row1['hoten']?>">
                    </div>

                <!--Ngày sinh-->
                    <div class="form-group">
                    <label>Ngày sinh</label>
                    <input type="date" class="form-control required" name="ngaysinh" value="<?=$row1['ngaysinh']?>"/>
                    </div>
                
                <!--Số CMND-->
                    <div class="form-group">
                    <label for="exampleInputEmail1">Số CMND</label>
                    <input type="text" name="CMND" class="form-control" value=<?=$row1['soCMND']?>>
                    </div>

                    <!--Số ĐTDĐ-->
                    <div class="form-group">
                    <label for="exampleInputEmail1">Điện thoại di động</label>
                    <input type="text" name="sdt" class="form-control" value="<?=$row1['sdt']?>">
                    </div>
                              
                </div>

                <div class="col-md-6">
                    <!--Quê quán-->
                    <div class="form-group">
                    <label>Quê quán</label>
                    <input name="quequan" class="form-control" value="<?=$row1['quequan']?>"/>
                    </div>

                <!--Thường trú-->
                    <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ thường trú</label>
                    <textarea name="thuongtru" class="form-control"><?=$row1['thuongtru']?></textarea>
                    </div> 
                    
                    <!--Ngày vào làm-->
                    <div class="form-group">
                    <label for="exampleInputEmail1">Ngày vào làm</label>
                    <input type="date" class="form-control required" name="ngayvaolam" value="<?=$row1['ngayvaolam']?>" />
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
                                <?php
                                    $get_chucvu = mysqli_query($conn, "SELECT * FROM chucvu");
                                    while ($row_chucvu = mysqli_fetch_array($get_chucvu)){
                                        if($row1['chucvu']==$row_chucvu['ten_chucvu']){
                                ?>
                                    <option value="<?=$row_chucvu['id_chucvu']?>" selected="selected"><?=$row_chucvu['ten_chucvu']?></option>
                                <?php } else{ ?>
                                    <option value="<?=$row_chucvu['id_chucvu']?>"><?=$row_chucvu['ten_chucvu']?></option>
                            <?php }}?>
                                </select>
                                <span class="glyphicon  form-control-feedback" ></span>
                            </div>
                        </div>
                    </div>
                    <!--Tuyến đường-->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tuyến xe</label>
                        <div class="row">
                            <div class="col col-md-6">
                                <select id="fromLoc" name="fromLoc" class="form-control required">
                                <?php
                                    $query_noidi=mysqli_query($conn, "SELECT * FROM noidi WHERE ten_noidi='Cần Thơ'");
                                    while ($row_noidi=mysqli_fetch_array($query_noidi)){  
                                    if($row1['fromLoc']==$row_noidi['ten_noidi'])  {
                                ?>
                                    <option value="<?=$row_noidi['ten_noidi']?>" selected="selected"><?=$row_noidi['ten_noidi'];?></option>
                                <?php }}?>
                                </select>
                            </div>
                            <div class="col col-md-6">
                                <select id="toLoc" name="toLoc[]" class="form-control select2 js-example-basic-multiple" multiple="multiple" required>
                                <?php
                                    $query_noiden=mysqli_query($conn, "SELECT * FROM noiden INNER JOIN noidi ON noiden.id_noidi=noidi.id_noidi WHERE noidi.ten_noidi='Cần Thơ'");
                                    ?>
                                    <option value="<?=$row1['toLoc']?>" selected="selected">Đã chọn :<?=$row1['toLoc']?></option>
                                    <?php while($row_noiden=mysqli_fetch_array($query_noiden)){?>
                                    <option value="<?=$row_noiden['ten_noiden']?>"><?=$row_noiden['ten_noiden'];}?></option>
                                </select>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="row" style="margin-bottom: 10px">
                    <div class="col col-md-12">
                        <section class="content-header">
                            <h1>TÀI KHOẢN ĐĂNG NHẬP</h1>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-6">
                        <label>Tên đăng nhập</label>
                        <input type="text" class="form-control" value="<?=$row1['username']?>" readonly style="height: 45px;"/>
                    </div>

                    <div class="col col-md-6">
                        <label>Mật khẩu</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="<?=$row1['password']?>" style="height: 45px;" name="password">
                            <div class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </div>
                        </div>
                    </div>
                </div>
                    <!--Button THÊM-->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="capnhatnv">CẬP NHẬT</button>
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

<?php 
    include("includes/scripts.php");
    include("includes/footer.php");
?>    