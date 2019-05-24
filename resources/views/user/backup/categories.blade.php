@section('title', 'Home')
@extends('layouts.userLayout')
@section('add_css')
<link href="{{asset('fa/css/font-awesome.min.css')}}" rel="stylesheet">
@stop
@section('content')
	<section class="s-content">
		
			<div class="row masonry-wrap">
				<div class="masonry">
					<div class="grid-sizer"></div>
					@foreach ($produk as $p)
						<article class="masonry__brick entry format-gallery" data-aos="fade-up">        
							<div class="entry__thumb slider">
								<div class="slider__slides">
									@foreach ($gambar as $g)
										@if ($p->id == $g->product_id)
											<div class="slider__slide">
												<img src="/{{$g->image_name}}" alt=""> 
											</div>	
										@endif
									@endforeach
								</div>
							</div>
			
							<div class="entry__text">
								<div class="entry__header">
										
									{{-- <div class="entry__date">
										<a href="single-gallery.html">December 10, 2017</a>
									</div> --}}
									<h1 class="entry__title"><a href="single-gallery.html">{{$p->product_name}}</a></h1>
								</div>
								<div class="entry__excerpt">
									<p>
										{{str_limit($p->description,50)}}
									</p>
								</div>
								<div class="entry__excerpt">
									<h6 style="color:red; margin-top:0px;"><strike>Rp {{number_format($p->price,0,',','.')}}</strike>  ({{20}}%)</h6>
									@php
										$diskon = $p->price*0.10;	
									@endphp
									<h4 style="color:green;margin-top:0px;">Rp {{number_format($p->price-$diskon,0,',','.')}}</h4>
								</div>
								<div class="entry__meta">
										<span class="entry__meta-links">
											Kategori :
											@foreach ($kategori as $k)
												@if ($p->id == $k->product_id)
													<a href="">{{$k->category_name}}</a> 	
												@endif
											@endforeach
										</span>
									</div>
									<br>
									<a class="btn btn-danger" href="">Buy</a>
									<a class="btn btn-danger" href="">cart</a>
							</div>
							
							
						</article> <!-- end article -->
					@endforeach
				</div>
			</div>	
		
	</section> <!-- s-content -->
@stop
@section('add_js')
@stop