 function login(){
		$.ajax({  
			type: 'POST',  
			url: 'query.php', 
			dataType: 'json',
			data:{ username: $('#username').val(), password: $('#password').val()},
			success: function(data) {
				//alert(data[0]['id']);
				/*
				if(data[i]['id']="")
				{
					alert(data);
					}
				else{

					alert("Success");
				}	*/
				alert("Sucess!");
				window.location.href = "../../index.php";

			},
			error: function(data){
			    alert("Incorrect Username or Password");
			  }
	});
} 