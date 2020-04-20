<?php
  error_reporting(0);
  include("includes/header_staff.php");
  include("includes/sidebar_staff.php");
  $today=date("d/m/Y");
?>

<div class="content-wrapper">
<?php 
  if (empty($_GET['tab'])) {
    include 'lichlamviec.php';
  }
  else{ 
    
    //Tài khoản nhân viên
    if ($_GET['tab'] == 'taikhoannv') {
      include 'taikhoan_staff.php';
    }
    
    //Lịch chạy gần nhất
    if ($_GET['tab'] == 'lcgn') {
      include 'lichchay.php';
    }
    
    //Danh sách điểm rước khách
    if ($_GET['tab'] == 'dsđrk') {
      include 'diemruockhach.php';
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
