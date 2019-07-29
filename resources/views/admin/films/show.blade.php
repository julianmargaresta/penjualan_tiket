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
      <div class="card-header collapse show">
        <h4 class="card-title">Detail Film</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
      </div>
        <div class="table-responsive">
          <div class="form-group">
            <table class="table table-striped">
              <thead>
                <tr></tr>
              </thead>
                <tbody>
                  <tr>
                    <th>Nama Film</th>
                    <th>{{$dataFilm->nama}}</th>
                  </tr>
                  <tr>
                    <th>Deskripsi</th>
                    <th>{{$dataFilm->deskripsi}}</th>
                  </tr>
                  </tr><tr>
                    <th>Mulai tayang</th>
                    <th>{{$dataFilm->start_at}}</th>
                  </tr>
                  <tr>
                    <th>Berakhir tayang</th>
                    <th>{{$dataFilm->end_at}}</th>
                  </tr>
                  <tr>
                    <th>Genre</th>
                    <th>{{$dataFilm->genres->name}}</th>
                  </tr>
                  <tr>
                    <th>Studio</th>
                    <th>{{$dataFilm->studios->name}}</th>
                  </tr>
                  <tr>
                    <th>Foto Product</th>
                    <td><img src="/images/{{ $dataFilm->foto }}" width="100px"></td>
                  </tr>
              </tbody>
            </table>
            <div class="col-sm-10">
              <a href="/film" class="btn btn-warning">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
