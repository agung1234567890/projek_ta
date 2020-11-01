<!-- Mobile Nav (max width 767px)-->
<div class="mobile-nav">
    <!-- Navbar Brand -->
    <div class="amado-navbar-brand">
        <a href="<?= site_url('') ?>"><img src="<?= site_url('assets/foto/logo1.png') ?>" alt=""></a>
    </div>
    <!-- Navbar Toggler -->
    <div class="amado-navbar-toggler">
        <span></span><span></span><span></span>
    </div>
</div>

<!-- Header Area Start -->
<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo">
        <a href="<?= site_url('') ?>"><img src="<?= site_url('assets/foto/laptop.png') ?>" alt=""></a>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            <li class="<?= $menu_aktif == 'home' ? 'active' : '' ?>"><a href="<?= site_url('') ?>">Home</a></li>
            <li class="<?= $menu_aktif == 'laptop' ? 'active' : '' ?>"><a href="<?= site_url('user/laptop') ?>">Laptop</a></li>
            <li class="<?= $menu_aktif == 'rekomendasi_laptop' ? 'active' : '' ?>"><a href="<?= site_url('user/rekomendasi_laptop') ?>">Rekomendasi Laptop</a></li>
            <!-- <li class="<?= $menu_aktif == 'tentang_kami' ? 'active' : '' ?>"><a href="<?= site_url('user/tentang_kami') ?>">Tentang Kami</a></li> -->
            <li class=""><a href="<?= base_url('admin/login'); ?>">Sing In</a></li>
        </ul>
    </nav>
    <!-- Button Group -->
    <!-- <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Discount%</a>
                <a href="#" class="btn amado-btn active">New this week</a>
            </div> -->
    <!-- Cart Menu -->
    <div class="cart-fav-search mb-100">
        <!-- <a href="cart.html" class="cart-nav"><img src="<?= site_url('assets/user/') ?>img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="<?= site_url('assets/user/') ?>img/core-img/favorites.png" alt=""> Favourite</a> -->
        <!-- <a href="#" class="search-nav">
            <img src="<?= site_url('assets/user/') ?>img/core-img/search.png" alt="">
            Search
        </a> -->
    </div>
    <!-- Social Button -->
    <!-- <div class="social-info d-flex justify-content-between">
        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    </div> -->
</header>
<!-- Header Area End -->