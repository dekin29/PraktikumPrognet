@section('title', 'Product Categories')
@extends('layouts.layout')
@section('add_css')
	<link href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/customscroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />
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
					<h2 class="mb-0">Input Product Categories</h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<form action="/productcategories" method="POST">
								{{ csrf_field() }}
								<div class="form-group">
									<label class="form-label">Category Name</label>
									<input type="text" class="form-control" name="category_name" placeholder="Name">
								</div>
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
					<h2 class="mb-0">List Product Categories</h2>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
							<thead>
								<tr>
									<th class="wd-15p">No</th>
									<th class="wd-15p">Category Name</th>									
									<th class="wd-15p">Action</th>
								</tr>
							</thead>
							<tbody>
								
								@foreach($kategori as $row)
									<tr>	
										<td>{{$loop->iteration}}</td>
										<td>{{$row->category_name}}</td>
										<td style="padding: 1px 15px; width: 13%">
		                                  <form style="float:left;" action="productcategories/{{$row->id}}/edit" method="GET">
		                                    {{ csrf_field() }}
		                                    <button style="padding: 8px 13px" class="btn btn-icon btn-info mt-1 mb-1" type="submit" name="edit" >
												<span class="btn-inner--icon"><i class="fe fe-edit"></i></span>
											</button>
		                                    {{-- <button style="padding: 3px 8px" class="btn btn-primary" type="submit" name="edit"><i class="fa fa-edit fa-fw"></i></button> --}}
		                                  </form>
		                                  <form style="float:right;" action="productcategories/{{$row->id}}" method="post">
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
	<script src="{{asset('assets/js/datatable.js')}}"></script>
	<script src="{{asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatable/responsive.bootstrap4.min.js')}}"></script>
@stop