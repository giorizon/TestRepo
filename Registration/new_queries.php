<?php	
	include '../conn/connection.php';
	if(isset($_POST["teacher_id"])){
		$tid = $_POST["teacher_id"];
		$teacher_sy = $_POST["teacher_sy"];
		$query = 'SELECT concat(fname," ",mname," ",lname) as fullname, concat(grade_level,"-",name) as sect, address, bday, sy from `teacher`
			left join `section` on section.teacher_id = teacher.id 
			left join `school_year` on section.sy_id = school_year.id where teacher.id = '. $tid .' and section.sy_id ='.$teacher_sy .'';
		$result = mysqli_query($con, $query);
		if (mysqli_num_rows($result) > 0) {
			$arr = array();
			while($row = mysqli_fetch_assoc($result)) {
				$arr[] = $row;
			}
			echo json_encode($arr);
		} else {
			echo "0 results";
		}

		mysqli_close($con);	
	}
	if(isset($_POST["schoolYear"])){

		$query = 'SELECT id, sy FROM `school_year`';
		$result = mysqli_query($con, $query);
		if (mysqli_num_rows($result) > 0) {
			$arr = array();
			while($row = mysqli_fetch_assoc($result)) {
				$arr[] = $row;
			}
			echo json_encode($arr);
		} else {
			echo "0 results";
		}

		mysqli_close($con);	
	}
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
	        $query = "insert into images(name) values('".$name."')";
	        mysqli_query($con,$query);
	     }

  		}
	}
	if(isset($_POST["sel_for_adviser"])){
		$syid = $_POST["syid"];
		$query = 'SELECT id, concat(lname, ", ", fname, " ", mname, " ", extname) as name FROM `teacher`
		where STATUS = "Active" and not EXISTS (select teacher_id from section where section.teacher_id = teacher.id and section.sy_id = '. $syid .')';
		$result = mysqli_query($con, $query);
		if (mysqli_num_rows($result) > 0) {
			$arr = array();
			while($row = mysqli_fetch_assoc($result)) {
				$arr[] = $row;
			}
			echo json_encode($arr);
		} else {
			echo "0 results";
		}

		mysqli_close($con);	
	}
	if(isset($_POST["sel_sy"])){
		$query = 'SELECT id, sy FROM `school_year`';
		$result = mysqli_query($con, $query);
		if (mysqli_num_rows($result) > 0) {
			$arr = array();
			while($row = mysqli_fetch_assoc($result)) {
				$arr[] = $row;
			}
			echo json_encode($arr);
		} else {
			echo "0 results";
		}

		mysqli_close($con);	
	}
	if(isset($_POST["sel_sec_grade"])){
		$id = $_POST["sel_sec_grade"];
		$query = 'SELECT `section_id`, concat(grade.grade,"-",`name`) as name FROM `section` left join grade on section.grade_id = grade.id WHERE grade.id ='. $id .'';
		$result = mysqli_query($con, $query);
		if (mysqli_num_rows($result) > 0) {
			$arr = array();
			while($row = mysqli_fetch_assoc($result)) {
				$arr[] = $row;
			}
			echo json_encode($arr);
		} else {
			echo "0 results";
		}

		mysqli_close($con);	
	}
	if(isset($_POST["sel_grade"])){
		$query = 'SELECT `id`, `grade` FROM `grade` ';
		$result = mysqli_query($con, $query);
		if (mysqli_num_rows($result) > 0) {
			$arr = array();
			while($row = mysqli_fetch_assoc($result)) {
				$arr[] = $row;
			}
			echo json_encode($arr);
		} else {
			echo "0 results";
		}

		mysqli_close($con);	
	}
	if(isset($_POST["bannertid"])){
		$tid = $_POST["bannertid"];
		$name = $_POST["bannername"];
		$filename = $_POST["filename"];
		
		$target_dir = "banner/";
		$target_file = $target_dir . basename($filename);

		//$target_file = $target_dir . basename($_FILES["file"]["name"]);
		echo $target_file;
		  // Select file type  INSERT INTO `banner`( `name`, `image`, `account_id`) VALUES ()
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		  // Valid file extensions
		  $extensions_arr = array("jpg","jpeg","png","gif");

		  // Check extension   
		  if( in_array($imageFileType,$extensions_arr) ){
		     // Upload file
		     if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$filename)){
		        // Insert record
		  $query = "INSERT INTO banner( name, image, account_id) VALUES ('".$bannername."','".$filename."','".$tid."')";
		        if (mysqli_query($con, $query)) {
				echo "Successfully added the Banner";
				} else {
					echo "Error: " . $query . "<br>" . mysqli_error($con);
				}	
				mysqli_close($con);	
		     }

		  }
		 
	}
?>