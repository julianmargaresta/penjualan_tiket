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
      <div class="card-header collapse show">
        <h4 class="card-title">Detail Order</h4>
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

        <div class="table-responsive">
          <div class="form-group">
            <table class="table table-striped">
              <thead>
                <tr></tr>
              </thead>
              <tbody>
                <tr>
                  <th>Nama Pemesan</th>
                  <th>{{ $dataOrder->user->name }}</th>
                </tr>
                <tr>
                  <th>Film</th>
                  <th>{{ $dataOrder->films->nama }}</th>
                </tr>
                <tr>
                  <th>Genre Film</th>
                  <th>{{ $dataOrder->films->genres->name }}</th>
                </tr>
                <tr>
                  <th>Studio</th>
                  <th>{{ $dataOrder->films->studios->name }}</th>
                </tr>
                <tr>
                  <th>Harga Satuan</th>
                  <th>Rp{{ number_format($dataOrder->films->studios->price, 2, ",", ".") }}</th>
                </tr>
                </tr>
                  <th>Kuota Beli</th>
                  <th>{{ $dataOrder->qty }}</th>
                </tr>
                <tr>
                  <th>Total Harga</th>
                  <th>Rp{{ number_format($dataOrder->total_price, 2, ",", ".") }}</th>
                </tr>
              </tbody>
            </table>
            <div class="col-sm-10">
              <a href="{{ route('order.index') }}" class="btn btn-warning">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
