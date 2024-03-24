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
        } 
      }
    });
}  
function class_list_profile(tid){
  alert("Hello");


} 