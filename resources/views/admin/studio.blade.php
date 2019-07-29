@extends('base/template')
@section('konten')
<div class="content-header row">
	<div class="content-header-left col-md-4 col-12 mb-2">
		<h3 class="content-header-title">Halaman Studio</h3>
	</div>
</div>
<div class="row">

	<div class="col-12">

		<div class="card">

			<div class="card-header">

				<h4 class="card-title">Tambah Studio</h4>

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

			<div class="card-content collapse show">

				<div class="card-body ">

					<form class="form-horizontal style-form " action="/studio/store" method="post">
						@csrf
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Name studio</label>
							<div class="col-sm-10">
								<input type="text" name="name" class="form-control">
								<br>
							</div>
							<label class="col-sm-2 col-sm-2 control-label">Quota</label>
							<div class="col-sm-10">
								<input type="text" name="quota" class="form-control">
								<br>
							</div>
							<label class="col-sm-2 col-sm-2 control-label">Harga</label>
							<div class="col-sm-10">
								<input type="text" name="price" class="form-control">
								<br>
							</div>

							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary">Tambah</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="card">

			<div class="card-header collapse show">

				<h4 class="card-title">Tabel Studio</h4>

				<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
			</div>
			<div class="table-responsive">

				<table class="table table-striped">

					<thead>

						<tr>

							<th scope="col">#</th>
							<th scope="col">Nama Studio</th>
							<th scope="col">Quota</th>
							<th scope="col">Harga</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1?>
						@foreach($data as $item)
						<tr>
							<td scope="row">{{ $no }}</td>
							<td>{{ $item->name }}</td>
							<td>{{ $item->quota }}</td>
							<td>Rp{{ number_format($item->price,2,',','.') }}</td>
							<td>
								<a class="btn btn-warning btn-xs" href="/studio/{{$item->id}}/edit">Edit</i></a>
								<a class="btn btn-danger btn-xs" href="/studio/{{$item->id}}/delete">Delete</i></a>
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
</div>

@endsection
