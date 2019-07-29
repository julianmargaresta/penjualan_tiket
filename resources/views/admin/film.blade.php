@extends('base/template')
@section('konten')

<div class="content-header row">
	<div class="content-header-left col-md-4 col-12 mb-2">
		<h3 class="content-header-title">Halaman Film</h3>
	</div>
</div>
<div class="row">

	<div class="col-12">

		<div class="card">

			<div class="card-header">

				<h4 class="card-title">Tambah Film</h4>

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

					<form class="form-horizontal style-form " action="/film/store" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Name Film</label>
							<div class="col-sm-10">
								<input type="text" name="nama" id="nama" class="form-control">
								<br>
							</div>
							<label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
							<div class="col-sm-10">
								<input type="text" name="deskripsi" class="form-control">
								<br>
							</div>
							<label class="col-sm-2 col-sm-2 control-label">Genre</label>
							<div class="col-sm-10">
								<select class="form-control" name="genre_id">
									<option value="null">--Pilih Genre--</option>
									@foreach($dataGenre as $item)

									<option value="{{$item->id}}">{{$item->name}}</option>
									@endforeach

								</select>
							</div>
							<br>
							<label class="col-sm-2 col-sm-2 control-label">Mulai Tayang</label>
							<div class="col-sm-10">
								<input type="date" name="start_at" class="form-control">
								<br>
							</div>
							<label class="col-sm-2 col-sm-2 control-label">Berakhir Tayang</label>
							<div class="col-sm-10">
								<input type="date" name="end_at" class="form-control">
								<br>
							</div>
							<label class="col-sm-2 col-sm-2 control-label">Studio</label>
							<div class="col-sm-10">
								<select class="form-control" name="studio_id">
									<option value="null">--Pilih Studio--</option>
									@foreach($dataStudio as $item)

									<option value="{{$item->id}}">{{$item->name}}</option>
									@endforeach

								</select>
							</div>
							<br>
							<label class="col-sm-2 col-sm-2 control-label">Foto</label>
							<div class="col-sm-10">
								<input type="file" name="foto" class="form-control" placeholder="Tambahkan Poster Film">
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

				<h4 class="card-title">Tabel Film</h4>

				<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
			</div>
			<div class="table-responsive">

				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Foto</th>
							<th scope="col">Nama Film</th>
							<th scope="col">Mulai Tayang</th>
							<th scope="col">Berakhir Tayang</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1?>
						@foreach($dataFilm as $item)
						<tr>
							<td scope="row">{{ $no }}</td>
							<td><img src="/images/{{ $item->foto }}" style="width: 120px;"></td>
							<td>{{ $item->nama }}</td>
							<td>{{ $item->start_at }}</td>
							<td>{{ $item->end_at }}</td>
							<td>
								<a class="btn btn-primary btn-xs" href="/film/{{$item->id}}">Detail</i></a>
								<a class="btn btn-warning btn-xs" href="/film/{{$item->id}}/edit">Edit</i></a>
								<a class="btn btn-danger btn-xs" href="/film/{{$item->id}}/delete">Delete</i></a>
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
