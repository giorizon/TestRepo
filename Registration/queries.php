 <?php
	include '../conn/connection.php';
	if(isset($_POST["gfname"])||isset($_POST["gmname"])){
		$fname = $_POST["gfname"];
		$mname = $_POST["gmname"];
		$lname = $_POST["glname"];
		$extname = $_POST["gextname"];
		$contact = $_POST["contact"];
		$relation = $_POST["relation"];
			
		$query = 'INSERT INTO `guardian`(`lname`, `mname`, `fname`, `extname`, `contactnumber`,`relation`)
		VALUES ("'.$lname.'", "'.$mname.'", "'.$fname.'", "'.$extname.'","'.$contact.'", "'.$relation.'")';
		if (mysqli_query($con, $query)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($con);
		}	
		mysqli_close($con);	
	}
	if(isset($_POST["searchG_id"])){
		$query = 'SELECT max(guardian_id) as id from guardian';
		$result = mysqli_query($con, $query);
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				echo $row["id"] ;
			}
		} else {
			echo "0 results";
		}
		mysqli_close($con);	
	}
	if(isset($_POST["lrn"])){
		$lrn = $_POST["lrn"];
		$fname = $_POST["fname"];
		$mname = $_POST["mname"];
		$lname = $_POST["lname"];
		$extname = $_POST["extname"];
		$bday = $_POST["bday"];
		$address = $_POST["address"];
		$sex = $_POST["sex"];
		$pppp = $_POST["pppp"];
		$guardian_id = $_POST["guardian_id"];
			
		$query = 'INSERT INTO `student`(`LRN`, `fname`, `mname`, `lname`, `extname`, `birthday`, `address`, `sex`, `pppp`, `guardian_id`) 
						VALUES ("'.$lrn.'", "'.$fname.'", "'.$mname.'", "'.$lname.'", "'.$extname.'","'.$bday.'", "'.$address.'", "'.$sex.'", "'.$pppp.'", "'.$guardian_id.'")';
		if (mysqli_query($con, $query)) {
		echo "Successfully added student";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($con);
		}	
		mysqli_close($con);	
	}
	if(isset($_POST["teacher"])){
		$fname = $_POST["fname"];
		$mname = $_POST["mname"];
		$lname = $_POST["lname"];
		$extname = $_POST["extname"];
		$bday = $_POST["bday"];
		$address = $_POST["address"];
		$level = $_POST["level"];	
		$arr = explode(' ',trim($fname));				
		$arr2 = explode(' ',trim($lname));	
		$full = $arr[0].".".$arr2[0];
		$pass = "ampayon1234";
		$status = "Active";
		$hash_pword = md5($pass);
		$query = 'INSERT INTO `teacher`(`fname`, `mname`, `lname`, `extname`, `bday`, `address`, `status`)
						VALUES ("'.$fname.'", "'.$mname.'", "'.$lname.'", "'.$extname.'","'.$bday.'", "'.$address.'", "'.$status.'")';
		if (mysqli_query($con, $query)) {
			$last_id = mysqli_insert_id($con);

			$query1 = 'INSERT INTO `account`( `teacher_id`, `username`, `password`, `level`) 
						VALUES ( ' . $last_id . ', "' . $full . '", "'. $hash_pword .'", "'. $level .'" )';
				if (mysqli_query($con, $query1)) {
					echo "Successfully added Teacher";
				}
				else{
					echo "Error: " . $query . "<br>" . mysqli_error($con);			
				}		
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($con);
		}	
		mysqli_close($con);	
	}
	if(isset($_POST["sel_teacher"])){
		
			
		$query = 'SELECT id, concat(lname, ", ", fname, " ", mname, " ", extname) as name FROM `teacher` where STATUS = "Active"';
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
	if(isset($_POST["section"])){
		$name = $_POST["name"];
		$teacher = $_POST["teacher_id"];
		$grade_level = $_POST["grade_level"];
		$session = $_POST["session"];
		$sy = $_POST["sy"];
		$query = 'INSERT INTO `section`(`name`, `grade_level`, `session`, `teacher_id`, `sy_id`)  
						VALUES ("'.$name.'", "'.$grade_level.'", "'.$session.'", "'.$teacher.'","'.$sy.'")';
		if (mysqli_query($con, $query)) {
		echo "Successfully added a Section";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($con);
		}	
		mysqli_close($con);	
	}
	if(isset($_POST["sel_section"])){
		
			
		$query = 'SELECT section_id as id, concat(grade_level, "-", name) as name FROM `section`where teacher_id = null and sy_id = 1';
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
	if(isset($_POST["subject"])){
		$name = $_POST["name"];
		$query = 'INSERT INTO `subject`(`name`)  
						VALUES ("'.$name.'")';
		if (mysqli_query($con, $query)) {
		echo "Successfully added a Subject";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($con);
		}	
		mysqli_close($con);	
	}
	if(isset($_POST["sel_subject"])){
		
			
		$query = 'SELECT subject_id as id, name FROM `subject`';
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
	if(isset($_POST["class"])){
		$teacher_id = $_POST["teacher_id"];
		$section_id = $_POST["section_id"];
		$subject_id = $_POST["subject_id"];
		$schedule = $_POST["schedule"];
		$query = 'INSERT INTO `class`(`teacher_id`, `section_id`, `subject_id`, `schedule`)
						VALUES ("'.$teacher_id.'", "'.$section_id.'", "'.$subject_id.'", "'.$schedule.'")';
		if (mysqli_query($con, $query)) {
		echo "Successfully added a Section";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($con);
		}	
		mysqli_close($con);	
	}
	if(isset($_POST["add_to_section"])){
		$section_id = $_POST["section_id"];
		
		$query = 'INSERT INTO `enrollment`(`student_id`, `section_id`)
						VALUES ((SELECT max(id) as id from student),"'.$section_id.'")';
		if (mysqli_query($con, $query)) {
		echo "Successfully added a Student";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($con);
		}	
		mysqli_close($con);	
	}
if(isset($_POST["sel_student"])){
		
		$query = 'SELECT student.id as id, concat(lname, ", ", fname, " ", LEFT(mname , 1), ".") as name FROM `student` left join enrollment on student.id = enrollment.student_id WHERE enrollment.student_id is null';
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
	
if(isset($_POST["add_enrollment"])){
		$student_id = $_POST["student_id"];
		$section_id = $_POST["section_id"];
		
		$query = 'INSERT INTO `enrollment`(`student_id`, `section_id`)
						VALUES ("'.$student_id.'","'.$section_id.'")';
		if (mysqli_query($con, $query)) {
		echo "Successfully added a Student to a Section";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($con);
		}	
		mysqli_close($con);	
}
if(isset($_POST["student_attendance"])){
		$sa = $_POST["student_attendance"];
		$query = 'SELECT id, concat(lname, ", ", fname, " ", LEFT(mname , 1), ".") as name from `student` left join enrollment on student.id = enrollment.student_id left join section on section.section_id = enrollment.section_id left join class on class.section_id = section.section_id where class.class_id = '.$sa.' ';
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
	if(isset($_POST["select_class"])){
		$teacher_id = $_POST["teacher3"];
		$section_id = $_POST["section3"];
		$subject_id = $_POST["subject3"];
		$query = "SELECT class_id as id FROM `class` WHERE section_id = $section_id and subject_id = $subject_id and teacher_id = $teacher_id";
		$result = mysqli_query($con, $query);

		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				echo $row["id"] ;
			}
		} else {
			echo "0 results";
		}

		mysqli_close($con);	
	}
if(isset($_POST["submit_attendance"])){
		$sec_id = $_POST["sec_id"];
		$sub_id = $_POST["sub_id"];
		$query = 'SELECT enrollment.enrollment_id as eid, student.id as sid from student left join enrollment on student.id = enrollment.student_id 
						left join section on section.section_id = enrollment.section_id left join class on section.section_id = class.section_id 
						left join subject on subject.subject_id = class.subject_id where class.section_id = "'.$sec_id.'" and class.subject_id = "'.$sub_id.'"';
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
if(isset($_POST["add_attendance"])){
		$id = $_POST["e_id"];
		$sub_id = $_POST["sub_id2"];
		$remark = $_POST["remark"];
		$attdate = $_POST["attdate"];
		//$new_date = date("d-m-y", strtotime($attdate));
		$query = 'INSERT INTO `attendance`(`enrollment_id`, `subject`, `att_date`, `present`) 
				VALUES ("'.$id.'", "'.$sub_id.'", "'.$attdate.'" , '.$remark.')';
		if (mysqli_query($con, $query)) {
				echo "Success";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($con);
		}	
		mysqli_close($con);	
}
if(isset($_POST["sel_subject_section"])){
		$sec_id =$_POST["sel_subject_section"];
		$query = 'SELECT subject.subject_id as id, subject.name as name from class left join section on section.section_id = class.section_id left join subject on subject.subject_id = class.subject_id where section.section_id = ' . $sec_id . ' ';
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
if(isset($_POST["student_sectiont"])){
		$stud =$_POST["student_sectiont"];
	//d 
		
		$query = 'SELECT student.id as id, concat(student.lname, ", ", student.fname, " ", LEFT(student.mname , 1), ".") as name
 from student left join enrollment on student.id = enrollment.student_id left join section on section.section_id = enrollment.section_id 
where section.section_id =' . $stud . '';
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
if(isset($_POST["student_att"])){
		$subj =$_POST["student_att"];
		$stud =$_POST["student_number"];
		$date =$_POST["date1"];
		$query = 'SELECT student.id as id, present 
		from student left join enrollment on student.id = enrollment.student_id 
		left join attendance on attendance.enrollment_id = enrollment.enrollment_id 
		left join subject on subject.subject_id = attendance.subject 
		where student.id = ' . $stud . ' and subject.subject_id = ' . $subj . ' and att_date = "'.$date.'" ';
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
if(isset($_POST["student_att2"])){
		$subj =$_POST["student_att2"];
		$stud =$_POST["student_number"];
		$date_from =$_POST["date_from"];
		$date_to =$_POST["date_to"];
		$query = 'SELECT student.id as id, sum(present) as present
		from student left join enrollment on student.id = enrollment.student_id 
		left join attendance on attendance.enrollment_id = enrollment.enrollment_id 
		left join subject on subject.subject_id = attendance.subject 
		where student.id = ' . $stud . ' and subject.subject_id = ' . $subj . ' and att_date between "' . $date_from . '" and "' . $date_to . '" ';
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
if(isset($_POST["student_att3"])){
		$subj =$_POST["student_att3"];
		$stud =$_POST["student_number"];
		$date_month =$_POST["date_month"];
		$query = 'SELECT student.id as id, sum(present) as present
		from student left join enrollment on student.id = enrollment.student_id 
		left join attendance on attendance.enrollment_id = enrollment.enrollment_id 
		left join subject on subject.subject_id = attendance.subject 
		where student.id = ' . $stud . ' and subject.subject_id = ' . $subj . ' and month(att_date) = ' . $date_month . ' ';
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
if(isset($_POST["change_pass"])){
		session_start();
		$pass = md5($_POST["change_pass"]);
		$id = $_SESSION["id"];	
		echo $id;
		$query = 'UPDATE `account` SET `password`= "'.$pass.'" WHERE `teacher_id`= '.$id.' ';
		if (mysqli_query($con, $query)) {
		echo "Successfully updated new password  " . $pass ." ";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($con);
		}	
		mysqli_close($con);	
}
if(isset($_POST["sel_sec_id"])){
		
		session_start();	
		$id = $_SESSION["id"];	
		$query = 'SELECT section_id as id FROM `section` WHERE teacher_id = '.$id.'';
		$result = mysqli_query($con, $query);

		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				echo $row["id"] ;
			}
		} else {
			echo "0 results";
		}

		mysqli_close($con);	
	}
if(isset($_POST["class_list"])){
	$id = $_POST["class_list"];	
	$sy = $_POST["sy"];			
	$query = 'SELECT id, concat(lname, ", ", fname, " ", LEFT(mname , 1), ".") as name, sex from `student` left join enrollment on student.id = enrollment.student_id left join section on section.section_id = enrollment.section_id where section.teacher_id=  '.$id.' and sy_id = '.$sy.' order by lname';
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



if(isset($_POST["sel_specific_section"])){
		$id =$_POST["sel_specific_section"];
		$query = 'SELECT distinct(class.section_id) as id, section.name as name FROM `class`
					left join teacher on class.teacher_id = teacher.id
    				left join section on section.section_id = class.section_id
					WHERE teacher.id = '.$id.'';
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
if(isset($_POST["sel_specific_subject"])){
		$id =$_POST["sel_specific_subject"];
		$query = 'SELECT class.subject_id as id, subject.name as name FROM `class` left join teacher on class.teacher_id = teacher.id left join subject on subject.subject_id = class.subject_id WHERE teacher.id = '.$id.'';
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
if(isset($_POST["display_info_id"])){
		$id = $_POST["display_info_id"];
		$query = 'SELECT student.id as sid, lrn, student.fname as sfname, student.lname as slname, student.mname as smname, student.extname as sextname, birthday, address, sex, pppp, guardian.fname as gfname, guardian.mname as gmname, guardian.lname as glname, guardian.extname as gextname, contactnumber, relation, section.section_id as secid FROM `student` left join guardian on student.guardian_id = guardian.guardian_id left join enrollment on enrollment.student_id = student.id left join section on section.section_id = enrollment.section_id WHERE student.id = '.$id.'';

		
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
/*
if(isset($_POST["testtest"])){
		$subj =$_POST["student_att"];
		$stud =$_POST["student_number"];
		$date =$_POST["date1"];
		$query = 'SELECT student.id as id, concat(student.lname, ", ", student.fname, " ", LEFT(student.mname , 1), ".") as name
 from student left join enrollment on student.id = enrollment.student_id left join section on section.section_id = enrollment.section_id  WHERE att_date >= '2014-02-17' AND att_date <= '2020-02-19' and  section.section_id =' . $stud . '';
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
 */
   ?>