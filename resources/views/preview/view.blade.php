<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('template/argon/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{ asset('template/argon/assets/img/favicon.png')}}">
  <title>
    {{ config('app.name', 'Laravel') }}
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('template/argon/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{ asset('template/argon/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('template/argon/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('template/argon/assets/css/argon-dashboard.css?v=2.0.2')}}" rel="stylesheet" />
</head>

<body class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../pages/dashboard.html">
        Asset Apps
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-10 col-lg-10 col-md-10 mx-auto">
          <div class="card z-index-0">
            @if(Auth::user())
            <div class="card-header">
              <a href="{{ route('ruangan') }}" class="btn btn-xs btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
            </div>
            @endif
            <div class="card-header text-center pt-4">
              <h5>Ruangan {{ $ruangan->nama }}</h5>
            </div>
            <div class="card-body">
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
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ asset('template/argon/assets/js/core/popper.min.js')}}"></script>
  <script src="{{ asset('template/argon/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{ asset('template/argon/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{ asset('template/argon/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('template/argon/assets/js/argon-dashboard.min.js?v=2.0.2')}}"></script>
</body>

</html>