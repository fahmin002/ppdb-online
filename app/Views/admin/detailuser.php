<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>

<style>
    body {
        background-color: #f8f9fa;
    }
    
    .detail-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        max-width: 700px;
        margin: 0 auto;
        overflow: hidden;
    }
    
    .card-content {
        display: flex;
        padding: 20px;
    }
    
    .photo-container {
        width: 120px;
        margin-right: 20px;
    }
    
    .user-photo {
        width: 100%;
        height: 150px;
        border-radius: 8px;
        object-fit: cover;
    }
    
    .info-container {
        flex-grow: 1;
    }
    
    .info-item {
        padding: 8px 0;
        border-bottom: 1px solid #eee;
    }
    
    .info-item:last-child {
        border-bottom: none;
    }
    
    .info-label {
        font-weight: 600;
        color: #555;
        width: 80px;
        display: inline-block;
    }
    
    .btn-back {
        border-radius: 25px;
        padding: 8px 25px;
    }
</style>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Detail User</h1>
    
    <!-- Tampilkan pesan error jika ada -->
    <?php if (session('error')) : ?>
        <div class="alert alert-danger">
            <?= session('error') ?>
        </div>
    <?php endif ?>
    
    <!-- Card untuk menampilkan detail user -->
    <div class="detail-card">
        <div class="card-content">
            <div class="photo-container">
                <img src="/foto_user/<?= $user['foto']; ?>" alt="<?= $user['nama_user']; ?>" class="user-photo" data-bs-toggle="tooltip" title="<?= $user['nama_user']; ?>">
            </div>
            
            <div class="info-container">
                <h5 class="mb-3">Informasi User</h5>
                
                <div class="info-item">
                    <span class="info-label">ID User:</span>
                    <span><?= esc($user['id_user']) ?></span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">Nama:</span>
                    <span><?= esc($user['nama_user']) ?></span>
                </div>
                
                <div class="info-item">
                    <span class="info-label">Email:</span>
                    <span><?= esc($user['email']) ?></span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Tombol kembali ke halaman admin -->
    <div class="mt-4 text-center">
        <a href="/admin/adduser" class="btn btn-secondary btn-back">Kembali</a>
    </div>
</div>

<?= $this->endSection(); ?>
