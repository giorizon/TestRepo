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
  <link href="css/mycss-new-report2.css" rel="stylesheet"> 
 <link href="css/css-adminpage5.css" rel="stylesheet">

  <!-----Custome JAVASCRIPT ----->
  
  <script src="js/function-adminpage5.js"></script>
   <script src="js/functions-class_new.js"></script>
	<script src="js/jquery.js"></script>
</head>

<body id="page-top ">
  <input type="text" name="" id = "syid" hidden value="<?php echo $_SESSION['syid']; ?>">
  <input type="text" id = "tid" name="value" hidden value="<?php echo $_SESSION['id']; ?>">
  <!-- Navigation -->
    <?php
         include 'navigation_admin.php'; 
  ?>
  <header class="">
    
  </header>
  <div class = "admin-container">
    <div  class ="sub-container main-panel">

  <!-- Start of the Accordion ----------->
      <h1>Administration Page</h1>
      <hr>
       <div class= "div-divide-3">
         <select name="teacher"class="form-control input-one" id="schoolyear" onchange="">
                </select> 
       </div>
    <button class="accordion top-accordion "><span>SUBJECT</span></button>
      <div class="panel">
        <div class= "inside">
            <h3>Add Subject</h3>
              <p class = "text-primary text-label"> Enter the subject name</p>
              <input class="form-control input-short" type = "text" id = "subject_name" >
                
          </div>  
          <div class = "lower">
            <button type="button" class="btn panel-btn" onclick="add_subject()">Submit</button>
          </div>
          <div class = "inside">
              <h3>Remove Subject</h3>
               <p class = "text-primary text-label"> Select the subject to delete</p>
              <div class= "div-divide-3">
                <select name="subject2"class="form-control" id="subject2" onchange="">
                </select>
              </div>
          </div>
           <div class = "lower">
              <button type="button" class="btn panel-btn-del" onclick="del_subject()">DELETE</button>
          </div>
      </div>

      <button class="accordion">CLASS ADVICER</button>
      <div class="panel">
          <div class = "inside">
            <p class = "text-primary text-label"> Select Advicers for Section</p>
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
            
           

          </div>
        </div>
        
        </div>
          <div class= "lower">
              <button type="button" class="btn panel-btn" onclick="add_class()">Submit</button>
            </div>
      </div>
      <button class="accordion">ADD SECTION</button>
        <div class="panel">
          <div class = "inside">
            <div class = " flex-container">
              <div> <p class = "text-primary text-label"> Section Name:</p></div>
              <div><p class = "text-primary text-label"> Adviser:</p></div>
              <div> <p class = "text-primary text-label"> Grade Level:</p></div>
            </div>
            <div class = " flex-container">
              <div> <input class="form-control input-one" type = "text" id = "section_name" > </div>
              <div> 
                 <select name="adviser"class="form-control input-one" id="adviser" onchange="">
                </select> 
            </div>
              <div>
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
                  <option value = "Grade 12" >Grade 12</option>
                </select>
              </div>
            </div>
             <div class = " flex-container">
            <div> <p class = "text-primary text-label"> Session:</p></div>
            <div> <p class = "text-primary text-label"> School Year:</p></div>
          </div>
          <div class = "flex-container">
            <div>
              <select name="session"class="form-control input-one" id="session" onchange="">
                <option value = "" >Select Session</option>
                <option value = "Morning" >Morning</option>
                <option value = "Afternoon" >Afternoon</option>
              </select>
            </div>
            <div>
              <!--  <select name="teacher"class="form-control input-one" id="schoolyear" onchange="">
                </select>  -->
            </div>          
          </div>
          </div>
         
          <div class = "lower">
             <button type="button" class="btn panel-btn" onclick="add_section_new()">Submit</button>
          </div>
         </div>
      <button class="accordion">ENROLLMENT</button>
      <div class="panel">
        <div class= "inside">
            <div class = " flex-container">
              <div>
                <select name="student"class="form-control input-one" id="student" onchange=""></select>
               </div>
               <div>
                <select name="grade"class="form-control input-one" id="grade" onchange="sel_sec_grade()">
                </select>
               </div>
               <div>
                   <select name="section2"class="form-control input-one" id="section2" onchange=""></select>
               </div> 
             
            </div> 
          </div>  
          <div class = "lower">
           <button type="button" class="btn panel-btn " onclick="add_subject()">Submit</button>
          </div>
      </div>
      <button class="accordion">BANNER</button>
          <div class="panel">
            <div class= "inside">
                <div class = " flex-container">
                  <p class = "text-primary text-label"> Upload Name:</p>
              
                  <input type='file' name='file' id = "fileupload"/>
                   <input class="form-control input-one" type = "text" id = "bannername" >
                </div> 
              </div>  
              <div class = "lower">
               <button type="button" class="btn panel-btn " onclick="upload_banner()">Submit</button>
              </div>
          </div>
        <button class="accordion bottom-accordion">TEACHER</button>
        <div class="panel">
          <div class = "inside">
            <div class = "lower">
              <div class = "flex-container">
                  <div> <p class = "text-primary text-label">First Name:</p></div>
                  <div><p class = "text-primary text-label">Middle Name:</p></div>
                  <div> <p class = "text-primary text-label">Last Name:</p></div>
                  <div> <p class = "text-primary text-label">Extra Name:</p></div> 
              </div>
              <div class = "flex-container">
                  <div>
                     <input class="form-control input-one" type = "text" id = "fname" >
                  </div>
                   <div>
                     <input class="form-control input-one" type = "text" id = "mname" >
                  </div>
                   <div>
                     <input class="form-control input-one" type = "text" id = "lname" >
                  </div>
                   <div>
                     <input class="form-control input-one" type = "text" id = "extname" >
                  </div>
              </div>
              <div class = "flex-container">
                   <div>
                      <div> <p class = "text-primary text-label">Birthday:</p></div>
                  </div>
                   <div>
                      <div> <p class = "text-primary text-label">Level:</p></div>
                  </div>
                  <div>
                  </div>
                  <div>
                  </div>
              </div>
              <div class = "flex-container">
                  <div>
                    <input type="date" id="bday" class="form-control input-one">
                  </div>
                  <div>
                     <select name="level1" class="form-control input-one" id="level" onchange="">
                        <option value =  "1">User</option>
                        <option value =  "2">Admin</option>
                      </select>
                  </div>
                  <div>
                  </div>
                  <div>
                  </div>
              </div>
               <div class= "div-label-block">
                  <div> <p class = "text-primary text-label">Address: </p></div>
               </div> 
               <div class= "div-label-block">
                   <input class="form-control input-one" type = "text" id = "address" >
               </div>
               <div class= "div-label-block">
                  <div>
                      <button type="button" class="btn btn-success " onclick="add_teacher()">Submit</button>  
                  </div>
               </div>
            </div>
          </div>
        </div>
  <!-- End Right Panel  --> 
  </div>
</div>
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
var syid = document.getElementById("syid").value;

window.onload = function() {
  sel_teacher();
  sel_section();
  sel_subject();
  sel_student();
  sel_for_adviser();  //new_queries php
  sel_sy();           //new_queries php
  sel_grade();  //new_queries php
};
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>