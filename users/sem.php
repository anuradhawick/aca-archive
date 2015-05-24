<?php
	require_once '../condata.php';
	$dbc = mysqli_connect($host, $username, $password, $database) or die("CON ERR");
	$query = "SELECT * FROM ".$database.".semester";
	$result = mysqli_query($dbc, $query) or die("DB ERR");
	?>
	<option value="0" selected>Select the semester</option>
	<?php
	while ($row = mysqli_fetch_array($result)) {
		?>
		<!-- Generating the option pane -->
		<option value="<?php echo $row['idsemester'] ?>"><?php echo $row['name'] ?></option>
		<!-- finish generation -->
		<?php
	}
	mysqli_close($dbc);
?>