<?php 
  include("includes/header.php");
  include("includes/sidebar.php");  
?>
<div class="content-wrapper" >
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fas fa-tools"></i>&nbsp;Quản lý chung</a></li>
      <li><a href="index.php?tab=themnv">Quản lý tuyến đường</a></li>
      <li class="active">Danh sách tuyến đường</li>
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
              <h3 class="box-title">DANH SÁCH TUYẾN ĐƯỜNG</h3>
            </div>
            <?php
              include("includes/connect.php");
			        if(isset($_GET['action']) == 'delete'){
                $rid = $_GET['rid'];
                $cek = mysqli_query($conn, "SELECT * FROM route WHERE rid='$rid'");
                if(mysqli_num_rows($cek) == 0){
                  echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Không tìm thấy dữ liệu.</div>';
                        }
                else{
                  $delete = mysqli_query($conn, "DELETE FROM route WHERE rid='$rid'");
                if($delete){
                  echo '<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Dữ liệu đã được xóa thành công.</div>';
                }
                else{
                  echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Không thể xóa được dữ liệu.</div>';
              }
            }
			    }
			    ?>

            <div class="row" style="margin-top: 10px;">
              <div class="col col-md-6">
                <button type="submit" name="themtd" value="1" class="btn btn-success" onclick="myFunction()" style="margin-left: 10px;">
                <i class="glyphicon glyphicon-plus-sign"></i> Thêm tuyến đường</button>
              </div>
              <div class="col col-md-3"></div>
              <div class="col col-md-3">
                <form class="form-inline" method="get" style="margin-left: 70px;">
                    <div class="form-group">
                      <select name="filter" class="form-control" onchange="form.submit()">
                        <option value="0">Bộ lọc thông tin</option>
                        <?php $filter = (isset($_GET['filter']) ? ($_GET['filter']) : NULL);  ?>
                        <option value="Giường nằm thường" <?php if($filter == 'Giường nằm thường'){ echo 'selected'; } ?>>Giường nằm thường</option>
                        <option value="Giường nằm vip" <?php if($filter == 'Giường nằm vip'){ echo 'selected'; } ?>>Giường nằm vip</option>
                        <option value="Ghế nằm vip" <?php if($filter == 'Ghế nằm vip'){ echo 'selected'; } ?>>Ghế nằm vip</option>
                        <option value="Phòng nằm" <?php if($filter == 'Phòng nằm'){ echo 'selected'; } ?>>Phòng nằm</option>
                      </select>
                    </div>
                </form>
              </div>
                </div>
			    <div class="box-body">
                    <table id="list_staff" class="table table-bordered table-striped datatable">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã tuyến đường</th>
                                <th>Loại xe</th>
                                <th width="130px">Nơi đi</th>
                                <th width="130px">Nơi đến</th>
                                <th>Giờ xuất bến</th>
                                <th>Số chuyến/ngày</th>
                                <th>Giá vé</th>
                                <th>Số ghế</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($filter){
                                $sql = mysqli_query($conn, "SELECT * FROM route INNER JOIN loai_xe ON route.bid = loai_xe.id_loaixe WHERE loai_xe.ten_loaixe='$filter' ORDER BY rid ASC");
                            }else{
                                $sql = mysqli_query($conn, "SELECT * FROM route INNER JOIN loai_xe ON route.bid = loai_xe.id_loaixe ORDER BY rid ASC");
                            }
                            $num = mysqli_num_rows($sql);
                            if($num == 0){
                                echo '<tr><td colspan="8">Chưa có dữ liệu</td></tr>';
                            }else{
                              $no = 1;
                              while($row = mysqli_fetch_assoc($sql)){
                                $rid = $row['rid'];
                                $number = $row['fare'];
                                $giave = number_format($number ,0 ,'.' ,'.').' VNĐ';
                                $thoigiankhoihanh = preg_replace("/\,/", "<br>", $row['thoigiankhoihanh']);
                            ?>
                            <tr>
                                <td style="text-align:center"><?=$no?></td>
                                <td style="text-align:center"><?=$rid?></td>
                                <td style="text-align:center"><?=$row['ten_loaixe']?></td>
                                <td style="text-align:center"><?=$row['fromLoc']?></td>
                                <td style="text-align:center"><?=$row['toLoc']?></td>
                                <td style="text-align:center">
                                  <button class="btn btn-default" data-toggle="modal" data-target="#myModal<?=$rid?>" style="height: 30px; width: 40px;">
                                    <i class="fa fa-clock-o"></i>
                                  </button>
                                </td>
                                <td style="text-align:center;"><?=$row['sochuyen']?></td>
                                <td style="text-align:center"><?=$giave?></td>
                                <td style="text-align:center"><?=$row['maxseats']?></td>
                                <td>
                                    <a href="edit_routedetails.php?&rid=<?=$row['rid']?>" title="Cập nhật" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                    <a href="view_routedetails.php?action=delete&rid=<?=$row['rid']?>" title="Xóa dữ liệu" onclick="return confirm(\'Bạn có chắc muốn xóa '.$row['rid'].'?\)" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                </td>
                            </tr>
                            <!--MODAL-->
                            <div class="modal fade" id="myModal<?=$rid?>" role="dialog">
                              <div class="modal-dialog modal-lg">
                                <form>
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h3 style="text-transform: uppercase; text-align:center">GIỜ KHỞI HÀNH TUYẾN: <strong><?=$row['fromLoc']?>&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;&nbsp;&nbsp;<?=$row['toLoc']?></strong></h3>
                                    </div>
                                    <div class="modal-body" style="text-align:center">
                                      <div class="row">
                                        <div class="col-md-3">
                                          <label>ĐIỂM ĐI</label>
                                        </div>
                                        <div class="col-md-3">
                                          <label>ĐIỂM ĐẾN</label>
                                        </div>
                                        <div class="col-md-3">
                                          <label>THỜI GIAN ĐI</label>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p><?=$row['fromLoc']?></p>
                                        </div>
                                        <div class="col-md-3">
                                          <p><?=$row['toLoc']?></p>
                                        </div>
                                        <div class="col-md-3" style="line-height: 3.0;">
                                          <p><?=$thoigiankhoihanh?></p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          <?php $no++;
                        }
                      }
                    ?>
                </tbody>
			</table>
        </div>
    </div>
  </div>
</section>
<!-- /.content -->
</div>

  <script>
    function myFunction() {
      location.replace("index.php?tab=tmtđ")
    }
  </script>

<?php
  include("includes/scripts.php");
  include("includes/footer.php");
?>