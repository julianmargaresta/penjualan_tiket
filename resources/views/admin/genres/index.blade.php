@extends('base/template')
@section('konten')

<div class="content-header row">
	<div class="content-header-left col-md-4 col-12 mb-2">
		<h3 class="content-header-title">Halaman Genre Film</h3>
	</div>
</div>

<div class="row">
	<div class="col-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Tambah Genre</h4>
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
					<form class="form-horizontal style-form " action="/genre/store" method="post">
						@csrf
						<div class="form-group">
							<label class="control-label">Name Genre</label>
							<input type="text" name="name" id="name" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card">
			<div class="card-header collapse show">
				<h4 class="card-title">Tabel Genre</h4>
				<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Nama Genre</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1?>
						@foreach($data as $item)
						<tr>
							<td scope="row">{{ $no }}</td>
							<td>{{ $item->name }}</td>
							<td>
								<a  class="btn btn-warning" href="/genre/{{$item->id}}/edit">Edit</i></a>
								<a  class="btn btn-danger" href="/genre/{{$item->id}}/delete">Delete</i></a>
							</td>
						</tr>
						<?php $no++?>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
