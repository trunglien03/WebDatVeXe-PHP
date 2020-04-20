<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="includes/style.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
<?php
    session_start();
    include("includes/header.php");
    include("includes/sidebar.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">

<div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
        <li><a href="index.php"><i class="fas fa-tools"></i>&nbsp;Quản lý chung</a></li>
        <li><a href="index.php?tab=themnv">Đặt/bán vé</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12"></div>
            <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                    <div class="row">
                        <div class="col col-md-3">
                        <form action='search.php' method='post'>
                            <div class="form-group" style="margin-left: 20px; margin-top: 10px;">
                                <select class="form-control" id="noiden" name="noiden">
                                    <?php
                                    include("includes/connect.php");
                                    $get_noiden = mysqli_query($conn, "SELECT * FROM noiden WHERE id_noidi='7'");
                                    while($noiden=mysqli_fetch_array($get_noiden)){
                                    ?>
                                    <option value="<?=$noiden['id_noiden']?>">Cần Thơ - <?=$noiden['ten_noiden'];}?></option>
                                </select>
                            </div>
                            <div class="form-group" style="margin-left: 20px; margin-top: 10px;">
                                <select name="loaixe" id="loaixe" class="form-control" style="width: 100%;">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group has-feedback" style="margin-left: 20.5px;">
                                <input type="text" id="Multipledatepicker" name="ngaykhoihanh"  placeholder="Chọn ngày khởi hành" class="form-control require" required style="background-color: #fff;">
                            </div>
                                <button name="search" class="btn" type="submit" style="margin-left: 20.5px; background-color:#fb6330; color: white;">Tìm</button>
                            </form>
                        </div>
                        <!--end col-md-3-->
                        <div class="col col-md-9">
                            <div class="box-header">
                                <h3 class="box-title"><i class="fa fa-bus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;XE KHỞI HÀNH</h3>
                                <br>
                            </div>
                            <div class="box-body">
                                <section class="new-deal">
		                            <div class="col-md-12">
                                        <!--Xử lý php echo while-->
                                        <?php
                                            include("includes/connect.php");
                                            include("function.php");
                                            $sql = mysqli_query($conn, "SELECT * FROM lich_chay WHERE conlai != '0' ORDER BY toLoc DESC");
                                            while($row=mysqli_fetch_array($sql)){
                                                $number = $row['giave'];
                                                $giave = number_format($number ,0 ,'.' ,'.');
                                                $toLoc = $row['toLoc'];
                                                $id_xe = $row['id_loaixe'];
                                                $id_lich = $row['id_lich'];

                                                //get hình
                                                $img = mysqli_query($conn, "SELECT * FROM thanhpholon WHERE ten_tp='$toLoc'");
                                                $exe = mysqli_fetch_assoc($img);
                                                $hinh = $exe['hinhanh'];
                                                
                                                //get tên loại xe
                                                $xe = mysqli_query($conn, "SELECT * FROM loai_xe WHERE id_loaixe='$id_xe'");
                                                $get = mysqli_fetch_assoc($xe);
                                                $ten_xe = $get['ten_loaixe'];

                                                $mave = 'BK'.RandID(4);
                                        ?>
		   			                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 deal deal-block">
                                            <h4 style="margin-bottom: -10px;"><?=$row['biensoxe']?></h4>
                                            <div class="item-slide">
                                                <div class="box-img">
                                                    <img src="<?=$hinh?>" alt="" style="width: 400px; height: 140px;">
                                                    <div class="text-wrap">
                                                        <h4>Cần Thơ - <?=$row['toLoc']?>
                                                        <br>
                                                        <span class="deal-data"><i class="fa fa-clock"></i> &nbsp;<?=$row['giokhoihanh']?></span></h4>
                                                        <div class="">									
                                                            <h4><?=$giave?> VNĐ</h4>
                                                        </div>
                                                        <div class="book-now-c">								
                                                            <a href="#myModals" data-toggle="modal" data-target="#myModals">Bán vé</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="slide-hover">
                                                    <div class="text-wrap">
                                                        <h4><?=$ten_xe?>
                                                        <br>
                                                        <span class="deal-data">Giữ chỗ: <?=$row['giucho']?> ghế</span></h4>
                                                        <div class="">									
                                                            <h4>Còn lại: <?=$row['conlai']?></h4>
                                                        </div>
                                                        <div class="book-now-c">								
                                                            <a href="#myModals" data-toggle="modal" data-target="#myModals<?=$id_lich?>">Bán vé</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--MODAL-->
                                        <div class="modal fade" id="myModals<?=$id_lich?>" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <button type="button" class="close" 
                                                        data-dismiss="modal">
                                                            <span aria-hidden="true">&times;</span>
                                                            <span class="sr-only">Đóng</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">
                                                            Cần Thơ  - <?=$toLoc?>
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
                                                                    <h4>THÔNG TIN KHÁCH ĐẶT VÉ</h4>
                                                                    <div class="col-md-5" >
                                                                    <!--Họ tên-->
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Họ tên KH</label>
                                                                            <input type="text" class="form-control required" name="hoten" required="">
                                                                        </div>
                                                                    <!--Địa chỉ nhà-->
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Địa chỉ</label>
                                                                            <input type="text" class="form-control required" name="diachi" required="" >
                                                                        </div>
                                                                    
                                                                    <!--Số CMND-->
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Số CMND</label>
                                                                            <input type="text" name="CMND" class="form-control" placeholder="Số CMND" required>
                                                                        </div>

                                                                        <!--Số ĐTDĐ-->
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Điện thoại di động</label>
                                                                            <input type="text" name="sdt" class="form-control" placeholder="Số điện thoại" required>
                                                                        </div>
                                                                    <!--Số vé-->
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Số vé</label>
                                                                            <input type="number" name="sove" class="form-control" required min='1' max='10'>
                                                                        </div>
                                                                    <!--Thường trú-->
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Điểm rước</label>
                                                                            <textarea type="text" name="diemruoc" class="form-control"></textarea>
                                                                        </div> 

                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Điểm xuống</label>
                                                                            <textarea type="text" name="diemxuong" class="form-control" ></textarea>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Ghi chú</label>
                                                                            <input type="text" name="ghichu" class="form-control">
                                                                        </div>          
                                                                    </div>
                                                                    <div class="col-md-1"></div>

                                                                    <div class="col-md-6">
                                                                        <!--Mã vé-->
                                                                        <div class="form-group">
                                                                            <label>Mã vé</label>
                                                                            <input name="mave" class="form-control" value="<?=$mave?>" readonly>
                                                                        </div>

                                                                        <!--Giá vé-->
                                                                        <div class="form-group">
                                                                            <label>Giá vé (1 vé)</label>
                                                                            <input class="form-control" value="<?=$giave?> VNĐ" readonly>
                                                                            <input type="hidden" name="giave" value="<?=$number?>"/>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Loại xe</label>
                                                                            <input name="loaixe" class="form-control" value="<?=$ten_xe?>" readonly>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label>Biển số xe</label>
                                                                            <input name="biensoxe" class="form-control" value="<?=$row['biensoxe']?>" readonly>
                                                                        </div>

                                                                        <!--Ngày vào làm-->
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Ngày khởi hành</label>
                                                                            <input type="date" class="form-control required" name="ngaydi" id="myDate" />
                                                                        </div>

                                                                        <!--Chức vụ và thời gian làm-->
                                                                        <div class="form-group has-feedback">
                                                                            <label for="exampleInputEmail1">Thời gian</label>                                                                            
                                                                            <input value="<?=$row['giokhoihanh']?>" name="giodi" class="form-control" readonly>
                                                                        </div>

                                                                        <!--Button THÊM-->
                                                                        <div class="box-footer">
                                                                            <button type="submit" class="btn btn-primary" name="muave">OK</button>
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
                                        <!--End-->

                                        <?php }?>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <!--end col-md-9-->
                    </div>
                    <!--end row-->
                </div>
                <!--end box-->
            </div>
            <!--end col-12-md-->
        </div>
        <!--end row-->
    </section>
   <!-- /.content -->
</div>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--  Flatpickr  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
    <!--Multiple date picker-->
    <script>
        $("#Multipledatepicker").flatpickr({
            mode: "multiple",
            dateFormat: "d-m-Y",
        });
    </script>

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

    <script> 
        $(document).ready(function(){
            $('#noiden').change(function(){
                id=$('#noiden').val();
                $.ajax({
                    url: "execute/getloaixe.php",
                    type:"post",
                    data: "id_noiden="+id,
                    async: true,
                    success: function(kq){
                        $('#loaixe').html(kq);
                    }
                });
                return false;
            });
        })
    </script> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  <?php 
    include("includes/footer.php");
    include("includes/scripts.php");
  ?>