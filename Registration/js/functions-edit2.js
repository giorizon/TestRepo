


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
       		var x = data[i]['sex'];
       		var x1 = data[i]['pppp'];
	      	document.getElementById("lrn").value = data[i]['lrn'];	

	      	document.getElementById("fname").value = data[i]['sfname'];
	      	document.getElementById("mname").value = data[i]['smname'];
	      	document.getElementById("lname").value = data[i]['slname'];
	      	document.getElementById("extname").value = data[i]['sextname'];
	      	document.getElementById("bday").value = data[i]['birthday'];	
	      	
	      	if(x="Male"){
	      		document.getElementById("sex").selectedIndex = "1";	
	      	}
	      	else if(x="Female"){
	      		document.getElementById("sex").selectedIndex = "2";		
	      	}
	      	
	      	document.getElementById("address").value = data[i]['address'];	
	      
	      	if(x1="0"){
	      		document.getElementById("pppp").selectedIndex = "1";	
	      	}
	      	else if(x1 = "1"){
	      		document.getElementById("pppp").selectedIndex = "2";
	      	}

	      	document.getElementById("gfname").value = data[i]['gfname'];
	      	document.getElementById("gmname").value = data[i]['gmname'];
	      	document.getElementById("glname").value = data[i]['glname'];
	      	document.getElementById("gextname").value = data[i]['gextname'];

	      	document.getElementById("contact").value = data[i]['contanctnumber'];
	      	document.getElementById("relation").value = data[i]['relation'];
      	}
      	
      } 
  	});
}