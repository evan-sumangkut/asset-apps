@extends('_layouts.backoffice')

@section('content')
<div class="row mt-4">
  <div class="col-lg-12 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100">
      <div class="card-header">
        <a href="{{ route('asset') }}" class="btn btn-xs btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
      </div>
      <div class="card-header pb-0 pt-3 bg-transparent">
        <div class="row">
          <div class="col">
            <h6 class="text-capitalize">{{ Request::segment(1) }}</h6>
          </div>
          <div class="col text-end">
            <button class="btn btn-success btn-xs btn-modal-tambah">
              <i class="fa fa-plus-square"></i> Tambah Aktifitas
            </button>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <p class="text-uppercase text-sm">Asset Information</p>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Ruangan</label><br>&nbsp;
              {{$data->ruangan->nama}}
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Penanggung Jawab</label><br>&nbsp;
              {{$data->petugas->nama}}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Kode</label><br>&nbsp;
              {{$data->kode}}
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Status</label><br>&nbsp;
              @if($data->status==1)
                <span class="badge bg-gradient-success">Bagus</span>
              @elseif($data->status==2)
                <span class="badge bg-gradient-warning">Rusak</span>
              @elseif($data->status==3)
                <span class="badge bg-gradient-danger">Dibuang</span>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nama Aset</label><br>&nbsp;
              {{$data->nama}}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Keterangan</label><br>&nbsp;
              {{$data->keterangan}}
            </div>
          </div>
        </div>
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
              @foreach($aktifitas as $d)
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

{{-- Modal Tambah --}}
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{ route('asset_aktifitas_create') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Aktifitas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="keterangan" class="form-control"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" class="form-control" name="tanggal" value="{{ date('Y-m-d') }}" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                    <option value="1">Bagus</option>
                    <option value="2">Rusak</option>
                    <option value="3">Dibuang</option>
                  </select>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn bg-gradient-primary">Tambah</button>
        </div>
      </form>
      </div>
  </div>
</div>

@endsection

@section('javascript')
<script>
  $(".btn-modal-tambah").click(function(){
    $("#modalTambah").modal('toggle');
  })


</script>
@endsection
