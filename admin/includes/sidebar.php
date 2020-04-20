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
          <a href="#">
            <i class="fa fa-users"></i> <span>Tài xế - phụ xe</span><i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="list_staff.php">Danh sách tài xế và phụ xe</a></li>
            <li><a href="index.php?tab=themnv">Thêm mới tài xế và phụ xe</a></li>
            <li><a href="index.php?tab=taikhoannv">Quản lý tài khoản nhân viên</a></li>
          </ul>
        </li>
        <!--END QUẢN LÝ TÀI XẾ - PHỤ XE-->

        <!--QUẢN LÝ KHÁCH HÀNG - THÀNH VIÊN -->      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Thành viên - khách hàng</span><i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="view_bookingdetails.php">Danh sách khách hàng trung chuyển</a></li>
            <li><a href="view_bookingdetails2.php">Danh sách khách hàng đến bến</a></li>
            <li><a href="index.php?tab=dstv">Danh sách thành viên</a></li>
          </ul>
        </li>
        <!--END QUẢN LÝ KHÁCH HÀNG - THÀNH VIÊN-->

        <!--QUẢN LÝ LỊCH LÀM VIỆC -->      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Lịch chạy</span><i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?tab=lcgn">Lịch chạy gần nhất</li>
            <li><a href="xeplichchay.php">Xếp lịch chạy</a></li>
          </ul>
        </li>
        <!--END QUẢN LÝ LỊCH LÀM VIỆC-->

        <!--QUẢN LÝ TUYẾN ĐƯỜNG -->      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-road"></i> <span>Tuyến đường</span><i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="view_routedetails.php">Danh sách tuyến đường</a></li>
            <li><a href="index.php?tab=tmtđ">Thêm mới tuyến đường</a></li>
            <li><a href="index.php?tab=tmnoidi">Thêm mới nơi đi - nơi đến</a></li>
          </ul>
        </li>
        <!--END QUẢN LÝ TUYẾN ĐƯỜNG-->

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

        <!--QUẢN LÝ XE LƯU HÀNH-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bus"></i> <span>Xe lưu hành</span><i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?tab=dsx">Danh sách xe</a></li>
            <li><a href="add_busdetails.php">Cập nhật xe </a></li>
            <li><a href="index.php?tab=cnlx">Cập nhật loại xe</a></li>
          </ul>
        </li>
        <!--END QUẢN LÝ XE LƯU HÀNH-->

        <!--QUẢN LÝ XE TRUNG CHUYỂN-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-arrow-right"></i> <span>Trung chuyển</span><i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="danhsachxetrungchuyen.php"><i class="fa fa-circle-o text-aqua"></i>Danh sách xe</a></li>
            <li><a href="xetrungchuyen.php"><i class="fa fa-circle-o text-aqua"></i>Cập nhật xe </a></li>
            <li><a href="lichtrungchuyen.php"><i class="fa fa-circle-o text-aqua"></i>Xếp lịch trung chuyển</a></li>
          </ul>
        </li>
        <!--END QUẢN LÝ XE TRUNG CHUYỂN-->
        <!--
        <li class="treeview hide">
          <a href="#">
            <i class="fa fa-hand-o-up"></i> <span>Board Point Details</span><i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
						<li><a href="view_borderdetails.php"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
						<li><a href="add_boardpointdetails.php"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
          </ul>
        </li>
				   
        <li class="hide">
          <a href="#">                     
            <i class="fa fa-tint" aria-hidden="true"></i>
            <span>Drop Point Details</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="view_dropdetails.php"><i class="fa fa-circle-o text-aqua"></i>View All</a></li>
            <li><a href="http://demo.truebus.co.in/admin/Droppoint_details/add_droppointdetails"><i class="fa fa-circle-o text-aqua"></i>Add New</a></li>
          </ul>
        </li>
        -->
        <!--QUẢN LÝ TIN TỨC-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> 
            <span>Tin tức</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?tab=tpl"><span>Thành phố lớn</span></a></li>
            <li><a href="index.php?tab=themtpl"><span>Thêm thành phố lớn</span></a></li>
          </ul>
        </li>
        <!--END QUẢN LÝ TIN TỨC-->

        <!--QUẢN LÝ HÌNH ẢNH-->
        <li style="border-bottom: 1px solid #fff">
          <a href="index.php?tab=tva"><i class="glyphicon glyphicon-picture"></i><span>Thư viện ảnh</span></a>
        </li>
        <!--END QUẢN LÝ HÌNH ẢNH-->
      </ul>
      <ul class="sidebar-menu">
        <li>
          <a href="booking.php"><i class="glyphicon glyphicon-th-list" style="color: #3c8dbc; font-size: 16px;"></i><span style="font-size: 16px;">Đặt chỗ/Bán vé</span></a>
        </li>

        <!--QUẢN LÝ GIÁ VÉ-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-asterisk" aria-hidden="true"></i>
            <span>Điều chỉnh giá vé</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?tab=dsgv"><i class="fa fa-circle-o text-aqua"></i>Danh sách giá vé</a></li>
            <li><a href="index.php?tab=capnhatgiave"><i class="fa fa-circle-o text-aqua"></i>Cập nhật giá</a></li>
          </ul>
        </li>
        <!--END GIÁ VÉ-->
        
        <!--QUẢN LÝ KHUYẾN MÃI - HÌNH ẢNH-->
        <li class="treeview" style="border-bottom: 1px solid #fff">
          <a href="#">
            <i class="fa fa-percent"></i> 
            <span>Khuyến mãi</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?tab=dskm">Danh sách mã khuyến mãi</a></li>
            <li><a href="index.php?tab=themkm">Thêm mới khuyến mãi</a></li>
          </ul>
        </li>
        <!--END QUẢN LÝ KHUYẾN MÃI - HÌNH ẢNH-->

        <!--THỐNG KÊ-->
        <li>
          <a href="thongke.php"><i class="fa fa-trash" aria-hidden="true"></i><span>Thống kê</span></a>
        </li>
        <!---->			  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>