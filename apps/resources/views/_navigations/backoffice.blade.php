<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
  <ul class="navbar-nav">
    <li class="nav-item mt-3">
      <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Menu</h6>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::segment(1)=='dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::segment(1)=='asset' ? 'active' : '' }}" href="{{ route('asset') }}">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="ni ni-credit-card text-warning text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Asset</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::segment(1)=='aktifitas' ? 'active' : '' }}" href="{{ route('aktifitas') }}">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="ni ni-calendar-grid-58 text-success text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Aktifitas</span>
      </a>
    </li>
    <li class="nav-item mt-3">
      <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Master</h6>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::segment(1)=='ruangan' ? 'active' : '' }}" href="{{ route('ruangan') }}">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fa fa-home text-info text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Ruangan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::segment(1)=='petugas' ? 'active' : '' }}" href="{{ route('petugas') }}">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fa fa-users text-dark text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Petugas</span>
      </a>
    </li>
  </ul>
</div>
