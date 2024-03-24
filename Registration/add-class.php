<!DOCTYPE html>
<html lang="en">
<?php include '../conn/connection.php';?>
<?php include 'queries.php';

session_start();
if (!(isset($_SESSION['id']))) {
  
  header ("Location: ../conn/Login/login.php");
} ?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ampayon NHS</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
  <link href="css/css-table2.css" rel="stylesheet">
  <!-- Plugin CSS -->
  <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

  <!-- Custom styles for this template -->
  <link href="css/new-age.min.css" rel="stylesheet">
  <link href="css/mycss-new-class.css" rel="stylesheet">
	<script src="js/functions-class.js"></script>
	<script src="js/jquery.js"></script>
</head>

<body id="page-top">

  <!-- Navigation -->
<?php 
    if($_SESSION['level']==2)
    {
         include 'navigation_admin.php'; 
    }
    else
    {
         include 'navigation_user.php';
    } 
?>
<header class="masthead">
    <div class="container h-100">
      <section >
    <div class="container h-100">
      <div class="section-heading text-center" style = "text-align: center;">
      <div class="col-md-8 mx-auto">
          <h2 class="section-heading">Class/Enrollment</h2>
      <div class = "mynav">
          <p>[Note here]</p>
          </div>
     
        </div>
    <div class= "div-parent">
      <div class="div-label-block">
        <h3><span class="badge badge-secondary">Subject</span></h3>
      </div>
      
      <div class= "div-divide">
        <div class="div-label-block">
          <p class = "text-primary text-label"> Add Subject</p>
          <input class="form-control input-short" type = "text" id = "subject_name" >
            <button type="button" class="btn-sm" style = "float:right"onclick="add_subject()">Submit</button>
        </div>  
      </div>  
        
      <div class="div-label-block">
        <h3><span class="badge badge-secondary">Class Advicer</span></h3>
      </div>  
      <div class= "div-label-block">
        <div class= "div-divide-3">
          <select name="teacher"class="form-control" id="teacher" onchange="">
          </select>
        </div>
        <div class= "div-divide-3">
          <select name="section"class="form-control" id="section" onchange="">
          </select>
        </div>
        <div class= "div-divide-3">
          <select name="subject"class="form-control" id="subject" onchange="">
          </select>
        </div>
        <div class="div-label-block" style = "padding:20px;">
        <div class= "div-divide-3">
          <p class = "text-primary text-label"> Schedule: </p>
          <select name="session"class="form-control input-one" id="schedule" onchange="">
                          <option value = "7:30 AM to 8:30 AM" >7:30 AM to 8:30 AM</option>
                          <option value = "8:30 AM to 9:30 AM" >8:30 AM to 9:30 AM</option>
                          <option value = "9:30 AM to 10:30 AM" >9:45 AM to 10:45 AM</option>
                          <option value = "10:45 AM to 11:45 AM" >10:45 AM to 11:45 AM</option>
                          <option value = "1:00 PM to 2:00 PM" >1:00 PM to 2:00 PM</option>
                          <option value = "2:00 PM to 3:00 PM" >2:00 PM to 3:00 PM</option>
                          <option value = "3:00 PM to 4:00 PM" >3:00 PM to 4:00 PM</option>
                          <option value = "4:00 PM to 5:00 PM " >4:00 PM to 5:00 PM</option>
             </select>
        </div>
        
        <div class= "div-divide-3">
          <button type="button" class="btn-sm" style = "float:left"onclick="add_class()">Submit</button>
        </div>
        </div>
      </div>
      <div class="div-label-block">
        <h3><span class="badge badge-secondary">Enrollment</span></h3>
      </div>
      <div class="div-label-block">
        <div class= "div-divide-3">
          <select name="student"class="form-control" id="student" onchange="">
          </select>
        </div>
        <div class= "div-divide-3">
          <select name="section2"class="form-control" id="section2" onchange="">
          </select>
        </div>
        <div class= "div-divide-3">
          <button type="button" class="btn-sm" style = "float:left"onclick="add_enrollment()">Submit</button>
        </div>
        <section></section>
      </div>
      <div class="div-label-block" style = "text-align:left; padding: 5px;">
      </div>
    </div>
      <div class="row">
        <div class="col-lg-4 my-auto">
          <div class="device-container">
     
            <div class=" portrait white">
              <div class="device">
                <div class="screen">
                  <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                 
                </div>
                <div class="button">
                  <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    </div>
    </section>
  </div>
  </header>

  <section class="cta">
    <div class="cta-content">

      <div class="container">
        <h2>Stop waiting.<br>Start building.</h2>
        <a href="#contact" class="btn btn-outline btn-xl js-scroll-trigger">Let's Get Started!</a>
      </div>
    </div>
    <div class="overlay"></div>
  </section>

  <section class="contact bg-primary" id="contact">
    <div class="container">
      <h2>We
        <i class="fas fa-heart"></i>
        new friends!</h2>
      <ul class="list-inline list-social">
        <li class="list-inline-item social-twitter">
          <a href="#">
            <i class="fab fa-twitter"></i>
          </a>
        </li>
        <li class="list-inline-item social-facebook">
          <a href="#">
            <i class="fab fa-facebook-f"></i>
          </a>
        </li>
        <li class="list-inline-item social-google-plus">
          <a href="#">
            <i class="fab fa-google-plus-g"></i>
          </a>
        </li>
      </ul>
    </div>
  </section>

  <footer>
    <div class="container">
      <p>&copy; Your Website 2019. All Rights Reserved.</p>
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

</body>

</html>
<script>
window.onload = function() {
  sel_teacher();
  sel_section();
  sel_subject();
  sel_student();
};

</script>