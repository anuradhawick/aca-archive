<!DOCTYPE html>
<html>
<head>
	<title>Update database</title>
	<link type="text/css" rel="stylesheet" href="../css-styles/style.css"/>
    <!--  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!--  -->
    <!-- initializer -->
    <script type="text/javascript">
    	// bootstrap plugin for popup form
	    $(document).ready(function(){
		    $('[data-toggle="popover"]').popover();
		});
		// initialization
		jQuery(document).ready(function($) {
			// transition starts
			$(".container").hide();
			$(".container").fadeIn('1000');
			// transition over
			$.post('sem.php', {
				//nothing is sent
			}, function(data, textStatus, xhr) {
				if(textStatus == "success"){
					$("#sems").prepend(data);
				}
			});

			// selecting the semester
			$("#sems").change(function(event) {
				$.get("sub.php?key="+$("#sems").val(), function(data,status) {
					$("#subject").empty();
	    			$("#subject").append(data);
	    		});
			});
			//saving data
			$("#save").click(function(event) {
				var semID = $("#sems").val();
				var subID = $("#subject").val();
				if (semID==0 || subID==0) {
					alert("Please select the semester and subject");
	    			return;
	    		};
	    		var topic = $("#topic").val();
	    		var description = $("#description").val();
	    		var url = $("#url").val();
	    		$.post('save.php', 
	    			{
	    				type: 'save',
	    				subID: subID,
	    				topic: topic,
	    				description:description,
	    				url: url
	    			}, 
	    			function(data, textStatus, xhr) {
	    				if (textStatus == "success") {
	    					alert("Saved successfully");
	    					$("#topic").val('');
	    					$("#description").val('');
	    					$("#url").val('');
	    				};
	    		});
			});
		});
	   
	    // saving the semester
	    function addSem(){
	    	var semName = document.getElementById('semName').value;
	    	var semDes = document.getElementById('semDes').value;
	    	semDes = semDes.replace(" ","+");
	    	semDes = semDes.replace(/(\r\n|\n|\r)/gm,"+");
   			var xmlhttp = new XMLHttpRequest();
   			xmlhttp.onreadystatechange = function(){
   				if(xmlhttp.readyState == 4 && xmlhttp.status ==200){
					alert("Saved successfully");
					document.getElementById('semName').value = "";
					document.getElementById('semDes').value = "";
					location.reload();
   				}
   			}
   			xmlhttp.open("POST","save.php",true);
   			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
   			xmlhttp.send("type=addSem&semName="+semName+"&semDes="+semDes);
	    }
	    // Saving the subject
	    function addSub(){
	    	var sem = document.getElementById('sems');
	    	var semID = sem.options[sem.selectedIndex].value;
	    	if(semID == 0){
	    		alert("Please select the semester");
	    		return;
	    	}
	    	var subName = document.getElementById('subName').value;
	    	var subDes = document.getElementById('subDes').value;
	    	subDes = subDes.replace(" ","+");
	    	subDes = subDes.replace(/(\r\n|\n|\r)/gm,"+");
   			var xmlhttp = new XMLHttpRequest();
   			xmlhttp.onreadystatechange = function(){
   				if(xmlhttp.readyState == 4 && xmlhttp.status ==200){
					alert("Saved successfully");
					document.getElementById('subName').value = "";
					document.getElementById('subDes').value = "";
					location.reload();
   				}
   			}
   			xmlhttp.open("POST","save.php",true);
   			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
   			xmlhttp.send("type=addSub&subName="+subName+"&subDes="+subDes+"&semID="+semID);
	    }
    </script>
    <!-- end of initializer -->
</head>
<body>
	<div class="container">
		<br/>
		<div class="col-sm-8 well col-sm-offset-2">
	        <div class="page-header text-center"><h1>University Academic Archive</h1></div>
	        <form class="form-horizontal" role="form" onsubmit="return false;">
				<div class="form-group">
			        <label class="col-sm-2 control-label">Semester : </label>
			        <div class="col-sm-10">
			            <select id="sems" class="form-control" title="Choose 2-4 colors"> <!-- onchange="updateSub(this.value)" onclick="updateSub(this.value)"> -->
			                <!-- The data will be fetched in here -->
			                <!-- End of fetching data -->
			            </select>
			        </div>
				</div>
				<div class="form-group">
			        <label class="col-sm-2 control-label">Subject : </label>
			        <div class="col-sm-10">
			            <select id="subject" class="form-control" title="Choose 2-4 colors">
			            	<option value="0">Please select the semester</option>
			            	<!-- to be generated -->
	 					</select>
			        </div>
				</div>
				<div class="form-group">
			        <label class="col-sm-2 control-label">Topic : </label>
			        <div class="col-sm-10">
			            <input id="topic" type="text" class="form-control" placeholder="Enter topic"  maxlength = "45" required>
			        </div>
				</div>
				<div class="form-group">
			        <label class="col-sm-2 control-label">URL : </label>
			        <div class="col-sm-10">
			            <input id="url" type="text" class="form-control" placeholder="Enter URL"  maxlength = "450" required>
			        </div>
				</div>
				<div class="form-group">
			        <label class="col-sm-2 control-label">Description : </label>
			        <div class="col-sm-10">
			            <textarea id="description" type="text" class="form-control" placeholder="Enter description"  maxlength = "1000" rows="10" required></textarea>
			        </div>
				</div>
				<button id="save" class="btn btn-info" >Save</button>
			</form>
			<br/>
			<a href="#" class="btn btn-info" data-toggle="popover" title="Add semester" data-html="true" data-content="<form><input id='semName' placeholder='Enter semester name'>
			<textarea maxlength='4500' id='semDes' placeholder='Enter description'></textarea>
			<button onclick='addSem()'>Add</button></form>">Add semester</a>

			<a href="#" class="btn btn-info" data-toggle="popover" title="Add subject" data-html="true" data-content="<form><input id='subName' placeholder='Enter subject name'>
			<textarea maxlength='4500' id='subDes' placeholder='Enter subject name'></textarea>
			<button onclick='addSub()'>Add</button></form>">Add subject</a>
			<br/><br/>
			
			<a href="../index.php"><button class="btn btn-info">HOME</button></a>
		</div>
	</div>
	<footer class="text-center">&copy Aca-Archive 2015</footer><br/>
</body>
</html>