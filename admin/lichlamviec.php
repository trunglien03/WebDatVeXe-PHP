
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      LỊCH LÀM VIỆC
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
              
              <!-- /.box-header -->
              <div class="box-body">
                <table id="schedules" class="table table-bordered table-striped datatable">
                
                  <thead>
                    <tr>
                      <th>STT</th>                                                                             
                      <th>Tuyến đường</th>
                      <th>Loại xe</th>
                      <th>Xe</th>
                      <th>Phụ xe đi cùng</th>						   
                      <th>Khởi hành</th>                        
                      <th>Kết thúc</th>                        
                      <th>Số khách</th>                        
                    </tr>
                  </thead> 
                  <tbody>
                  <?php
                    require("includes/connect.php");
                    
                    $username = $_SESSION['user'];
                    $select = mysqli_query($conn, "SELECT * FROM nhanvien WHERE username='$username'");
                    $row1=mysqli_fetch_assoc($select);
                        $ten_nhanvien = $row1['hoten'];
                    
                    $sql=mysqli_query($conn, "SELECT * FROM lich_chay WHERE ten_phuxe = '$ten_nhanvien' or ten_taixe='$ten_nhanvien'");
                    $no=1;
        
                    
                    
                    while($row=mysqli_fetch_array($sql)){
                    $ngaykhoihanh = preg_replace("/\,/", "<br>", $abc['ngaydi']);
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
                      <td >
                        
                     <?=$ten_loaixe?>
                          
                      </td>						   
                      <td style="text-align: right;">
                        <?=$row['biensoxe']?>
                      </td>                         
                      <td style="text-align: right;">
                        Tài xế: <?=$row['ten_taixe']?><br>
                        Phụ xe: <?=$row['ten_phuxe']?>
                        </td>                         
                      <td class="center" style="text-align: right">
                      <?=$row['giokhoihanh']?>
                      </td>                         
                      <td class="center">	                         
                      <?=$row['gioden']?>
                      </td>
                      <td><?=$row['daban']?></td>
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
  
