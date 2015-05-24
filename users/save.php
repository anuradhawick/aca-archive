<?php
	require_once '../condata.php';
	$dbc = mysqli_connect($host,$username, $password,$database) or die("Failed 1");
	if($_REQUEST["type"] == "save"){ 
		$topic = $_REQUEST["topic"];
		$url = $_REQUEST["url"];
		$subID = $_REQUEST["subID"];
		$description = $_REQUEST["description"];
		$query = "INSERT INTO ".$database.".resource (`name`,`description`,`link`,`subject_idsubject`)VALUES('".$topic."','".$description."','".$url."','".$subID."')" ;
		$result = mysqli_query($dbc, $query) or die("Failed 2");
	} elseif ($_REQUEST["type"] == "addSem") {
		$name = $_REQUEST["semName"];
		$description = $_REQUEST["semDes"];
		$query = "INSERT INTO ".$database.".`semester`(`name`,`description`)VALUES('".$name."','".$description."')";
		$result = mysqli_query($dbc, $query) or die("Failed 3");
	}elseif ($_REQUEST["type"] == "addSub") {
		$name = $_REQUEST["subName"];
		$description = $_REQUEST["subDes"];
		$semID = $_REQUEST["semID"];
		$query = "INSERT INTO ".$database.".`subject`(`subname`,`description`,`semester_idsemester`)VALUES('".$name."','".$description."','".$semID."')";
		$result = mysqli_query($dbc, $query) or die("Failed 4");
	}
	mysqli_close($dbc);
	echo json_encode("success");
?>