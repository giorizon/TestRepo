<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--============================================login_===================================================-->
<?php include 'query.php';?>
<script src="login-v2.js"></script>
<style>
	.header-title{
		position: relative;
		top: 35px;
		background-color: #d2691e;
		text-align:center;
		height: 110px;
		border-bottom: 5px solid white;
		border-top: 5px solid white;
	}
	.header-title > h1{
		font-family: Arial;
		text-shadow: 5px 5px 5px #000000;
		color:#9dc5c3;
		font-weight: bold;
		font-size: 60px;
		 display: inline;
		 position: relative;
		 top:17px;
	}
	.header-title > img{
		width: 80px;
		 display: inline;
		-webkit-filter: drop-shadow(5px 5px 5px #222);
		 filter: drop-shadow(5px 5px 5px #222);
	}
	body{
		background-image: url('images/front.jpg');
		background-repeat: no-repeat;
	  	background-size: 100%;

	}
	.opacity-bg{
		background: rgba(0, 0, 0, 0.4); 
	}
	.reduce-padding{
		padding: 0px;
	}
</style>
</head>
<body>
	<input type="text" name="" hidden value="<?php echo $_SESSION['syid']; ?>">
	<div class="limiter opacity-bg">
		<div class = "header-title">
			<img src = "images/deped-logo.png"/>
			<h1>AMPAYON NATIONAL HIGH SCHOOL</h1>
			<img src = "images/school-logo.png"/>
		</div>
		<div class="container-login100 reduce-padding opacity-bg">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form" id = "loginfrm" name = "loginfrm" method = "post">
					<span class="login100-form-title p-b-33">
						Account Login
					</span>

					<div class="wrap-input100" >
						<input class="input100" type="text" name="" id = "username" placeholder="Username">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 " data-validate="Password is required">
						<input class="input100" type="password" name="pass" id = "password" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn" onclick="login()">
							Sign in
						</button>
						
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2 hov1">
							Username / Password?
						</a>
					</div>

					<div class="text-center">
						
					</div>
				</form>
			</div>
		</div>
	</div>
	

	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================
-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>