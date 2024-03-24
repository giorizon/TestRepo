<input type="text" id="username" value="<?php echo $_SESSION['username']; ?>" style ="display:none">
 <div class="topnav" id="myTopnav">
  <img src = "img/logo2.png" class ="navphoto"/>

  <a href="index.php" >Home</a>
  <a href="#">Admission</a>
  <a href="#">Teachers and Staffs</a>
  <a href="#about">About</a>
 
  <div class = "dropdown">
    
    <a href="#s" id = "signed" class = "signed">Dropdown <i class="fa fa-caret-down"></i></a>
   </div>
   <div class = "testtest">
      <a href="profile.php">Profile   <i class="fa fa-user"></i></a> 
      <a href="../logout.php">Logout    <i class="fa fa-power-off"></i></a>   
  </div>  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<script>
  const name = document.getElementById("username").value;
  if(name== "")
  {
   alert("hello");
  }
  else{
   document.getElementById("signed").innerHTML = name;
  }

</script>