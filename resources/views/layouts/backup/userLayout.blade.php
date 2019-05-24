<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Philosophy</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('user/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/vendor.css')}}">
	<link rel="stylesheet" href="{{asset('user/css/main.css')}}">
	<link rel="stylesheet" href="{{asset('user/css/font-awesome/css/font-awesome.css')}}">
	
	@yield('add_css')
    @show 

    <!-- script
    ================================================== -->
    <script src="{{asset('user/js/modernizr.js')}}"></script>
    <script src="{{asset('user/js/pace.min.js')}}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">


</head>
<body id="top">

	@include('layouts.userHeader')

	@yield('content')
    @show

	<!-- s-footer
	================================================== -->
	<footer class="s-footer">
		<div class="s-footer__bottom">
			<div class="row">
				<div class="col-full">
					<div class="s-footer__copyright">
						<span>© Copyright Praktikum Prognet 2019</span> 
						<span>Site Design by <a href="https://instagram.com/indrayanakadek">Dekin</a></span>
					</div>
					<div class="go-top">
						<a class="smoothscroll" title="Back to Top" href="#top"></a>
					</div>
				</div>
			</div>
		</div> <!-- end s-footer__bottom -->
	</footer> <!-- end s-footer -->

	<!-- preloader
	================================================== -->
	<div id="preloader">
		<div id="loader">
			<div class="line-scale">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
	</div>

	<!-- Java Script
	================================================== -->
	<script src="{{asset('user/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('user/js/plugins.js')}}"></script>
	<script src="{{asset('user/js/main.js')}}"></script>
	@yield('add_js')
    @show
</body>

<!-- Mirrored from spruko.com/demo/adon/dashboard-Entertainment.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Jan 2019 08:57:54 GMT -->
</html>