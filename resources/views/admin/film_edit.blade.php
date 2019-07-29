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

			<div class="card-content collapse show">

				<div class="card-body ">
					<form role="form" class="form-horizontal style-form" action="/film/{{$dataFilm->id}}/update" method="post" enctype="multipart/form-data">

						@csrf
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Name Film</label>
							<div class="col-sm-10">
								<input type="text" name="nama" id="nama" value="{{$dataFilm->nama}}" class="form-control">
								<br>
							</div>
							<label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
							<div class="col-sm-10">
								<input type="text" name="deskripsi" value="{{$dataFilm->deskripsi}}" class="form-control">
								<br>
							</div>
							<label class="col-sm-2 col-sm-2 control-label">Genre</label>
							<div class="col-sm-10">
								<select class="form-control" name="genre_id">
									<option value="null">--Pilih Genre--</option>
									@foreach($dataGenre as $item)
									<option value="{{ $item->id }}" {{(  $dataFilm->genre_id == $item->id) ? 'selected' :''}}>{{ $item->name }}</option>
									@endforeach
								</select>
							</div>
							<br>
							<label class="col-sm-2 col-sm-2 control-label">Mulai Tayang</label>
							<div class="col-sm-10">
								<input type="date" name="start_at" value="{{$dataFilm->start_at}}" class="form-control">
								<br>
							</div>
							<label class="col-sm-2 col-sm-2 control-label">Berakhir Tayang</label>
							<div class="col-sm-10">
								<input type="date" name="end_at" value="{{$dataFilm->end_at}}" class="form-control">
								<br>
							</div>
							<label class="col-sm-2 col-sm-2 control-label">Studio</label>
							<div class="col-sm-10">

								<select class="form-control" name="studio_id">
									<option value="null">--Pilih Studio--</option>
									@foreach($dataStudio as $item)
									<option value="{{ $item->id }}" {{(  $dataFilm->studio_id == $item->id) ? 'selected' :''}}>{{ $item->name }}</option>
									@endforeach
								</select>

							</div>
							<br>
							<label class="col-sm-2 col-sm-2 control-label">Foto</label>
							<div class="col-sm-10">
								<td>
									<br>
									<img src="/images/{{ $dataFilm->foto }}" style="width: 200px;">
									<br>
									<br>
									<input type="file" name="foto" value="{{$dataFilm->foto}}" class="form-control" placeholder="Tambahkan Poster Film">

								</td>
								<br>

							</div>

							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary">Update</button>
								<a href="/film" class="btn btn-warning">Back</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
