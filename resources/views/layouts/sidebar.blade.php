<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #e64543">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-text">
            SIRI 
            <br>
            <span style="font-style: italic;font-size: 12px;text-transform: capitalize;">Sistem Informasi <br>Rumah Sakit</span>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Dashboard
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pasien
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('data-pasien*') ? 'active' : '' }}">
        <a class="nav-link" href="/data-pasien">
            <i class="fas fa-user-injured"></i>
            <span>Data Pasien</span></a>
    </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

    {{-- Heading --}}
    <div class="sidebar-heading">
        Dokter
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('data-dokter*') ? 'active' : '' }}">
        <a class="nav-link" href="/data-dokter">
            <i class="fas fa-user-md"></i>
            <span>Data Dokter</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Informasi Medis
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ Request::is('rekam-medis*') ? 'active' : '' }}">
        <a class="nav-link" href="/rekam-medis">
            <i class="fas fa-poll-h"></i>
            <span>Data Rekam Medis</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->