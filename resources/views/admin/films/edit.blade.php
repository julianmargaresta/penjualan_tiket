@extends('base/template')

@section('konten')
<div class="content-header row">
	<div class="content-header-left col-md-4 col-12 mb-2">
		<h3 class="content-header-title">Halaman Edit Film</h3>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Film</h4>
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
					<form role="form" class="form-horizontal style-form" action="/film/{{$dataFilm->id}}/update" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="control-label">Name Film</label>
							<input type="text" name="nama" id="nama" value="{{$dataFilm->nama}}" class="form-control">
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
							<input type="text" name="deskripsi" value="{{$dataFilm->deskripsi}}" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Genre</label>
							<select class="form-control" name="genre_id">
								<option value="null">--Pilih Genre--</option>
								@foreach($dataGenre as $item)
								<option value="{{ $item->id }}" {{(  $dataFilm->genre_id == $item->id) ? 'selected' :''}}>{{ $item->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Mulai Tayang</label>
							<input type="date" name="start_at" value="{{$dataFilm->start_at}}" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Berakhir Tayang</label>
							<input type="date" name="end_at" value="{{$dataFilm->end_at}}" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Studio</label>
							<select class="form-control" name="studio_id">
								<option value="null">--Pilih Studio--</option>
								@foreach($dataStudio as $item)
									<option value="{{ $item->id }}" {{(  $dataFilm->studio_id == $item->id) ? 'selected' :''}}>{{ $item->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Foto</label>
							<div class="form-group">
								<img src="/images/{{ $dataFilm->foto }}" style="width: 200px;">
							</div>	
							<input type="file" name="foto" value="{{$dataFilm->foto}}" class="form-control" placeholder="Tambahkan Poster Film">
						</div>
						<button type="submit" class="btn btn-primary">Update</button>
						<a href="/film" class="btn btn-warning">Back</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
