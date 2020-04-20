<?php
  include("includes/header.php");
  include("includes/sidebar.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">

<div class="content-wrapper">
  <section class="content-header">
    <h1>Xếp lịch chạy</h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-bus"></i>Quản lý chung</a></li>
      <li><a href="index.php?tab=lcgn">Lịch trung chuyển</a></li>
      <li class="active">Xếp lịch chạy trung chuyển</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Xếp lịch trung chuyển</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="execute/xuly_lichtrungchuyen.php" method="post">
            <div class="box-body">
              <div class="col-md-6">
                
                
                <div class="form-group">
                <!--TUYẾN ĐƯỜNG-->
                  <label>Khu vực:</label>
                  <div class="row">
                    <div class="col col-md-12">
                      <select name="noidi" id="noidi" class="form-control">
                        <option value='Bình Thủy'>Bình Thủy</option>
                        <option value='Cái Răng'>Cái Răng</option>
                        <option value='Ninh Kiều'>Ninh Kiều</option>
                      </select>  
                    </div>
                  </div>
                </div>
                
                <!--Biển số xe-->
                <div class="form-group">
                  <label for="exampleInputEmail1">Biển số xe</label>
                  <select class="form-control" id="biensoxe" name="biensoxe">
                  <?php 
                    $sql = mysqli_query($conn, "SELECT * FROM xetrungchuyen");
                    while($row=mysqli_fetch_array($sql)){
                  ?>
                    <option value='<?=$row['bienso']?>'><?=$row['bienso']?></option>
                    <?php }?>
                  </select>
                </div>
                
                
                <!--End tên xe-->
                
                <!--Button THÊM-->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="trungchuyen">THÊM</button>
                </div>
                <!--End button-->             
              </div>

              <!--Tài xế-->                   
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tài xế</label>
                  <select id="taixe" name="taixe" class="form-control">
                  <?php 
                    $slq1 = mysqli_query($conn, "SELECT * FROM nhanvien WHERE chucvu='Tài xế trung chuyển'");
                    while($row1=mysqli_fetch_array($slq1)){
                  ?>
                    <option value='<?=$row1['hoten']?>'><?=$row1['hoten']?></option>
                    <?php }?>
                  </select>
                </div>
                <!--End Tài xế-->
                
               <!--Giờ khởi hành-->
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Giờ xuất bến</label>
                    <select id="giokhoihanh" name="giokhoihanh" class="form-control">
                    <?php 
                        $slq2 = mysqli_query($conn, "SELECT * FROM time");
                        while($row2=mysqli_fetch_array($slq2)){
                    ?>
                    <option value='<?=$row2['time']?>'><?=$row2['time']?></option>
                    <?php }?>
                    </select>
                </div>
               
                <!--Ngày khởi hành-->
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Ngày làm việc</label>
                  <input type="text" id="Multipledatepicker" name="ngaykhoihanh[]"  placeholder="Chọn ngày làm việc" class="form-control require" required style="background-color: #fff;">
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
<!--
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
-->
<script>
$(document).ready(function(){
    $('#loaixe').on('change', function(){
        var id_loaixe = $(this).val();
        if(id_loaixe){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'id_loaixe='+id_loaixe,
                success:function(html){
                    $('#noiden').html(html);
                    $('#giokhoihanh').html('Chọn nơi đến trước'); 
                }
            }); 
        }else{
            $('#noiden').html('<option value="">Chọn loại xe trước</option>');
            $('#giokhoihanh').html('<option value="">Chọn nơi đến trước</option>'); 
        }
    });
    
    $('#noiden').on('change', function(){
        var id_noiden = $(this).val();
        if(id_noiden){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'id_noiden='+id_noiden,
                success:function(html){
                    $('#giokhoihanh').html(html);
                }
            }); 
        }else{
            $('#giokhoihanh').html('<option value="">Chọn nơi đến trước</option>'); 
        }
    });
});
</script>
<script> 
    $(document).ready(function(){
    //Lấy biển số xe
    $('#noiden').on('change', function(){
      var id_noiden = $(this).val();
      if(id_noiden){
          $.ajax({
              type:'POST',
              url:'execute/ajax5.php',
              data:'id_noiden='+id_noiden,
              success:function(html){
              $('#biensoxe').html(html);
              }
          }); 
      }else{
          $('#biensoxe').html('<option value="">Chọn nơi đến trước</option>'); 
      }
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
    //Lấy tài xế
    $('#noiden').on('change', function(){
      var id_noiden = $(this).val();
      if(id_noiden){
          $.ajax({
              type:'POST',
              url:'execute/ajax7.php',
              data:'id_noiden='+id_noiden,
              success:function(html){
              $('#taixe').html(html);
              }
          }); 
      }else{
          $('#taixe').html('<option value="">Chọn nơi đến trước</option>'); 
      }
    });
    })
</script>
<script> 
    $(document).ready(function(){
    //Lấy phụ xe
    $('#noiden').on('change', function(){
      var id_noiden = $(this).val();
      if(id_noiden){
          $.ajax({
              type:'POST',
              url:'execute/ajax8.php',
              data:'id_noiden='+id_noiden,
              success:function(html){
              $('#phuxe').html(html);
              }
          }); 
      }else{
          $('#phuxe').html('<option value="">Chọn nơi đến trước</option>'); 
      }
    });
    })
</script>
  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!--  Flatpickr  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
  <!--Multiple date picker-->
  <script>
    $("#Multipledatepicker").flatpickr({
      mode: "multiple",
      dateFormat: "d-m-Y"
    });
  </script>

<?php
    include("includes/scripts.php");
    include("includes/footer.php");
?>
