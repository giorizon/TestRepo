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
   <link href="css/mycss-new-report.css" rel="stylesheet">
	<script src="js/functions-report3.js"></script>
	<script src="js/jquery.js"></script>
  <style>
    .card{
      width: 50%;
      text-align: left;
      border-width: 2px 5px 4px 5px;
      border-style: solid;
    }
    .col-radio{
      width: 33%; 
      text-align: center;
      float: left;
      -moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 20px;
    }
    .col-radio:hover{
        background-color: #9dfaca;
    }
    .rb{
       display: none;
    }
    .selected{
      color: black;
      background-color: #aed4fc;
    }
  </style>
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
         include 'navigation2.php';
    } 
  ?>
  <section >
    <div class="container">
       <input type="text" name="teacher" id = "teacher" value=" <?php echo htmlspecialchars($_SESSION['id']); ?>"  style = "display: none;"/>
      <div class="section-heading text-center" style = "text-align: center;">
      <div class="col-md-8 mx-auto">
          <h2 class="section-heading">Section Report</h2>
		  <div class = "mynav">
          <p></p>
          </div>
		 
      </div>
      <!-- radio button -->
    <div class="card" >
      <h2></h2>
      
      <ul>
        <span class ="col-radio selected" id = "day" onclick="change(this)">
          <input type="radio" class = "rb" name="name" id="one" checked />
          <label for="one" class = "" >Daily</label>
        </span >
        <span class = "col-radio" id = "range"  onclick="change(this)">
          <input type="radio" class = "rb" name="name" id="two" />
          <label for="two">By range</label>
        </span>
        <span class = "col-radio" id ="month"  onclick="change(this)">
          <input type="radio" class = "rb" name="name" id="three" />
          <label for="three">Monthly</label>
        </span>  
         </ul>
            <div class= "div-divide-3">
          <select name="section"class="form-control" id="section" onchange ="">
          </select>
        </div>
    </div>
    <!-- radio button end-->  

		<div class= "div-parent" id = "daily">
			<div class="div-label-block">
				<h3><span class="badge badge-secondary">Class Attendance</span></h3>
			</div>
		<div class= "div-label-block">
        
       
        <div class="div-divide-3">
          <p class = "text-primary text-label"> Date:</p>
            <input type="date" id="class_date" class="form-control input-one">
        </div>
      </div>

        <div class="div-label-block" style = "padding:20px;  ">
       
         <table style = " width: : 100%;" border= 1 id = "studTable" class = "tableCSS">
          
        </table>
        
        </div>
      
        <div class="div-label-block" style = "text-align:left; padding: 5px;">
        <button type="button" class="btn btn-success" onclick="student_sectiont()">Generate</button>
        <!-- <button type="button" class="btn btn-success" onclick="sel_subject_section()">Submit</button>
        <button type="button" class="btn btn-success" onclick="testtest()">Submit</button>  -->
      </div>
    </div>

    <div class= "div-parent" id = "ranging" style = "display: none;">
      <div class="div-label-block">
        <h3><span class="badge badge-secondary">Class Attendance</span></h3>
      </div>
    <div class= "div-label-block">
        
       
        <div class="div-divide-3">
          <p class = "text-primary text-label"> From:</p>
            <input type="date" id="date_from" class="form-control input-one">
        </div>
         <div class="div-divide-3">
          <p class = "text-primary text-label"> To:</p>
            <input type="date" id="date_to" class="form-control input-one">
        </div>
      </div>

        <div class="div-label-block" style = "padding:20px;">
       
          <table style = " width: : 100%;" border= 1 id = "studTable2" class = "tableCSS">
            
          </table>
        
        </div>
        
        <div class="div-label-block" style = "text-align:left; padding: 5px;">
        <button type="button" class="btn btn-success" onclick="student_section2()">Generate</button>
        <!-- <button type="button" class="btn btn-success" onclick="sel_subject_section()">Submit</button>
        <button type="button" class="btn btn-success" onclick="testtest()">Submit</button>  -->
      </div>
    </div>
    <div class= "div-parent" id = "monthly" style = "display: none;">
      <div class="div-label-block">
        <h3><span class="badge badge-secondary">Class Attendance</span></h3>
      </div>
    <div class= "div-label-block">
        
        <div class="div-divide-3">
          <p class = "text-primary text-label"> Month:</p>
            <select id="date_month" class="form-control input-one">
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>
        </div>
         
      </div>

        <div class="div-label-block" style = "padding:20px;">
          <table style = " width: : 100%;" border= 1 id = "studTable3" class = "tableCSS">
          
        </table>
          
        
        </div>
        
        <div class="div-label-block" style = "text-align:left; padding: 5px;">
        <button type="button" class="btn btn-success" onclick="student_section3()">Generate</button>
        <!-- <button type="button" class="btn btn-success" onclick="sel_subject_section()">Submit</button>
        <button type="button" class="btn btn-success" onclick="testtest()">Submit</button>  -->
      </div>
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
  sel_section();
};
$(document).ready(function () {
   // $('#mytablehead').append("<tr><td>test</td><td>test</td><td>test</td></tr>");
        
});
function change(c)
{
        var str = c.getAttribute("id");
        if(str==="day"){
            document.getElementById("day").classList.add('selected');
            document.getElementById("range").classList.remove('selected');
            document.getElementById("month").classList.remove('selected');

            document.getElementById("daily").style.display = "block";
            document.getElementById("ranging").style.display = "none";
             document.getElementById("monthly").style.display = "none";
        }
        else if(str==="range"){
           document.getElementById("day").classList.remove('selected');
            document.getElementById("range").classList.add('selected');
            document.getElementById("month").classList.remove('selected');
        
            document.getElementById("daily").style.display = "none";
            document.getElementById("ranging").style.display = "block";
            document.getElementById("monthly").style.display = "none";
        }
        else if(str==="month"){
            document.getElementById("day").classList.remove('selected');
            document.getElementById("range").classList.remove('selected');
            document.getElementById("month").classList.add('selected');
        
            document.getElementById("daily").style.display = "none";
            document.getElementById("ranging").style.display = "none";
            document.getElementById("monthly").style.display = "block"; 
        }
        
  }
</script>