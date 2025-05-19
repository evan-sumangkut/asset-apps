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
          <div class="col text-end">
            <button class="btn btn-success btn-xs btn-modal-tambah">
              <i class="fa fa-plus-square"></i> Tambah
            </button>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ruangan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Asset</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penanggung Jawab</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @php
              $no = 1;
              @endphp
              @foreach($data as $d)
              <tr>
                <td>{{$no++;}}</td>
                <td>{{ $d->ruangan->nama }}</td>
                <td>{{ $d->kode  }}</td>
                <td>{{$d->nama}}</td>
                <td>{{$d->keterangan}}</td>
                <td>
                  @if($d->status==1)
                    <span class="badge bg-gradient-success">Bagus</span>
                  @elseif($d->status==2)
                    <span class="badge bg-gradient-warning">Rusak</span>
                  @elseif($d->status==3)
                    <span class="badge bg-gradient-danger">Dibuang</span>
                  @endif
                </td>
                <td>{{ $d->petugas->nama }}</td>
                <td>
                  <a href="{{ route('asset_aktifitas',$d->id) }}" class="btn btn-xs btn-info"><i class="fa fa-list"></i> Aktifitas</a>
                  <button class="btn btn-xs btn-warning btn-modal-edit" stateId="{{ $d->id }}" stateNama="{{ $d->nama }}" stateKeterangan="{{ $d->keterangan }}"
                    stateKode="{{$d->kode}}" statePetugasId="{{$d->petugas_id}}" stateRuanganId="{{ $d->ruangan_id }}"
                    stateTanggalBeli="{{ $d->tanggal_beli }}"><i class="fa fa-edit"></i> Edit</button>
                  @if($d->check_aktifitas())
                  <button class="btn btn-xs btn-danger btn-modal-hapus" stateId="{{ $d->id }}"><i class="fa fa-trash"></i> Hapus</button>
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
        <form action="{{ route('asset_create') }}" method="post">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Kode</label>
                  <input type="text" class="form-control" name="kode" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" required>
                </div>
              </div>
            </div>
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
                  <label>Tanggal Beli</label>
                  <input type="date" class="form-control" name="tanggal_beli" value="{{ date('Y-m-d') }}" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Lokasi Ruangan</label>
                  <select class="form-control" name="ruangan_id">
                    @foreach($ruangan as $d)
                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Penanggung Jawab</label>
                  <select class="form-control" name="petugas_id">
                    @foreach($petugas as $d)
                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                    @endforeach
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

{{-- Modal Hapus --}}
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{ route('asset_delete') }}" method="post">
        @csrf
        @method('delete')
        <input type="hidden" name="delete_id" value="" id="delete_id">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center>Apakah anda yakin ingin menghapus data ini?</center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn bg-gradient-primary">Hapus</button>
        </div>
      </form>
      </div>
  </div>
</div>

{{-- Modal Edit --}}
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{ route('asset_update') }}" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="edit_id" value="" id="edit_id">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Kode</label>
                  <input type="text" class="form-control" name="kode" id="stateKode" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" id="stateNama" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="keterangan" class="form-control" id="stateKeterangan"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Tanggal Beli</label>
                  <input type="date" class="form-control" name="tanggal_beli" id="stateTanggalBeli" value="{{ date('Y-m-d') }}" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Lokasi Ruangan</label>
                  <select class="form-control" name="ruangan_id" id="stateRuanganId">
                    @foreach($ruangan as $d)
                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Penanggung Jawab</label>
                  <select class="form-control" name="petugas_id" id="statePetugasId">
                    @foreach($petugas as $d)
                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn bg-gradient-primary">Update</button>
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

  $(".btn-modal-hapus").click(function(){
    $('#delete_id').val($(this).attr('stateId'));
    $("#modalHapus").modal('toggle');
  })

  $(".btn-modal-edit").click(function(){
    $('#edit_id').val($(this).attr('stateId'));
    $('#stateNama').val($(this).attr('stateNama'));
    $('#stateKode').val($(this).attr('stateKode'));
    $('#stateKeterangan').val($(this).attr('stateKeterangan'));
    $('#stateTanggalBeli').val($(this).attr('stateTanggalBeli'));
    $('#stateRuanganId').val($(this).attr('stateRuanganId')).change();
    $('#statePetugasId').val($(this).attr('statePetugasId')).change();
    $("#modalEdit").modal('toggle');
  })

</script>
@endsection
