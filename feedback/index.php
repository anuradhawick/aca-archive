<!DOCTYPE html>
<!--
Beyond the traditional Kuppi to a new level of equality in education

Site developed and updated by UOM CSE 2013 Batch W.A. Anuradha Wickramarachchi!
-->
<html>
<head>
	<title>Feedback</title>
	<link type="text/css" rel="stylesheet" href="../css-styles/style.css"/>
    <!--  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!--  -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="fb.js"></script>
</head>
<body>
	<br/>
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2 well">
		<h1 class="text-center">Feedback Form</h1><br/>
		<!-- Generate form -->
			<form class="form-horizontal" role="form" onsubmit="return false;" id="form">
				<div class="form-group">
					<label class="control-label col-sm-2">Name :</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Enter name" id="name" 
						 maxlength = "45" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Email :</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" placeholder="Enter email" id="email"
						maxlength = "45"  required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">School :</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Enter school" id="school"
						 maxlength = "45" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">School :</label>
					<div class="col-sm-10">
						<textarea class="form-control" placeholder="Type what you feel" rows="10" maxlength = "1000" id="comment"></textarea>
					</div>
				</div>
				<button class="btn btn-info" type="submit" >Submit</button>
			</form>
			<p class="text-justify">Please make sure you provide with accurate data so that this will help us to continue the service for a considerable period of time</p>
			<!-- End of form -->
			<a href="../index.php"><button class="btn btn-info">HOME</button></a>
		</div>
	</div>
	<footer class="text-center">&copy Aca-Archive 2015</footer><br/>
</body>
</html>