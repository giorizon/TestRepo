function search_teacher(tid){

 // var fn = "";
    $.ajax({  
      type: 'POST',  
      url: 'new_queries.php', 
      data: { teacher_id: tid},
      dataType: 'json',
      success: function(response) {
        for(i=0;i<response.length;i++){
          document.getElementById("fullname").innerText = response[i].fullname;

          document.getElementById("section").innerText = response[i].sect;

          document.getElementById("address").innerText = response[i].address;

          document.getElementById("birthday").innerText = response[i].bday;
        } 
      }
    });
}  
function class_list_profile(tid){
   var counter = 0;
    $.ajax({  
      type: 'POST',  
      url: 'queries.php', 
       data: {class_list: tid},
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
 