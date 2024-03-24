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
function class_list_profile(tid, syid){
 
   var counter = 0;
    $.ajax({  
      type: 'POST',  
      url: 'queries.php', 
       data: {class_list: tid, sy: syid},
      dataType: 'json',
      success: function(data) {
       
         $('#mytablehead').empty();
          $('#mytablehead').append("<th class = 'col1'> # </th >" + 
                      "<th> Name </th> <th class = 'col1'> Sex </th>");
        for (i=0;i<data.length;i++){
            counter++;
             $('#mytablehead').append("<tr style = 'cursor: pointer;' id = '"+data[i]['id']+ "' onclick = 'edit_student(this)'><td>" + counter + "</td><td>" +data[i]['name']+ "</td>" + 
              "<td>" + data[i]['sex'] + " </td> " +
              " </tr>");
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