// Coded by W.A. Anuradha Wickramarachchi


jQuery(document).ready(function($) {
	$("#search").submit(function(event) {
		$("#make").hide();
		$("#make").empty();
        $.get('req.php?id=search&key='+$("#key").val(), function(data,status) {
            $("#make").append("<a href='javascript:void(0)' class='btn btn-info' id='backtosem'>Back to semester</a>");
            var arr  = JSON.parse(data);
            for (var i = 0; i < arr.length; i++) {
            	$("#make").append("<a href="+arr[i].link+" target='_blank'><h1>"+arr[i].topic+"<h1></a>");
                $("#make").append("<blockquote class='text-justify'>"+arr[i].description+"</blockquote>");
            };
        	$("#make").slideDown(400, function() {
        		
        	});
        });
    });
});