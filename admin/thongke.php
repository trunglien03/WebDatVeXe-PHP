<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<?php
  session_start();
  error_reporting(0);
  include("includes/connect.php");
  include("includes/header.php");
  include("includes/sidebar.php");
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
        THỐNG KÊ TỶ LỆ VÉ TẠI CÁC TUYẾN ĐƯỜNG
    </h1>
  <!-- Main content -->
  <section class="content">
    <div class="row">
    <div class="col-xs-12"></div>
        <div class="col-xs-12">
          <!-- /.box -->
            <div class="box">
              
                <?php 
                    include('includes/connect.php');
                    $query = "SELECT * FROM lich_chay";
                    $result = mysqli_query($conn, $query);
                    $chart_data = '';
                    //$tot = '';
                    
                    while($row = mysqli_fetch_array($result))
                    {   
                        $toLoc = $row['toLoc'];
                        $conlai = $row['conlai'];
                        $giucho = $row['giucho'];
                        $daban = $row['daban'];
                        $banduoc = $daban+$giucho;
                        $soghe = $giucho+$daban+$conlai;
                        $tyle = ceil((($daban+$giucho)/$soghe)*100);
                        $chart_data .= "{ 
                            tuyen:'".$row["toLoc"]."', 
                            tyle:'".$tyle."%', 
                            giokhoihanh:'".$row["giokhoihanh"]."', 
                            daban:'".$banduoc." vé'
                        }, ";
                        $tot = $tot + $row["toLoc"] + $tyle + $row["giokhoihanh"] + $banduoc;
                    }
                    $chart_data = substr($chart_data, 0, -2);
				
                ?>
              <!-- /.box-header -->
              <div class="box-body">
                <div id="chart"></div>
            
              </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
   

<script>
    Morris.Bar({
    element : 'chart',
    data:[<?php echo $chart_data; ?>],
    xkey:'tuyen',
    ykeys:['daban','tyle', 'giokhoihanh'],
    labels:['Số vé bán được','Tỷ lệ', 'Giờ khởi hành'],
    hideHover:'auto',
    stacked:true
    });
</script>

<?php
  include("includes/scripts.php");
  include("includes/footer.php");
?>