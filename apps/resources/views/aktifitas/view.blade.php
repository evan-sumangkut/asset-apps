@extends('_layouts.backoffice')

@section('content')
<div class="row mt-4">
  <div class="col-lg-12 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100">
      <div class="card-header pb-0 pt-3 bg-transparent">
        <div class="row">
          <div class="col">
            <h6 class="text-capitalize">{{ Request::segment(1) }}</h6>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Asset</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
              </tr>
            </thead>
            <tbody>
              @php
              $no = 1;
              @endphp
              @foreach($data as $d)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$d->asset->nama}}</td>
                <td>{{$d->keterangan}}</td>
                <td>{{$d->tanggal}}</td>
                <td>
                  @if($d->status==1)
                    <span class="badge bg-gradient-success">Bagus</span>
                  @elseif($d->status==2)
                    <span class="badge bg-gradient-warning">Rusak</span>
                  @elseif($d->status==3)
                    <span class="badge bg-gradient-danger">Dibuang</span>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')
@endsection
