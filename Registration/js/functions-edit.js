
function display_info(sid){
   var student = sid;
    var counter = 0;
    $.ajax({  
      type: 'POST',  
      url: 'queries.php', 
      data: {display_info_id: student},
      dataType: 'json',
      success: function(data) {
      
       for (i=0;i<data.length;i++){
       	
	      	document.getElementById("lrn").value = data[i]['lrn'];	

	      	document.getElementById("fname").value = data[i]['sfname'];
	      	document.getElementById("mname").value = data[i]['smname'];
	      	document.getElementById("lname").value = data[i]['slname'];
	      	document.getElementById("extname").value = data[i]['sextname'];
	      	document.getElementById("bday").value = data[i]['birthday'];	

	      	document.getElementById("sex").value = data[i]['sex'];	
      	}
      	
      } 
  	});
}