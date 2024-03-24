function search_teacher(tid, syid){

 // var fn = "";
    $.ajax({  
      type: 'POST',  
      url: 'new_queries.php', 
      data: { teacher_id: tid, teacher_sy: syid},
      dataType: 'json',
      success: function(response) {
        for(i=0;i<response.length;i++){
          document.getElementById("fullname").innerText = response[i].fullname;

          document.getElementById("section").innerText = response[i].sect;

          document.getElementById("address").innerText = response[i].address;

          document.getElementById("birthday").innerText = response[i].bday;
           document.getElementById("sy").innerText = response[i].sy;
        } 
      }
    });
}  

 function schoolYear(){
 
   var counter = 0;
    $.ajax({  
      type: 'POST',  
      url: 'new_queries.php', 
       data: {schoolYear: 1},
      dataType: 'json',
      success: function(data) {
        $('#sy_option').append("<option value = ''>Select School Year</option");
        for (i=0;i<data.length;i++){
            counter++;
             $('#sy_option').append("<option value = '" + data[i]['id'] + " '>" + data[i]['sy'] + " </option");
          } 
           $('#sy_option').append("</select>")
      } 

  });
    
}
function sel_for_adviser(){
    var holder = new Array();
    $.ajax({  
      type: 'POST',  
      url: 'new_queries.php', 
      data: { sel_for_adviser: 1, syid: $('#syid').val()},
      dataType: 'json',
      success: function(data) {
        $('#adviser').append("<option >Select Teacher</option>" );
        for (i=0;i<data.length;i++){
          $('#adviser').append("<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>" );
        } 
            $('#adviser').append("</select>")
      }
     
  });
}
function sel_sy(){
    var holder = new Array();
    $.ajax({  
      type: 'POST',  
      url: 'new_queries.php', 
      data: { sel_sy: 1, syid: $('#syid').val()},
      dataType: 'json',
      success: function(data) {
        
        for (i=0;i<data.length;i++){
          $('#schoolyear').append("<option value='"+data[i]['id']+"'>"+data[i]['sy']+"</option>" );
        } 
            $('#schoolyear').append("</select>")
      }
  });
}
function add_section_new(){
    $.ajax({  
      type: 'POST',  
      url: 'queries.php', 
      data: {section: 1, name: $('#section_name').val(), teacher_id: $('#adviser').val(), grade_level: $('#grade_level').val(), session: $('#session').val(), sy: $('#schoolyear').val()},
      success: function(response) {
        alert(response);
      }
  });
}
function sel_sec_grade(){
  alert($('#grade').val());
    var holder = new Array();
    $.ajax({  
      type: 'POST',  
      url: 'new_queries.php', 
      data: { sel_sec_grade: $('#grade').val()},
      dataType: 'json',
      success: function(data) {
        $('#section2').append("<option >Select Section</option>" );
        for (i=0;i<data.length;i++){
          $('#section2').append("<option value='"+data[i]['section_id']+"'>"+data[i]['name']+"</option>" );
        } 
            $('#section2').append("</select>")
      }
  });
}
function sel_grade(){
    var holder = new Array();
    $.ajax({  
      type: 'POST',  
      url: 'new_queries.php', 
      data: { sel_grade: 1},
      dataType: 'json',
      success: function(data) {
        
        for (i=0;i<data.length;i++){
          $('#grade').append("<option value='"+data[i]['id']+"'>"+data[i]['grade']+"</option>" );
        } 
            $('#grade').append("</select>")
      }
  });
}