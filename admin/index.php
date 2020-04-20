<?php
  error_reporting(0);
  include("includes/header.php");
  include("includes/sidebar.php");
  $today=date("d/m/Y");
?>

<div class="content-wrapper">
<?php 
  if (empty($_GET['tab'])) {
    include 'lichchay.php';
  }
  else{ 
    //Thêm nhân viên
    if ($_GET['tab'] == 'themnv') {
      include 'add_staff.php';
    }
    //Tài khoản nhân viên
    if ($_GET['tab'] == 'taikhoannv') {
      include 'taikhoan_staff.php';
    }
    
    //Danh sách thành viên
    if ($_GET['tab'] == 'dstv') {
      include '#';
    }
    //Lịch chạy gần nhất
    if ($_GET['tab'] == 'lcgn') {
      include 'lichchay.php';
    }
    
    //Thêm mới tuyến đường
    if ($_GET['tab'] == 'tmtđ') {
      include 'add_routedetails.php';
    }
    //Thêm mới nơi đi nơi đến
    if($_GET['tab']=='tmnoidi'){
      include 'add_boardpointdetails.php';
    }
    //Danh sách điểm rước khách
    if ($_GET['tab'] == 'dsđrk') {
      include 'diemruockhach.php';
    }
    //Danh sách xe
    if ($_GET['tab'] == 'dsx') {
      include 'view_busdetails.php';
    }
    //Cập nhật loại xe
    if ($_GET['tab'] == 'cnlx') {
      include 'view_bustypedetails.php';
    }
    //Danh sách xe trung chuyển
    if ($_GET['tab'] == 'dsxtc') {
      include '#';
    }
    //Cập nhật xe trung chuyển
    if ($_GET['tab'] == 'cnxtc') {
      include '#';
    }
    //Xếp lịch trung chuyển
    if ($_GET['tab'] == 'xltc') {
      include '#';
    }
    //Danh sách thành phố lớn
    if ($_GET['tab'] == 'tpl') {
      include 'list_tp.php';
    }
    //Thêm thành phố lớn
    if ($_GET['tab'] == 'themtpl') {
      include 'add_city.php';
    }
    //Thư viện ảnh
    if ($_GET['tab'] == 'tva') {
      include 'add_gallery.php';
    }
    //Danh sách giá vé
    if ($_GET['tab'] == 'dsgv') {
      include '#';
    }
    //Cập nhật giá vé
    if ($_GET['tab'] == 'capnhatgiave') {
      include '#';
    }
    //Danh sách khuyến mãi
    if ($_GET['tab'] == 'dskm') {
      include '#';
    }
    //Thêm khuyến mãi
    if ($_GET['tab'] == 'themkm') {
      include '#';
    }

    if ($_GET['tab'] == 'dstin') {
      include 'admin/admin_dstin.php';
    }
    if ($_GET['tab'] == 'suatin') {
      include 'admin/admin_suatin.php';
    }
    if ($_GET['tab'] == 'chinhanh') {
      include 'admin/admin_chinhanh.php';
    }
    if ($_GET['tab'] == 'themchinhanh') {
      include 'admin/admin_chinhanh.php';
    }
    if ($_GET['tab'] == 'themnhanvien') {
      include 'admin/admin_them_nv.php';
    }
    if ($_GET['tab'] == 'dsnhanvien') {
      include 'admin/dsnv.php';
    }
    if ($_GET['tab'] == 'suanhanvien') {
      include 'admin/execute/suanhanvien.php';
    }
    if ($_GET['tab'] == 'vaitro') {
      include 'admin/admin_vaitro.php';
    }
    if ($_GET['tab'] == 'donhangchinhanh') {
      include 'admin/admin_dhcn.php';
    }
  }
  ?>
</div>

<!--
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
    /.modal-content
   </div>
   /.modal-dialog
</div>-->

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

  <?php 
    include("includes/footer.php");
    include("includes/scripts.php");
  ?>
