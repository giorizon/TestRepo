window.onload = function() {
}
function password_change(){
  alert("hello");
    var a = $('new_password').val();
    var b = $('new_password2').val();
  //  var c = a.trim() || '';
  //  var d = b.trim() || '';
    if(a===b){
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
