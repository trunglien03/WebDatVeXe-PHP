<?php
  error_reporting(0);
  include("includes/header.php");
  include("includes/sidebar.php");
?>
<div class="content-wrapper" >
<!-- Content Header (Page header) -->
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fas fa-tools"></i>&nbsp;Quản lý chung</a></li>
      <li><a href="index.php?tab=themnv">Quản lý tài xế và phụ xe</a></li>
      <li class="active">Danh sách tài xế và phụ xe </li>
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
                    <h3 class="box-title">DANH SÁCH TÀI XẾ VÀ PHỤ XE</h3>
                </div>
                <?php
                    include("includes/connect.php");
			        if(isset($_GET['action']) == 'delete'){
				    $manv = $_GET['manv'];
				    $cek = mysqli_query($conn, "SELECT * FROM nhanvien WHERE manv='$manv' ");
				    if(mysqli_num_rows($cek) == 0){
					    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Không tìm thấy dữ liệu.</div>';
                    }
                    else{
					    $delete = mysqli_query($conn, "DELETE FROM nhanvien WHERE manv='$manv'");
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
                        <button type="submit" name="themnv" value="1" class="btn btn-success" onclick="myFunction()" style="margin-left: 10px;">
                        <i class="glyphicon glyphicon-plus-sign"></i> Thêm nhân viên</button>
                    </div>
                    <div class="col col-md-4"></div>
                    <div class="col col-md-2" style="padding-left: 0px;">
                        <form class="form-inline" method="get">
                            <div class="form-group" style="margin-left: 20px;">
                                <select name="filter" class="form-control" onchange="form.submit()">
                                    <option value="0">Bộ lọc thông tin</option>
                                    <?php $filter = (isset($_GET['filter']) ? ($_GET['filter']) : NULL);  ?>
                                    <option value="Tài xế" <?php if($filter == 'Tài xế'){ echo 'selected'; } ?>>Tài xế</option>
                                    <option value="Phụ xe" <?php if($filter == 'Phụ xe'){ echo 'selected'; } ?>>Phụ xe</option>
                                    <option value="Tài xế trung chuyển" <?php if($filter == 'Tài xế trung chuyển'){ echo 'selected'; } ?>>Tài xế trung chuyển</option>
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
                                <th style="width: 100px;">Mã nhân viên</th>
                                <th>Họ và tên</th>
                                <th>Di động</th>
                                <th>Chức vụ</th>
                                <th>Ngày vào làm</th>
                                <th style="width: 250px;">Tuyến đường phụ trách</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($filter){
                                $sql = mysqli_query($conn, "SELECT * FROM nhanvien WHERE chucvu='$filter' ORDER BY manv ASC");
                            }else{
                                $sql = mysqli_query($conn, "SELECT * FROM nhanvien ORDER BY manv ASC");
                            }
                            if(mysqli_num_rows($sql) == 0){
                                echo '<tr><td colspan="8">Thiếu dữ liệu</td></tr>';
                            }else{
                                $no = 1;
                                while($row = mysqli_fetch_assoc($sql)){
                                    $chucvu = $row['chucvu'];
                                    $manv = $row['manv'];
                                    $dob=$row['ngaysinh'];
                                    $timestamp1 = strtotime($dob);
                                    $ngaysinh = date("d/m/Y", $timestamp1);
                                    $date=$row['ngayvaolam'];
                                    $timestamp = strtotime($date);
                                    $ngayvaolam = date("d/m/Y", $timestamp);
                                    $noiden = preg_replace("/\,/", "<br>", $row['toLoc']);
                            ?>
                            <tr>
                                <td style="text-align:center"><?=$no?></td>
                                <td style="text-align:center"><?=$manv?></td>
                                <td style="color:#3c8dbc"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?=$row['hoten']?></td>
                                <td style="text-align:center"><?=$row['sdt']?></td>
                                <td style="text-align:center"><?=$row['chucvu']?></td>
                                <td style="text-align:center"><?=$ngayvaolam?></td>
                                <td>
                                    <table>
                                    <?php if($chucvu=='Tài xế trung chuyển'){?>
                                        <td>Nội ô Cần Thơ</td>
                                    <?php }else{?>
                                        <tr>
                                            <td><?=$row['fromLoc']?></td>
                                            <td style="padding-left: 10px;"><i class="fa fa-arrow-right"></i></td>
                                            <td rowspan='3' style="text-align:left; width: 150px; padding-left: 30px;"><?=$noiden?></td>
                                        </tr>
                                    <?php }?>
                                    </table>
                                </td>
                                <td>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#myModal<?=$manv?>" style="height: 30px; width: 37px; margin-right: 1px;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                                    <a href="edit_staff.php?&manv=<?=$row['manv']?>" title="Cập nhật" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                    <a href="list_staff.php?action=delete&manv=<?=$row['manv']?>" title="Xóa dữ liệu" onclick="return confirm(\'Bạn có chắc muốn xóa '.$row['hoten'].'?\)" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                </td>
                            </tr>
                            <!--MODAL-->
                            <div class="modal fade" id="myModal<?=$manv?>" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <form>
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <!--  <h4 class="modal-title">Modal Header</h4> -->
                                            </div>
                                            <div class="modal-body" style="text-align:center">
                                                <h3>THÔNG TIN NHÂN VIÊN: <strong><?=$row['hoten']?></strong></h3>
                                                <h4 style="font-style: italic">Chức vụ: <strong><?=$row['chucvu']?></strong></h4>
                                                <hr>
                                                <div class="row" style="text-align:left; background-color: rgba(157,154,157, 0.1)">
                                                    <div class="col col-md-6">
                                                        <div class="row">
                                                            <div class="col col-md-6">
                                                                <label for="exampleInputEmail1">MÃ NHÂN VIÊN</label>
                                                            </div>
                                                            <div class="col col-md-6">
                                                                <p><?=$manv?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row" >
                                                            <div class="col col-md-6">
                                                                <label for="exampleInputEmail1">HỌ TÊN NHÂN VIÊN</label>
                                                            </div>
                                                            <div class="col col-md-6">
                                                                <p><?=$row['hoten']?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row" >
                                                            <div class="col col-md-6" >
                                                                <label for="exampleInputEmail1">NGÀY SINH</label>
                                                            </div>
                                                            <div class="col col-md-6">
                                                                <p><?=$ngaysinh?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row" >
                                                            <div class="col col-md-6" >
                                                                <label for="exampleInputEmail1">SỐ CHỨNG MINH NHÂN DÂN</label>
                                                            </div>
                                                            <div class="col col-md-6">
                                                                <p><?=$row['soCMND']?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row" >
                                                            <div class="col col-md-6" >
                                                                <label for="exampleInputEmail1">QUÊ QUÁN</label>
                                                            </div>
                                                            <div class="col col-md-6">
                                                                <p><?=$row['quequan']?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row" >
                                                            <div class="col col-md-6" >
                                                                <label for="exampleInputEmail1">ĐỊA CHỈ THƯỜNG TRÚ</label>
                                                            </div>
                                                            <div class="col col-md-6">
                                                                <p><?=$row['thuongtru']?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row" >
                                                            <div class="col col-md-6" >
                                                                <label for="exampleInputEmail1">SỐ ĐIỆN THOẠI</label>
                                                            </div>
                                                            <div class="col col-md-6">
                                                                <p><?=$row['sdt']?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row" >
                                                            <div class="col col-md-6" >
                                                                <label for="exampleInputEmail1">NGÀY VÀO LÀM</label>
                                                            </div>
                                                            <div class="col col-md-6">
                                                                <p><?=$ngayvaolam?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row" >
                                                            <div class="col col-md-6" >
                                                                <label for="exampleInputEmail1">TUYẾN ĐƯỜNG PHỤ TRÁCH</label>
                                                            </div>
                                                            <div class="col col-md-6">
                                                                <?php if($chucvu=='Tài xế trung chuyển'){?>
                                                                <p>Nội ô Cần Thơ</p>
                                                                <?php }else{?>
                                                                <p><?=$row['fromLoc']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-arrow-right"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$noiden?></p>
                                                                <?php }?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-6" style="text-align:center">
                                                        <h4>THÔNG TIN ĐĂNG NHẬP</h4>
                                                        <div class="row" >
                                                            <div class="col col-md-6" >
                                                                <label for="exampleInputEmail1">TÊN ĐĂNG NHẬP</label>
                                                            </div>
                                                            <div class="col col-md-6">
                                                                <p><?=$row['username']?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row" >
                                                            <div class="col col-md-6" >
                                                                <label for="exampleInputEmail1">MẬT KHẨU</label>
                                                            </div>
                                                            <div class="col col-md-6">
                                                                <p><?=$row['password']?></p>
                                                            </div>
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
                            <!--END-->
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
  location.replace("index.php?tab=themnv")
}
</script>
<script>
 $(document).ready(function() {
    $('#schedules').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching": false
    } );
} );
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
  <?php 
    include("includes/footer.php");
    include("includes/scripts.php");
  ?>