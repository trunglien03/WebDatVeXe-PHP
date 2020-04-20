<?php
	require("includes/connect.php");
	$key = $_POST['id'];
	$sql = "SELECT * FROM noiden where id_noidi = '$key'";
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
?>
	<option value="<?php echo $row['id_noiden']?>"><?php echo $row['ten_noiden']?></option>

<?php
		}
?>