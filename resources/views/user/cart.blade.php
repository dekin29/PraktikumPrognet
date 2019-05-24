@section('title', 'Home')
@extends('layouts.userLayout')
@section('add_css')

@stop
@section('content')
<div class="site__body">
	<div class="page">
		<!-- page__header -->
		<div class="page__header">
			<div class="container">
				<div class="row">
					<div class="col">
						<ol class="page__header-breadcrumbs breadcrumb">
							<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
							<li class="breadcrumb-item"><a href="#">Furniture</a></li>
							<li class="breadcrumb-item active" aria-current="page">Current Page</li>
						</ol>
						<h1 class="page__header-title decor-header decor-header--align--center">Shopping Cart</h1>
					</div>
				</div>
			</div>
		</div>
		<!-- page__header / end -->
		<!-- page__body -->
		<div class="page__body">
			<div class="block">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="cart">
								<form>
									<table class="cart__table">
										<thead class="cart__header">
											<tr>
												<td class="cart__column cart__column--image">Image</td>
												<td class="cart__column cart__column--info">Product</td>
												<td class="cart__column cart__column--price">Price</td>
												<td class="cart__column cart__column--quantity">Quantity</td>
												<td class="cart__column cart__column--total">Total</td>
												<td class="cart__column cart__column--remove"></td>
											</tr>
										</thead>
										@foreach ($cart as $c)
											<tbody class="cart__body">
												<tr>
													<td class="cart__column cart__column--image">
														<a href="product.html">
															<img srcset="/{{$c->image_name}}, /{{$c->image_name}} 2x" src="/{{$c->image_name}}" alt="">
														</a>
													</td>
													<td class="cart__column cart__column--info">
														<div class="cart__product-name">
															<a href="product.html">{{$c->product_name}}</a>
														</div>
														{{-- <ul class="cart__product-options">
															<li>Color: Gray</li><li>Material: Aluminum</li>
														</ul> --}}
													</td>
													<td class="cart__column cart__column--price" data-title="Price">
														@if($max==0)
															@php $dis = $c->price; @endphp
															{{'Rp '.number_format($c->price,0,',','.')}}
														@else
															@foreach ($diskon as $d)
																@if ($c->id == $d->id_product)
																	@php 
																		$flag = 1; 
																		$dis = $c->price-($c->price*($d->percentage/100));
																		break;
																	@endphp
																@else
																	@php $flag = 2; @endphp
																@endif
															@endforeach	
															@if ($flag==1)
																{{'Rp '.number_format($dis,0,',','.')}}
															@else
																@php $dis = $c->price; @endphp
																{{'Rp '.number_format($c->price,0,',','.')}}
															@endif
														@endif
													</td>
													<td class="cart__column cart__column--quantity" data-title="Quantity">
														<label for="quantity0" class="sr-only">Quantity</label>
														<div class="form-control-number">
														<input name="qty" class="form-control form-control-number__input" type="number" min="1" value="{{$c->qty}}">
															<div class="form-control-number__add"></div>
															<div class="form-control-number__sub"></div>
														</div>
													</td>
													<td class="cart__column cart__column--total" data-title="Total">{{'Rp '.number_format($dis*$c->qty,0,',','.')}}</td>
													<td class="cart__column cart__column--remove">
														<form action="/cart/{{$c->cart_id}}" method="post">
															{{ method_field('DELETE') }}
															{{ csrf_field() }}
															<button style="margin-top:-9px;" type="submit" class="button-remove button-remove--lg">
																<i class="fas fa-times"></i>
															</button>
														</form>
													</td>
												</tr>
											</tbody>
											@php
												$totalweight = $totalweight + ($c->weight*$c->qty);
												$subtotal = $subtotal + ($dis*$c->qty);
											@endphp	
										@endforeach
										<tfoot class="cart__footer">
											<tr>
												<td colspan="3" class="cart__column">
													<a href="/shop" class="btn btn-secondary">Back To Shop</a>
												</td>
												<td colspan="3" class="cart__column text-right">
													{{-- <form action="/cart/{{$c->cart_id}}" method="POST"> --}}													
														{{ method_field('PUT') }}
														{{ csrf_field() }}
														<button type="submit" class="btn btn-primary">Update Cart</button>													
													{{-- </form> --}}
												</td>
											</tr>
										</tfoot>
									</table>
								</form>
							</div>
						</div>
						<div class="col-lg-4 d-flex">
							<div class="card mb-lg-0 flex-grow-1 d-block">
								<div class="card__header">
									<h4 class="decor-header">Coupon Code</h4>
								</div>
								<div class="card__content">
									<p>Etiam lacus lacus, mollis in mattis in, vehicula eu nulla. Nulla nec tellus pellentesque, sollicitudin augue vitae, auctor quam.</p>
									<form>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Coupon Code">
										</div>
										<button type="submit" class="btn btn-primary">Apply Coupon</button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-4 d-flex">
							<div class="card mb-lg-0 flex-grow-1">
								<div class="card__header">
									<h4 class="decor-header">Calculate Shipping</h4>
								</div>
								<div class="card__content">
									<form id="form_checkout" method="POST" action="/checkout">
										{{ csrf_field() }}
										<div class="form-group">
											{{-- <b><label>Province</label></b> --}}
											<select class="form-control province"  name="province_id">
												<option>Select a Province</option>
												@foreach ($province['rajaongkir']['results'] as $prov)
													<option value="{{$prov['province_id']}}">{{$prov['province']}}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group">
											<select name="city_id" class="form-control city">
												<option>Select a City</option>
											</select>
										</div>
										<div class="form-group">
											<select name="courier" class="form-control courier">
												<option disabled>Select Courier</option>
												@foreach ($courier as $kurir)
													<option value="{{$kurir->courier}}">{{$kurir->courier}}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group">
											<select name="service_name" class="form-control service">
											</select>
										</div>
										<div class="form-group">
											<input type="text" name="address" class="form-control address" placeholder="Address" required>
										</div>
										{{-- <button type="submit" class="btn btn-primary">Update</button> --}}

										<script>
												jQuery(document).ready(function ($) {
													$(function(){
														$('.city').hide();
														$('.courier').hide();
														$('.service').hide();
														$('.cart-totals__button').hide();
																					
														$('.province_val').val($('.province').text());
										
														//province changed
														$('.province').change(function() {
															var data = "";
															$.ajax({
																type:"GET",
																url : "{{url('cart/getcity')}}",
																data : "province_id="+$(this).val(),
																async: false,
																success : function(response) {
																	data = response;
																	return response;
																},
																error: function() {
																	alert('Error occured');
																}
															});
															var string = data.split(",");
															var array = string.filter(function(e){return e;});
															var select = $('.city');
															select.empty();
															console.log(array);
															var i = 0; var key = ""; var name = "";
															$.each(array, function(index, value) {
																if(i % 2 == 0 || i == 0){
																	key = value;
																}
																else{
																	name = value;
																	select.append($('<option></option>').val(key).html(name));
																}
																i++;
															});
															$('.city').show();
															$('.courier').show();
															getShippingCost();
														});
										
														//courier changed
														$('.courier').change(function() {
															getShippingCost();
														});
										
														//city changed
														$('.city').change(function() {
															getShippingCost();
														});
										
														//service changed
														$('.service').change(function() {
															$('.shipping').text($(this).val());
															var subtotal = $('.subtotal').text();
															var shipping = $('.shipping').text();
															$('.totalprice').text(parseInt(subtotal)+parseInt(shipping));
															$('.province_val').val($('.province option:selected').text());
															$('.regency_val').val($('.city option:selected').text());
															$('.sub_total_val').val($('.subtotal').text());
															$('.shipping_cost_val').val($('.shipping').text());
															$('.total_val').val($('.totalprice').text());
															$('.service_val').val($('.service option:selected').text());
										
															console.log($('.total_val').val());
														});
										
														$('.cart-totals__button').click(function() {
															$('#form_checkout').submit();
														});
													});
										
													function getShippingCost(){
														$.ajax({
															type:"GET",
															url : "{{url('cart/getshippingcost')}}",
															data : "destination="+$('.city').val()+"&courier="+$('.courier').val()+"&weight="+$('.totalweight').text(),
															async: false,
															success : function(response) {
																data = response;
																return response;
															},
															error: function() {
																alert('Barangnya gak ada cuy');
															}
														});
										
														var string = data.split(",");
														var array = string.filter(function(e){return e;});
														var select = $('.service');
														select.empty();
														console.log(array);
														var i = 0; var key = ""; var name = "";
														$.each(array, function(index, value) {
															if(i % 2 == 0 || i == 0){
																name = value;
															}
															else{
																key = value;
																select.append($('<option></option>').val(key).html(name));
																if(i == 0){
																	select.val(key).change();
																}
															}
															i++;
														});
														$('.service').show();
														$('.shipping').text($('.service').val());
										
														var subtotal = $('.subtotal').text();
														var shipping = $('.shipping').text();
														$('.totalprice').text(parseInt(subtotal)+parseInt(shipping));
										
														$('.province_val').val($('.province option:selected').text());
														$('.regency_val').val($('.city option:selected').text());
														$('.sub_total_val').val($('.subtotal').text());
														$('.shipping_cost_val').val($('.shipping').text());
														$('.total_val').val($('.totalprice').text());
														$('.service_val').val($('.service option:selected').text());
										
														console.log($('.total_val').val());
										
														$('.cart-totals__button').show();
													}
										
												});
										</script>
									{{--  --}}
								</div>
							</div>
						</div>
						<div class="col-lg-4 d-flex">
							<div class="card mb-0 flex-grow-1">
								<div class="card__header">
									<h4 class="decor-header">Cart Totals</h4>
								</div>
								<div class="card__content cart-totals">
									<table class="cart-totals__table">
										<thead>
											<tr>
												<th>Subtotal</th>
												<td class="subtotal"></td>
											</tr>
											<tr>
												<th>Total Weight</th>
												<td class="totalweight"></td>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th>Shipping</th>
												<td class="shipping"></td>
											</tr>
											{{-- <tr>
												<th>Tax</th>
												<td class="tax"> @php $tax = $subtotal*(10/100); @endphp</td>
											</tr> --}}
										</tbody>
										<tfoot>
											<tr>
												<th>Total</th>
												<td class="totalprice"></td>
											</tr>
										</tfoot>
									</table>
									<script>
										jQuery(document).ready(function ($) {
											$(function(){
												$('.subtotal').text('{{$subtotal}}');
												$('.totalweight').text('{{$totalweight}}');
											});
										});
									</script>
									<input type="hidden" name="regency" class="regency_val">
									<input type="hidden" name="province" class="province_val">
									<input type="hidden" name="sub_total" class="sub_total_val">
									<input type="hidden" name="shipping_cost" class="shipping_cost_val">
									<input type="hidden" name="service" class="service_val">
									<input type="hidden" name="total" class="total_val">
									<button type="submit" class="btn btn-primary btn-lg cart-totals__button">Checkout</button>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- page__body / end -->
	</div>
</div>

@stop
@section('add_js')
@stop