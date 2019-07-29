@extends('base/template')
@section('konten')

<div class="content-header row">
	<div class="content-header-left col-md-4 col-12 mb-2">
		<h3 class="content-header-title">Halaman Order</h3>
	</div>
</div>
<div class="row">

	<div class="col-12">

		<div class="card">

			<div class="card-header">

				<h4 class="card-title">Tambah Order</h4>

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

					<form class="form-horizontal style-form " action="/order/store" method="post">
						@csrf
							<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Nama Pemesan</label>
							<div class="col-sm-10">
								<select class="form-control" name="user_id">
									<option value="null">--Pilih user--</option>
									@foreach($dataUser as $item)

									<option value="{{$item->id}}">{{$item->name}}</option>
									@endforeach

								</select>
								<br>
							</div>
							<label class="col-sm-2 col-sm-2 control-label">Film</label>
							<div class="col-sm-10">
								<select class="form-control" name="film_id">
									<option value="null">--Pilih Film--</option>
									@foreach($dataFilm as $item)

									<option value="{{$item->id}}">{{$item->nama}}</option>
									@endforeach

								</select>
								<br>
							</div>
							<label class="col-sm-2 col-sm-2 control-label">Quota</label>
							<div class="col-sm-10">
								<input type="text" name="quota" class="form-control">
								<br>
							</div>
							<br>
							
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary">Tambah</button>
							</div>
							</div>
					</form>
				</div>
				</div>
			</div>
		</div>
	</div>

		<div class="card">

			<div class="card-header collapse show">

				<h4 class="card-title">Tabel Order</h4>

				<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
			</div>
			<div class="table-responsive">

				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama Pemesan</th>
							<th scope="col">Film</th>
							<th scope="col">Quota</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1?>
						@foreach($dataOrder as $item)
						<tr>
							<td scope="row">{{ $no }}</td>
							<td>{{ $item->user->name }}</td>
							<td>{{ $item->films->name }}</td>
							<td>{{ $item->quota}}</td>
							<td>
								<a class="btn btn-primary btn-xs" href="/order/{{$item->id}}">Detail</i></a>
								<a class="btn btn-danger btn-xs" href="/order{{$item->id}}/delete">Delete</i></a>
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
