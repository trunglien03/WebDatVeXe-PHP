<?php
  error_reporting(0);
  include("includes/header.php");
  include("includes/sidebar.php");

  $today = date("d/m/Y");
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      DANH SÁCH KHÁCH HÀNG MUA VÉ
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-book"></i>Quản lý chung</a></li>
      <li><a href="#">Quản lý khách hàng - thành viên</a></li>
      <li class="active">Danh sách khách hàng</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12"></div>
      <?php
        include("includes/connect.php");
        if(isset($_GET['action']) == 'delete'){
          $id_phieu = $_GET['id_phieu'];
          $cek = mysqli_query($conn, "SELECT * FROM phieu_datve WHERE id_phieu='$id_phieu'");
          if(mysqli_num_rows($cek) == 0){
            echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Không tìm thấy dữ liệu.</div>';
          }
          else{
            $delete = mysqli_query($conn, "DELETE FROM phieu_datve WHERE id_phieu='$id_phieu'");
              if($delete){
                echo '<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Dữ liệu đã được xóa thành công.</div>';
              }
              else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Không thể xóa được dữ liệu.</div>';
              }
          }
        }
      ?>
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách khách hàng vé đi ngày <?php echo $today;?></h3>
            </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id=""  class="table table-bordered table-striped datatable">
                    <thead>
                      <tr>
                        <th style="text-align: center">Mã phiếu</th>
                        <th style="width: 150px; text-align: center">Họ tên KH</th>
                        <th style="width: 170px; text-align: center">Tuyến đường</th>
                        <th style="width: 100px; text-align: center">Loại xe</th> 						   
                        <th style="width: 100px; text-align: center">Số vé - Số KĐC</th>
                        <th style="width: 200px; text-align: center">Điểm lên/xuống xe</th> 		                                                   
                        <th style="width: 80px; text-align: center">Thời gian khởi hành</th>						   
                        <th style="text-align: center">Vị trí ghế</th>
                        <th style="text-align: center">Trạng thái</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $sql = mysqli_query($conn, "SELECT * FROM phieu_datve WHERE diemlenxe!='Bến xe Cần Thơ'");
                      while($row=mysqli_fetch_array($sql)){
                        $hoten = $row['hoten'];
                        $sove = $row['sove'];
                        $sokhach = $sove-1;
                        $id_loaixe = $row['loaixe'];
                        $id_phieu = $row['id_phieu'];
                        $giodi = $row['giodi'];

                        //get tên loại xe
                        $get=mysqli_query($conn, "SELECT * FROM loai_xe WHERE id_loaixe='$id_loaixe'");
                        $exe = mysqli_fetch_array($get);
                        $ten_loaixe = $exe['ten_loaixe'];
                    ?>
                      <tr>
                        <td class="center">
                          <a href="#myModals" data-toggle="modal" data-target="#myModals<?=$id_phieu?>"><?=$row['id_phieu']?></a>
                        </td>
                        <td class="center"><?=$row['hoten']?></td>                                                
                        <td class="center"><?=$row['tuyenduong']?></td>                                                 
                        <td class="center"><?=$ten_loaixe?></td>                                                 
                        <td class="center">
                          Số vé: <?=$row['sove']?>
                          <br>
                          Số KĐC: <?=$sokhach?>
                        </td>                         
                        <td class="center">
                          <p style=""><strong>Điểm lên xe:</strong>&nbsp;&nbsp;<?=$row['diemlenxe']?></p>
                          <p style=""><strong>Điểm xuống xe:&nbsp;&nbsp;</strong><?=$row['diemxuongxe']?></p>
                        </td>  
                        <td class="center"><?=$row['giodi']?></td>  
                        <td class="center"><?=$row['vitrighe']?></td>
                        <td class="center" style="text-align:center;">
                          <?php
                            if($row['pttt']=='ATM' || $row['pttt']=='Cash'){
                          ?>
                            <span class="label label-success" style="font-size: 13px;">Đã thanh toán</span>
                          <?php }elseif($row['pttt']=='Booking'){?>
                            <span class="label label-warning" style="font-size: 13px;">Đặt vé</span>
                          <?php }?>
                        </td>
                        <td class="center">	                         
                          <a href="view_bookingdetails.php?action=delete&id_phieu=<?=$row['id_phieu']?>" title="Xóa dữ liệu" onclick="return confirm(\'Bạn có chắc muốn xóa phiếu đặt vé '.$row['id_phieu'].' của khách hàng '.$row['hoten].'?\)" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        </td>
                      </tr>
                      <!--MODAL-->
                      <div class="modal fade" id="myModals<?=$id_phieu?>" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                  <span aria-hidden="true">&times;</span>
                                  <span class="sr-only">Đóng</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel" style="text-align:center">
                                  Khách hàng:&nbsp;&nbsp;<strong><?=$row['hoten']?></strong><br>
                                  Mã khách hàng:&nbsp;&nbsp;<strong><?=$row['ma_kh']?></strong> 
                                </h4>
                            </div>
                                
                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form" method="post" action="xulymuave.php">
                                    <input value="<?=$toLoc?>" name="toLoc" type="hidden">
                                    <input value="<?=$id_xe?>" name="id_xe" type="hidden">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box">
                                                <div class="box-body">
                                                <h4>THÔNG TIN CHI TIẾT VÉ</h4>
                                                <div class="col-md-5" >

                                                  <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-6">
                                                        <label for="exampleInputEmail1">Mã vé:</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <p style="color: #fb6330; font-size: 15px;">
                                                          <?=$row['id_phieu']?>
                                                        </p>
                                                      </div>
                                                    </div>
                                                  </div>

                                                <!--Thời gian-->
                                                  <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-6">
                                                        <label for="exampleInputEmail1">Thời gian khởi hành:</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <p style="color: #fb6330; font-size: 15px;">
                                                          <?=$row['giodi']?> - <?=$row['ngaydi']?>
                                                        </p>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-6">
                                                        <label for="exampleInputEmail1">Điểm lên xe:</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <p><?=$row['diemlenxe']?></p>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <!--Số ĐTDĐ-->
                                                  <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-6">
                                                        <label for="exampleInputEmail1">Thời gian đến:</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <p style="color: #fb6330; font-size: 15px;">
                                                          <?php
                                                            $query=mysqli_query($conn, "SELECT * FROM lich_chay WHERE toLoc='$toLoc' and id_loaixe='$id_loaixe' and giokhoihanh='$giodi'");
                                                            $execute = mysqli_fetch_assoc($query);
                                                            $gioden = $execute['gioden'];
                                                          ?>
                                                          <?=$gioden?>
                                                        </p>
                                                      </div>
                                                    </div>
                                                  </div>

                                              <!--khách đi cùng-->
                                                  <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-6">
                                                        <label for="exampleInputEmail1">Số khách đi cùng:</label>
                                                      </div>
                                                      <div class="col-md-6">
                                                        <p style="font-size: 15px;"><?=$row['sokhach_dicung']?></p>
                                                      </div>
                                                    </div>
                                                  </div>
                                                
                                                <!--Vị trí ghế-->
                                                    <div class="form-group">
                                                      <div class="row">
                                                        <div class="col-md-6">
                                                          <label for="exampleInputEmail1">Vị trí ghế:</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <p style="font-size: 15px;"><?=$row['vitrighe']?></p>
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <div class="form-group">
                                                      <div class="row">
                                                        <div class="col-md-6">
                                                          <label for="exampleInputEmail1">Trạng thái:</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <p style="font-size: 15px;">
                                                            <?php
                                                              if($row['pttt']=='ATM'){
                                                            ?>
                                                              <span class="">Đã thanh toán</span>
                                                            <?php }elseif($row['pttt']=='Booking'){?>
                                                              <span class="">Đặt chỗ</span>
                                                            <?php }?>
                                                          </p>
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <div class="form-group">
                                                      <div class="row">
                                                        <div class="col-md-6">
                                                          <label for="exampleInputEmail1">Tổng tiền:</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <p style="font-size: 15px;">                                                     
                                                            <?=$row['tongtien']?>
                                                          </p>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-2"></div>

                                                <h4>THÔNG TIN KHÁCH ĐẶT VÉ</h4>
                                                <div class="col-md-5" style="margin-left: 30px;">
                                                    <!--Mã vé-->
                                                    <div class="form-group">
                                                      <div class="row">
                                                        <div class="col-md-6">
                                                          <label>Mã khách hàng</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <p><?=$row['ma_kh']?></P>
                                                        </div>
                                                      </div>  
                                                    </div>

                                                    <!--Giá vé-->
                                                    <div class="form-group">
                                                      <div class="row">
                                                        <div class="col-md-6">        
                                                          <label>Họ tên</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <p><?=$row['hoten']?></p>
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <!--Địa chỉ-->
                                                    <div class="form-group">
                                                      <div class="row">  
                                                        <div class="col-md-6">
                                                          <label>Địa chỉ</label>
                                                        </div>
                                                        <div class="col-md-6">  
                                                          <p><?=$row['diachi']?></p>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    
                                                    <!--Số điện thoại-->
                                                    <div class="form-group">
                                                      <div class="row">
                                                        <div class="col-md-6">
                                                          <label for="exampleInputEmail1">Số điện thoại</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <p><?=$row['didong']?></p>
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <!--Số CMND-->
                                                    <div class="form-group has-feedback">
                                                      <div class="row">
                                                        <div class="col-md-6">
                                                          <label for="exampleInputEmail1">Số CMND</label>                                                                            
                                                        </div>
                                                        <div class="col-md-6">
                                                          <p><?=$row['soCMND']?></p>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <br>
                                                    <?php
                                                      if($sove>1){
                                                    ?>
                                                    <h4 class="modal-tittle">THÔNG TIN KHÁCH ĐI CÙNG</h4>
                                                    <div class="row">
                                                      <div class="col-md-4">
                                                        <label for="exampleInputEmail1">Họ tên</label>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <label for="exampleInputEmail1">Số điện thoại</label>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <label for="exampleInputEmail1">Điểm lên xe</label>
                                                      </div>
                                                    </div>
                                                    <?php
                                                      $get_khach = mysqli_query($conn, "SELECT * FROM diem_ruockhach WHERE id_phieu='$id_phieu' and hoten !='$hoten'");
                                                      while($tt=mysqli_fetch_array($get_khach)){
                                                    ?>
                                                    <div class="row">
                                                      <div class="col-md-4">
                                                        <p><?=$tt['hoten']?></p>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <p><?=$tt['sdt']?></p>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <p><?=$tt['diachiruoc']?></p>
                                                      </div>
                                                    </div>
                                                    <?php }}?>
                                                    <!--Button THÊM-->
                                                    <div class="box-footer">
                                                        <button class="btn btn-primary" type="button" data-dismiss="modal">OK</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                      <!--MODAL-->
                    <?php }?>
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

<div class="modal fade modal-wide" id="popup-bookingpointModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">View Booking Details</h4>
         </div>
         <div class="modal-bookingbody">
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
<?php
  include("includes/scripts.php");
  include("includes/footer.php");
?>