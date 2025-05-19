@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <span class="alert-icon"><i class="ni ni-like-2"></i></span>
  <span class="alert-text"><strong>Success!</strong> {{  Session::get('success') }}</span>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(Session::has('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <span class="alert-icon"><i class="ni ni-like-2"></i></span>
  <span class="alert-text"><strong>Warning!</strong> {{  Session::get('warning') }}</span>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <span class="alert-icon"><i class="fa fa-exclamation-circle"></i></span>
  <span class="alert-text"><strong>Error!</strong> {{  Session::get('error') }}</span>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if($errors->has(null))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <span class="alert-icon"><i class="fa fa-exclamation-circle"></i></span>
  <span class="alert-text"><strong>Warning!</strong><br>
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </span>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
{{-- <div class="content-i">
  <div class="content-box">
    <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
  </div>
</div> --}}
