@section('title', 'Edit Product')
@extends('layouts.layout')
@section('add_css')
	<link href="{{asset('assets/plugins/fileuploads/css/dropify.css')}}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.css')}}">
	<!-- gallery css-->
	<link href="{{asset('assets/plugins/gallery/dist/simplelightbox.min.css')}}" rel="stylesheet" />
@stop
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">Detail Product</h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<form action="/product/{{$produk->id}}" method="POST">
								{{ method_field('PUT') }}
								{{ csrf_field() }}
								<div class="form-group">
									<label class="form-label">Name</label>
								<input type="text" class="form-control" name="product_name" placeholder="Product Name" value="{{$produk->product_name}}" required>
								</div>
								<div class="form-group">
									<label class="form-label">Price</label>
									<input type="number" min="0" class="form-control" name="price" placeholder="Product Price" value="{{$produk->price}}" required>
								</div>
								<div class="form-group">
									<label class="form-label">Stock</label>
									<input type="number" min="0" class="form-control" name="stock" placeholder="Product Stock" value="{{$produk->stock}}" required>
								</div>
								<div class="form-group">
									<label class="form-label">Weight</label>
									<input type="number" min="0" class="form-control" name="weight" placeholder="Product Weight" value="{{$produk->weight}}" required>
								</div>
								<div class="form-group">
									<label class="form-label">Description</label>
									<textarea class="form-control" name="description" rows="4" placeholder="Product Description" required>{{$produk->description}}</textarea>
								</div>
								<div class="form-group ">
									<label>Categories</label>
									<select id="e2" name="kategori[]" class="form-control select2 w-100" multiple="multiple" data-placeholder="Pilih Categories">
										@foreach ($allKategori as $all)
											<option value="{{$all->id}}" 
												@foreach($kategori as $row)
													@if ($all->id == $row->category_id)
														{{'selected'}}		
													@endif
												@endforeach
											>{{$all->category_name}}</option>
										@endforeach
									</select>
								</div>
								<button class="btn btn-icon btn-success mt-1 mb-1" type="submit">
									<span class="btn-inner--icon"><i class="fe fe-save"></i></span>
									<span class="btn-inner--text">Update</span>
								</button>
							</form>
							<form action="/product" method="GET" style="float:left">
								<button class="btn btn-icon btn-danger mt-1 mb-1" type="submit">
									<span class="btn-inner--icon"><i class="fe fe-x"></i></span>
									<span class="btn-inner--text">Batal</span>
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
	<script src="{{asset('assets/plugins/fileuploads/js/dropify.min.js')}}"></script>
	<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{asset('assets/plugins/select2/select2.full.js')}}"></script>
	<script src="{{asset('assets/js/custom.js')}}"></script>
	<script src="{{asset('assets/js/select2.js')}}"></script>
	<script src="{{asset('assets/js/othercharts.js')}}"></script>
	<!-- gallery Js-->
	<script src="{{asset('assets/plugins/gallery/dist/simple-lightbox.js')}}"></script>
	<script src="{{asset('assets/js/gallery.js')}}"></script>
@stop