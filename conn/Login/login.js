 function login(){
		$.ajax({  
			type: 'POST',  
			url: 'query.php', 
			data: $('#loginfrm').serialize(),
			success: function(response) {
				alert("Success");
			}
	});
} 