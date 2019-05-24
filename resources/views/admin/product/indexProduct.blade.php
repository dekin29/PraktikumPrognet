@section('title', 'Product')
@extends('layouts.layout')
@section('add_css')
	<link href="{{asset('assets/plugins/fileuploads/css/dropify.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/plugins/fileuploads/css/dropify-multiple.css')}}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.css')}}">
@stop
@section('content')
<div class="row">
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">List Product</h2>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered w-100 text-nowrap">
							<thead>
								<tr>
									<th>No</th>
									<th class="wd-15p">Name</th>
									<th class="wd-15p">Price</th>
									<th class="wd-15p">Stock</th>
									<th class="wd-15p">Weight</th>
									<th class="wd-15p">Action</th>
								</tr>
							</thead>
							<tbody>								
								@foreach($produk as $row)
									<tr>
										<td>{{$loop->iteration}}</td>	
										<td>{{$row->product_name}}</td>
										<td>{{$row->price}}</td>
										<td>{{$row->stock}}</td>
										<td>{{$row->weight}}</td>
										<td style="padding: 1px 15px; width: 19%">
											<form style="float:left; " action="product/{{$row->id}}" method="GET">
											  {{ csrf_field() }}
											  <button style="padding: 8px 13px" class="btn btn-icon btn-success mt-1 mb-1" type="submit" name="edit" >
												  <span class="btn-inner--icon"><i class="fe fe-eye"></i></span>
											  </button>
											  {{-- <button style="padding: 3px 8px" class="btn btn-primary" type="submit" name="edit"><i class="fa fa-edit fa-fw"></i></button> --}}
											</form>
											<form style="float:left; margin-left:13px;" action="product/{{$row->id}}/edit" method="GET">
												{{ csrf_field() }}
												<button style="padding: 8px 13px" class="btn btn-icon btn-info mt-1 mb-1" type="submit" name="edit" >
													<span class="btn-inner--icon"><i class="fe fe-edit"></i></span>
												</button>
												{{-- <button style="padding: 3px 8px" class="btn btn-primary" type="submit" name="edit"><i class="fa fa-edit fa-fw"></i></button> --}}
											</form>
											<form style="float:right;" action="product/{{$row->id}}" method="post">
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
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">Input Product</h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<form action="/product" method="POST" enctype='multipart/form-data'>
								{{ csrf_field() }}
								<div class="form-group">
									<label class="form-label">Name</label>
									<input type="text" class="form-control" name="product_name" placeholder="Product Name" required>
								</div>
								<div class="form-group">
									<label class="form-label">Price</label>
									<input type="number" min="0" class="form-control" name="price" placeholder="Product Price" required>
								</div>
								<div class="form-group">
									<label class="form-label">Stock</label>
									<input type="number" min="0" class="form-control" name="stock" placeholder="Product Stock" required>
								</div>
								<div class="form-group">
									<label class="form-label">Weight</label>
									<input type="number" min="0" class="form-control" name="weight" placeholder="Product Weight" required>
								</div>
								<div class="form-group">
									<label class="form-label">Description</label>
									<textarea class="form-control" name="description" rows="4" placeholder="Product Description" required></textarea>
								</div>
								<div class="form-group ">
									<label>Categories</label>
									<select id="e2" name="kategori[]" class="form-control select2 w-100" multiple="multiple" data-placeholder="Pilih Categories">
										@foreach($kategori as $row)
											<option value="{{$row->id}}">{{$row->category_name}}</option>
										@endforeach
									</select>
								</div>
								<div class="card shadow">
									<div class="card-header">
										<h4 class="mb-0">Product Image</h4>
									</div>
									<div class="card-body">
										<input name="images[]" multiple type="file" class="dropify" data-default-file="assets/img/photos/1.jpg" data-height="300"  />
									</div>
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
	
@stop

@section('add_js')
	<script>$('.dropify').dropify();</script>
	<script src="{{asset('assets/plugins/fileuploads/js/dropify.min.js')}}"></script>
	<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{asset('assets/plugins/select2/select2.full.js')}}"></script>
	<script src="{{asset('assets/js/custom.js')}}"></script>
	<script src="{{asset('assets/js/select2.js')}}"></script>
	<script src="{{asset('assets/js/othercharts.js')}}"></script>
	<script src="{{asset('assets/plugins/fileuploads/js/dropify-multiple.js')}}"></script>
	<script>$('.dropify').dropify();</script>
@stop