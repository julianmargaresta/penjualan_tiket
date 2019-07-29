@extends('base/template')

@section('konten')
<div class="content-header row">
	<div class="content-header-left col-md-6 col-12 mb-2">
		<h3 class="content-header-title">Halaman Edit Data Pengguna  </h3>
	</div>
</div>
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Pengguna</h4>
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
					<form class="form-horizontal style-form " action="/user/{{ $data->id }}/update" method="post">
						@csrf
						<div class="form-group">
              <div class="row">
                <div class="col-sm-6">
                  <label class="control-label">Nama User :</label>
  								<input type="text" name="name" value="{{ $data->name }}" id="name" class="form-control">
  								<br>
                </div>

                <div class="col-sm-6">
                  <label class="control-label">Email :</label>
  								<input type="text" name="email" value="{{ $data->email }}" id="name" class="form-control">
  								<br>
                </div>

                <div class="col-sm-6">
                  <label class="control-label">Nomor Telepon :</label>
  								<input type="text" name="phone" value="{{ $data->phone }}" id="name" class="form-control">
  								<br>
                </div>

                <div class="col-sm-6">
                  <label class="control-label">Role Pengguna :</label>
  								<select name="role" id="role" class="form-control">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                  </select>
  								<br>
                </div>
              </div>
								<button type="submit" class="btn btn-warning">Update</button>
                <a href="/user" class="btn btn-primary">Back</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $('#role').val("{{$data->role}}");
</script>
@endsection
