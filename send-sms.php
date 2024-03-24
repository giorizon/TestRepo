<?php
//
//

if(isset($_POST["send_sms"])){
		echo "here";
		$sa = $_POST["send_sms"];
		$query = 'SELECT contactnumber as number, student.fname as name, student.sex from guardian left join student on student.guardian_id = guardian.guardian_id where student.id ='.$sa.'';
		$result = mysqli_query($con, $query);
		$ch = curl_init();

		$app_id = "L5RKhynoEjfebi9eLAcodgfKM5pRhdRa";
		$app_secret = "03e6b3e09f054d9459dd994ce78075b6ccd5188e6482de557b6795b188ccfaeb";
		$message = "Maayong adlaw, imong anak wala ni tunga sa klase";
		$address = "";
		$sex = "";
		$passphrase = "GGHLVZxid4";

		if (mysqli_num_rows($result) > 0) {
			$arr = array();
			while($row = mysqli_fetch_assoc($result)) {
				$arr[] = $row;

			}
			$address = $arr['number'];
			echo $arr['number'];
			echo json_encode($arr);
		} else {
			echo "0 results";
		}
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