<?php
  session_start();
  error_reporting(0);
  if(!isset($_SESSION['user']))
  {
    header('location:login.php');
  }
?>
<?php 
   include("includes/connect.php");
?>
   <!--Content-->
   <section class="content-header">
      <h1>
        THÊM MỚI LOẠI XE
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-bus"></i>Quản lý chung</a></li>
         <li><a href="index.php?tab=view_busdetails.php">Xe lưu hành</a></li>
         <li class="active">Thêm mới loại xe</li>
      </ol>
   </section>
   <!-- Main content -->	
   <section class="content">
      <div class="row">
	  <div class="col-md-12">
						</div>
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-warning">
               <div class="box-header with-border">
                  <h3 class="box-title">Thêm loại xe</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="execute/xuly_them_loaixe.php" method="post" data-parsley-validate="Vui lòng điền đầy đủ thông tin!" class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Tên loại xe</label>
                           <select class="form-control" style="width: 100%;" name="loaixe">
                              <?php
                                 $query_soghe=mysqli_query($conn, "SELECT * FROM loaighe");
                                 while($row_soghe=mysqli_fetch_array($query_soghe)){
                              ?>
                              <option value="<?=$row_soghe['id_loaighe']?>"><?=$row_soghe['ten_loaighe']?></option>
                              <?php } ?>								  								  								  								  								  
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="exampleInputEmail1">Hãng xe</label>
                           <select class="form-control" style="width: 100%;" name="hangxe" >
                              <?php
                                 $query_hangxe=mysqli_query($conn, "SELECT * FROM hangxe");
                                 while($row_hangxe=mysqli_fetch_array($query_hangxe)){
                              ?>
                                 <option value="<?=$row_hangxe['id_hangxe']?>"><?=$row_hangxe['ten_hangxe']?></option>
                              <?php } ?>								  							  								  								  								  								  
                           </select>
                        </div>
                        <div class="box-footer">
                           <button type="submit" class="btn btn-primary" name="themloaixe" id="themlx">Thêm</button>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                        <label>Số ghế / giường</label>
                           <input class="form-control" required name="soghe" type="text"/>
                        </div>
                     </div>
                     <!-- /.box -->
                  </div>
               </form>
            </div>
         </div>
         <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Danh sách loại xe</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="loaixe" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th>Mã loại xe</th>
                           <th>Tên hãng xe</th>
                           <th>Tên loại xe</th>
                           <th>Số ghế / giường</th>
                           <th>Trạng thái</th>
                           <th>Thao tác</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $sql= mysqli_query($conn,"SELECT * FROM loai_xe");
                           $count = mysqli_num_rows($sql);
                           if($count>0) {
                           while($row=mysqli_fetch_array($sql)){
                              $id_loaixe=$row['id_loaixe'];
                              $ten_hangxe=$row['ten_hangxe'];
                              $ten_loaixe=$row['ten_loaixe'];
                              $maxseat=$row['maxseat'];
                              $status=$row['status'];
                              
                              echo"
                              <tr>
                                 <td>$id_loaixe</td>
                                 <td>$ten_hangxe</td>
                                 <td>$ten_loaixe</td>
                                 <td>$maxseat</td>
                                 <td>$status</td>"
                        ?>
                           <td>
                              <a class="btn btn-sm btn-primary" href="edit_loaixe.php?id_loaixe=<?=$row['id_loaixe']?>">
                              <i class="fa fa-fw fa-edit"></i>Sửa</a>
                              <a class="btn btn-sm btn-danger" href="delete_loaixe.php?id_loaixe=<?=$row['id_loaixe']?>"> 
                              <i class="fa fa-fw fa-trash"></i>Xóa</a>           
                           </td>
                        </tr>
                        <?php } }?>
                     </tbody>
                     <tfoot>
                     <tr>
                        <th>Mã loại xe</th>
                        <th>Tên hãng xe</th>
                        <th>Tên loại xe</th>
                        <th>Số ghế / giường</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                     </tr>
                     </tfoot>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
   </section>