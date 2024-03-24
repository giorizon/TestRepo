
<?php

include 'conn/connection.php';

if(isset($_POST["class_list"])){
	$id = $_POST["class_list"];		
	$query = 'SELECT id, concat(lname, ", ", fname, " ", LEFT(mname , 1), ".") as name, sex from `student` left join enrollment on student.id = enrollment.student_id left join section on section.section_id = enrollment.section_id where section.teacher_id=  '.$id.' order by lname';
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
?>
