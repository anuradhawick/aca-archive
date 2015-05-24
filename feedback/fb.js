jQuery(document).ready(function($) {
	$("#form").submit(function(event) {
		var name = $("#name").val();
		var sch = $("#school").val();
		var em = $("#email").val();
		var cmt = $("#comment").val();
		$.post('feedback.php', {
			name: name,
			school: sch,
			email: em,
			comment: cmt
		}, function(data, textStatus, xhr) {
			if(textStatus == 'success'){
				alert("Thanks for providing feedback!!");
				$("#name").val('');
				$("#school").val('');
				$("#email").val('');
				$("#comment").val('');
				window.location = "../index.php";
			}
		});
	});
});
