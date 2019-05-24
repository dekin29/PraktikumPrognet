@section('title', 'Discount')
@extends('layouts.layout')
@section('add_css')
	<link href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/customscroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.css')}}">
@stop
@section('content')
	@if($pesan == 1)
		<script type="text/javascript">
			alert("Data udah ada bos!");
		</script>
		@php
			unset($pesan);
		@endphp
	@endif
	
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">Input Master Discount</h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<form action="/discount" method="POST">
								{{ csrf_field() }}
								<div class="form-group ">
									<label>Product</label>
									<select id="e2" name="produk[]" class="form-control select2 w-100" multiple="multiple" data-placeholder="Pilih Product">
										@foreach($produk as $row)
											<option value="{{$row->id}}">{{$row->product_name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label class="form-label">Percentage</label>
									<input type="number" min="0" max="100" class="form-control" name="percentage" placeholder="Percentage">
								</div>
								<div class="input-daterange datepicker row align-items-center">
									<div class="col-sm-6">
										<label class="form-label">Start</label>
										<div class="form-group mb-sm-0 mb-4">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
												</div>
												<input class="form-control" placeholder="Start date" type="text" value="10-16-2018" name="start">
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group mb-0">
											<label class="form-label">End</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
												</div>
												<input class="form-control" placeholder="End date" type="text" value="10-20-2018" name="end">
											</div>
										</div>
									</div>
								</div>
								<br>
								<button class="btn btn-icon btn-success mt-1 mb-1" type="submit">
									<span class="btn-inner--icon"><i class="fe fe-save"></i></span>
									<span class="btn-inner--text">Simpan</span>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">List Master Discount</h2>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
							<thead>
								<tr>
									<th class="wd-15p">No</th>
									<th class="wd-15p">Product</th>									
									<th class="wd-15p">Percentage</th>
									<th class="wd-15p">Start</th>
									<th class="wd-15p">End</th>
									<th class="wd-15p">Action</th>
								</tr>
							</thead>
							<tbody>
								
								@foreach($diskon as $row)
									<tr>	
										<td>{{$loop->iteration}}</td>
										<td>{{$row->product_name}}</td>
										<td>{{$row->percentage}}</td>
										<td>{{$row->start}}</td>
										<td>{{$row->end}}</td>
										<td style="padding: 1px 15px; width: 13%">
		                                  {{-- <form style="float:left;" action="discount/{{$row->id}}/edit" method="GET">
		                                    {{ csrf_field() }}
		                                    <button style="padding: 8px 13px" class="btn btn-icon btn-info mt-1 mb-1" type="submit" name="edit" >
												<span class="btn-inner--icon"><i class="fe fe-edit"></i></span>
											</button> --}}
		                                    {{-- <button style="padding: 3px 8px" class="btn btn-primary" type="submit" name="edit"><i class="fa fa-edit fa-fw"></i></button> --}}
		                                  {{-- </form> --}}
		                                  <form style="float:right;" action="discount/{{$row->id}}" method="post">
		                                    {{ method_field('DELETE') }}
		                                    {{ csrf_field() }}
		                                    <button style="padding: 8px 13px" class="btn btn-icon btn-danger mt-1 mb-1" type="submit" name="delete">
												<span class="btn-inner--icon"><i class="fe fe-trash-2"></i></span>
											</button>
		                                    {{-- <button style="padding: 3px 8px" class="btn btn-danger" type="submit" name="delete"><i class="fa fa-times fa-fw" onclick="return confirm('Yakin ingin MENGHAPUS kategori?')"></i></button> --}}
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
	<script src="{{asset('assets/plugins/fileuploads/js/dropify.min.js')}}"></script>
	<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{asset('assets/plugins/select2/select2.full.js')}}"></script>
	<script src="{{asset('assets/js/custom.js')}}"></script>
	<script src="{{asset('assets/js/select2.js')}}"></script>
	<script src="{{asset('assets/js/othercharts.js')}}"></script>
	<script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
@stop