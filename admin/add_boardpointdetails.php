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
        THÊM MỚI NƠI ĐI
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-bus"></i>Quản lý chung</a></li>
         <li><a href="index.php?tab=tmtđ">Tuyến đường</a></li>
         <li class="active">Thêm mới nơi đi</li>
      </ol>
   </section>
   <!-- Main content -->	
   <section class="content">
      <div class="row">
	   <div class="col-md-12"></div>
      <div class="tab">
         <button class="tablinks" onclick="openCity(event, 'noidi')" id="defaultOpen"><h4 class="box-title">Thêm nơi đi</h4></button>
         <button class="tablinks" onclick="openCity(event, 'noiden')"><h4 class="box-title">Thêm nơi đến</h4></button>
      </div>
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-warning">
            <div id="noidi" class="tabcontent">
               <form role="form" action="execute/xuly_add_boardpointdetails.php" method="post" data-parsley-validate="Vui lòng điền đầy đủ thông tin!" class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Tên nơi đi</label>
                           <input type="text" class="form-control" name="ten_noidi" placeholder="Nhập tên nơi đi">
                        </div>
                        <div class="box-footer">
                           <button type="submit" class="btn btn-primary" name="themnoidi" id="themnoidi">THÊM</button>
                        </div>
                     </div>
                  </div>
               </form>

               <div class="box-body">
                  <div class="col-xs-12">
                     <div class="box">
                        <div class="box-header">
                           <h3 class="box-title">Danh sách nơi đi</h3>
                        </div>
                        <?php
                           include("includes/connect.php");
                              if(isset($_GET['action']) == 'delete'){
                                 $id_noidi = $_GET['id_noidi'];
                                 $cek = mysqli_query($conn, "SELECT * FROM noidi WHERE id_noidi=$id_noidi");
                                 if(mysqli_num_rows($cek) == 0){
                                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Không tìm thấy dữ liệu.</div>';
                                    }
                                 else{
                                    $delete = mysqli_query($conn, "DELETE FROM noidi WHERE id_noidi=$id_noidi");
                                    if($delete){
                                       echo '<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Dữ liệu đã được xóa thành công.</div>';
                                    }
                                    else{
                                       echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Không thể xóa được dữ liệu.</div>';
                                    }
                                 }
                              }
                        ?>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <table id="loaixe" class="table table-bordered table-striped datatable">
                              <thead>
                                 <tr>
                                    <th>STT</th>
                                    <th>Tên nơi đi</th>
                                    <th>Thao tác</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $sql= mysqli_query($conn,"SELECT * FROM noidi");
                                    $count = mysqli_num_rows($sql);
                                    if($count>0) {
                                    while($row=mysqli_fetch_array($sql)){
                                       $id_noidi=$row['id_noidi'];
                                       $ten_noidi=$row['ten_noidi'];
                                       echo"
                                       <tr>
                                          <td>$id_noidi</td>
                                          <td>$ten_noidi</td>"
                                 ?>
                                 <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?=$id_noidi?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>                                 
                                    <a href="index.php?tab=tmnoidi&action=delete&id_noidi=<?=$row['id_noidi']?>" title="Xóa dữ liệu" onclick="return confirm(\'Bạn có chắc muốn xóa '.$row['ten_noidi'].'?\)" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>           
                                 </td>
                              </tr>
                                 <!-- Modal -->
                                 <div class="modal fade" id="myModal<?=$id_noidi?>" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                    <form method="post" action="execute/xuly_edit_noidi.php">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             <!--  <h4 class="modal-title">Modal Header</h4> -->
                                          </div>
                                          <div class="modal-body">
                                             <h4>Sửa tên <strong><?=$ten_noidi?></strong></h4>
                                             <hr>
                                             <label>Tên nơi đi</label>
                                             <input type="text" name="ten_noidi" class="form-control" value="<?=$ten_noidi?>">
                                             <input type="text" name="id_noidi" class="form-control hidden" value="<?=$id_noidi?>">
                                          <div class="modal-footer">
                                             <button type="submit" class="btn btn-primary" name="suanoidi">Lưu</button>
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                          </div>
                                       </div>
                                    </form>
                                    </div>
                                 </div>
                              <?php } }?>
                           </tbody>
                           <tfoot>
                              <tr>
                                 <th>Mã nơi đi</th>
                                 <th>Tên nơi đi</th>
                                 <th>Thao tác</th>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                  <!-- /.box-body -->
               </div>
            <!-- /.box -->
         </div>
      </div>   
</div>
            <div id="noiden" class="tabcontent">
               <form role="form" action="execute/xuly_add_boardpointdetails2.php" method="post" data-parsley-validate="Vui lòng điền đầy đủ thông tin!" class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Tên nơi đi</label>
                           <select id="fromLoc" name="fromLoc" class="form-control" placeholder="Chọn nơi đi" data-id="board_point" tabindex="6" required>
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
                        </div>
                        <div class="box-footer">
                           <button type="submit" class="btn btn-primary" name="themnoiden" id="themnoiden">THÊM</button>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Tên nơi đến</label>
                           <input type="text" class="form-control" name="ten_noiden">
                        </div>
                     </div>
                  </div>
               </form>

               <div class="box-body">      
                  <div class="col-xs-12">                    
                     <div class="box">
                        <div class="box-header">
                           <h3 class="box-title">Danh sách nơi đến</h3>
                        </div>
                        <?php
                           include("includes/connect.php");
                              if(isset($_GET['action']) == 'delete'){
                                 $id_noiden = $_GET['id_noiden'];
                                 $cek = mysqli_query($conn, "SELECT * FROM noiden WHERE id_noiden=$id_noiden");
                                 if(mysqli_num_rows($cek) == 0){
                                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Không tìm thấy dữ liệu.</div>';
                                    }
                                 else{
                                    $delete = mysqli_query($conn, "DELETE FROM noiden WHERE id_noiden=$id_noiden");
                                    if($delete){
                                       echo '<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Dữ liệu đã được xóa thành công.</div>';
                                    }
                                    else{
                                       echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Không thể xóa được dữ liệu.</div>';
                                    }
                                 }
                              }
                        ?>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <table id="loaixe" class="table table-bordered table-striped datatable">
                              <thead>
                                 <tr>
                                    <th>Mã nơi đến</th>
                                    <th>Tên nơi đi</th>
                                    <th>Tên nơi đến</th>
                                    <th>Thao tác</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $sql= mysqli_query($conn,"SELECT * FROM noiden  INNER JOIN noidi ON noidi.id_noidi = noiden.id_noidi");
                                    $count = mysqli_num_rows($sql);
                                    if($count>0) {
                                    while($row=mysqli_fetch_array($sql)){
                                       $id_noiden=$row['id_noiden'];
                                       $ten_noidi=$row['ten_noidi'];
                                       $ten_noiden=$row['ten_noiden'];
                                       echo"
                                       <tr>
                                          <td>$id_noiden</td>
                                          <td>$ten_noidi</td>
                                          <td>$ten_noiden</td>"
                                 ?>
                                 <td>
                                 <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal2<?=$id_noiden?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>                                 
                                    <a href="index.php?tab=tmnoidi&action=delete&id_noiden=<?=$row['id_noiden']?>" title="Xóa dữ liệu" onclick="return confirm(\'Bạn có chắc muốn xóa '.$row['ten_noiden'].'?\)" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                 </td>
                              </tr>
                              <!-- Modal -->
                              <div class="modal fade" id="myModal2<?=$id_noiden?>" role="dialog">
                                 <div class="modal-dialog modal-lg">
                                    <form method="POST" action="execute/xuly_edit_noiden.php">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          </div>
                                          <div class="modal-body">
                                             <h4>Sửa tên <strong><?=$ten_noiden?></strong></h4>
                                             <hr>
                                             <label>Tên nơi đến</label>
                                             <input type="text" name="ten_noiden" class="form-control" value="<?=$ten_noiden?>">
                                             <input type="text" name="id_noiden" class="form-control hidden" value="<?=$id_noiden?>">
                                          <div class="modal-footer">
                                             <button type="submit" class="btn btn-primary" name="suanoiden">Lưu</button>
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                              <?php } }?>
                           </tbody>
                        </table>
                     </div>
                  <!-- /.box-body -->
               </div>
            <!-- /.box -->
         </div>
      </div>
   </div>
</div>
</section>

<script>
   function openCity(evt, cityName) {
   var i, tabcontent, tablinks;
   tabcontent = document.getElementsByClassName("tabcontent");
   for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
   }
   tablinks = document.getElementsByClassName("tablinks");
   for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
   }
   document.getElementById(cityName).style.display = "block";
   evt.currentTarget.className += " active";
   }

   // Get the element with id="defaultOpen" and click on it
   document.getElementById("defaultOpen").click();
</script>