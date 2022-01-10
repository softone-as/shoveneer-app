<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="<?= route_to('/') ?>">
                <span>Home</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?= route_to('toko') ?>">
                <span>Data Produk</span></a>
        </li>
    </ul>
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav align-items-center ml-auto">
        <?php if(session()->get('logged_in')) { ?>
        
        <?php }else { ?>
            <li>
                <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"> -->
                <a href="<?= route_to('toko/cart')?>">
                    <i class="fa fa-shopping-cart"></i>
                </a>
                        
                <!-- </button> -->
            </li>
        <?php } ?> 
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle"
                    src="<?php echo base_url('vendor-sb/img/undraw_profile.svg '); ?>">
            </a>
            <!-- Dropdown - User Information -->
            <?php if(session()->get('logged_in')) { ?>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= route_to('logout') ?>">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
            <?php }else { ?>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= route_to('login') ?>">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Login
                </a>
            </div>
            <?php } ?>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->