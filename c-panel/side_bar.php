<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MARKETPLACE KERAJINAN TANGAN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="?p">
            <i class="fas fa-fw fa-home"></i>
            <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php if ($level == 'Admin') : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Data
        </div>
        <!-- nav item - user -->
        <li class="nav-item">
            <a class="nav-link" href="?p=user_data">
                <i class="fas fa-fw fa-user"></i>
                <span>Data User</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?p=toko_data">
                <i class="fas fa-fw fa-store"></i>
                <span>Data Toko</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?p=kategori_data">
                <i class="fas fa-fw fa-list"></i>
                <span>Data Kategori Produk</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?p=produk_data">
                <i class="fas fa-fw fa-boxes"></i>
                <span>Data Produk</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?p=kurir_data">
                <i class="fas fa-fw fa-truck"></i>
                <span>Data Kurir</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?p=pemesanan_data">
                <i class="fas fa-fw fa-people-carry"></i>
                <span>Data Pemesanan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?p=pembatalan_data">
                <i class="fas fa-fw fa-times"></i>
                <span>Data Pembatalan</span></a>
        </li>

    <?php elseif ($level == 'Pimpinan') : ?>


    <?php endif; ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>