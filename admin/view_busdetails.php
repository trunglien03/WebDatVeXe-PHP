<?php
  error_reporting(0);
  session_start();
  if(!isset($_SESSION['user']))
  {
    header('location:login.php');
  }
  include("includes/connect.php");
?>
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        <i class="fa fa-bus"></i> &nbsp;QUẢN LÝ XE LƯU HÀNH
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-bus"></i>Xe lưu hành</a></li>
         <li><a href="#">Danh sách xe</a></li>
         <li class="active">Chi tiết danh sách xe</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
        <div class="col-xs-12">
        </div>
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-bus"></i>&nbsp;Danh sách xe đang lưu hành</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="buslist" class="table table-bordered table-striped datatable">
               <button type="submit" id="themxe" name="them_xe" value="1" class="btn btn-success" onclick="myFunction()">
               <i class="glyphicon glyphicon-plus-sign"></i> Thêm xe</button>
                  <thead>
                    <tr>
                    <th>ID</th>
                    <th style="width:100px">Biển số xe</th>
                    <th style="width:70px">Loại xe</th>
                    <th>Tên xe</th>
                    <th>Tiện nghi</th>                                                                              						   
                    <th>Số ghế</th>                        
                    <th style="width:130px;">Tuyến xe</th>  
                    <th>Thao tác</th>
                    </tr>
                  </thead> 
                  <tbody>
                     <?php
                        $sql= mysqli_query($conn,"SELECT * FROM xeluuhanh WHERE status='Đang hoạt động'");
                        $count = mysqli_num_rows($sql);
                        if($count>0) {
                        while($row=mysqli_fetch_array($sql)){
                           $id_xe=$row['bid'];
                           $id_loaixe=$row['id_loaixe'];
                           $ten_xe=$row['ten_xe'];
                           $tien_nghi=$row['tiennghi'];
                           $bien_ks=$row['bienkiemsoat'];
                           $soghe=$row['soghe'];
                           $ten_noidi=$row['ten_noidi'];
                           $ten_noiden=$row['ten_noiden'];
                           
                           $query_loaixe=mysqli_query($conn, "SELECT * FROM loai_xe WHERE id_loaixe='$id_loaixe'");
                           while($row_loaixe=mysqli_fetch_array($query_loaixe)){
                              $ten_loaixe=$row_loaixe['ten_loaixe'];
                           }
                           ?>
                           <tr>
                              <td><?php echo $id_xe?></td>
                              <td style="color:#0080FF; text-align:center"><?php echo $bien_ks?></td>
                              <td><?php echo $ten_loaixe?></td>
                              <td><?php echo $ten_xe?></td>
                              <td><?php echo $tien_nghi?></td>
                              <td><?php echo $soghe?></td>
                              <td><?php echo $ten_noidi?>&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;&nbsp;<?php echo $ten_noiden?></td>
                              <td style="width: 130px;">
                              <a class="btn btn-sm btn-primary" href="edit_xe.php?id_xe=<?=$row['bid']?>">
                              <i class="fa fa-fw fa-edit"></i>Sửa</a>
                              <a class="btn btn-sm btn-danger" href="delete_xe.php?id_xe=<?=$row['bid']?>"> 
                              <i class="fa fa-fw fa-trash"></i>Xóa</a>           
                           </td>
                        </tr>
                        <?php } }?>
                  </tbody>

                     <tfoot>
                     <tr>
                        <th >ID</th>
                        <th style="width: 110px">Biển số xe</th>
                        <th>Loại xe</th>
                        <th>Tên xe</th>
                        <th>Tiện nghi</th>
                        <th>Số ghế</th>                        
                        <th style="width:150px;">Tuyến xe</th>  
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
      <!-- /.row -->
   </section>
   <!-- /.content -->


<div class="modal fade modal-wide" id="popup-busModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">View Bus Management Details</h4>
         </div>
         <div class="modal-busbody">
         </div>
         <div class="business_info">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<script>
 $(document).ready(function() {
    $('#buslist').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching": false
    } );
} );
</script>
<script>
function myFunction() {
  location.replace("add_busdetails.php");
}
</script>
<script>
   function toggleChecked(status) {
   $(".checkbox").each( function() {
      $(this).attr("checked",status);
   })
   }
</script>