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
function sel_for_adviser(syid){
    var holder = new Array();
    $.ajax({  
      type: 'POST',  
      url: 'new_queries.php', 
      data: { sel_for_adviser: 1, ssyid: syid},
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
