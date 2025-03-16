<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <img src="/img/logo.png" alt="Logo" width="50" height="50">  
    <a class="navbar-brand display-6 display-md-3" href="#">PPDB SMP PGRI 1 Puring</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-3 mb-md-0">
        <li class="nav-item">
          <a class="nav-link <?= ($page == 'home') ? 'active' : '' ?>" href="/" id="">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($page == 'tentang') ? 'active' : '' ?>" href="/tentang">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($page == 'prestasi') ? 'active' : '' ?>" href="/prestasi">Prestasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($page == 'galeri') ? 'active' : '' ?>" href="/galeri">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($page == 'jadwal') ? 'active' : '' ?>" href="/jadwal">PPDB 2025</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($page == 'kontak') ? 'active' : '' ?>" href="/kontak">Kontak</a>
        </li>
        <?php if (session()->has('logged_in') && session('logged_in')): ?>
          <li class="nav-item">
            <a class="nav-link <?= ($page == 'dashboard') ? 'active' : '' ?>" href="/dashboard">Dashboard</a>
          </li>
        <?php endif; ?>
      </ul>
      <?php if (session()->has('logged_in') && session('logged_in')): ?>
        <a href="/logout" class="btn btn-danger ms-lg-3">Logout</a>
      <?php else: ?>
        <a href="/login" class="btn btn-primary ms-lg-3">Login</a>
      <?php endif; ?>

    </div>
  </div>
</nav>