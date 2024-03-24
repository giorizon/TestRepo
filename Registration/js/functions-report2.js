

var global_section;
var global_teacher;
var global_student;
var global_subject;
var global_student_array = [];
function add_guardian(){
		
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: { gfname: $('#gfname').val(),gmname: $('#gmname').val(), glname: $('#glname').val(), gextname: $('#gextname').val(), contact: $('#contact').val(), email: $('#email').val()},
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
			data: { lrn: $('#lrn').val(), fname: $('#fname').val(),mname: $('#mname').val(), lname: $('#lname').val(), extname: $('#extname').val(), bday: $('#bday').val(), address: $('#address').val(), guardian_id: id},
			success: function(response) {
				add_to_section();
			}
});
}	
/* function add_teacher(){
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: $('#frm_teacher').serialize(),
			success: function(response) {
				alert(response);
			}
});
}  */
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
			data: {section: 1, name: $('#name').val(), teacher_id: $('#teacher').val(), grade_level: $('#grade_level').val(), session: $('#session').val(), sy: $('#sy').val()},
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
			data: {class: 1, teacher_id: $('#teacher').val(), section_id: $('#section').val(), subject_id: $('#subject').val(), start: $('#start').val(), end: $('#end').val()},
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
				sel_student();
			}
	});
}
function select_class(){
		
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: { select_class: 1,  teacher3 : $('#teacher').val(),  section3 :$('#section').val(), subject3: $('#subject').val()},
		//	dataType: 'json',
			success: function(response) {
				 student_attendance(response);			   
			}	
	});
}
var studId = [];
function student_attendance(id){
		var counter = 0;
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: {student_attendance: id},
			dataType: 'json',
			success: function(data) {
				 $('#mytablehead').empty();
				  $('#mytablehead').append("<th class = 'col1'> # </th >" + 
           						"<th> Name </th> <th class = 'col1'> ---- </th>");
				for (i=0;i<data.length;i++){
					//studId = data[i]['id'];
				 		counter++;
						 $('#mytablehead').append("<tr id = '' ><td>" + counter + "</td><td>" +data[i]['name']+ "</td>" + 
						 	"<td><div><input type='checkbox' id='"+data[i]['id']+ "' onclick = 'get_id(this)' style = 'height: 20px; width: 20px; outline-offset: -2px; outline:2px solid #ff6666; font-size: 2em;'></div></td> " +
						 	" </tr>");
					//	 "<td><input type='checkbox' class='custom-control-input' id='"+data[i]['id']+ "'></td></tr>" +
					//	 	"  <label class='custom-control-label' for='defaultChecked'>Default checked</label>");
					} 
			}
		});
}
function get_id(e){
	//studId = "";
	var str = e.getAttribute("id");
	//var cid = document.getElementById(str)
	if (document.getElementById(str).checked) {
        studId.push(str);
    } else {
        var index = studId.indexOf(str);
        for(j = 0; j < studId.length; j++)
        {
        	if( studId[j] == str)
        	{
        		studId.splice(j, 1);
        	}
        }
	
    }  
}

function for_global_section(){
	global_section = $('#section').val();
	//alert(global_section);
}
function for_global_subject(){
	global_subject =  $('#subject').val();
	//alert(global_subject);
}

// for enrolment_id select enrollment_id as id from enrollment where student_id = 7
/* for select student.id as id from student left join enrollment on student.id = enrollment.student_id 
	left join section on section.section_id = enrollment.section_id left join class on section.section_id = class.section_id 
	left join subject on subject.subject_id = class.subject_id where class.section_id = 1 and class.subject_id = 1  */

function submit_attendance(){
		var counter = 0;
		var id ;
		var remark = 1;
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: {submit_attendance: 1, sec_id: global_section, sub_id: global_subject},
			dataType: 'json',
			success: function(data) {
				for (i=0;i<data.length;i++){
						sid = data[i]['sid'];
						eid = data[i]['eid'];
						for(j = 0; j < studId.length ; j ++){
							if(sid == studId[j]){
								remark = 0;
							}
							else{
								remark = 1;
							}
						}
					add_attendance(eid, global_subject, remark);
					}
					studId = [];
			}
		});
}
function add_attendance(id, sub, remark){
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: {add_attendance: 1, e_id: id, sub_id2: sub, remark : remark },
			success: function(response) {
			}
	});
}	
//select students from a section with subject

/* SELECT student.id as sid, concat(student.lname, ', ', student.fname, ' ', LEFT(student.mname , 1), '.') as name
 from student left join enrollment on student.id = enrollment.student_id left join section on section.section_id = enrollment.section_id 
left join class on section.section_id = class.section_id left join subject on subject.subject_id = class.subject_id 
where section.section_id = 2 and subject.subject_id = 2 */

var stud_array = [];
function sel_subject_section(tablename, typ){
//	alert($('#section').val()  + ", " + $('#teacher').val() + " , " + typ);
		var counter = 1;
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: { sel_subject_section: $('#section').val(), sel_subject_teacher: $('#teacher').val()},
			dataType: 'json',
			success: function(data) {
				 var tbl = document.getElementById(tablename);
				// tbl.rows[0]
				var num = data.length;
				 for (i=0;i<data.length;i++){
						 createCell(tbl.rows[0].insertCell(tbl.rows[0].cells.length), data[i]['name'], 'col');
						for(j = 0; j< stud_array.length; j++){

							if(typ == 'daily'){
								student_att(data[i]['id'], stud_array[j], j, counter);
							
							}
							else if (typ == 'range'){
							
								student_att2(data[i]['id'], stud_array[j], j, counter);
							}
							else if (typ == 'monthly'){
								student_att3(data[i]['id'], stud_array[j], j, counter);
							}
							counter++;	
						}
						counter = 1;
				}	
				stud_array = [];		   
			}	
	});
}
function student_sectiont(){
		//alert("test");
		var counter = 0;
		var tablename = 'studTable';
		var typ = 'daily';
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: { student_sectiont: $('#section').val()},
			dataType: 'json',
			success: function(data) {
				$('#studTable').empty();
				  $('#studTable').append("<thead id = 'tblhead'><th class = 'col1'> # </th >" + 
           			"<th> Name </th> </thead>");
				 for (i=0;i<data.length;i++){
				 	stud_array.push(data[i]['id']);
					counter++;
						 $('#studTable').append("<tr id = '' ><td>" + counter + "</td><td>" +data[i]['name']+ "</td> </tr>");
				}	
			//	alert(tablename + ", "+ typ);
				sel_subject_section(tablename, typ);
			}	
	});
}
function student_section2(){
		var counter = 0;
		var tablename = 'studTable2';
		var typ = 'range';
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: {student_sectiont: $('#section').val()},
			dataType: 'json',
			success: function(data) {
				$('#studTable2').empty();
				  $('#studTable2').append("<thead id = 'tblhead2'><th class = 'col1'> # </th >" + 
           			"<th> Name </th> </thead>");
				 for (i=0;i<data.length;i++){
				 	stud_array.push(data[i]['id']);
					counter++;
						 $('#studTable2').append("<tr id = '' ><td>" + counter + "</td><td>" +data[i]['name']+ "</td> </tr>");
				}	
				sel_subject_section(tablename,typ);
			}	
	});
}
function student_section3(){
		alert("hey");
		var counter = 0;
		var tablename = 'studTable3';
		var typ = 'monthly';
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: { student_sectiont: $('#section').val()},
			dataType: 'json',
			success: function(data) {
				$('#studTable3').empty();
				  $('#studTable3').append("<thead id = 'tblhead3'><th class = 'col1'> # </th >" + 
           			"<th> Name </th> </thead>");
				 for (i=0;i<data.length;i++){
				 	stud_array.push(data[i]['id']);
					counter++;
						 $('#studTable3').append("<tr id = '' ><td>" + counter + "</td><td>" +data[i]['name']+ "</td> </tr>");
				}	
				
				sel_subject_section(tablename, typ);
			}	
	});
}
function student_att(subj_id, stud_id, number, counter){
	
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: { student_att: subj_id, student_number: stud_id,  date1: $('#class_date').val()},
			dataType: 'json',
			success: function(data) {
				 var tbl = document.getElementById('studTable');
				 for (i=0;i<data.length;i++){
						  createCell(tbl.rows[counter].insertCell(tbl.rows[counter].cells.length), data[i]['present'] , 'col');
				}			   
			}	
	});
}
function student_att2(subj_id, stud_id, number, counter){
	
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: { student_att2: subj_id, student_number: stud_id, date_from: $('#date_from').val(), date_to: $('#date_to').val()},
			dataType: 'json',
			success: function(data) {
				 var tbl = document.getElementById('studTable2');
				 for (i=0;i<data.length;i++){
						  createCell(tbl.rows[counter].insertCell(tbl.rows[counter].cells.length), data[i]['present'] , 'col');
				}			   
			}	
	});
}

function student_att3(subj_id, stud_id, number, counter){
	//alert("subj_id: " + subj_id + " stud_id: " + stud_id + " number: " +number + " Month: " + $('#date_month').val());
		$.ajax({  
			type: 'POST',  
			url: 'queries.php', 
			data: { student_att3: subj_id, student_number: stud_id,  date_month: $('#date_month').val()},
			dataType: 'json',
			success: function(data) {
				 var tbl = document.getElementById('studTable3');
				 for (i=0;i<data.length;i++){
						  createCell(tbl.rows[counter].insertCell(tbl.rows[counter].cells.length), data[i]['present'] , 'col');
				}			   
			}	
	});
}
function testtest(){
// append column to the HTML table
    var tbl = document.getElementById('studTable'), // table reference
    i;
    //alert("here");
    // open loop for each row and append cell
    for (i = 0; i < tbl.rows.length; i++) {
    	// createCell(tbl.rows[i].insertCell(tbl.rows[i].cells.length), i, 'col');
        createCell(tbl.rows[i].insertCell(tbl.rows[i].cells.length), i, 'col');
    
	}
}
function createCell(cell, text, style) {
    var div = document.createElement('div'), // create DIV element
        txt = document.createTextNode(text); // create text node
    	div.appendChild(txt);                    // append text node to the DIV
    	div.setAttribute('class', style);        // set DIV class attribute
   	 	div.setAttribute('className', style);    // set DIV class attribute for IE (?!)
   	 	cell.appendChild(div);                   // append DIV to the table cell
	}
	/* SELECT student.id as sid, concat(student.lname, ', ', student.fname, ' ', LEFT(student.mname , 1), '.') as name, present 
	from student left join enrollment on student.id = enrollment.student_id 
	left join attendance on attendance.enrollment_id = enrollment.enrollment_id 
	left join subject on subject.subject_id = attendance.subject where student.id = 6 and subject.subject_id = 2
	*/


	/* selecting all the subject for a section
				select subject.subject_id as id , subject.name as name from subject LEFT JOIN class on class.subject_id = subject.subject_id 
				LEFT JOIN section on class.section_id = section.section_id where section.section_id = 2
			*/
