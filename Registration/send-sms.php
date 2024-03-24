<?php
//
//
include '../conn/connection.php';
if(isset($_POST["send_sms"])){
		$sa = $_POST["send_sms"];
		$subject = $_POST["subject"];


		$app_id = "L5RKhynoEjfebi9eLAcodgfKM5pRhdRa";
		$app_secret = "03e6b3e09f054d9459dd994ce78075b6ccd5188e6482de557b6795b188ccfaeb";
		$address = "";
		$name = "";
		$sub = "";
		$sex = "";
		$passphrase = "GGHLVZxid4";
		$ch = curl_init();
// finding the number of the student's guardian		
		$query = 'SELECT contactnumber as number, student.fname as name, student.sex from guardian left join student on student.guardian_id = guardian.guardian_id where student.id ='.$sa.'';
		$result = mysqli_query($con, $query);
			
		if (mysqli_num_rows($result) > 0) {
			$arr = array();
			while($row = mysqli_fetch_assoc($result)) {
				$address = $row['number'];
				$name = $row['name'];
				$arr[] = $row;

			}

			echo json_encode($arr); 	
		} else {
			echo "0 results from guardian";
		}
// the subject	
		echo $subject;
		$q2 = 'SELECT name as sub from subject where subject_id ='.$subject.'';
		$result = mysqli_query($con, $q2);
		
		if (mysqli_num_rows($result) > 0) {
			$arr2 = array();
			while($row2 = mysqli_fetch_assoc($result)) {
				$sub = $row2['sub'];
				$arr2[] = $row2;
			}

			echo json_encode($arr2); 	
		} else {
			echo "0 results from subject";
		}
		$message = " Good Day! ABSENT si "  . $name . " sa " . $sub. ". " . date('F j, Y'). " ";
		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		include 'curl/curl.h';
		//echo "hello";


		curl_setopt($ch, CURLOPT_URL,"https://devapi.globelabs.com.ph/smsmessaging/v1/outbound/5709/requests");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,
		            "message=".$message."&address=".$address."&passphrase=".$passphrase."&app_id=".$app_id."&app_secret=".$app_secret."");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);

		curl_close ($ch);


		mysqli_close($con);

}


// Further processing ...
//if ($server_output == "OK") { ... } else { ... } 
?>