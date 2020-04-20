<?php 
    session_start();
?>
<!DOCTYPE html>
<html  ng-app='myFrontend'>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="La Quỳnh Như-B1505791s">
    <link rel="shortcut icon" type="image/png" href="images/logo1.png"/>
    <title>QN BUS | HỆ THỐNG ĐẶT VÉ XE TRỰC TUYẾN</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <!-- custom CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="assets/css/parsley.css" rel="stylesheet">
    <link href="assets/css/datepicker3.css" rel="stylesheet">
    <link href="assets/css/datepick.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="assets/js/jquery.seat-charts.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="assets/js/jquery.seat-charts.js"></script> 
    <!-- Bootstrap core CSS -->   
<style>
[ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
display: none !important;
}
</style>

<script src="http://demo.truebus.co.in/assets/js/jquery.js"></script> 
<!--script src="http://demo.truebus.co.in/assets/js/jquery.js"></script--> 

<script src="assets/js/jquery-ui.js" ></script>
    
<script src="assets/js/jquery.raty.js"></script>

</head>

<body >
<!--HEADER-BAR-->
<div class="tb_header">
    <div class="container-fluid">
        <div class="col-md-3" style="padding:0;">
        <div class="tb_logo"> 
            <a href="index.php">
                <img src="images/Capture.PNG">
            </a>
        </div>
        </div>
        <div class="col-md-6" style="padding:0;">
            <div class="tb_navbar">
                <ul>
                    <li>
                    <a href="index.php">Trang chủ &nbsp;<span style="color:#31708f;"> |</span></a>
                    </li>
                    <li>
                    <a href="#howtobuy" data-toggle="modal" data-target="#howtobuy">Hướng dẫn mua vé &nbsp;<span style="color:#31708f;"> |</span></a>
                    </li>
                    <li>
                    <a href="schedules.php">Lịch trình&nbsp;<span style="color:#31708f;"> |</span></a>
                    </li>
                    <li>
                    <a href="my_trips.php">Vé đã mua &nbsp;<span style="color:#31708f;"> |</span></a>
                    </li>
                    <li>
                    <a href="huyve.php">Hủy vé &nbsp;<span style="color:#31708f;"></span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-3" style="padding:0;">
        <?php 
            if(isset($_SESSION['username']))
            {
            ?>
                <div class="dropdown_lis" style="margin-left: 10px;">
                    <button onclick="myFunction()" class="dropbtn">
                        <i class="fa fa-user"></i>&nbsp;
                        <span style="color: white;">XIN CHÀO,</span> 
                        <span style="font-size: 15px; color:#fb6330;"><?php echo $_SESSION['username']?></span>  
                        <div id="tabs" class="dropdown-content">
                            <a href="../my_trips.php"> <i class="fa fa-bookmark"></i>&nbsp;
                                Vé đã mua</a>
                            <a href="includes/logout.php"> <i class="fa fa-sign-out"></i>&nbsp;
                                Đăng xuất</a>
                        </div>
                    </button>
                </div>

        <?php
            }else{
        ?>
            <div class="signin_up">
                <ul>
                    <li>
                    <a href="#myModals" data-toggle="modal" data-target="#myModals">Đăng nhập</a>  <span style="color:#31708f;">/</span>
                    </li>
                    <li>
                    <a href="#myModal" data-toggle="modal" data-target="#myModal">Đăng ký</a>
                    </li>
                </ul>
            </div>
            <?php }?>
        <!------logged end---------------->
        </div>
        </div>
        <div class="shadow"><img src="images/shadow.png"></div>
        </div>