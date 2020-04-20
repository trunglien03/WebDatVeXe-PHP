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
                        <option value='Cần Thơ'>Cần Thơ</option>
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
                
                <!--Điểm đến-->
                <div class="form-group">
                  <label for="exampleInputEmail1">Điểm đến</label>
                  <input class="form-control" name="diemden" id="diemden">
                </div>

                <!--Biển số xe-->
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
                  <button type="submit" class="btn btn-primary" name="xeplich">THÊM</button>
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
                  <label for="exampleInputEmail1">Giờ xuất bến</label>
                    <select id="giokhoihanh" name="giokhoihanh" class="form-control">
                      <option value= ''></option>
                    </select>
                </div>
                <!--Thời gian di chuyển-->
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Thời gian di chuyển</label>
                    <select name="thoigian" class="form-control">
                      <option value= '03:00'>03h00</option>
                      <option value='03:30'>03h30</option>
                      <option value='04:00'>04h00</option>
                      <option value='11:00'>11h00</option>
                    </select>
                </div>
                <!--Giờ đến-->
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Giờ đến</label>
                    <select name="gioden" class="form-control">
                      <?php
                        $sql = mysqli_query($conn, "SELECT * FROM time");
                        while($row=mysqli_fetch_array($sql)){
                      ?>
                      <option value="<?=$row['time']?>"><?=$row['time']?></option>
                      <?php }?>
                    </select>
                </div>
                <!--Ngày khởi hành-->
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Ngày khởi hành</label>
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
