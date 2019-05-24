@section('title', 'Transaction')
@extends('layouts.layout')
@section('add_css')
	<link href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/customscroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />
@stop
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">List Transaction</h2>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
							<thead>
								<tr>
									<th class="wd-15p">No</th>
									<th class="wd-15p">Address</th>
									<th class="wd-15p">Total</th>
									<th class="wd-15p">Status</th>
									<th class="wd-15p">Action</th>
								</tr>
							</thead>
							<tbody>
								
								@foreach($unverified as $row)
									<tr>	
										<td>{{$loop->iteration}}</td>
										<td>{{$row->address}}</td>
										<td>{{$row->total}}</td>
										<td>{{$row->status}}</td>
										<td style="padding: 1px 15px; width: 19%">
											
		                  <button style="padding: 8px 13px;float:left;" class="btn btn-icon btn-info mt-1 mb-1" type="submit" name="edit" data-toggle="modal" data-target="#modal-default">
												<span class="btn-inner--icon"><i class="fe fe-eye"></i></span>
											</button>
											
											<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
												<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h2 class="modal-title" id="modal-title-default">Bukti Pembayaran</h2>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">X</span>
															</button>
														</div>
														<div class="modal-body">
															<img src="/{{$row->proof_of_payment}}" height="400px" width="450px">
														</div>
														<div class="modal-footer">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">Cancel</button>
															{{-- <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button> --}}
														</div>
													</div>
												</div>
											</div>
		                  <form style="float:left; margin-left:9px;" action="transaction/{{$row->id}}" method="post">
		                    {{ method_field('DELETE') }}
		                    {{ csrf_field() }}
		                    <button style="padding: 8px 13px" class="btn btn-icon btn-success mt-1 mb-1" type="submit" name="delete">
												<span class="btn-inner--icon"><i class="fe fe-check"></i></span>
												</button>
											</form>
											<form style="float:right;" action="transaction/cancel/{{$row->id}}" method="post">
		                    {{ method_field('DELETE') }}
		                    {{ csrf_field() }}
		                    <button style="padding: 8px 13px" class="btn btn-icon btn-danger mt-1 mb-1" type="submit" name="delete">
												<span class="btn-inner--icon"><i class="fe fe-x"></i></span>
												</button>
											</form>
		                </td>  
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('add_js')
	<script src="{{asset('assets/js/datatable.js')}}"></script>
	<script src="{{asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatable/responsive.bootstrap4.min.js')}}"></script>
@stop