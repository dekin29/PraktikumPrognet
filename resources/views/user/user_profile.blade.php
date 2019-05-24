@section('title', 'Home')
@extends('layouts.userLayout')
@section('add_css')
	{{-- <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet"> --}}
	<!-- Icons -->
	<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
	<!--Bootstrap.min css-->
	{{-- <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}"> --}}
	<!-- Adon CSS -->
	{{-- <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" type="text/css"> --}}
	<!-- Custom scroll bar css-->
	<link href="{{asset('assets/plugins/customscroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />
	<!-- Sidemenu Css -->
	{{-- <link href="{{asset('assets/plugins/toggle-sidebar/css/sidemenu.css')}}" rel="stylesheet"> --}}
	<link href="{{asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/fileuploads/css/dropify.css')}}" rel="stylesheet" type="text/css" />
@stop
@section('content')
	<div class="site__body">
		<!-- page -->
		<div class="page">
			<div class="page-main">
				<!-- app-content-->
				<div class="side-app">
					<div class="main-content">
						<!-- Page content -->
						<div class="container-fluid" style="margin-top:2%; margin-left:4.5%;">
							<div class="row">
								<div class="col-md-11">
									<div class="card card-profile  overflow-hidden">
										<div class="card-body text-center cover-image" data-image-src="{{asset('assets/img/profile-bg.jpg')}}">
											<div class=" card-profile">
												<div class="row justify-content-center">
													<div class="">
														<div class="">
															<a href="#">
																<img src="/{{Auth::user()->profile_image}}" height="128px" width="128px" class="rounded-circle" alt="profile">
															</a>
														</div>
													</div>
												</div>
											</div>
											<h3 class="mt-3 text-white">{{Auth::user()->name}}</h3>
											<p class="mb-4 text-white">{{Auth::user()->status}}</p>
											<button class="btn btn-primary btn-sm">
												<span class="fab fa-twitter"></span> Follow
											</button>
											<a href="#" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit profile</a>
										</div>
										<div class="card-body">
											<div class="nav-wrapper p-0">
												<ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
													<li class="nav-item">
														<a class="nav-link mb-sm-3 mb-md-0 active show mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="false"><i class="fas fa-home mr-2"></i>Unverified</a>
													</li>
													<li class="nav-item">
														<a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-user mr-2"></i>Delivered</a>
													</li>
													<li class="nav-item">
														<a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="true"><i class="far fa-images mr-2"></i>Cancel & Expired</a>
													</li>
													<li class="nav-item">
														<a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-4-tab" data-toggle="tab" href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4" aria-selected="false"><i class="fas fa-newspaper mr-2"></i>Success</a>
													</li>
													{{-- <li class="nav-item">
														<a class="nav-link mb-sm-0 mb-md-0 mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-5-tab" data-toggle="tab" href="#tabs-icons-text-5" role="tab" aria-controls="tabs-icons-text-5" aria-selected="false"><i class="fas fa-cog mr-2"></i>More</a>
													</li> --}}
												</ul>
											</div>
										</div>
									</div>
									<div class="card shadow" style="padding:2%">
										<div class="card-body pb-0">
											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
													<div class="col-12">
																<div class="cart">
																	<table class="cart__table">
																		<thead class="cart__header">
																			<tr>
																				<td class="cart__column cart__column--info">No</td>
																				<td class="cart__column cart__column--info">Address</td>
																				<td class="cart__column cart__column--info">Total</td>
																				<td class="cart__column cart__column--info">Timeout</td>
																				<td class="cart__column cart__column--info">Status</td>
																				<td class="cart__column cart__column--info">Action</td>
																			</tr>
																		</thead>
																		@foreach ($unverified as $u)
																			<tbody class="cart__body">
																				<tr>
																					<td class="cart__column cart__column--info">{{$loop->iteration}}</td>
																					<td class="cart__column cart__column--info">{{$u->address}}</td>
																					<td class="cart__column cart__column--info" data-title="Total">{{'Rp '.number_format($u->total,0,',','.')}}
																					</td>
																					<td class="cart__column cart__column--info">
																						@if(!empty($u->proof_of_payment))
																							{{'Sudah Upload Bukti Pembayaran'}}
																						@else
																							{{$u->timeout}}
																						@endif
																					</td>
																					<td class="cart__column cart__column--info">{{$u->status}}</td>
																					<td class="cart__column cart__column--info">
																						<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default">
																							<span class="fas fa-upload"></span>
																						</button>
																						<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
																							<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
																								<div class="modal-content">
																									<div class="modal-header">
																										<h2 class="modal-title" id="modal-title-default">Upload Bukti Pembayaran</h2>
																										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																											<span aria-hidden="true">×</span>
																										</button>
																									</div>
																									<form action="/uploadbukti" method="POST" enctype='multipart/form-data'>
																										{{ csrf_field() }}
																										<input hidden name="id" value="{{$u->id}}">
																										<div class="modal-body">
																											<input name="images" type="file" class="dropify" data-height="300" />
																										</div>
																									<div class="modal-footer">
																										<button type="submit" class="btn btn-primary">Upload</button>
																										{{-- <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button> --}}
																									</div>
																									</form>
																								</div>
																							</div>
																						</div>
																						<button type="button" class="btn btn-danger btn-sm" id='click3' data-id="{{$u->id}}" data-token="{{ csrf_token() }}">
																							<span class="fas fa-window-close"></span>
																						</button>
																					</td>
																				</tr>
																			</tbody>
																		@endforeach
																	</table>																	
																</div>
													</div>
												</div>
												<div aria-labelledby="tabs-icons-text-2-tab" class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel">
													<div class="col-12">
														<div class="cart">
															<table class="cart__table">
																<thead class="cart__header">
																			<tr>
																				<td class="cart__column cart__column--info">No</td>
																				<td class="cart__column cart__column--info">Address</td>
																				<td class="cart__column cart__column--info">Total</td>
																				<td class="cart__column cart__column--info">Status</td>
																				<td class="cart__column cart__column--info">Action</td>
																			</tr>
																</thead>
																@foreach ($delivered as $u)
																			<tbody class="cart__body">
																				<tr>
																					<td class="cart__column cart__column--info">{{$loop->iteration}}</td>
																					<td class="cart__column cart__column--info">{{$u->address}}</td>
																					<td class="cart__column cart__column--info" data-title="Total">{{'Rp '.number_format($u->total,0,',','.')}}
																					</td>
																					<td class="cart__column cart__column--info">{{$u->status}}</td>
																					<td class="cart__column cart__column--info">
																						<form action="/transaction/success/{{$u->id}}" method="POST">
																						{{ method_field('DELETE') }}
																						{{ csrf_field() }}
																						<button type="submit" class="btn btn-success btn-sm">
																							<span class="fas fa-check"></span>
																						</button>
																						</form>
																					</td>
																				</tr>
																			</tbody>
																@endforeach
															</table>																	
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
													<div class="cart">
														<table class="cart__table">
															<thead class="cart__header">
																				<tr>
																					<td class="cart__column cart__column--info">No</td>
																					<td class="cart__column cart__column--info">Courier</td>
																					<td class="cart__column cart__column--info">Address</td>
																					<td class="cart__column cart__column--info">Total</td>
																					<td class="cart__column cart__column--info">Timeout</td>
																					<td class="cart__column cart__column--info">Status</td>
																				</tr>
															</thead>
															@foreach ($cancel as $u)
																				<tbody class="cart__body">
																					<tr>
																						<td class="cart__column cart__column--info">{{$loop->iteration}}</td>
																						<td class="cart__column cart__column--info">{{$u->courier_id}}</td>
																						<td class="cart__column cart__column--info">{{$u->address}}</td>
																						<td class="cart__column cart__column--info" data-title="Total">{{'Rp '.number_format($u->total,0,',','.')}}
																						</td>
																						<td class="cart__column cart__column--info">{{$u->timeout}}</td>
																						<td class="cart__column cart__column--info">{{$u->status}}</td>
																					</tr>
																				</tbody>
															@endforeach
														</table>																	
													</div>
												</div>
												<div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel" aria-labelledby="tabs-icons-text-4-tab">
													<div class="cart">
														<table class="cart__table">
															<thead class="cart__header">
																<tr>
																	<td class="cart__column cart__column--info">No</td>
																	<td class="cart__column cart__column--info">Address</td>
																	<td class="cart__column cart__column--info">Total</td>
																	<td class="cart__column cart__column--info">Status</td>
																	<td class="cart__column cart__column--info">Action</td>
																</tr>
															</thead>
															@foreach ($success as $u)
																<tbody class="cart__body">
																	<tr>
																		<td class="cart__column cart__column--info">{{$loop->iteration}}</td>
																		<td class="cart__column cart__column--info">{{$u->address}}</td>
																		<td class="cart__column cart__column--info" data-title="Total">{{'Rp '.number_format($u->total,0,',','.')}}</td>
																		<td class="cart__column cart__column--info">{{$u->status}}</td>
																		<td class="cart__column cart__column--info">
																				<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default">
																						<span class="fas fa-upload"></span>
																					</button>
																					
																					<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
																						<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
																							<div class="modal-content">
																								<div class="modal-header">
																									<h2 class="modal-title" id="modal-title-default">Review Product</h2>
																									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																										<span aria-hidden="true">×</span>
																									</button>
																								</div>
																									<input hidden name="id" value="{{$u->id}}">
																									<div class="modal-body">
																										<form action="/review/{{$u->id}}" method="POST">
																											{{ method_field('DELETE') }}
																											{{ csrf_field() }}
																											<b>Product</b>
																											<br>
																											<select class="form-control" name="product_id">
																												@foreach ($detail as $d)
																													@if ($u->id == $d->transaction_id)
																														<option value="{{$d->product_id}}">{{$d->product_name}}</option>
																													@endif
																												@endforeach
																											</select>
																											<br>
																											<b>Rate</b>
																											<br>
																											<select class="form-control" name="rate">
																												<option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
																											</select>
																											<br>
																											<b>Review</b>
																											<br>
																											<textarea name="content" rows="3" class="form-control" placeholder="Review"></textarea>
																									</div>
																								<div class="modal-footer">
																									<button type="submit" class="btn btn-primary">POST</button>
																									{{-- <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button> --}}
																								</div>
																								</form>
																							</div>
																						</div>
																					</div>
																		</td>
																	</tr>
																</tbody>
															@endforeach
														</table>																	
													</div>
												</div>
												{{-- <div class="tab-pane fade" id="tabs-icons-text-5" role="tabpanel" aria-labelledby="tabs-icons-text-5-tab">
														<p>Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
														<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus</p>
														<p class="mb-4">because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
												</div> --}}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- page / end -->
	</div>
@stop
@section('add_js')
	<script src="{{asset('assets/plugins/jquery/dist/jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/popper.js')}}"></script>
	<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- Optional JS -->
	<script src="{{asset('assets/plugins/chart.js/dist/Chart.min.js')}}"></script>
	<script src="{{asset('assets/plugins/chart.js/dist/Chart.extension.js')}}"></script>
	<!-- Data tables -->
	<script src="{{asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
	<!-- Fullside-menu Js-->
	<script src="{{asset('assets/plugins/toggle-sidebar/js/sidemenu.js')}}"></script>
	<!-- Custom scroll bar Js-->
	<script src="{{asset('assets/plugins/customscroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<!-- Adon JS -->
	<script src="{{asset('assets/js/custom.js')}}"></script>
	<script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
	<script src="{{asset('assets/js/sweet-alert.js')}}"></script>
	<script src="assets/plugins/fileuploads/js/dropify.min.js"></script>
	
@stop