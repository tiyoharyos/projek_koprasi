<?php include_once('../../config/function.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/css/util.css">
	<link rel="stylesheet" type="text/css" href="style/css/main.css">
	<link rel="shortcut icon" href="https://cdn.discordapp.com/attachments/1086877082870616145/1113408262004551730/favicon.png" type="image/x-icon">
	<!--===============================================================================================-->
	<style>
		.body {
			background-color: #F06292;
		}
	</style>
</head>

<body>
	<?php
	if (isset($_GET["error"])) {
		$error = $_GET["error"];
		if ($error == 1)
			showError("Id Akun dan password tidak sesuai");
		else if ($error == 2)
			showError("Error Database. Silahkan Hubungi Administrator");
		else if ($error == 3)
			showError("Koneksi ke Database gagal.Autentikasi Gagal");
		else
			showError("Unknown Error");
	}
	?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="backendlogin.php" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Login
					</span>
					<div class="wrap-input100 validate-input" data-validate="Insert Your Username">
						<input class="input100" type="text" name="username" id="email">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="your_pass" id="your_pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<div class="container-login100-form-btn">
						<input type="submit" name="signin" id="signin" class="login100-form-btn" value="Log in" />
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="style/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="style/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="style/vendor/bootstrap/js/popper.js"></script>
	<script src="style/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="style/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="style/vendor/daterangepicker/moment.min.js"></script>
	<script src="style/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="style/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="style/js/main.js"></script>

</body>

</html>