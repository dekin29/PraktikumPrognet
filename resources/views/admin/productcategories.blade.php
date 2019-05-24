@section('title', 'Product Categories')
@extends('layouts.layout')
@section('content')
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
								<button type="submit" class="btn btn-success mt-1 mb-1">Simpan</button>
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
									<th class="wd-15p">Category Name</th>									
									<th class="wd-15p">Action</th>
								</tr>
							</thead>
							@foreach($kategori as $row)
								<tbody>
									<tr>
										<td>{{$row->category_name}}</td>
										<td style="width: 14%">
		                                  <form style="float:left;" action="productcategories/{{$row->id}}/edit" method="GET">
		                                    {{ csrf_field() }}
		                                    <button style="padding: 3px 8px" class="btn btn-primary" type="submit" name="edit"><i class="fa fa-edit fa-fw"></i></button>
		                                  </form>
		                                  <form style="float:right;" action="productcategories/{{$row->id}}" method="post">
		                                    {{ method_field('DELETE') }}
		                                    {{ csrf_field() }}
		                                    <button style="padding: 3px 8px" class="btn btn-danger" type="submit" name="delete"><i class="fa fa-times fa-fw" onclick="return confirm('Yakin ingin MENGHAPUS kategori?')"></i></button>
		                                  </form>
		                                </td>  
									</tr>
								</tbody>
							@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop