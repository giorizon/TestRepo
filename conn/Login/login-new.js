 function login(){
		$.ajax({  
			type: 'POST',  
			url: 'query.php', 
			dataType: 'json',
			data:{ username: $('#username').val(), password: $('#password').val()},
			success: function(data) {
				alert(data[0]['id']);
				/*
				for(i=0;i<data.length;i++){

					if(data[i]['teacher_id']!=null)
					{
						alert(data);
					}
					else{

						alert("Success");
					}
				}
				*/
			}
	});
} 