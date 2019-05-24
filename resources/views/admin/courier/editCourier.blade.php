@section('title', 'Edit Courier')
@extends('layouts.layout')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">Edit Courier</h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<form action="/courier/{{$kurir->id}}" method="POST">
								{{ method_field('PUT') }}
								{{ csrf_field() }}
								<div class="form-group">
									<label class="form-label">Courier</label>
									<input type="text" class="form-control" name="courier" placeholder="Name" value="{{$kurir->courier}}">
								</div>
								<button href="/courier" class="btn btn-icon btn-danger mt-1 mb-1" type="submit">
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