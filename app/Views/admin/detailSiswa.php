<?= $this->extend('layout/admin/template'); ?>
<?= $this->section('content'); ?>
<style>
    .profile-container {
        max-width: 1000px;
        margin: 2rem auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .profile-img {
        position: relative;
        padding-top: 1rem;
    }

    .profile-img img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        border: 3px solid #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .profile-head h5 {
        color: #333;
        font-weight: 600;
    }

    .profile-head h6 {
        color: #666;
    }

    /* Style untuk memposisikan tombol edit di pojok kanan atas */
    .profile-container {
        position: relative;
    }

    .profile-edit-btn {
        position: absolute;
        top: 10px;
        right: 30px;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        text-decoration: none;
    }

    .profile-edit-btn:hover {
        background-color: #0056b3;
    }


    .profile-info {
        padding: 20px;
        background: #f8f9fa;
        border-radius: 8px;
        margin-top: 1rem;
    }

    .profile-info p {
        margin-bottom: 0.5rem;
        color: #666;
    }

    .nav-tabs {
        border-bottom: 2px solid #dee2e6;
    }

    .nav-tabs .nav-link {
        border: none;
        color: #666;
        font-weight: 500;
    }

    .nav-tabs .nav-link.active {
        border: none;
        border-bottom: 2px solid #0d6efd;
        color: #0d6efd;
    }

    .status-badge {
        padding: 5px 15px;
        border-radius: 20px;
        font-weight: 500;
    }

    .info-label {
        font-weight: 500;
        color: #333;
    }

    @media (max-width: 768px) {
        .profile-container {
            margin: 1rem;
        }

        .profile-img img {
            width: 150px;
            height: 150px;
            margin: 0 auto;
            display: block;
        }

        .nama {
            margin-top: 1.5rem;
        }
    }
</style>
<div class="p-4">
    <div class="row">
        <!-- Foto Profil -->
        <div class="col-md-4 text-center">
            <div class="profile-img">
                <img src="/foto-siswa/<?= $siswa['foto']; ?>" alt="Foto Siswa" />
            </div>
            <div class="profile-info mt-3">
                <p><strong>Tanggal Pendaftaran:</strong><br><?= $siswa['tgl_pendaftaran'] ?? '-' ?></p>
                <p><strong>Jenis Kelamin:</strong><br><?= ($siswa['jenkel'] == 'L') ? 'Laki-laki' : 'Perempuan' ?></p>
                <p><strong>Tahun:</strong><br><?= $siswa['tahun'] ?? '-' ?></p>
            </div>
        </div>

        <!-- Informasi Utama -->
        <div class="col-md-8">
            <div class="profile-head">
                <h5 class="mb-3 nama"><?= $siswa['nama_lengkap'] ?? 'Nama Siswa' ?></h5>
                <h6 class="mb-2">NISN: <?= $siswa['nisn'] ?? 'NISN' ?></h6>
                <p class="mb-4">
                    Status:
                    <?php if ($siswa['status_ppdb'] == 'Diterima'): ?>
                        <span class="status-badge bg-success text-white">Diterima</span>
                    <?php elseif ($siswa['status_ppdb'] == 'Ditolak'): ?>
                        <span class="status-badge bg-danger text-white">Ditolak</span>
                    <?php else: ?>
                        <span class="status-badge bg-warning">Proses</span>
                    <?php endif; ?>
                </p>

                <!-- Tab Navigation -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#about">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#additional">Informasi Tambahan</a>
                    </li>

                </ul>

                <!-- Tab Content -->
                <div class="tab-content mt-4">
                    <!-- Tab Profil -->
                    <div id="about" class="tab-pane active">
                        <div class="row mb-3">
                            <div class="col-md-4 info-label">Nama Lengkap</div>
                            <div class="col-md-8"><?= $siswa['nama_lengkap'] ?? '-' ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 info-label">NISN</div>
                            <div class="col-md-8"><?= $siswa['nisn'] ?? '-' ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 info-label">Tanggal Lahir</div>
                            <div class="col-md-8"><?= $siswa['tgl_lahir'] ?? '-' ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 info-label">Alamat</div>
                            <div class="col-md-8"><?= $siswa['alamat'] ?? '-' ?></div>
                        </div>
                    </div>

                    <!-- Tab Informasi Tambahan -->
                    <div id="additional" class="tab-pane fade">
                        <div class="row mb-3">
                            <div class="col-md-4 info-label">Sekolah Asal</div>
                            <div class="col-md-8"><?= $siswa['nama_sekolah_asal'] ?? '-' ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 info-label">Tahun Lulus</div>
                            <div class="col-md-8"><?= $siswa['tahun_lulus'] ?? '-' ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 info-label">No. Ijazah</div>
                            <div class="col-md-8"><?= $siswa['no_ijazah'] ?? '-' ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 info-label">No. SKHUN</div>
                            <div class="col-md-8"><?= $siswa['no_skhun'] ?? '-' ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button Edit Profile -->
    <a href="/admin/lampiran/<?= $siswa['id_siswa']; ?>" class="profile-edit-btn mt-4">Lihat Lampiran</a>
</div>
<?= $this->endSection(); ?>