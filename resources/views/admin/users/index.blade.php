@extends('base/template')
@section('konten')

<div class="content-header row">
	<div class="content-header-left col-md-4 col-12 mb-2">
		<h3 class="content-header-title">Halaman Data Pengguna  </h3>
	</div>
</div>
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Tambah Pengguna</h4>
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
					<form class="form-horizontal style-form " action="/user/store" method="post">
						@csrf
						<div class="form-group">
              <div class="row">
                <div class="col-sm-6">
                  <label class="control-label">Nama User :</label>
  								<input type="text" name="name" id="name" class="form-control">
  								<br>
                </div>

                <div class="col-sm-6">
                  <label class="control-label">Email :</label>
  								<input type="text" name="email" id="name" class="form-control">
  								<br>
                </div>

                <div class="col-sm-6">
                  <label class="control-label">Nomor Telepon :</label>
  								<input type="text" name="phone" id="name" class="form-control">
  								<br>
                </div>

                <div class="col-sm-6">
                  <label class="control-label">Role Pengguna :</label>
  								<select name="role" class="form-control">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                  </select>
  								<br>
                </div>

                <div class="col-sm-12">
                  <label class="control-label">Password :</label>
  								<input type="password" name="password" id="name" class="form-control">
  								<br>
                </div>
              </div>
								<button type="submit" class="btn btn-primary">Tambah</button>
						</div>
					</form>
				</div>
			</div>
		</div>

    <div class="card">
      <div class="card-header collapse show">
        <h4 class="card-title">Tabel Pengguna</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
      </div>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Role</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1?>
            @foreach($data as $item)
            <tr>
              <td scope="row">{{ $no }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->phone }}</td>
              <td>{{ $item->role }}</td>
              <td>
                <a  class="btn btn-warning" href="/user/{{$item->id}}/edit">Edit</i></a>
                <a  class="btn btn-danger" href="/user/{{$item->id}}/delete">Delete</i></a>
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
