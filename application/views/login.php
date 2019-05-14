<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url().'/assets/images/icons/login.png';?>"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/vendor/bootstrap/css/bootstrap.min.css';?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/vendor/animate/animate.css';?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/vendor/css-hamburgers/hamburgers.min.css';?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/vendor/select2/select2.min.css';?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/css/util.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/css/main.css';?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url().'/assets/images/img-01.png';?>" alt="LogoGIN">
				</div>

				<form class="login100-form validate-form" action="act/cek-login.php" method="post">
					<span class="login100-form-title">
						User Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Username is required!">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required!">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Lupa
						</span>
						<a class="txt2" href="lupa-password.php">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="buat-akun.php">
							Buat akun baru
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?php echo base_url().'/assets/vendor/jquery/jquery-3.2.1.min.js';?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'/assets/vendor/bootstrap/js/popper.js';?>"></script>
	<script src="<?php echo base_url().'/assets/vendor/bootstrap/js/bootstrap.min.js';?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'/assets/vendor/select2/select2.min.js';?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'/assets/vendor/tilt/tilt.jquery.min.js';?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'/assets/js/main.js';?>"></script>

</body>
</html>