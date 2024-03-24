
function add_guardian(){
		
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: { gfname: $('#gfname').val(),gmname: $('#gmname').val(), glname: $('#glname').val(), gextname: $('#gextname').val(), contact: $('#contact').val(), relation: $('#relation').val()},
			success: function(response) {
				sel_max_guardian_id();
			}
});
}

function sel_max_guardian_id(){
		
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: { searchG_id: 1},
			success: function(response) {
				 add_student(response);
			}
});
}	
function add_student(id){
		
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: { lrn: $('#lrn').val(), fname: $('#fname').val(),mname: $('#mname').val(), lname: $('#lname').val(), extname: $('#extname').val(), bday: $('#bday').val(), address: $('#address').val(), sex: $('#sex').val(), guardian_id: id},
			success: function(response) {
				add_to_section();
			}
});
}	
function add_teacher(){
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: {teacher: 1, fname: $('#fname').val(), mname: $('#mname').val(), lname: $('#lname').val(), extname: $('#extname').val(), bday: $('#bday').val(), address: $('#address').val(), level: $('#level').val()},
			success: function(response) {
				alert(response);
			}
});
}
function sel_teacher(){
		var holder = new Array();
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: { sel_teacher: 1},
			dataType: 'json',
			success: function(data) {
				
				//alert(data[0]['id']);
				//alert(data.length);
				//$('#teacher_id').empty();
				$('#teacher').append("<option >Select Teacher</option>" );
				for (i=0;i<data.length;i++){
					$('#teacher').append("<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>" );
				} 
				 
			}
	});
}
function add_section(){
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: {section: 1, name: $('#name').val(), teacher_id: $('#teacher').val(), grade_level: $('#grade_level').val(), session: $('#session').val(), sy: $('#schoolyear').val()},
			success: function(response) {
				alert(response);
			}
	});
}
function sel_section(){
		var holder = new Array();
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: { sel_section: 1},
			dataType: 'json',
			success: function(data) {
				$('#section').append("<option >Select Section</option>" );
				$('#section2').append("<option >Select Section</option>" );
				for (i=0;i<data.length;i++){
					$('#section').append("<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>" );
					$('#section2').append("<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>" );
				} 
				 
			}
	});
}
function add_subject(){	
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: {subject: 1, name: $('#subject_name').val()},
			success: function(response) {
				alert(response);
				sel_subject();
			}
	});
}
function sel_subject(){
		var holder = new Array();
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: { sel_subject: 1},
			dataType: 'json',
			success: function(data) {
					$('#subject').empty();
				$('#subject').append("<option >Select Subject</option>" );
				for (i=0;i<data.length;i++){
					$('#subject').append("<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>" );
				} 
				 
			}
	});
}
function add_class(){
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: {class: 1, teacher_id: $('#teacher').val(), section_id: $('#section').val(), subject_id: $('#subject').val(), schedule: $('#schedule').val()},
			success: function(response) {
				alert(response);
			}
	});
}
function add_to_section(){
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: {add_to_section: 1, section_id: $('#section').val()},
			success: function(response) {
				alert(response);
			}
	});
}
function sel_student(){
		var holder = new Array();
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: { sel_student: 1},
			dataType: 'json',
			success: function(data) {
				$('#student').empty();
				$('#student').append("<option >Select Student</option>" );
				for (i=0;i<data.length;i++){
					$('#student').append("<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>" );
				} 
				 
			}
	});
}
function add_enrollment(){
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: {add_enrollment: 1, student_id:$('#student').val(), section_id: $('#section2').val()},
			success: function(response) {
				alert(response);
				sel_student();
			}
	});
}
function select_class(){
		
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: { select_class: 1,  teacher3 :$('#teacher').val(),  section3 :$('#section').val(), subject3: $('#subject').val()},
			success: function(response) {
				 student_attendance(response);
				 	
				   
			}
});
}

function student_attendance(id){
	
		var counter = 0;
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: { student_attendance: id},
			dataType: 'json',
			success: function(data) {
				for (i=0;i<data.length;i++){
				 		counter++;
						 $('#mytablehead').append("<tr id = '"+data[i]['id']+ "''><td>" + counter + "</td><td>" +data[i]['name']+ "</td>" + 
						 	"<td> <input type='checkbox' class='custom-control-input' id='defaultChecked' checked=''></td> " +
						 	" </tr>");

					//	 "<td><input type='checkbox' class='custom-control-input' id='"+data[i]['id']+ "'></td></tr>" +
					//	 	"  <label class='custom-control-label' for='defaultChecked'>Default checked</label>");
					} 
			}
});
}