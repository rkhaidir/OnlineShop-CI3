<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Online Shop</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Beranda</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Produk
</div>

<li class="nav-item <?= $this->uri->segment(2) == "category" ? 'active' : '' ?>">
  <a class="nav-link" href="<?= base_url('admin/category') ?>">
    <i class="fas fa-fw fa-bars"></i>
    <span>Kategori</span></a>
</li>

<li class="nav-item <?= $this->uri->segment(2) == "product" ? 'active' : '' ?>">
  <a class="nav-link" href="<?= base_url('admin/product') ?>">
    <i class="fas fa-fw fa-cubes"></i>
    <span>Produk</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Order
</div>

<li class="nav-item <?= $this->uri->segment(2) == "order" ? 'active' : '' ?>">
  <a class="nav-link" href="<?= base_url('admin/order') ?>">
    <i class="fas fa-fw fa-cart-arrow-down"></i>
    <span>Order</span></a>
</li>

<hr class="sidebar-divider">

<div class="sidebar-heading">
  Pengaturan
</div>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin/slider') ?>">
    <i class="fas fa-fw fa-images"></i>
    <span>Slider</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->