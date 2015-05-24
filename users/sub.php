<?php
	require_once '../condata.php';
	$dbc = mysqli_connect($host,$username, $password,$database) or die("Failed");
	$query = "SELECT * FROM ".$database.".subject WHERE semester_idsemester = '".$_REQUEST["key"]."'";
	$result = mysqli_query($dbc, $query) or die("Failed");
	while ($row = mysqli_fetch_array($result)){
		?>
			<option value="<?php echo $row['idsubject']?>"><?php echo $row["subname"]?></option>
		<?php
	}
	mysqli_close($dbc);
?>
