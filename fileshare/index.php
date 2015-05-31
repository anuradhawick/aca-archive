<!DOCTYPE html>
<html>
<head>
	<title>University Academic Archive</title>
	<link type="text/css" rel="stylesheet" href="../css-styles/style.css"/>
    <!--  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!--  -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
<br/>
<div class="container">
	<div class="col-sm-12 well">
		<div class="page-header text-center"><h1><a href="../index.php">University Academic Archive</a></h1>
		</div>
		<?php 
		/*
		use the get request and make the file appear as an embed
		*/
		if(!isset($_GET['resID'])){
			echo "<strong>Requested error!</strong>";
		}
		else{ 
			require_once '../condata.php';
			$dbc = mysqli_connect($host, $username, $password, $database) or die("CON ERROR");
			$query = "SELECT link FROM ".$database.".resource WHERE idresource = ".$_GET['resID'];
			$result = mysqli_query($dbc, $query) or die("QUE ERROR");
			$row = mysqli_fetch_array($result);
			if(!isset($row['link'])){
				echo "<strong>Requested resource not found!</strong>";
			} else{
				?>
				<div class="embed-responsive embed-responsive-16by9">
					<iframe height="800sp" width="100%"  src="<?php echo $row['link'] ?>"></iframe>
				</div>
				<?php
			}
  		}
  		?>
  		
	</div>
	<div class="text-center">
		<footer>&copy Aca-Archive 2015</footer> 
	    <br/>
	</div>	
</div>

</body>
</html>