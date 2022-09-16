@section('sidebar')
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{route('dashboard')}}">PP DAMPASAN</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{route('dashboard')}}">PP DAMPASAN</a>
      </div>
      <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="nav-item dropdown {{request()->is('dashboard') ? 'active' : ''}}">
        <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
    </ul>
    <ul class="sidebar-menu">
        <li class="menu-header">CRUD</li>
        <li class="nav-item dropdown {{request()->is('kriteria') || request()->is('kriteria/tambah') ? 'active' : ''}}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Kriteria</span></a>
          <ul class="dropdown-menu">
            <li class="{{request()->is('kriteria/tambah') ? 'active' : ''}}"><a class="nav-link" href="">Tambah Data Kriteria</a></li>
            <li class="{{request()->is('kriteria/tambah/parameter') ? 'active' : ''}}"><a class="nav-link" href="">Tambah Data Parameter</a></li>
            <li class="{{request()->is('kriteria/list') ? 'active' : ''}}"><a class="nav-link" href="">Lihat Data</a></li>
          </ul>
        </li>
    </ul>
    <ul class="sidebar-menu">
      <li class="menu-header">RESULT</li>
      <li class="nav-item dropdown {{request()->is('penilaian') ? 'active' : ''}}">
        <a href="" class="nav-link"><i class="fas fa-fire"></i><span>Penilaian</span></a>
      </li>
      <li class="nav-item dropdown {{request()->is('') ? 'active' : ''}}">
        <a href="" class="nav-link"><i class="fas fa-fire"></i><span>Hasil</span></a>
      </li>
    </ul>
    </aside>
  </div>
  @endsection