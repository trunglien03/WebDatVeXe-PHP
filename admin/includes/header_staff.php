<?php
  session_start();
  if(!isset($_SESSION['user']))
  {
    header('location:login.php');
  }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nhân viên|  QUẢN LÝ HỆ THỐNG</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="http://demo.truebus.co.in/admin/assets/css/bootstrap.min.css">
	
	
	
	<link href="assets/css/charisma-app.css" rel="stylesheet">
	<link href="assets/css/colorbox.css" rel="stylesheet">
	
	
	
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons 
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- Select2 -->
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="http://demo.truebus.co.in/admin/assets/css/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://demo.truebus.co.in/admin/assets/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/css/pace.css">
    <link rel="stylesheet" href="assets/css/skin-red.css">
    
    <link rel="stylesheet" href="assets/css/custom-style.css">
	
	<!--time picker-->
	<link rel="stylesheet" href="http://demo.truebus.co.in/admin/assets/css/bootstrap-timepicker.min.css">
    <!--time picker-->

	<script src="http://demo.truebus.co.in/admin/assets/js/jquery.min.js"></script>	
	<link href="assets/parsley/parsley.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!--[validation css]-->
</head>

<body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
        <!-- Logo -->
        <a href="http://demo.truebus.co.in/admin/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>T</b>B</span>
        <!-- logo for regular state and mobile devices -->
        <span class="hidden-xs">Trust Bus</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">