<?php   
    if(!isset($_SESSION["user"]))
    {
     header("location:login.php");
    }
?>
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</a>
<div class="navbar-custom-menu">
  <ul class="nav navbar-nav">
    <!-- User Account: style can be found in dropdown.less -->
    <li class="dropdown user user-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">				          
        <?php 
        include('connect.php');
        $sql="SELECT * FROM login WHERE username='admin'";
        $result= mysqli_query($conn, $sql);
        $row=mysqli_fetch_array($result);
        echo "<img src=\"".$row['pic']."\""; ?>
        <span class="hidden-xs"><?php echo $_SESSION['user'];?></span>
      </a>
      <ul class="dropdown-menu">
        <!-- User image --> 
        <li class="user-header">
          <img src="<?php echo $row['pic'];?>" class="img-circle">
        </li>				  
      <!-- Menu Body -->
      <!-- Menu Footer-->
        <li class="user-footer">
          <div class="pull-left">
            <a href="http://demo.truebus.co.in/admin/Admin_detailsview/Admin_profile_view" class="btn btn-default btn-flat">Profile</a>
					</div>
          <div class="pull-right">
            <a href="logout.php" class="btn btn-default btn-flat">Đăng xuất</a>
          </div>
        </li>
      </ul>
    </li>
  </ul>
</div>
</nav>
</header>
  
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
		  <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $row['pic']?>" class="user-image left-sid" >
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['user'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
		  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li>
          <a href="index.php" style="font-size: 18px; font-weight: 300px; border-bottom: 1px solid #fff">
            <i class="fa fa-home" ></i><span>&nbsp;BẢNG ĐIỀU KHIỂN</span>
          </a>
        </li>
          <h5 style="margin-left: 20px; margin-bottom: 10px; font-size: 16px;"><i class="fas fa-tools" style="color: #3c8dbc;"></i><span style="color: #fff">&nbsp;&nbsp;Quản lý chung</span></h5>

        <!--QUẢN LÝ TÀI XẾ - PHỤ XE -->      
        <li class="treeview">
          
          <ul class="treeview-menu">
            <li><a href="lichlamviec.php">Xem lịch làm việc</a></li>
          </ul>
        </li>
        <!--END QUẢN LÝ TÀI XẾ - PHỤ XE-->
        
        <!--QUẢN LÝ ĐIỂM ĐÓN/TRẢ KHÁCH  -->      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-location-arrow"></i> <span>Điểm đón/trả khách</span><i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?tab=dsđrk">Danh sách điểm rước khách</a></li>
          </ul>
        </li>
        <!--END QUẢN LÝ ĐIỂM ĐÓN/TRẢ KHÁCH-->

    </section>
    <!-- /.sidebar -->
  </aside>