<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= site_url('admin/dashboard') ?>" class="brand-link text-center">
        <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" /> -->
        <!-- <span class="brand-text font-weight-light" style="color: yellow;">Laptopku</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- Sidebar user panel (optional) -->
        <style>
            .user-panel img {
                width: 100%;
            }
        </style>
        <div class="user-panel w-100 mt-3 pb-3 mb-3 d-flex row">
            <div class="image">
                <img src="<?= base_url('assets/foto/' . $this->db->where('id_admin', $this->session->userdata('id_admin'))->get('admin')->row()->foto) ?>" class=" elevation-2" alt="User Image" />
            </div>
            <div class="info text-center w-100">
                <a href="#" class="d-block">
                    <h1> <?= $this->db->where('id_admin', $this->session->userdata('id_admin'))->get('admin')->row()->nama_admin ?>
                    </h1>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= site_url('admin/master_admin') ?>" class="nav-link <?= $menu_aktif == 'master_admin' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Master Admin
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('admin/dashboard') ?>" class="nav-link <?= $menu_aktif == 'dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-laptop"></i>
                        <p>
                            Dasboard
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link ">
                        <!-- active -->
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Data Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= site_url('admin/master_laptop') ?>" class="nav-link <?= $menu_aktif == 'master_laptop' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Laptop</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/master_kriteria') ?>" class="nav-link <?= $menu_aktif == 'master_kriteria' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Kriteria</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/master_nilai') ?>" class="nav-link <?= $menu_aktif == 'master_nilai' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Subkriteria</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/master_normalisasi') ?>" class="nav-link <?= $menu_aktif == 'master_normalisasi' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Normalisasi</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- <li class="nav-item">
                    <a
                        href="<?= site_url('admin/perhitungan_saw') ?>"
                        class="nav-link <?= $menu_aktif == 'perhitungan_saw' ? 'active' : '' ?>"
                    >
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Perhitungan saw
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="<?= site_url('admin/login/logout') ?>" class="nav-link btn btn-primary text-white<?= $menu_aktif == 'logout' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Keluar
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>