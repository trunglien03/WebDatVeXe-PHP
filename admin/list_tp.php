<?php
  include("includes/header.php");
  include("includes/sidebar.php");
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-bus"></i>Quản lý chung</a></li>
      <li><a href="add_city.php">Thêm mới điểm khởi hành từ các thành phố lớn</a></li>
      <li class="active">Danh sách điểm khởi hành từ các thành phố lớn</li>
    </ol>
  </section>
<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-12"></div>
        <div class="col-xs-12">
          <!-- /.box -->
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">DANH SÁCH ĐIỂM KHỞI HÀNH TỪ CÁC THÀNH PHỐ LỚN</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="" class="table table-bordered table-striped datatable">
                  <thead>
                    <tr>
                      <th readonly>ID</th>
                      <th>Tên thành phố</th>                                                                             
                      <th>Hình ảnh</th> 
                      <th>Điểm đến</th>						   
                      <th width="200px;">Thao tác</th>
                    </tr>
                  </thead> 
                  <tbody>
                      <?php 
                        require("includes/connect.php");
                        $sql= mysqli_query($conn,"SELECT * FROM thanhpholon");
                        $count = mysqli_num_rows($sql);
                        if($count>0) {
                            while($row=mysqli_fetch_array($sql)){
                                $id_tp=$row['id_tp'];
                                $ten_tp=$row['ten_tp'];
                                $hinhanh=$row['hinhanh'];
                                $diem_den=$row['diem_den'];
                                echo"
                                <tr>
                                    <td>$id_tp</td>
                                    <td>$ten_tp</td>
                                    <td><img src=\"".$row['hinhanh']."\" width=\"150px\" height=\"100x\"></td>
                                    <td>$diem_den</td>"
                                    ?>
                                    <td class="center">
                                        <a class="btn btn-sm btn-primary" href="edit_tp.php?&id_tp=<?=$row['id_tp']?>">
                                        <i class="fa fa-fw fa-edit"></i>Sửa</a>
                                        <a class="btn btn-sm btn-danger" href="delete_tp.php?&id_tp=<?=$row['id_tp']?>" onClick="return doconfirm()">
                                        <i class="fa fa-fw fa-trash"></i>Xóa</a>							
                                    </td>
                                </tr>
                            <?php } }?>
                </tbody>
              <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Tên thành phố</th>                                                  
                    <th>Hình ảnh</th>
                    <th>Điểm đến</th>
                    <th>Action</th>
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
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
  <?php
  include("includes/script.php");
  include("includes/footer.php");
  ?>