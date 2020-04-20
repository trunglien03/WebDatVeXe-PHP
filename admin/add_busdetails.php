<?php
  error_reporting(0);
  session_start();
  include("includes/header.php");
  include("includes/sidebar.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
<script> 
    $(document).ready(function(){
        $('#toLoc').change(function(){
            id=$('#toLoc').val();
            $.ajax({
                url: "execute/ajax.php",
                type:"post",
                data: "rid="+id,
                async: true,
                success: function(kq){
                    $('#loaixe').html(kq);
                }
            });
            return false;
        });
    })
</script>
<script> 
    $(document).ready(function(){
        $('#toLoc').change(function(){
            id=$('#toLoc').val();
            $.ajax({
                url: "execute/ajax2.php",
                type:"post",
                data: "rid="+id,
                async: true,
                success: function(kq){
                    $('#soghe').html(kq);
                }
            });
            return false;
        });
    })
</script>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Thêm xe</h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-bus"></i>Quản lý chung</a></li>
      <li><a href="index.php?tab=view_busdetails.php">Xe lưu hành</a></li>
      <li class="active">Thêm xe</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Thêm xe</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="execute/xuly_add_busdetails.php" method="post">
            <div class="box-body">
              <div class="col-md-6">
              <!--TUYẾN XE-->
                <div class="form-group">
                  <label>Tuyến xe</label>
                  <div class="row">
                    <div class="col col-md-6">
                      <div class="form-group">
                        <select name="noidi" class="form-control">
                          <?php 
                            $get_fromLoc = mysqli_query($conn, "SELECT DISTINCT fromLoc FROM route");
                            while($row_fromLoc=mysqli_fetch_array($get_fromLoc)){
                          ?>
                            <option value="<?=$row_fromLoc['fromLoc'];?>"><?=$row_fromLoc['fromLoc'];?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col col-md-6">
                    <!--NƠI ĐẾN-->
                      <div class="form-group">
                        <select class="form-control" id="toLoc" name="toLoc">
                          <?php
                              require("includes/connect.php");
                              $sql=mysqli_query($conn, "SELECT rid, toLoc from route");
                              while ($row=mysqli_fetch_array($sql)){
                                $ten_noiden=$row['toLoc'];
                                echo "<option value=".$row['rid'].">".$row['toLoc']."</option>";
                              }    
                          ?>
                          </select>
                      </div>
                    </div>
                  </div>
                </div> 
                <p id="userYear" class="hidden"></p>
                <!--END TUYẾN XE-->
                <!--Loại xe-->
                <div class="form-group">
                <label class="inputLabel" style="font-size: 15px;"><strong>Loại xe</strong></label>
                  <select class="form-control" id="loaixe" name="loaixe" required>
                    <option value='none'></option>
                  </select>
                </div>
                <!--End loại xe-->
                <!--Tên xe-->
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên xe</label>
                  <input type="text" class="form-control required" name="tenxe" placeholder="Nhập tên xe">
                </div>
                <!--End tên xe-->
                <!--Năm sx
							  <div class="form-group">
							    <label>Năm sản xuất</label>
                  <div class="input-group">
								    <input type="text" id="datepicker1" name="datepicker1" class="form-control" style="width: 250%;">
							      </div>
							    </div>
                  End năm sx -->
                
                <!--Button THÊM-->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="themxe">THÊM</button>
                </div>
                <!--End button-->             
              </div>

              <!--Biển số xe-->                   
              <div class="col-md-6">
                <!--Tiện nghi-->  
                <div class="form-group">
                  <label>Tiện nghi kèm theo:</label>
                  <select class="form-control select2 js-example-basic-multiple" style="width: 100%;" name="amenities[]" multiple="multiple" id="amenities" >
                    <option value="WIFI">WIFI</option>								  
                    <option value="Nước suối">Nước suối</option>								  
                    <option value="Chăn đắp">Chăn đắp</option>								  
                    <option value="Bánh ngọt">Bánh ngọt</option>								  								  								  
                    <option value="Gối">Gối</option>
                    <option value="Tivi cá nhân">Tivi cá nhân</option>								  								  
                    <option value="Ổ sạc">Ổ sạc</option>
                  </select>
                </div>
                  <!--End tiện nghi-->
                <div class="form-group has-feedback">
                  <label>Biển số xe</label>
                  <input type="text" class="form-control required" name="biensoxe" data-parsley-trigger="change"	
                  data-parsley-minlength="2" data-parsley-maxlength="15" required="" placeholder="Biển số xe">
                  <span class="glyphicon form-control-feedback"></span>
                </div>
                <!--End BSX-->
                
                <!--Số ghế-->
                <div class="form-group">
                  <label>Số ghế</label>
                  <select class="form-control" style="width: 100%;" name="soghe" id="soghe">
                    <option value='none'></option>
                  </select>
                </div>
                <!--End số ghế-->  
              </div>
              <!--End Tuyến xe-->
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
  function run(element) {
    document.getElementById("userYear").innerHTML = element.value;
        // document.getElementById("year").value;
   }
</script>
<?php 
    include("includes/footer.php");
    include("includes/scripts.php");
  ?>