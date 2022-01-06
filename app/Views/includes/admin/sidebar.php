<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <li class="nav-item active">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= route_to('admin') ?>">
            <div class="sidebar-brand-text mx-3">
                <i class="fas fa-hand-lizard"></i> 
                <span>Tokekpedia</span>
            </div>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= route_to('/') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
    </li>
    
    <li class="nav-item active">
        <a class="nav-link" href="<?= route_to('toko') ?>">
            <i class="fas fa-fw fa-shopping-bag"></i>
            <span>Data Produk</span></a>
    </li>
    
    <li class="nav-item active">
        <a class="nav-link" href="<?= route_to('file') ?>">
            <i class="fas fa-fw fa-file"></i>
            <span>Data Penjualan</span></a>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->