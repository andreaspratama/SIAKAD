<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
      <div class="sidebar-brand-text mx-3">SIAKAD</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{route('dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    @if(auth()->user()->role == 'admin')
    <li class="nav-item">
      <a class="nav-link" href="{{route('sekolah.index')}}">
        <i class="fas fa-school"></i>
        <span>Data Sekolah</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('mapel.index')}}">
        <i class="fas fa-book-reader"></i>
        <span>Mata Pelajaran</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('ruang.index')}}">
        <i class="fas fa-users"></i>
        <span>Ruangan Kelas</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('thnakademik.index')}}">
        <i class="fas fa-users"></i>
        <span>Tahun Akademik</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="/siswa">
        <i class="fas fa-users"></i>
        <span>Siswa</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="/guru">
        <i class="fas fa-user"></i>
        <span>Guru</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/user">
        <i class="fas fa-user"></i>
        <span>User</span></a>
    </li>
    @endif
    @if(auth()->user()->role == 'admin')
    <li class="nav-item">
      <a class="nav-link" href="/jadwalmapel">
        <i class="fas fa-book-reader"></i>
        <span>Jadwal Pelajaran</span></a>
    </li>
    @endif

    @if(auth()->user()->role == 'siswa')
    <li class="nav-item">
      <a class="nav-link" href="/nilai">
        <i class="fas fa-book-reader"></i>
        <span>Nilai</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/jadwal">
        <i class="fas fa-book-reader"></i>
        <span>Jadwal</span></a>
    </li>
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
  <!-- End of Sidebar -->