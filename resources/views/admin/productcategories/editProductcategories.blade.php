@section('title', 'Edit Product Categories')
@extends('layouts.layout')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">Edit Product Categories</h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<form action="/productcategories/{{$kategori->id}}" method="POST">
								{{ method_field('PUT') }}
								{{ csrf_field() }}
								<div class="form-group">
									<label class="form-label">Category Name</label>
									<input type="text" class="form-control" name="category_name" placeholder="Name" value="{{$kategori->category_name}}">
								</div>
								<button onclick="window.location.href='/productcategories'" class="btn btn-icon btn-danger mt-1 mb-1">
									<span class="btn-inner--icon"><i class="fe fe-x"></i></span>
									<span class="btn-inner--text">Batal</span>
								</button>
								<button class="btn btn-icon btn-success mt-1 mb-1" type="submit">
									<span class="btn-inner--icon"><i class="fe fe-save"></i></span>
									<span class="btn-inner--text">Update</span>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop