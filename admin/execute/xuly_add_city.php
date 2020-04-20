<?php
    error_reporting(0);
    include("../includes/connect.php");
	$id_tp=$_GET['id_tp'];
	$ten_tp=$_POST['ten_tp'];
	$file = $_FILES['hinh']['name'];
    $path = "assets/images/".$_FILES['hinh']['name'];
    if(isset($_POST['themtp'])){
		$amenities = implode(' , ', $_POST['amenities']);
        if(mysqli_query($conn,"INSERT INTO thanhpholon VALUES('$id_tp','$ten_tp','$path','$amenities')"))
	   	{
		    $filename = $_FILES['hinh']['name'];
			move_uploaded_file($_FILES['hinh']['tmp_name'],'assets/images/'.$filename);
			header("Location:../list_tp.php");
		}
		else
	 	{
	   		echo "Thất bại!";
		   }
	}
?>