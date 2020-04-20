<?php
  session_start();
  
?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      LỊCH CHẠY GẦN NHẤT
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
                      <th>Tuyến đường</th> 
                      <th style="width: 170px;">Tài xế/Loại xe</th>						   
                      <th>Khởi hành</th>                        
                      <th>Kết thúc</th>                        
                      <th>Vé bán</th>                        
                      <th></th>
                    </tr>
                  </thead> 
                  <tbody>
                  <?php
                    require("includes/connect.php");
                    $sql=mysqli_query($conn, "SELECT id_lich, fromLoc, toLoc, id_loaixe, biensoxe, ten_taixe, ten_phuxe, ngaydi, giokhoihanh, DATE_FORMAT(thoigiandi, '%h:%i') as thoigiandi, diemdi, diemden, gioden, daban, giucho, conlai FROM lich_chay");
                    $no=1;
                    $abc = mysqli_fetch_assoc($sql);
                    $ngaykhoihanh = preg_replace("/\,/", "<br>", $abc['ngaydi']);
                    $tomorrow = date("d-m-Y",strtotime("tomorrow"));
                    foreach($ngaykhoihanh as $nkh){
                      if($nkh == $tomorrow || $nkh == $today || $nkh ==$today){
                      }
                      }
                    while($row=mysqli_fetch_array($sql)){
                      $giokhoihanh = $row['giokhoihanh'];
                      $thoigiandi = $row['thoigiandi'];
                      $gioden = $row['gioden'];
                      $id_loaixe = $row['id_loaixe'];
                      //lấy tên loại xe
                      $get_tenloaixe = mysqli_query($conn, "SELECT * FROM loai_xe WHERE id_loaixe='$id_loaixe'");
                      $execute = mysqli_fetch_assoc($get_tenloaixe);
                      $ten_loaixe = $execute['ten_loaixe'];
                  ?>
                    <tr>
                      <td class="center" style="text-align:center;"><?=$no?></td>                         
                      <td style="text-align: left; text-transform: uppercase;">
                        <strong><?=$row['fromLoc']?>&nbsp;&nbsp;-&nbsp;&nbsp;<?=$row['toLoc']?></strong>
                        <p>
                          Thời gian di chuyển: <span class="label label-info" style="text-align: left; font-size: 14px; color: #fff;"><?=$thoigiandi?></span>
                        </p>
                      </td>
                      <td style="text-align: right;color:blue">
                        <div class="row">
                          <div class="col-md-12">
                            <p><strong>Tài xế:</strong> <?=$row['ten_taixe']?></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <p><strong>Phụ xe:</strong> <?=$row['ten_phuxe']?></p>
                          </div>
                        </div>
                        <div class="row" style="color: #333">
                          <div class="col-md-12">
                            <p><?=$row['biensoxe']?> - <?=$ten_loaixe?></p>
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
                      <td style="text-align: right;">
                        <p>
                          <span class="label label-primary" style="font-size: 14px; color: #fff;"><?=$today?></span> 
                        </p>
                        <p>
                          <span class="label label-success" style="font-size: 14px; color: #fff;">[<?=$gioden?>]</span>
                        </p>
                        <P><?=$row['diemden']?></p>
                        </td>                         
                      <td class="center" style="text-align: right">
                        <p>Giữ chỗ: <?=$row['giucho']?></p>
                        <p>Đã bán: <?=$row['daban']?></p>
                        <p>Còn lại: <?=$row['conlai']?></p>
                      </td>                         
                      <td class="center">	                         
                        <a href="index.php?tab=lcgn&action=delete&id_lich=<?=$row['id_lich']?>" title="Xóa dữ liệu" onclick="return confirm(\'Bạn có chắc muốn xóa ?\)" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>							
                      </td>
                      <td><??></td>
                  </tr>
                  <?php $no++;
                    }
                  ?>
                </tbody>
              <tfoot>
                <tr>
                  <th>STT</th>                                                                             
                  <th>Tuyến đường</th> 
                  <th>Tài xế/Xe</th>						   
                  <th>Khởi hành</th>                        
                  <th>Kết thúc</th>                        
                  <th>Vé bán</th>
                  
                  <th></th>
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
   
<script>
  $('#addNew').click(function(){
  var myWindow = window.open("", "_self");
  myWindow.location.assign('xeplichchay.php');//there are many ways to do this
});
</script>
  
