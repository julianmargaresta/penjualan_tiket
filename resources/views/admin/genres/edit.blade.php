@extends('base/template')
@section('konten')

<div class="content-header row">
	<div class="content-header-left col-md-4 col-12 mb-2">
		<h3 class="content-header-title">Halaman Edit Genre Film</h3>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Genre</h4>
				<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
			</div>

			@if (Session::has('message'))
				<div class="col-sm-12">
					<div class="alert alert-success">
						{{ Session::get('message') }}
					</div>
				</div>
		    @endif
			@if (Session::has('message_gagal'))
				<div class="col-sm-12">
					<div class="alert alert-danger">
						{{ Session::get('message_gagal') }}
					</div>
				</div>
	     	@endif
			@if ($errors->any())
			<div class="col-sm-12">
				<div class="alert alert-danger">
					<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
					</ul>
				</div>
			</div>
			@endif
			
			<div class="card-content collapse show">
				<div class="card-body ">
					<form class="form-horizontal style-form " action="/genre/{{$data->id}}/update" method="post">
						@csrf
						<div class="form-group">
							<label class="control-label">Name Genre</label>
							<input type="text" value="{{$data->name}}" name="name" id="name" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">Update</button>
						<a href="/genre" class="btn btn-warning">Back</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection