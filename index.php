<!DOCTYPE html>
<html lang="en">
<?php include 'conn/connection.php';

session_start();

$query1 = 'SELECT sy_id FROM `current_sy` WHERE 1';
      $result1 = mysqli_query($con, $query1);

      if (mysqli_num_rows($result1) > 0) {
        
        $arr = array();
        while($row = mysqli_fetch_assoc($result1)) {
          $arr[] = $row; 
          $_SESSION["syid"] = $row['sy_id'];
          
        }
        //echo json_encode($arr);
      } else {
        echo "No School Year set";
      }


  
  //header ("Location: conn/Login/login.php");   
?>
<head>

  <meta charset="utf-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 -->
  <title>Ampayon NHS</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
 <!--
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
  <link href="css/css-table3.css" rel="stylesheet">
   Plugin CSS -->
  <!-- Custom styles for this template    <link href="css/mycss-new-home7.css" rel="stylesheet"> -->
  <link href="Registration/css/navi3.css" rel="stylesheet">
  <link href="css/new-age.min.css" rel="stylesheet">
  <link href="css/slideshow6.css" rel="stylesheet">
  <link href="css/index-style2.css" rel="stylesheet">
   <link href="css/calendar.css" rel="stylesheet">
<!--  
  <link href="Registration/css/css-adminpage5.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
-->
  <script src="js/new6.js"></script>
    <script src="js/calendar.js"></script>
<style>

</style>
</head>
<!-- Navigation -->

<body>
 <?php
  if (!(isset($_SESSION['id']))) {
    include 'navigation.php';
    
  }
  else{
      include 'navigation_admin.php'; 
  }
 ?>
 <header class="">
    
  </header>

  <div class = "ss_container">
    <div class="slideshow-container">

    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="picture/banner2.png" style="width:100%">
      <div class="text"></div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="picture/comlab.jpg" style="width:100%">
      <div class="text">This is a computer laboratory</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="picture/banner3.jpg" style="width:100%">
      <div class="text">Caption Three</div>
    </div>

    </div>
    <br>

    <div style="text-align:center">
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
    </div>
   </div>
   <div class ="container-mid-sec">
      <div class = "news-section">
       
        <table class = "eventtbl">
          <tr>
              <th> NEWS</th>
          </tr>
          <tr>
              <td>Enter News here ...</td>
          </tr>
          <tr>
              <td>Enter News here ...</td>
          </tr>
        </table>
      </div>
      <div class = "event-section">
        
        <table class = "eventtbl">
          <tr>
              <th> EVENTS</th>
          </tr>
          <tr>
              <td>Events number 1...</td>
          </tr>
          <tr>
              <td>Events number 1 ...</td>
          </tr>
        </table>
        <div>
          <?php
           include 'calendar.php';
          ?>
        </div>
      </div>
   </div>
     <footer>
    <div class="container">
      <p>&copy; Your Website 2022. All Rights Reserved.</p>
      <ul class="list-inline">
        <li class="list-inline-item">
          <a href="#">Privacy</a>
        </li>
        <li class="list-inline-item">
          <a href="#">Terms</a>
        </li>
        <li class="list-inline-item">
          <a href="#">FAQ</a>
        </li>
      </ul>
    </div>
  </footer>   
      
    
  
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/new-age.min.js"></script>

  <script type="text/javascript">
  let slideIndex = 0;
  showSlides();

      function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 3000); // Change image every 2 seconds
      }
  </script>

</body>

</html>

