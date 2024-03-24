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
  <link href="css/navi4.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/new-age.min.css" rel="stylesheet">
  <link href="css/mycss-new-report.css" rel="stylesheet">
 <link href="css/css-profile4.css" rel="stylesheet">

  <!-----Custome JAVASCRIPT ----->
  
  <script src="js/function-profile7.js"></script>
	<script src="js/jquery.js"></script>
</head>

<body id="page-top ">
   <input type="text" name="" id = "syid" hidden value="<?php echo $_SESSION['syid']; ?>">
   <input type="text" name="" id = "tlevel" hidden value="<?php echo $_SESSION['level']; ?>">
  <input type="text" id = "tid" name="value" hidden value="<?php echo $_SESSION['id']; ?>">
  <!-- Navigation -->
    <?php
  
         include 'new-navigation.php'; 

        //  $sql = "select image from images where tid='".$_SESSION['id']."' ";
         if($result = mysqli_query($con,"select image from images where tid='".$_SESSION['id']."' ")){
           $row = mysqli_fetch_array($result);
           if( mysqli_num_rows($result)>0){
               $image = $row['image'];
                $image_src = "upload/".$image;      
            }else{
                $image_src = "img/prof.jpg";
            } 
             
          }
          else{
            echo "<script>Alert('mysqli_qury result error')</script>";
            //  $image_src = "img/prof.jpg";
          }
            
  ?>
  <header class="">
    
  </header>
  <div class = "profile-container">

   <!-- Start left Panel  --> 

   <div class ="sub-container left-panel">
    <div class = "teacher_img"> 
     <img src = "<?php echo $image_src;  ?>" />
    
   </div>
    <span>
      <button href="" class="btn-home"   data-toggle="modal" data-target="#ppModal">Change Profile Picture</button>
    </span> 
    <span>
      <button href="" class="btn-home"   data-toggle="modal" data-target="#myModal">CHANGE PASSWORD</button>
    </span> 
  
    <span>
     <button href="" class="btn-home"  data-toggle="modal" data-target="#myModal3" onclick="">Message to Class</button>      
    </span>
    <span>
     <button href="" class="btn-home"  data-toggle="modal" data-target="#myModal4" onclick="">Change School Year</button>      
    </span>
    <span>
     <button id ="adminpage" class="btn-home"  data-toggle="" data-target="" onclick="admin_page()">ADMINISTRATION PAGE</button>      
    </span>
    <div>

        <img src = "img/school-logo.png" />
    </div>
    </div>
     <!-- End left Panel  -->

 <!-- Start Right Panel  --> 
  
    <div onload="generate_profile()" class ="sub-container right-panel">

  <!-- Start TEACHER PROFILE  ----------->
      <h1>Teacher Profile</h1>
      <hr>
      <div class = "half">
        <div>
          <span>Name:</span><span id = "fullname" class = "span_output"></span>
        </div>
        <div>
          <span>Section:</span><span id = "section" class = "span_output"></span>
        </div>
        <div>
          <span>School Year:</span><span id = "sy" class = "span_output"></span>
        </div>
       
      </div>
      <div class = "half">
        <div>
          <span>Birthday:</span><span id = "birthday" class = "span_output"></span>
        </div>
        <div>
          <span>Address:</span><span id = "address" class = "span_output"></span>
        </div>
      </div>
        <!-- END of TEACHER PROFILE div  ----------------->
         

        <!-- Start CLASS LIST div------------------->
        <div onload = "" class ="classlist">
          <h2>Class List</h2>
           <table id = "mytable" class = "table-class table-hover">
              <thead id = "mytablehead">
                  <th class = "col1"> # </th >
                  <th> Name </th>
                  <th class = "col1"> Sex</th>
                </thead>
            </table>
        </div>
        <!-- END CLASS LIST div------------------->
    </div>


   
  <!-- End Right Panel  --> 
  </div>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal-head">
    CHANGE PASSWORD
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
       <div style =" width: 100%;">
            <p>Enter New password:</p>
           <input class="form-control input-one" type = "password" id = "new_password">
       </div>
       <div style =" width: 100%;">
             <p>Confirm New password:</p>
           <input class="form-control input-one" type = "password" id = "new_password2">
        </div>
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-success" onclick="password_change()">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- End of modal -->

  <!-- Modal New Message-->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal-head">
           <p>Message Message</p>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body relative_display">
          <div class = "relative_display" style =" width: 100%;">
              <div class = "">
               Message Type
              </div>
              <div class = ""> 
                <select id = "msgType" class="form-control msgType" id="level" onchange="">
                  <option value =  "Announcement">Announcement</option>
                  <option value =  "Module Distribution">Module Distribution</option>
                </select>
              </div>
          </div>
          <div class = "relative_display" style =" width: 100%;">
              <hr>
              <div>
               Enter Message:
              </div>
              <div>
                <textarea  id="newMessage" rows="4" cols="40"></textarea>
              </div>
               
          </div>
        </div>
        <div class="modal-footer">
           
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- End of modal -->
 
 <!-- Modal CHANGE SCHOOL YEAR --------------->
  <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal-head">
           <p>Change School Year</p>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body relative_display">
          <div class = "relative_display" style =" width: 100%;">
              <div class = ""> 
                <select id = "sy_option" class="form-control" onchange=""></select>
                 
              </div>
          </div>
       
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" onclick="set_sy()">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- End of modal -->
  <!-- Modal -->
  <div class="modal fade" id="ppModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal-head">
               CHANGE PROFILE
          <button type="button" class="close btn-close-white" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
       
          <form method="post" action="" enctype='multipart/form-data'>
            <input type='file' name='file' class="inputfile" />
        </div>
        <div class="modal-footer">
            <input type='submit' class="btn btn-primary" value='Upload Photo' name='but_upload'>
          </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- End of modal -->
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
<?php 
  if(isset($_POST['but_upload'])){
   
    $name = $_FILES['file']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Valid file extensions
     $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
      if( in_array($imageFileType,$extensions_arr) ){
       // Upload file
       if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
          // Insert record
          $delete_sql = "delete from images WHERE tid='".$_SESSION['id']."'";
          mysqli_query($con, $delete_sql);
          
          $query = "insert into images(tid, image) values('".$_SESSION['id']."','".$name."')";
          mysqli_query($con,$query);
          echo "<meta http-equiv='refresh' content='0'>";
       }
      }
  }
 ?>
<script>
window.onload = function() {
 var tid = document.getElementById("tid").value;
 var syid = document.getElementById("syid").value;
 var tlevel = document.getElementById("tlevel").value;
 search_teacher(tid, syid);
 class_list_profile(tid, syid, tlevel);
 schoolYear();
};

function admin_page(){
  window.location.href = "admin_page.php";
}
</script>