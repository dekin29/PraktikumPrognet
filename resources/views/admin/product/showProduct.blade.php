@section('title', 'Detail Product')
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
					<h2 class="mb-0">Image Product</h2>
				</div>
				<div class="card-body">
					<div class="gallery row">
						@foreach ($images as $image)
							<div class="col-lg-4 hover15">
								<div class="card shadow overflow-hidden">
									<a href="/{{$image->image_name}}" class="big"><img src="/{{$image->image_name}}" alt="" title="{{$image->image_name}}" /></a>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">Detail Product</h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<form action="/product" method="get">
								{{ csrf_field() }}
								<div class="form-group">
									<label class="form-label">Name</label>
								<input type="text" class="form-control" name="product_name" placeholder="Product Name" value="{{$produk->product_name}}" readonly>
								</div>
								<div class="form-group">
									<label class="form-label">Price</label>
									<input type="number" min="0" class="form-control" name="price" placeholder="Product Price" value="{{$produk->price}}" readonly>
								</div>
								<div class="form-group">
									<label class="form-label">Stock</label>
									<input type="number" min="0" class="form-control" name="stock" placeholder="Product Stock" value="{{$produk->stock}}" readonly>
								</div>
								<div class="form-group">
									<label class="form-label">Weight</label>
									<input type="number" min="0" class="form-control" name="weight" placeholder="Product Weight" value="{{$produk->weight}}" readonly>
								</div>
								<div class="form-group">
									<label class="form-label">Description</label>
									<textarea class="form-control" name="description" rows="4" placeholder="Product Description" readonly>{{$produk->description}}</textarea>
								</div>
								<div class="form-group ">
									<label>Categories</label>
									<select id="e2" name="kategori[]" class="form-control select2 w-100" multiple="multiple" data-placeholder="Pilih Categories" disabled>
										@foreach ($allKategori as $all)
											@foreach($kategori as $row)
												@if ($all->id == $row->category_id)
													<option value="{{$all->id}}" selected>{{$all->category_name}}</option>	
												@endif
											@endforeach
										@endforeach
									</select>
								</div>
								<button href="/product" class="btn btn-icon btn-danger mt-1 mb-1" type="submit">
									<span class="btn-inner--icon"><i class="fe fe-chevron-left"></i></span>
									<span class="btn-inner--text">Kembali</span>
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