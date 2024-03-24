<!DOCTYPE html>
<html lang="en">
<?php include '../conn/connection.php';?>
<?php include 'queries.php';

$test = htmlspecialchars($_GET["sid"]);

session_start();
if (!(isset($_SESSION['id']))) {
  
  header ("Location: ../conn/Login/login.php");
} 
?>


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
    <link href="css/radio-button.css" rel="stylesheet">
  <link href="css/new-age.min.css" rel="stylesheet">
  <link href="css/mycss-new-att2.css" rel="stylesheet">
	<script src="js/functions-student.js"></script>
    <script src="js/functions-edit2.js"></script>
	<script src="js/jquery.js"></script>
</head>


  <script>
// boolean outputs "" if false, "1" if true
  var sid = "<?php echo $test ?>"; 
  display_info(sid);
  </script>


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
       <section >
    <div class="container h-100">
   
    <div class="container">
      <div class="section-heading text-center" style = "text-align: center;">
      <div class="col-md-4 mx-auto">
          <h2 class="section-heading">Edit Student</h2>
   
        </div>
    <div class= "div-parent"  style = "overflow: auto;height: 600px;" >
      <div class="div-label-block">
        <br>
      </div>
      <div class="div-label-block">
          <p class = "text-primary text-label"> LRN:</p>
          <input class="form-control input-short" type = "text" id = "lrn">
        </div>
      <div class= "div-divide">
        <div class="div-label-block">
          <p class = "text-primary text-label"> First Name:</p>
          <input class="form-control input-one" type = "text" id = "fname" >
        </div>  
        <div class="div-label-block">
          <p class = "text-primary text-label"> Middle Name:</p>
          <input class="form-control input-one" type = "text" id = "mname" >
        </div>  
        
      </div>
      <div class= "div-divide">
        <div class="div-label-block">
          <p class = "text-primary text-label"> Last Name:</p>
          <input class="form-control input-one" type = "text" id= "lname" >
        </div>  
        <div class="div-label-block">
          <p class = "text-primary text-label"> Extra Name:</p>
          <input class="form-control input-one" type = "text" id = "extname" >
        </div>  
      </div>

      <div class= "div-divide-3">
      <p class = "text-primary text-label"> Birthday:</p>
            <input type="date" id="bday" class="form-control input-one">
      </div>
      <div class= "div-divide-3">
           <p class = "text-primary text-label"> Sex:</p>
           <select name="section"class="form-control input-one" id="sex" onchange="">
            <option value = "">Select Sex</option>
              <option value = "Male">Male</option>
              <option value = "Female">Female</option>
          </select>
      </div>
      <div class= "div-divide-3">
        
      </div>
    
      <div class="div-label-block">
          <p class = "text-primary text-label"> Address:</p>
          <input class="form-control input-one" type = "text" id = "address" >
      </div>
       <div class="div-divide-3">
          <p class = "text-primary text-label"> 4Ps recipient:</p>
          <select name="pppp"class="form-control input-short" id="pppp" onchange="">
            <option value = "0">No</option>
              <option value = "1">Yes</option>
          </select>
      </div>

      <div class="div-label-block">
        <h3><span class="badge badge-secondary">Guardian Info</span></h3>
      </div>
      <div class= "div-divide">
        <div class="div-label-block">
          <p class = "text-primary text-label"> First Name:</p>
          <input class="form-control input-one" type = "text" id = "gfname" >
        </div>  
        <div class="div-label-block">
          <p class = "text-primary text-label"> Middle Name:</p>
          <input class="form-control input-one" type = "text" id = "gmname" >
        </div>  
        
      </div>
      <div class= "div-divide">
        <div class="div-label-block">
          <p class = "text-primary text-label"> Last Name:</p>
          <input class="form-control input-one" type = "text" id = "glname" >
        </div>  
        <div class="div-label-block">
          <p class = "text-primary text-label"> Extra Name:</p>
          <input class="form-control input-one" type = "text" id = "gextname" >
        </div>  
      </div>
      <div class= "div-divide">
       <div class="div-label-block">
          <p class = "text-primary text-label"> Contact Number:</p>
           <input class="form-control input-one" type = "text" id = "contact" >
        </div>  
      </div>
      <div class= "div-divide">
         <div class="div-label-block">
          <p class = "text-primary text-label"> Relation:</p>
           <input class="form-control input-one" type = "text" id = "relation" >
        </div> 
    
      <div class="div-label-block" style = "text-align:left; padding: 5px;">
        <button type="button" class="btn btn-success" onclick="add_guardian()">Submit</button>
      </div>
    </div>
     </div>     </div>
    </section> 
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
};

</script>