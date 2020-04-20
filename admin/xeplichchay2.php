<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet"/>
<?php
  session_start();
  error_reporting(0);
  if(!isset($_SESSION['user']))
  {
    header('location:login.php');
  }
?>
<?php
  include("includes/header.php");
  include("includes/sidebar.php");
?>
<script> 
    $(document).ready(function(){
        $('#loaixe').change(function(){
            id=$('#loaixe').val();
            $.ajax({
                url: "execute/ajax3.php",
                type:"post",
                data: "id_loaixe="+id,
                async: true,
                success: function(kq){
                    $('#noidi').html(kq);
                }
            });
            return false;
        });
    })
</script>
<script> 
    $(document).ready(function(){
        $('#loaixe').change(function(){
            id=$('#loaixe').val();
            $.ajax({
                url: "execute/ajax4.php",
                type:"post",
                data: "id_loaixe="+id,
                async: true,
                success: function(kq){
                    $('#noiden').html(kq);
                }
            });
            return false;
        });
    })
</script>
<script> 
    $(document).ready(function(){
        $('#loaixe').change(function(){
            id=$('#loaixe').val();
            $.ajax({
                url: "execute/ajax5.php",
                type:"post",
                data: "id_loaixe="+id,
                async: true,
                success: function(kq){
                    $('#biensoxe').html(kq);
                }
            });
            return false;
        });
    })
</script>
<script> 
    $(document).ready(function(){
        $('#loaixe').change(function(){
            id=$('#loaixe').val();
            $.ajax({
                url: "execute/ajax6.php",
                type:"post",
                data: "id_loaixe="+id,
                async: true,
                success: function(kq){
                    $('#soghe').html(kq);
                }
            });
            return false;
        });
    })
</script>
<script> 
    $(document).ready(function(){
        $('#loaixe').change(function(){
            id=$('#loaixe').val();
            $.ajax({
                url: "execute/ajax7.php",
                type:"post",
                data: "id_loaixe="+id,
                async: true,
                success: function(kq){
                    $('#taixe').html(kq);
                }
            });
            return false;
        });
    })
</script>
<script> 
    $(document).ready(function(){
        $('#loaixe').change(function(){
            id=$('#loaixe').val();
            $.ajax({
                url: "execute/ajax8.php",
                type:"post",
                data: "id_loaixe="+id,
                async: true,
                success: function(kq){
                    $('#phuxe').html(kq);
                }
            });
            return false;
        });
    })
</script>
<script> 
    $(document).ready(function(){
        $('#loaixe').change(function(){
            id=$('#loaixe').val();
            $.ajax({
                url: "execute/ajax9.php",
                type:"post",
                data: "id_loaixe="+id,
                async: true,
                success: function(kq){
                    $('#giokhoihanh').html(kq);
                }
            });
            return false;
        });
    })
</script>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Xếp lịch chạy</h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-bus"></i>Quản lý chung</a></li>
      <li><a href="index.php?tab=lcgn">Lịch chạy</a></li>
      <li class="active">Xếp lịch chạy</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Xếp lịch chạy</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="execute/xuly_xeplichchay.php" method="post">
            <div class="box-body">
              <div class="col-md-6">
                <!--Loại xe-->
                <div class="form-group">
                  <label class="inputLabel" style="font-size: 15px;"><strong>Loại xe</strong></label>
                  <select class="form-control" id="loaixe" name="loaixe">
                    <?php
                      include("includes/connect.php");
                      $get_loaixe = mysqli_query($conn, "SELECT * FROM loai_xe");
                      while($loaixe=mysqli_fetch_array($get_loaixe)){
                    ?>
                    <option value="<?=$loaixe['id_loaixe']?>"><?=$loaixe['ten_loaixe'];}?></option>
                  </select>
                </div>
                <!--End loại xe-->
                <div class="form-group">
                <!--TUYẾN ĐƯỜNG-->
                  <label>Tuyến đường</label>
                  <div class="row">
                    <div class="col col-md-6">
                      <select name="noidi" id="noidi" class="form-control">
                        <option value=''></option>
                      </select>  
                    </div>
                    <div class="col col-md-6">
                      <!--NƠI ĐẾN-->
                      <div class="form-group">
                        <select class="form-control" id="noiden" name="noiden">
                          <option value=''></option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!--Tên xe-->
                <div class="form-group">
                  <label for="exampleInputEmail1">Biển số xe</label>
                  <select class="form-control" id="biensoxe" name="biensoxe">
                    <option value=''></option>
                  </select>
                </div>

                <!--Số ghế-->  
                <div class="form-group">
                  <label>Số ghế</label>
                  <select  class="form-control" id="soghe" name="soghe">
                    <option value=''></option>
                  </select>
                </div>
                  <!--End số ghế-->
                <!--End tên xe-->
                
                <!--Button THÊM-->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="themxe">THÊM</button>
                </div>
                <!--End button-->             
              </div>

              <!--Tài xế-->                   
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tài xế</label>
                  <select id="taixe" name="taixe" class="form-control">
                    <option value=''></option>
                  </select>
                </div>
                <!--End Tài xế-->
                
                <!--Phụ xe-->
                <div class="form-group">
                  <label>Phụ xe</label>
                  <select class="form-control" name="phuxe" id="phuxe">
                    <option value=''></option>
                  </select>
                </div>
                <!--End phụ xe-->  
                
                <!--Giờ khởi hành-->
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Giờ khởi hành</label>
                    <select id="giokhoihanh" name="giokhoihanh" class="form-control">
                      <option value= ''></option>
                    </select>
                </div>
                <!--Ngày khởi hành-->
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Ngày khởi hành</label>
                    <input type="text" class="form-control date"/>
                  </div>
                <!--End ngày khởi hành-->
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </form>
    </div>
    <!-- /.box -->
  </div>
</div>
</div>
<!-- /.row -->
</section>
</div>
<script>
$(function() {
$('.date').datepicker({
    multidate: true;
});
});
</script>
<script>
$(function () {
$('.date').datepicker('setDates', [new Date(2014, 2, 5), new Date(2014, 3, 5)]);
})
  </script>
<?php
  include("includes/scripts.php");
  include("includes/footer.php");
?>
