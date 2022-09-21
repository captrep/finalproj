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
        <li class="nav-item dropdown {{request()->is('santri') || request()->is('santri/list') || request()->is('santri/tambah') ? 'active' : ''}}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Santri</span></a>
          <ul class="dropdown-menu">
            <li class="{{request()->is('santri/tambah') ? 'active' : ''}}"><a class="nav-link" href="{{route('create.santri')}}">Tambah Data Santri</a></li>
            <li class="{{request()->is('santri/list') ? 'active' : ''}}"><a class="nav-link" href="{{route('show.santri')}}">Lihat Data Santri</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown {{request()->is('kriteria') || request()->is('kriteria/list') || request()->is('kriteria/tambah') ? 'active' : ''}}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Kriteria</span></a>
          <ul class="dropdown-menu">
            <li class="{{request()->is('kriteria/tambah') ? 'active' : ''}}"><a class="nav-link" href="{{route('create.criteria')}}">Tambah Data kriteria</a></li>
            <li class="{{request()->is('kriteria') ? 'active' : ''}}"><a class="nav-link" href="{{route('create.fuzzy')}}">Tambah Nilai Fuzzy</a></li>
            <li class="{{request()->is('kriteria/list') ? 'active' : ''}}"><a class="nav-link" href="{{route('show.criteria')}}">Lihat Data</a></li>
          </ul>
        </li>
    </ul>
    {{-- <ul class="sidebar-menu">
      <li class="menu-header">RESULT</li>
      <li class="nav-item dropdown {{request()->is('penilaian') ? 'active' : ''}}">
        <a href="" class="nav-link"><i class="fas fa-fire"></i><span>Penilaian</span></a>
      </li>
      <li class="nav-item dropdown {{request()->is('') ? 'active' : ''}}">
        <a href="" class="nav-link"><i class="fas fa-fire"></i><span>Hasil</span></a>
      </li>
    </ul> --}}
    </aside>
  </div>
  @endsection