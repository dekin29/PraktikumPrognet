<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- Mirrored from spruko.com/demo/adon/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Jan 2019 08:59:19 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Fully Responsive Bootstrap 4 Admin Dashboard Template">
	<meta name="author" content="Creative Tim">

	<!-- Title -->
	<title>Login Admin</title>

	<!-- Favicon -->
	<link href="{{asset("assets/img/brand/favicon.png")}}" rel="icon" type="image/png">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

	<!-- Icons -->
	<link href="{{URL::asset("assets/css/icons.css")}}" rel="stylesheet">

	<!--Bootstrap.min css-->
	<link rel="stylesheet" href="{{URL::asset("assets/plugins/bootstrap/css/bootstrap.min.css")}}">

	<!-- Adon CSS -->
	<link href="{{URL::asset("assets/css/dashboard.css")}}" rel="stylesheet" type="text/css">

	<!-- Single-page CSS -->
	<link href="{{URL::asset("assets/plugins/single-page/css/main.css")}}" rel="stylesheet" type="text/css">

</head>

<body class="bg-gradient-primary">
	<div class="limiter">
		<div class="container-login100">
				
			<div class="wrap-login100 p-5">
				<form class="login100-form validate-form" method="POST" action="{{ route('admin.login.submit') }}">
					@csrf
					{{-- <div class="logo-img text-center pb-3">
						<img src="{{asset('assets/img/brand/logo-dark1.png')}}" alt="logo-img">
					</div> --}}
					<span class="login100-form-title">
						Admin Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-user-alt" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn btn-primary" style="color: white;">Login</button>
					</div>

					

					<div class="text-center pt-2">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="forgot.html">
							Username / Password?
						</a>
					</div>

					<div class="text-center pt-1">
						<a class="txt2" href="register.html">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Adon Scripts -->
	<!-- Core -->
	<script src="assets/plugins/jquery/dist/jquery.min.js"></script>
	<script src="assets/js/popper.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>

<!-- Mirrored from spruko.com/demo/adon/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Jan 2019 08:59:19 GMT -->
</html>