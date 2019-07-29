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
					<form class="form-horizontal style-form " action="/film/store" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="control-label">Name Film</label>
							<input type="text" name="nama" id="nama" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Deskripsi</label>
							<input type="text" name="deskripsi" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Genre</label>
							<select class="form-control" name="genre_id">
								<option value="null">--Pilih Genre--</option>
								@foreach($dataGenre as $item)
									<option value="{{$item->id}}">{{$item->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Mulai Tayang</label>
							<input type="date" name="start_at" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Berakhir Tayang</label>
							<input type="date" name="end_at" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Studio</label>
							<select class="form-control" name="studio_id">
								<option value="null">--Pilih Studio--</option>
								@foreach($dataStudio as $item)
									<option value="{{$item->id}}">{{$item->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">	
							<label class="control-label">Foto</label>
							<input type="file" name="foto" class="form-control" placeholder="Tambahkan Poster Film">					
						</div>
						<button type="submit" class="btn btn-primary">Tambah</button>
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
						@foreach($dataFilm as $item)
						<tr>
							<td scope="row">{{ $number++ }}</td>
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
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
