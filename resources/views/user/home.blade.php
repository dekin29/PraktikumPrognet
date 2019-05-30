@section('title', 'Home')
@extends('layouts.userLayout')
@section('add_css')
@stop
@section('content')
<div class="site__body">
	<!-- page -->
	<div class="page">
		<!-- page__body -->
		<div class="page__body">
			<!-- block-slider -->
			<div class="block block-slider block-slider--featured">
				<div class="container">
					<div class="slider slider--with-dots">
						<div class="owl-carousel">
							<a>
								<picture>
									<source media="(min-width: 768px)" srcset="{{asset('user/images/slides/slide1.jpg')}}, {{asset('user/images/slides/slide1@2x.jpg')}} 2x"><source media="(max-width: 767px)" srcset="{{asset('user/images/slides/slide1-portrait.jpg')}}, {{asset('user/images/slides/slide1-portrait@2x.jpg')}} 2x"><img src="{{asset('user/images/slides/slide1.jpg')}}" alt="">
								</picture>
							</a>
							<a href="/shop_list">
								<picture>
									<source media="(min-width: 768px)" srcset="{{asset('user/images/slides/slide2.jpg')}}, {{asset('user/images/slides/slide2@2x.jpg')}} 2x"><source media="(max-width: 767px)" srcset="{{asset('user/images/slides/slide2-portrait.jpg')}}, {{asset('user/images/slides/slide2-portrait@2x.jpg')}} 2x"><img src="{{asset('user/images/slides/slide2.jpg')}}" alt="">
								</picture>
							</a>
							<a href="/shop">
								<picture>
									<source media="(min-width: 768px)" srcset="{{asset('user/images/slides/slide3.jpg')}}, {{asset('user/images/slides/slide3@2x.jpg')}} 2x"><source media="(max-width: 767px)" srcset="{{asset('user/images/slides/slide3-portrait.jpg')}}, {{asset('user/images/slides/slide3-portrait@2x')}}.jpg 2x"><img src="{{asset('user/images/slides/slide3.jpg')}}" alt="">
								</picture>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- block-slider / end -->
			<!-- block-products-carousel -->
			<div class="block block-products-carousel">
				<div class="container">
					<div class="block__title">
						<h2 class="decor-header decor-header--align--center">Featured Products</h2>
					</div>
					<div class="block-products-carousel__slider slider slider--with-arrows">
						<div class="owl-carousel">
							<div class="product-card product-card--layout--grid">
								<div class="product-card__badges-list">
									<div class="product-card__badge product-card__badge--style--sale">Sale</div>
								</div>
								<div class="product-card__actions">
									<div class="product-card__actions-list">
										<button class="btn btn-light btn-svg-icon btn-sm" type="button">
											<svg width="16px" height="16px"><use xlink:href="images/sprite.svg#quickview-16"></use></svg>
										</button> 
										<button class="btn btn-light btn-svg-icon btn-sm" type="button">
											<svg width="16px" height="16px"><use xlink:href="images/sprite.svg#wishlist-16"></use></svg>
										</button> 
										<button class="btn btn-light btn-svg-icon btn-sm" type="button">
											<svg width="16px" height="16px"><use xlink:href="images/sprite.svg#compare-16"></use></svg>
										</button>
									</div>
								</div>
								<div class="product-card__image">
									<a href="product.html">
										<img srcset="images/products/product1-1.jpg, images/products/product1-1@2x.jpg 2x" src="images/products/product1-1.jpg" alt="">
									</a>
								</div>
								<div class="product-card__info">
									<div class="product-card__category">
										<a href="#">Chandeliers</a>
									</div>
									<div class="product-card__name">
										<a href="product.html">Aluminum Chandelier</a>
									</div>
									<div class="product-card__rating">
										<div class="product-card__rating-title">Reviews (15)</div>
										<div class="product-card__rating-stars">
											<div class="rating">
												<div class="rating__body">
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="far fa-star"></i>
													<i class="far fa-star"></i>
												</div>
											</div>
										</div>
									</div>
									<div class="product-card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dictum libero eget metus suscipit placerat. Duis consequat tellus laoreet tellus pharetra, eu tempor mi ornare. Nulla at nibh urna. Morbi vulputate enim id sapien.</div>
									<div class="product-card__prices-list">
										<div class="product-card__price">$249.00</div>
									</div>
									<div class="product-card__buttons">
										<div class="product-card__buttons-list">
											<button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> 
											<button class="btn btn-light btn-svg-icon product-card__wishlist" type="button">
												<svg width="16px" height="16px"><use xlink:href="images/sprite.svg#wishlist-16"></use></svg>
											</button> 
											<button class="btn btn-light btn-svg-icon product-card__compare" type="button">
												<svg width="16px" height="16px"><use xlink:href="images/sprite.svg#compare-16"></use></svg>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- block-products-carousel / end -->
		</div>
		<!-- page__body / end -->
	</div>
	<!-- page / end -->
</div>
@stop
@section('add_js')
@stop