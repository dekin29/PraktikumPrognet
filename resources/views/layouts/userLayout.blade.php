<!DOCTYPE html><html lang="en" dir="ltr">
<head>
	<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Filosofi</title>
	<link rel="icon" type="image/png" href="{{asset('user/images/favicon.png')}}">

	<!-- fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i">

	<!-- css -->
	<link rel="stylesheet" href="{{asset('user/vendor/bootstrap-4.3.1/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/vendor/owl-carousel-2.3.4/assets/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/css/style.css')}}">
	@yield('add_css')
    @show

	<!-- js -->
	<script src="{{asset('user/vendor/jquery-3.3.1/jquery.min.js')}}"></script>
	<script src="{{asset('user/js/main.js')}}"></script>
	<script src="{{asset('user/vendor/owl-carousel-2.3.4/owl.carousel.min.js')}}"></script>
	<script src="{{asset('user/vendor/nouislider-13.1.4/nouislider.min.js')}}"></script>
	<script src="{{asset('user/vendor/svg4everybody-2.1.9/svg4everybody.min.js')}}"></script>
	<script>svg4everybody();</script>
	
	<!-- fontawesome -->
	<link rel="stylesheet" href="{{asset('user/vendor/fontawesome-5.8.1/css/all.min.css')}}">
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-5"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'UA-97489509-5');
	</script>
</head>
<body>
	<div class="site">
		<div class="site__container">
			<!-- site__header -->
			@include('layouts.userHeader')
			<!-- site__header / end -->
			<!-- site__body -->
			@yield('content')
    		@show
			<!-- site__body / end -->
			<!-- site__footer -->
			<footer class="site__footer">
				<div class="footer">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="footer__widgets">
									<div class="row justify-content-between">
										<div class="col-12 col-lg-4 col-sm-6 footer__aboutus">
											<div class="footer-aboutus">
												<div class="footer-aboutus__title">
													<h4 class="footer-aboutus__header decor-header">About Us</h4>
												</div>
												<div class="footer-aboutus__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in feugiat lorem. Pellentque ac placerat tellus. Ut a lectus magna. Mauris sed coqut odio.</div>
												<ul class="footer-aboutus__contacts">
													<li class="footer-aboutus__contacts-item">
														<a href="#">715 Park Ave, NY 10021 USA</a>
													</li>
													<li class="footer-aboutus__contacts-item">
														<a href="#">meblya@example.com</a>
													</li>
													<li class="footer-aboutus__contacts-item">
														<a href="#">+1 754 000-00-00</a>
													</li>
												</ul>
											</div>
										</div>
										<div class="col-12 col-lg-2 col-sm-6 col-md-3">
											<div class="footer-links" data-collapse data-collapse-opened-class="footer-links--opened" data-collapse-item>
												<div class="footer-links__title">
													<h4 class="footer-links__header" data-collapse-trigger>Information 
														<svg class="footer-links__header-arrow" width="9px" height="6px">
															<use xlink:href="images/sprite.svg#arrow-down-9x6"></use>
														</svg>
													</h4>
												</div>
												<div class="footer-links__content" data-collapse-content>
													<ul class="footer-links__list">
														<li class="footer-links__item">
															<a href="#" class="footer-links__link">About Us</a>
														</li>
														<li class="footer-links__item">
															<a href="#" class="footer-links__link">Delivery Information</a>
														</li>
														<li class="footer-links__item">
															<a href="#" class="footer-links__link">Privacy Policy</a>
														</li>
														<li class="footer-links__item">
															<a href="#" class="footer-links__link">Brands</a>
														</li>
														<li class="footer-links__item">
															<a href="#" class="footer-links__link">Contact Us</a>
														</li>
														<li class="footer-links__item">
															<a href="#" class="footer-links__link">Returns</a>
														</li>
														<li class="footer-links__item">
															<a href="#" class="footer-links__link">Site Map</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="col-12 col-lg-2 col-sm-6 col-md-3">
											<div class="footer-links" data-collapse data-collapse-opened-class="footer-links--opened" data-collapse-item>
												<div class="footer-links__title">
													<h4 class="footer-links__header" data-collapse-trigger>My Account 
														<svg class="footer-links__header-arrow" width="9px" height="6px">
															<use xlink:href="images/sprite.svg#arrow-down-9x6"></use>
														</svg>
													</h4>
												</div>
												<div class="footer-links__content" data-collapse-content>
													<ul class="footer-links__list">
														<li class="footer-links__item"><a href="#" class="footer-links__link">My Account</a></li>
														<li class="footer-links__item"><a href="#" class="footer-links__link">Order History</a></li>
														<li class="footer-links__item"><a href="#" class="footer-links__link">Wish List</a></li>
														<li class="footer-links__item"><a href="#" class="footer-links__link">Newsletter</a></li>
														<li class="footer-links__item"><a href="#" class="footer-links__link">Specials</a></li>
														<li class="footer-links__item"><a href="#" class="footer-links__link">Gift Certificates</a></li>
														<li class="footer-links__item"><a href="#" class="footer-links__link">Affiliate</a></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="col-12 col-lg-4 footer__followus">
											<div class="footer-followus">
												<div class="footer-followus__title">
													<h4 class="footer-followus__header">Follow Us</h4>
												</div>
												<div class="footer-followus__text">Praesent pellentesque volutpat ex, vitae auctor lorem pulvinar mollis felis at lacinia.</div>
												<form class="footer-followus__subscribe-form">
													<input type="email" class="form-control form-control--footer" placeholder="Email address"> 
													<button type="submit" class="btn btn-primary">Subscribe</button>
												</form>
												<ul class="footer-followus__social-links">
													<li class="footer-followus__social-link"><a href="https://themeforest.net/user/kos9/portfolio" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
													<li class="footer-followus__social-link"><a href="https://themeforest.net/user/kos9/portfolio" target="_blank"><i class="fab fa-twitter"></i></a></li>
													<li class="footer-followus__social-link"><a href="https://themeforest.net/user/kos9/portfolio" target="_blank"><i class="fab fa-youtube"></i></a></li>
													<li class="footer-followus__social-link"><a href="https://themeforest.net/user/kos9/portfolio" target="_blank"><i class="fab fa-instagram"></i></a></li>
													<li class="footer-followus__social-link"><a href="https://themeforest.net/user/kos9/portfolio" target="_blank"><i class="fas fa-rss"></i></a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row justify-content-between">
							<div class="col-12 col-sm-auto">
								<div class="copyright">
									<a href="#">Meblya</a> by 
									<a href="#">Kos</a>
								</div>
							</div>
							<div class="footer__payments col-auto">
								<img srcset="images/payments.png, images/payments@2x.png 2x" src="images/payments.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- site__footer / end -->
		</div>
	</div><!-- site / end -->
	@yield('add_js')
    @show
</body>

</html>