<!--    Made by Erik Terwan    -->
<!--   24th of November 2015   -->
<!--        MIT License        -->
<!-- Load an icon library to show a hamburger menu (bars) on small screens 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
-->
<div class="topnav" id="myTopnav">
    <a class="navbar-brand " href="index.php"><img src= "img/home.png" style = "width: 25px;"></a> 
 
    <a class="nav-link js-scroll-trigger" href="Registration/attendance.php">Attendance</a>
    <a class="nav-link js-scroll-trigger" href="Registration/report.php">Report</a>
 
      <a class="nav-link js-scroll-trigger" href="logout.php">Logout</a>      
   
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<script>
  function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>