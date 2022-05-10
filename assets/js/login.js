$(document).ready(function(){
	var addLoginForm = $("#login");

	var validator = addLoginForm.validate({

		rules:{
			email :{ required : true },
			password :{ required : true }
		},
		messages:{
			email :{ required : "The Email is required" },
			password :{ required : "The Password is required" }
		}
	});
});