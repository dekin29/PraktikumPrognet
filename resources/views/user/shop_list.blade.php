@section('title', 'Home')
@extends('layouts.userLayout')
@section('add_css')
<link href="{{asset('fa/css/font-awesome.min.css')}}" rel="stylesheet">
@stop
@section('content')
	<div class="site__body">
		<!-- page -->
		<div class="page">
			<!-- page__header -->
			<div class="page__header">
				<div class="container">
					<div class="row">
						<div class="col">
							<ol class="page__header-breadcrumbs breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Home</a></li>
								<li class="breadcrumb-item"><a href="">Furniture</a></li>
								<li class="breadcrumb-item active" aria-current="page">Current Page</li>
							</ol>
							<h1 class="page__header-title decor-header decor-header--align--center">Shop List<h1>
						</div>
					</div>
				</div>
			</div>
			<!-- page__header / end -->
			<!-- page__body -->
			<div class="page__body">
				<div class="container">
					<div class="row">
						<div class="col-12 col-lg-3 order-1 order-lg-0">
							<div class="block">
								<aside class="sidebar">
									<!-- widget-categories -->
									<div class="widget widget--card">
										<div class="widget__title">
											<h4 class="decor-header">Categories</h4>
										</div>
										<div class="widget__body">
											<div class="widget-categories" data-collapse="" data-collapse-opened-class="widget-categories__item--opened">
												<ul class="widget-categories__list">
													@foreach ($allkategori as $all)
														<li class="widget-categories__item" data-collapse-item="">
															<a href="#" class="widget-categories__link">{{$all->category_name}}
																{{-- <span class="widget-categories__counter">(57)</span> --}}
															</a>
														</li>	
													@endforeach
												</ul>
											</div>
										</div>
									</div>
									<!-- widget-categories / end -->
								</aside>
							</div>
						</div>
						<div class="col-12 col-lg-9"><div class="block">
							<div class="products-view">
								<div class="products-view__options view-options">
									<div class="view-options__layout">
										<a href="/shop" class="view-options__layout-button">
											<i class="fas fa-th-large"></i> 
										</a>
										<a href="/shop_list" class="view-options__layout-button view-options__layout-button--active">
											<i class="fas fa-th-list"></i>
										</a>
									</div>
									<div class="view-options__legend">Showing 6 of 98 products</div>
									<div class="view-options__divider"></div>
									<div class="view-options__control">
										<label class="view-options__control-label" for="view-options-sort">Sort By:</label>
										<div class="view-options__control-content">
											<select class="form-control form-control-sm" name="" id="view-options-sort">
												<option value="">Default</option>
												<option value="">Name (A-Z)</option>		
											</select>
										</div>
									</div>
									<div class="view-options__control">
										<label class="view-options__control-label" for="view-options-show">Show:</label>
										<div class="view-options__control-content">
											<select class="form-control form-control-sm" name="" id="view-options-show">
												<option value="">16</option><option value="">32</option>
												<option value="">48</option><option value="">64</option>
											</select></div>
										</div>
									</div>
									<div class="products-view__list products-list products-list--layout--list">
										@foreach ($produk as $p)
											<div class="products-list__item">
												<div class="product-card product-card--layout--list">
													@foreach ($diskon as $d)
														@if ($p->id == $d->id_product)
															<div class="product-card__badges-list">		
																<div class="product-card__badge product-card__badge--style--sale">Diskon</div>
															</div>
														@endif
													@endforeach
													<div class="product-card__image">
														<form action="/shop/product/{{$p->id}}" method="GET">
															<a href="/shop/product/{{$p->id}}">
																@foreach ($gambar as $g)
																	@if ($p->id == $g->product_id)
																		<img srcset="/{{$g->image_name}}, /{{$g->image_name}} 2x" src="/{{$g->image_name}}" alt="">
																	@endif
																@endforeach
															</a>
														
													</div>
													<div class="product-card__info">
														<div class="product-card__category">
															@foreach ($kategori as $k)
																@if ($p->id == $k->product_id)
																	<a href="">{{$k->category_name." "}}</a>
																@endif
															@endforeach
														</div>
														<div class="product-card__name">
															<a>{{$p->product_name}}</a>
														</div>
														<div class="product-card__rating">
															<div class="product-card__rating-title">Reviews (7)</div>
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
														<div class="product-card__description">{{str_limit($p->description,250)}}</div>
														<div class="product-card__prices-list">
															<div class="product-card__price">
																@if($max==0)
																	<div class="product-card__price">Rp {{number_format($p->price,0,',','.')}}</div>
																@else
																	@foreach ($diskon as $d)
																		@if ($p->id == $d->id_product)
																			@php 
																				$flag = 1; 
																				$dis = $p->price*($d->percentage/100);
																				break;
																			@endphp
																		@else
																			@php $flag = 2; @endphp
																		@endif
																	@endforeach	
																	@if ($flag==1)
																		<span class="product-card__price-new">Rp {{number_format($p->price-$dis,0,',','.')}}</span>
																		<span class="product-card__price-old">Rp {{number_format($p->price,0,',','.')}}</span>
																	@else
																		<div class="product-card__price">Rp {{number_format($p->price,0,',','.')}}</div>
																	@endif
																@endif
															</div>
														</div>
														<div class="product-card__buttons">
															<div class="product-card__buttons-list">
																<button class="btn btn-success product-card__addtocart" type="submit">Buy Now</button> 
																<button class="btn btn-primary product-card__wishlist" type="submit">Add To Cart</button> 
															</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										@endforeach
									</div>
								</div>
								<div class="products-view__pagination">
									<nav aria-label="Page navigation example">
										<ul class="pagination justify-content-center">
											<li class="page-item disabled">
												<a class="page-link" href="#" aria-label="Previous" tabindex="-1">
													<span aria-hidden="true">
														<i class="fas fa-arrow-left"></i>
													</span>
													<span class="sr-only">Previous</span>
												</a>
											</li>
											<li class="page-item"><a class="page-link" href="#">1</a></li>
											<li class="page-item active"><a class="page-link" href="#">2</a></li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
											<li class="page-item">
												<a class="page-link" href="#" aria-label="Next">
													<span aria-hidden="true">
														<i class="fas fa-arrow-right"></i>
													</span>
													<span class="sr-only">Next</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- page__body / end -->
		</div>
		<!-- page / end -->
	</div>
@stop
@section('add_js')
@stop