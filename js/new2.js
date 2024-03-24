window.onload = function() {
}
function password_change(){
    var a = $('new_password').val();
    var b = $('new_password2').val();
    if(a.trim()===b.trim()){
      $.ajax({  
        type: 'POST',  
        url: 'Registration/queries.php', 
        data: {change_pass: $('#new_password').val()},
        success: function(response) {
         alert(response);
        }
       });  
    }
    else{
      alert("The password does not match");
    }    
}

/*
function class_list(id){
  alert(id);
    $.ajax({  
      type: 'POST',  
      url: 'Registration/queries.php', 
      data: {class_list: id},
      dataType: 'json',
      success: function(data){
        for(i = 0; i < data.length; i++)
        {
            alert(data[i]['id']);
        }
      }
  });
} */
function class_list(){
  alert("Hey");
    var counter = 0;
    $.ajax({  
      type: 'POST',  
      url: 'queries.php', 
       data: {class_list: $('#teacher').val()},
      dataType: 'json',
      success: function(data) {
       
         $('#mytablehead').empty();
          $('#mytablehead').append("<th class = 'col1'> # </th >" + 
                      "<th> Name </th> <th class = 'col1'> Sex </th>");
        for (i=0;i<data.length;i++){
            counter++;
             $('#mytablehead').append("<tr id = '"+data[i]['id']+ "' onclick = 'edit_student(this)'><td>" + counter + "</td><td>" +data[i]['name']+ "</td>" + 
              "<td>" + data[i]['sex'] + " </td> " +
              " </tr>");
          } 
      } 
  });
    
}
function edit_student(str){
   alert(str.id);
}
