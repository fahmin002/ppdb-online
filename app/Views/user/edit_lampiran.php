<?= $this->extend('layout/user/template'); ?>
<?= $this->section('content'); ?>
<style>
  @media screen and (max-width: 576px) {
    .daftar {
      margin-top: 1.5rem;
    }

    .edit {
      margin-top: 1rem;
    }
  }

  @media screen and (max-width: 768px) {
    .daftar {
      margin-top: 1.5rem;
    }

    .edit {
      margin-bottom: 1rem;
    }
  }

  @media screen and (max-width: 992px) {
    .daftar {
      margin-top: 1.5rem;
    }

    .edit {
      margin-top: 1rem;
    }
  }

  .edit {
    border-radius: 20px;
    padding: 8px 25px;
  }
</style>
<div class="container mt-4">
  <h1 class="mb-4">Edit Lampiran</h1>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('error') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <?php if (isset($errors)): ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $error): ?>
        <p class="mb-0"><?= $error ?></p>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <div class="card mb-4">
    <div class="card-header bg-primary text-white">
      <i class="fas fa-file-alt me-2"></i>Manajemen Lampiran
    </div>
    <div class="card-body">
      <div class="row">
        <!-- Form Upload - Sisi Kiri -->
        <div class="col-md-6 border-end">
          <h5 class="card-title mb-3">Form Edit Lampiran</h5>
          <form action="/user/update_lampiran/<?= $lampiran['id_lampiran']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">

            <div class="mb-3">
              <label for="jenis_lampiran" class="form-label">Jenis Lampiran:</label>
              <input type="text" class="form-control" name="jenis_lampiran" id="jenis_lampiran" value="<?= $lampiran['jenis_lampiran']; ?>" required>
            </div>

            <div class="mb-3">
              <label for="lampiran" class="form-label">File Lampiran (PDF, maksimal 2MB):</label>
              <input type="file" class="form-control" name="lampiran" id="lampiran">
            </div>

            <div class="mb-3">
              <label for="keterangan" class="form-label">Keterangan:</label>
              <textarea class="form-control" name="keterangan" id="keterangan" rows="3"><?= $lampiran['keterangan']; ?></textarea>
            </div>

            <button type="submit" class="btn btn-warning">
              <i class="fas fa-save me-2"></i>Update Lampiran
            </button>
          </form>
        </div>

        <!-- Daftar Lampiran - Sisi Kanan -->
        <div class="col-md-6">
          <h5 class="card-title mb-3 daftar">Daftar Lampiran</h5>
          <?php if (!empty($lampiran)): ?>
            <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
              <table class="table table-hover table-sm">
                <thead>
                  <tr>
                    <th>Jenis Lampiran</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($lampiran as $item): ?>
                    <tr>
                      <td><?= $item['jenis_lampiran'] ?></td>
                      <td>
                        <a href="<?= base_url('uploads/lampiran/' . $item['file_lampiran']) ?>" class="btn btn-sm btn-info" target="_blank">
                          <i class="fas fa-eye me-1"></i>Lihat
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php else: ?>
            <div class="alert alert-info mb-0">
              <i class="fas fa-info-circle me-2"></i>Belum ada lampiran yang diupload.
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
