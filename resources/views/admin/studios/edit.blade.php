@extends('base/template')

@section('konten')
<div class="content-header row">
	<div class="content-header-left col-md-4 col-12 mb-2">
		<h3 class="content-header-title">Halaman Edit Studio</h3>
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
					<form class="form-horizontal style-form " action="/studio/{{$data->id}}/update" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Name studio</label>
                            <input type="text" name="name" id="name" value="{{$data->name}}"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Quota</label>
                            <input type="text" name="quota" id="name" value="{{$data->quota}}"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                            <input type="text" name="price" id="name" value="{{$data->price}}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/studio" class="btn btn-warning">Back</a>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection