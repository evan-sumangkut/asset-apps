@extends('_layouts.backoffice')

@section('content')
<div class="row mt-4">
  <div class="col-lg-12 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100">
      <div class="card-header">
        <a href="{{ route('ruangan') }}" class="btn btn-xs btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
      </div>
      <div class="card-header pb-0 pt-3 bg-transparent">
        <div class="row">
          <div class="col">
            <h6 class="text-capitalize">{{ Request::segment(1) }}</h6>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Ruangan</label><br>&nbsp;
              {{$data->nama}}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Qr Code</label><br>
              <img src="{{asset($qrcode)}}" style="width:20%"/>
              <br /><br />
              <a class="btn btn-info btn-xs" download="{{str_slug($data->nama)}}" href="{{asset($qrcode)}}" ><i class="fa fa-download"></i> Download Image</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection