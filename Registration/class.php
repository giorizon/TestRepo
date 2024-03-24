<!DOCTYPE html>
<html lang="en">
<?php include '../conn/connection.php';?>
<?php include 'queries.php';?>
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

  <!-- Plugin CSS -->
  <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

  <!-- Custom styles for this template -->
  <link href="css/new-age.min.css" rel="stylesheet">
  <link href="css/mycss-new.css" rel="stylesheet">
	<script src="js/functions.js"></script>
	<script src="js/jquery.js"></script>
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top mynav" style = "border-bottom: 3px solid #008ae6;" id="mainNav">
 
    <div class="container">
      
		<a class="navbar-brand " href="../index.php"><img src= "img/home.png" style = "width: 35px;"></a>
	  
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        
      </div>
    </div>
  </nav>

  
  <section >
    <div class="container">
      <div class="section-heading text-center" style = "text-align: center;">
      <div class="col-md-8 mx-auto">
          <h2 class="section-heading">Add Section</h2>
		  <div class = "mynav">
          <p>[Note here]</p>
          </div>
		 
        </div>
		<div class= "div-parent">
			<div class="div-label-block">
				<h3><span class="badge badge-secondary">Section Info</span></h3>
			</div>
			
			<div class= "div-divide">
				<div class="div-label-block">
					<p class = "text-primary text-label"> Section Name:</p>
					<input class="form-control input-one" type = "text" id = "name" >
				</div>	
				<div class="div-label-block">
					<p class = "text-primary text-label"> Adviser:</p>
					<select name="teacher"class="form-control input-one" id="teacher" onchange="">
					</select>	
				</div>	
				
			</div>
			<div class= "div-divide">
				<div class="div-label-block">
					<p class = "text-primary text-label"> Grade Level:</p>
						<select name="grade_level"class="form-control input-one" id="grade_level" onchange="">
							<option value = "" >Select Grade Level</option>
							<option value = "Grade 1" >Grade 1</option>
							<option value = "Grade 2" >Grade 2</option>
							<option value = "Grade 3" >Grade 3</option>
							<option value = "Grade 4" >Grade 4</option>
							<option value = "Grade 5" >Grade 5</option>
							<option value = "Grade 6" >Grade 6</option>
							<option value = "Grade 7" >Grade 7</option>
							<option value = "Grade 8" >Grade 8</option>
							<option value = "Grade 9" >Grade 9</option>
							<option value = "Grade 10" >Grade 10</option>
							<option value = "Grade 11" >Grade 11</option>
							<option value = "Grade 12" >Grade 11</option>
					</select>
				</div>	
				<div class="div-label-block">
					<p class = "text-primary text-label"> Session:</p>
					<select name="session"class="form-control input-one" id="session" onchange="">
							<option value = "" >Select Session</option>
							<option value = "Morning" >Morning</option>
							<option value = "Afternoon" >Afternoon</option>
					</select>
				</div>	
			</div>
			<div class= "div-divide">
				<div class="div-label-block">
					<p class = "text-primary text-label"> School Year:</p>
					  <input type="text" id="sy" class="form-control input-one">
				</div>	
			</div>
			<div class="div-label-block" style = "text-align:left; padding: 5px;">
				<button type="button" class="btn btn-success" onclick="add_section()">Submit</button>
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
  </section>

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
};

</script>