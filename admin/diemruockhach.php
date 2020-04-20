<?php
  session_start();
  error_reporting(0);
  
?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
        ĐIỂM RƯỚC KHÁCH TRUNG CHUYỂN
    </h1>
  <!-- Main content -->
  <section class="content">
    <div class="row">
    <div class="col-xs-12"></div>
        <div class="col-xs-12">
          <!-- /.box -->
            <div class="box">
              <div class="box-header">
                <h3 class="box-title" style="float: left">HÔM NAY <?php echo $today;?></h3>
                <h3 class="box-title" style="float: right; color: red; font-size: 15px; font-weight: 700px;">Thời gian hiện tại: <?php include('includes/clock_lcd.php');?></h3>
              </div>
                <?php
                    include("includes/connect.php");
                        if(isset($_GET['action']) == 'delete'){
                            $id_diem = $_GET['id_diem'];
                    $cek = mysqli_query($conn, "SELECT * FROM diem_ruockhach WHERE id_diem='$id_diem'");
                    if(mysqli_num_rows($cek) == 0){
                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Không tìm thấy dữ liệu.</div>';
                    }
                    else{
                    $delete = mysqli_query($conn, "DELETE FROM diem_ruockhach WHERE id_diem='$id_diem'");
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
                <table id="list_staff" class="table table-bordered table-striped datatable">
                <!--<button type="submit" id="addNew" name="addnew" value="1" class="btn btn-success" onclick="myFunction()">
                <i class="glyphicon glyphicon-plus-sign"></i> Xếp lịch</button>-->
                  <thead>
                    <tr>
                      <th>STT</th>                                                                             
                      <th>Họ tên khách hàng</th> 
                      <th style="width: 170px;">Số điện thoại</th>						   
                      <th>Địa chỉ rước</th>
                      <th>Ngày đi</th>
                      <th>Giờ đi</th>
                      <th></th>
                    </tr>
                  </thead> 
                  <tbody>
                  <?php
                    require("includes/connect.php");
                    $sql=mysqli_query($conn, "SELECT * FROM diem_ruockhach WHERE diachiruoc !='Bến xe Cần Thơ'");
                    $no=1;
                    while($row=mysqli_fetch_array($sql)){
                      $hoten = $row['hoten'];
                      $sdt = $row['sdt'];
                      $diachi = $row['diachiruoc'];
                      $id_phieu = $row['id_phieu'];

                      $get_id = mysqli_query($conn, "SELECT * FROM phieu_datve WHERE id_phieu = '$id_phieu'");
                      while($execute = mysqli_fetch_assoc($get_id)){
                      $ngaydi = $execute['ngaydi'];
                      $giodi = $execute['giodi'];
                    }
                  ?>
                    <tr>
                      <td class="center" style="text-align:center;"><?=$no?></td>                         
                      <td style="text-align: left; text-transform: uppercase;">
                        <?=$hoten?>
                        
                      </td>
                      <td style="text-align: center;color:blue">
                        <?=$sdt?>
                      </td>						   
                      <td style="text-align: left;">
                        <?=$diachi?>
                      </td>
                      <td><?=$row['ngaydi']?></td>
                      <td><?=$giodi?></td>
                      <td>
                      <a href="diemruockhach.php?action=delete&id_diem=<?=$row['id_diem']?>" title="Xóa dữ liệu" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                      </td>
                  </tr>
                  <?php $no++;
                    }
                  ?>
                </tbody>
              
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
   
<script>
  $('#addNew').click(function(){
  var myWindow = window.open("", "_self");
  myWindow.location.assign('xeplichchay.php');//there are many ways to do this
});
</script>
  