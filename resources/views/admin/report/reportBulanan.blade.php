@section('title', 'Report Bulan')
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
					<h2 class="mb-0">Report Bulanan</h2>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
							<thead>
								<tr>
									<th class="wd-15p">No</th>
									<th class="wd-15p">Tahun</th>
									<th class="wd-15p">Bulan</th>
									<th class="wd-15p">Jumlah Penjualan</th>
									<th class="wd-15p">Total Penjualan</th>
									{{-- <th class="wd-15p">Action</th> --}}
								</tr>
							</thead>
							<tbody>
								
								@foreach($bulan as $row)
									<tr>	
										<td>{{$loop->iteration}}</td>
										<td>{{$row->tahun}}</td>
										<td>{{$row->bulan}}</td>
										<td>{{$row->jumlah}}</td>
										<td>{{$row->total}}</td>
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