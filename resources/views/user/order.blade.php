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

			<div class="col-sm-12">
				<div class="" id="alert">
				</div>
			</div>

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
					<form class="form-horizontal style-form " id="formOrder">
						@csrf
						<div class="form-group">
								<input type="hidden" name="id" value={{ Auth::user()->id }} class="form-control">
							<label class="control-label">Film</label>
							<select class="form-control" name="film">
								<option value="">--Pilih Film--</option>
								@foreach($dataFilm as $item)
									<option value="{{$item->id}}">{{$item->nama}} - Rp {{ number_format($item->studios->price, 2, ",", ".") }} - {{ $item->studios->quota - $orderNow->where('film_id', $item->id)->sum('qty') }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Quota</label>
							<input type="text" name="qty" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">Tambah</button>
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
						<th scope="col">Film</th>
						<th scope="col">Harga Satuan</th>
						<th scope="col">Kuota</th>
						<th scope="col">Total Harga</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($dataOrder as $item)
					<tr>
						<td>{{ $number++ }}</td>
						<td>{{ $item->films->nama }}</td>
						<td>Rp {{ number_format($item->films->studios->price, 2, ",", ".") }}</td>
						<td>{{ $item->qty}}</td>
						<td>Rp {{ number_format($item->total_price, 2, ",", ".") }}</td>
						<td>
							<a class="btn btn-primary btn-xs" href="{{ route('order.show', $item->id) }}">Detail</i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function () {
		$('#formOrder').on('submit',function (e) {
			//agar saat submit form tidak reload
			e.preventDefault();
			$.ajax({
				type:'POST',
				url: '	api/v1/order',
				data: $('#formOrder').serialize(),
				success: function (resp) {
					if (resp.status == 200) {
						$('#alert').html('Sukses Menambah Order');
							$('#alert').addClass('alert alert-success');
					}else{
						$('#alert').html('Order gagal dibuat');
							$('#alert').addClass('alert alert-success');
					}
				},
				error:function (request, status,error) {
					alert(error);
				}

			});
		});
	});

	$(function () {
    $.ajax({
        url: 'api/v1/film?active',
        type: 'GET',
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: data => {
            data.data.data.forEach(data => {
                $("#hasil").append(
    '<div class="col-lg-3 col-md-12">'+
        '<a href="#">'+
            '<div class="card">'+
                '<div class="card-body" style="margin-bottom: -10px!important;">'+
                    '<h4 class="card-title">'+ data.name +'</h4>'+
                    '<h6 class="card-subtitle text-muted">'+ data.genre.name +'</h6>'+
                '</div>'+
                '<img style="max-height:250px!important;"class="" src="/images/'+ data.foto +'" alt="Card image cap">'+
                '<div class="card-body">'+
                    '<p class="card-text">'+
                        '<font color="#6b6f80">'+ data.deskripsi.substr(0, 150)+'....</font>'+
                    '</p>'+
                '</div>'+
            '</div>'+
        '</a>'+
    '</div>'
            )
          })
        }
      });
  });
</script>

@endsection
