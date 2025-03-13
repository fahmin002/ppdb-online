<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">PPDB SEKOLAH</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link <?= ($page == 'beranda') ? 'active' : '' ?>" href="/" id="">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($page == 'tentang') ? 'active' : '' ?>" href="/user/tentang">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($page == 'kegiatan') ? 'active' : '' ?>" href="/user/kegiatan">Ekstrakurikuler</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($page == 'galeri') ? 'active' : '' ?>" href="/user/galeri">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($page == 'jadwal') ? 'active' : '' ?>" href="/user/jadwal">PPDB 2025</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($page == 'kontak') ? 'active' : '' ?>" href="/user/kontak">Kontak</a>
        </li>
      </ul>
      <?php if (session()->has('logged_in') && session('logged_in')): ?>
        <a href="/logout" class="btn btn-danger ms-lg-3">Logout</a>
      <?php else: ?>
        <a href="/login" class="btn btn-primary ms-lg-3">Login</a>
      <?php endif; ?>

    </div>
  </div>
</nav>