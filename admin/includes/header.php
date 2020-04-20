<?php
  error_reporting(0);
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
    <title>Admin | QUẢN LÝ HỆ THỐNG</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
	
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

    <link rel="stylesheet" href="assets/css/style.css">
    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <!--time picker-->
    <link rel="stylesheet" href="http://demo.truebus.co.in/admin/assets/css/bootstrap-timepicker.min.css">
    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
		
	<script src="http://demo.truebus.co.in/admin/assets/js/jquery.min.js"></script>	
	<link href="assets/parsley/parsley.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="https://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />

  <style>
    .ui-datepicker-calendar {
       display: none;
    }
    .ui-datepicker-month {
       display: none;
    }
  </style>
  <!--validation css-->
  </head>
  

  <body class="hold-transition skin-red sidebar-mini">
  	<div class="wrapper">
	        <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>T</b>B</span>
          <!-- logo for regular state and mobile devices -->
          <span class="hidden-xs">Trust Bus</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">