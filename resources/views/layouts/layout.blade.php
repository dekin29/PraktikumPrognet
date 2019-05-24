<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- Mirrored from spruko.com/demo/adon/dashboard-Entertainment.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Jan 2019 08:57:53 GMT -->
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Fully Responsive Bootstrap 4 Admin Dashboard Template" name="description">
	<meta content="Spruko" name="author">

	<!-- Title -->
	<title>@yield('title')</title>

	<!-- Favicon -->
	<link href="{{asset('assets/img/brand/favicon.png')}}" rel="icon" type="image/png">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

	<!-- Icons -->
	<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">

	<!--Bootstrap.min css-->
	<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">

	<!-- Dashboard CSS -->
	<link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" type="text/css">

	<!-- Tabs CSS -->
	<link href="{{asset('assets/plugins/tabs/style.css')}}" rel="stylesheet" type="text/css">

	<!-- Custom scroll bar css-->
	<link href="{{asset('assets/plugins/customscroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

	<!-- Sidemenu Css -->
	<link href="{{asset('assets/plugins/toggle-sidebar/css/sidemenu.css')}}" rel="stylesheet">

	@yield('add_css')
    @show 

</head>
<body class="app sidebar-mini rtl" >
	<div id="global-loader" ></div>
	<div class="page">
		<div class="page-main">
			<!-- Sidebar menu-->
			@include('layouts.sidebar')
			<!-- Sidebar menu-->

			<!-- app-content-->
			<div class="app-content ">
				<div class="side-app">
					<div class="main-content">
						<div class="p-2 d-block d-sm-none navbar-sm-search">
							<!-- Form -->
							<form class="navbar-search navbar-search-dark form-inline ml-lg-auto">
								<div class="form-group mb-0">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-search"></i></span>
										</div><input class="form-control" placeholder="Search" type="text">
									</div>
								</div>
							</form>
						</div>
						<!-- Top navbar -->
						@include('layouts.navbar')
						<!-- Top navbar-->

						<!-- Page content -->
						<div class="container-fluid pt-8">
							<div class="page-header mt-0  p-3">
								<h3 class="mb-sm-0">@yield('title')</h3>
								{{-- <ol class="breadcrumb mb-0">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-home"></i></a></li>
									<li class="breadcrumb-item active" aria-current="page">Entertainment Dashboard</li>
								</ol> --}}
							</div>

							@yield('content')
      						@show

							<!-- Footer -->
							<footer class="footer">
								<div class="row align-items-center justify-content-xl-between">
									<div class="col-xl-6">
										<div class="copyright text-center text-xl-left text-muted">
											<p class="text-sm font-weight-500">Copyright 2019 © All Rights Reserved.</p>
										</div>
									</div>
									<div class="col-xl-6">
										<p class="float-right text-sm font-weight-500">Designed &amp; Passion With: <a href="http://instagram.com/indrayanakadek">Instagram</a></p>
									</div>
								</div>
							</footer>
							<!-- Footer -->
						</div>
					</div>
				</div>
			</div>
			<!-- app-content-->
		</div>
	</div>
	<!-- Back to top -->
	<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

	<!-- Adon Scripts -->

	<!-- Core -->
	<script src="{{asset('assets/plugins/jquery/dist/jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/popper.js')}}"></script>
	<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/plugins/chart-circle/circle-progress.min.js')}}"></script>

	<!-- Optional JS -->
	<script src="{{asset('assets/plugins/chart.js/dist/Chart.min.js')}}"></script>
	<script src="{{asset('assets/plugins/chart.js/dist/Chart.extension.js')}}"></script>

	<!-- Fullside-menu Js-->
	<script src="{{asset('assets/plugins/toggle-sidebar/js/sidemenu.js')}}"></script>

	<!-- Custom scroll bar Js-->
	<script src="{{asset('assets/plugins/customscroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>

	<!-- peitychart -->
	<script src="{{asset('assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
	<script src="{{asset('assets/plugins/peitychart/peitychart.init.js')}}"></script>

	<!-- Adon JS -->
	<script src="{{asset('assets/js/custom.js')}}"></script>
	<script src="{{asset('assets/js/dashboard-entertainment.js')}}"></script>
	@yield('add_js')
    @show
</body>

<!-- Mirrored from spruko.com/demo/adon/dashboard-Entertainment.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Jan 2019 08:57:54 GMT -->
</html>