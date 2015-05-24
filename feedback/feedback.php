<?php
	require_once '../condata.php';


	$name = $_POST["name"];
	$name = str_replace("--", " ", $name);
	$name = str_replace("#", " ", $name);
	$school = $_POST["school"];
	$school = str_replace("--", " ", $school);
	$school = str_replace("#", " ", $school);
	$email = $_POST["email"];
	$comment = $_POST["comment"];
	$comment = str_replace("--", " ", $comment);
	$comment = str_replace("#", " ", $comment);


	$dbc = mysqli_connect($host,$username,$password,$database) or die("CON ERR");
	$query = "INSERT INTO ".$database.".feedback (name,school,email,comment) values ('".$name."','".$school."','".$email."','".$comment."')";
	$result = mysqli_query($dbc, $query) or die("QUE ERR");
	mysqli_close($dbc);
?>