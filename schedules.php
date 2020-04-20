<?php
    include("includes/header.php");
    include("includes/modal.php");
    include("includes/connect.php");
?>

<div class="container" ng-controller="search">
    <div class="row">
        <div class="col-md-12">
            <center><img src="assets/images/bus.jpg" style="width: 1000px;  height: 300px;"></center>
        </div>
    </div>
    <div class="row" style="min-height:400px; margin-top: 5px; margin-left: 67px;">
        <h3 style="color:#31708f; font-weight: bold;">LỊCH TRÌNH TUYẾN ĐƯỜNG</h3>
            <?php
                $abc=mysqli_query($conn, "SELECT DISTINCT toLoc FROM lich_chay");
                while($exe=mysqli_fetch_array($abc)){
                    $toLoc=$exe['toLoc'];
            ?>
        <h4 style="color: #221E1D; margin-top: 50px; text-transform: uppercase; margin-bottom: 20px;" class="box-title">&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;&nbsp;&nbsp;<?=$toLoc?></h4>
        <table class="table table-bordered table-striped" style="margin-bottom: 30px;" id="mytable">
            <thead style="background-color: #ECEAE0;">
                <tr>
                    <th style="text-align: center;">STT</th>
                    <th width="130px" style="text-align: center;">Bến đi</th>
                    <th width="130px" style="text-align: center;">Bến đến</th>
                    <th width="150px" style="text-align: center;">Loại xe</th>
                    <th width="67px" style="text-align: center;">Số ghế</th>
                    <th width="100px" style="text-align: center;">Thời gian di chuyển</th>
                    <th width="130px" style="text-align: center;">Số chuyến/ngày</th>
                    <th width="130px" style="text-align: center;">Giá vé</th>
                    <th style="text-align: center;">Giờ khởi hành</th>
                    <th></th>
                </tr>
            </thead>
            <form action="index.php" method="post">
            <tbody name="mytable">
                <?php
                    $no=1;
                    $sql=mysqli_query($conn, "SELECT * FROM route WHERE toLoc='$toLoc'");
                    while($row=mysqli_fetch_array($sql)){
                        $bid=$row['bid'];
                        $noidi=$row['toLoc'];
                        $number = $row['fare'];
                        $giave = number_format($number ,0 ,'.' ,'.').' VNĐ';
                        $thoigiankhoihanh = preg_replace("/\,/", "<br>", $row['thoigiankhoihanh']);
                    
                        //get tên loại xe
                        $get_loaixe=mysqli_query($conn, "SELECT * FROM loai_xe WHERE id_loaixe='$bid'");
                        $row_loaixe=mysqli_fetch_assoc($get_loaixe);
                        $ten_loaixe=$row_loaixe['ten_loaixe'];

                        //Lấy thời gian di chuyển
                        $get_time=mysqli_query($conn, "SELECT DATE_FORMAT(thoigiandi, '%h:%i') as thoigiandi FROM lich_chay WHERE id_loaixe='$bid' and toLoc='$noidi'");
                        $row_time=mysqli_fetch_assoc($get_time);
                        $thoigiandichuyen=$row_time['thoigiandi'];
                ?>
                <tr name="mytable">
               
                    <td class="hidden" name="mytable">
                        <input type="hidden" name="bid" value="<?=$bid?>">
                    </td>
                    <td style="text-align:center"><?=$no?></td>
                    <td style="text-align:center" name="mytable">
                        <input type="hidden" name="fromLoc" value="<?=$row['fromLoc']?>">
                        <?=$row['fromLoc']?>
                    </td>
                    <td style="text-align:center" name="mytable">
                        <input type="hidden" name="toLoc" value="<?=$row['toLoc']?>">
                        <?=$row['toLoc']?>
                    </td>
                    <td style="text-align:center"><?=$ten_loaixe?></td>
                    <td style="text-align:center"><?=$row['maxseats']?></td>
                    <td style="text-align:center"><?=$thoigiandichuyen?></td>
                    <td style="text-align:center;"><?=$row['sochuyen']?></td>
                    <td style="text-align:center"><?=$giave?></td>
                    <td style="text-align:center"><?=$thoigiankhoihanh?></td>
                    <td>
                        <button class="btn btn-orange" style="margin-top: 5px;" name="buythis" type="submit">Mua vé</button>
                    </td>
                </tr>
                <!--MODAL
                <div class="modal fade" id="myModal<?=$bid?>" role="dialog">
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
                                <p><?//=$row['fromLoc']?></p>
                            </div>
                            <div class="col-md-3">
                                <p><?//=$row['toLoc']?></p>
                            </div>
                            <div class="col-md-3" style="line-height: 3.0;">
                                <p><?//=$thoigiankhoihanh?></p>
                            </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>-->
                <?php } ?>  
            </tbody>
            </form>  
        </table>
        </form>
        <?php $no++;} ?>
    </div>
</div>

<?php 
    include("includes/footer.php");
    include("includes/script.php");
?>