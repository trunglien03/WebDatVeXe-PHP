<?php
  session_start();
  include("includes/header.php");
  include("includes/sidebar.php");
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      LỊCH CHẠY XE TRUNG CHUYỂN
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
				        $id_lich = $_GET['id_lich'];
                $cek = mysqli_query($conn, "SELECT * FROM lich_chay WHERE id_lich='$id_lich' ");
                if(mysqli_num_rows($cek) == 0){
                  echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Không tìm thấy dữ liệu.</div>';
                }
                else{
                  $delete = mysqli_query($conn, "DELETE FROM lich_chay WHERE id_lich='$id_lich'");
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
                <table id="schedules" class="table table-bordered table-striped datatable">
                <button type="submit" id="addNew" name="addnew" value="1" class="btn btn-success" onclick="myFunction()">
                <i class="glyphicon glyphicon-plus-sign"></i> Xếp lịch</button>
                  <thead>
                    <tr>
                      <th>STT</th>                                                                             
                      <th>Quận</th> 
                      <th style="width: 170px;">Tài xế/Loại xe</th>						   
                      <th>Khởi hành</th>                        
                      <th>Số lượng khách</th>                        
                      <th></th>
                    </tr>
                  </thead> 
                  <tbody>
                  <?php
                    require("includes/connect.php");
                    $sql=mysqli_query($conn, "SELECT * FROM lich_trungchuyen");
                    $no=1;
                    while($row=mysqli_fetch_array($sql)){
                        $noidi = $row['noidi'];
                        $giokhoihanh = $row['giokhoihanh'];
                        $biensoxe = $row['biensoxe'];
                      
                  ?>
                    <tr>
                      <td class="center" style="text-align:center;"><?=$no?></td>                         
                      <td style="text-align: left; text-transform: uppercase;">
                        <?=$row['noidi']?>
                      </td>
                      <td style="text-align: right;color:blue">
                        <div class="row">
                          <div class="col-md-12">
                            <p><strong>Tài xế:</strong> <?=$row['ten_taixe']?></p>
                          </div>
                        </div>
                        
                        <div class="row" style="color: #333">
                          <div class="col-md-12">
                            <p><?=$row['biensoxe']?></p>
                          </div>
                        </div>
                      </td>						   
                      <td style="text-align: right;">
                        <div class="row">
                          <div class="col-md-12">
                            <p>
                              <span class="label label-primary" style="font-size: 14px; color: #fff;"><?=$today?></span>
                            </p>
                            <p>
                              <span class="label label-warning" style="font-size: 14px; color: #fff;">[<?=$row['giokhoihanh']?>]</span></p>
                            <p><?=$row['diemdi']?></p>
                          </div>
                        </div>
                      </td>                         
                      
                        <?php 
                            $get=mysqli_query($conn, "SELECT COUNT(*) AS soluongkhach FROM diem_ruockhach WHERE diachiruoc LIKE '%$noidi%'");
                            while($ex=mysqli_fetch_array($get)){
                                $count = $ex['soluongkhach'];
                                $khach = mysqli_query($conn, "SELECT * FROM diem_ruockhach WHERE diachiruoc LIKE '%$noidi%'");
                                while($exe = mysqli_fetch_array($khach)){
                                    $hoten_kh = $exe['hoten'];
                                    $sdt = $exe['sdt'];
                                    $diachi = $exe['diachiruoc'];
                                
                            
                        ?>
                        <td style="text-align: right;">
                        <span class="label label-primary" style="font-size: 14px; color: #fff;"><?=$count?></span> <br>
                        <p>Họ tên khách: <?=$hoten_kh?></p>
                        <p>Di động khách: <?=$sdt?></p>
                        <p>Địa chỉ rước: <?=$diachi?></p>
                        </td>                         
                        <?php }
                        }?>
                      <td class="center">	                         
                        <a href="index.php?tab=lcgn&action=delete&id_lich=<?=$row['id_lich']?>" title="Xóa dữ liệu" onclick="return confirm(\'Bạn có chắc muốn xóa ?\)" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>							
                      </td>
                      <td><??></td>
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
</div>
<script>
  $('#addNew').click(function(){
  var myWindow = window.open("", "_self");
  myWindow.location.assign('lichchaytrungchuyen.php');//there are many ways to do this
});
</script>
  

<?php
    include("includes/scripts.php");
    include("includes/footer.php");
?>