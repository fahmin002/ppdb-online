<?= $this->extend('layout/admin/template'); ?>
<?= $this->section('content'); ?>
<main>
  <div class="container-fluid px-4">

    <!-- Custom CSS -->
    <style>
      .table-container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        padding: 20px;
        margin-top: 20px;
      }

      .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #0d6efd !important;
        color: white !important;
        border: none !important;
      }

      .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #e9ecef !important;
        border: none !important;
      }

      .dataTables_wrapper .dataTables_filter input {
        border-radius: 5px;
        padding: 5px 10px;
        border: 1px solid #ced4da;
      }

      .user-photo {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        transition: transform 0.3s;
      }

      .user-photo:hover {
        transform: scale(1.8);
        z-index: 100;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      }

      .btn-action {
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.3s;
      }

      .btn-action:hover {
        transform: translateY(-2px);
      }

      .password-cell {
        font-family: monospace;
        max-width: 150px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        cursor: pointer;
      }

      .password-masked {
        letter-spacing: 1px;
      }

      .bg-title {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
        border-left: 5px solid #0d6efd;
      }

      .empty-state {
        text-align: center;
        padding: 30px;
        color: #6c757d;
      }
    </style>


    <div class="container py-5">
      <div class="bg-title">
        <h2 class="mb-0">Manajemen User</h2>
      </div>

      <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJobModal">
              <i class="fas fa-plus-circle me-2"></i>Tambah User
            </button>
          </div>
          <div>
            <button class="btn btn-outline-secondary me-2">
              <i class="fas fa-file-export me-2"></i>Export
            </button>
            <button class="btn btn-outline-secondary">
              <i class="fas fa-print me-2"></i>Print
            </button>
          </div>
        </div>

        <table id="datatablesSimple" class="table table-hover align-middle">
          <thead>
            <tr>
              <th width="60" class="text-center">No</th>
              <th>Nama User</th>
              <th>Email</th>
              <th>Password</th>
              <th class="text-center">Foto</th>
              <th width="120" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            if (!empty($addusermodel)):
              foreach ($addusermodel as $d) : ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td>
                    <div class="fw-semibold"><?= $d['nama_user']; ?></div>
                    <div class="small text-muted">User ID: <?= $d['id_user']; ?></div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <i class="fas fa-envelope text-muted me-2"></i>
                      <a href="mailto:<?= $d['email']; ?>" class="text-decoration-none"><?= $d['email']; ?></a>
                    </div>
                  </td>
                  <td>
                    <div class="password-cell password-masked" data-password="<?= htmlspecialchars($d['password']); ?>" title="Klik untuk melihat/sembunyikan password">
                      ••••••••••
                    </div>
                  </td>
                  <td class="text-center">
                    <img src="/foto_user/<?= $d['foto']; ?>" alt="<?= $d['nama_user']; ?>" class="user-photo" data-bs-toggle="tooltip" title="<?= $d['nama_user']; ?>">
                  </td>
                  <td>
                    <div class="d-flex justify-content-center gap-2">
                      <button onclick="editUser(
            <?= $d['id_user']; ?>,
            '<?= esc($d['nama_user']); ?>',
            '<?= esc($d['email']); ?>',
            '<?= esc($d['foto']); ?>'
        )" class="btn btn-warning btn-action" data-bs-toggle="tooltip" title="Edit User">
                        <i class="fa fa-pencil"></i>
                      </button>

                      <a href="/admin/detailuser/<?= $d['id_user']; ?>" class="btn btn-sm btn-success btn-action" data-bs-toggle="tooltip" title="Details">
                        <i class="fa fa-info-circle me-1"></i>
                      </a>

                      <form action="/user/delete/<?= $d['id_user']; ?>" method="post" class="d-inline delete-form">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-danger btn-action delete-btn" data-bs-toggle="tooltip" title="Hapus User">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              <?php endforeach;
            else: ?>
              <tr>
                <td colspan="6" class="empty-state">
                  <div class="my-5">
                    <i class="fas fa-users-slash fa-3x mb-3 text-muted"></i>
                    <h5>Belum ada data user</h5>
                    <p>Silakan tambahkan user baru dengan mengklik tombol "Tambah User"</p>
                  </div>
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Konfirmasi Hapus Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title">Konfirmasi Hapus</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center py-4">
            <i class="fas fa-exclamation-triangle text-warning fa-3x mb-3"></i>
            <h5>Apakah Anda yakin ingin menghapus user ini?</h5>
            <p class="text-muted">Tindakan ini tidak dapat dibatalkan dan semua data terkait user ini akan dihapus secara permanen.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="button" id="confirmDelete" class="btn btn-danger">Ya, Hapus</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Add Job Modal -->
<div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="addJobModalLabel">
          <i class="fa-solid fa-user me-2"></i>Tambah User
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="<?= base_url('admin/adduser/store'); ?>" enctype="multipart/form-data">
        <?= csrf_field() ?> <!-- CSRF Token -->
        <div class="modal-body d-flex">
          <!-- Kolom Kiri untuk Form Input -->
          <div class="flex-grow-1 me-3">
            <!-- Pesan Error -->
            <?php if (session('errors')) : ?>
              <div class="alert alert-danger">
                <ul>
                  <?php foreach (session('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                  <?php endforeach ?>
                </ul>
              </div>
            <?php endif; ?>

            <!-- Form Input -->
            <div class="mb-3">
              <label for="nama_user" class="form-label">Nama User</label>
              <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= old('nama_user') ?>" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
              <label for="foto" class="form-label">Foto</label>
              <input type="file" class="form-control" id="foto" name="foto" accept="image/*" onchange="previewImage(event)">
            </div>
          </div>

          <!-- Kolom Kanan untuk Preview Gambar -->
          <div class="flex-shrink-0">
            <img id="imagePreview" src="#" alt="Preview Foto" class="img-fluid rounded" style="display: none; max-width: 150px;">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambah User</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');

    if (input.files && input.files[0]) {
      const reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block'; // Menampilkan gambar
      }

      reader.readAsDataURL(input.files[0]); // Membaca file sebagai Data URL
    } else {
      preview.src = '#'; // Reset jika tidak ada file
      preview.style.display = 'none'; // Sembunyikan gambar
    }
  }
</script>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title" id="editModalLabel"><i class="fas fa-edit me-2"></i>Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?> <!-- CSRF Token -->
        <input type="hidden" name="_method" value="PUT"> <!-- Method Spoofing untuk Update -->
        <div class="modal-body d-flex">
          <input type="hidden" name="id_user" id="edit_id">
          <!-- Kolom Kiri untuk Form Input -->
          <div class="flex-grow-1 me-3">
            <div class="mb-3">
              <label for="edit_nama_user" class="form-label">Nama User</label>
              <input type="text" class="form-control" id="edit_nama_user" name="nama_user" required>
            </div>
            <div class="mb-3">
              <label for="edit_email" class="form-label">Email</label>
              <input type="email" class="form-control" id="edit_email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="edit_password" class="form-label">Password</label>
              <input type="password" class="form-control" id="edit_password" name="password">
              <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
            </div>
            <div class="mb-3">
              <label for="edit_foto" class="form-label">Foto</label>
              <input type="file" class="form-control" id="edit_foto" name="foto" accept="image/*" onchange="previewEditImage(event)">
              <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
            </div>
          </div>

          <!-- Kolom Kanan untuk Preview Gambar -->
          <div class="flex-shrink-0">
            <img id="editImagePreview" src="#" alt="Preview Foto" class="img-fluid rounded" style="display: none; max-width: 150px;">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-warning">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function editUser(id_user, nama_user, email, foto) {
    // Isi nilai ke modal
    document.getElementById('edit_id').value = id_user;
    document.getElementById('edit_nama_user').value = nama_user;
    document.getElementById('edit_email').value = email;

    // Update form action dengan id_user yang sesuai
    document.querySelector('#editModal form').action = `/User/update/${id_user}`;

    // Tampilkan foto jika ada
    const imagePreview = document.getElementById('editImagePreview');
    if (foto) {
      imagePreview.src = foto; // Ganti dengan URL yang sesuai
      imagePreview.style.display = 'block'; // Menampilkan gambar
    } else {
      imagePreview.style.display = 'none'; // Sembunyikan jika tidak ada
    }

    // Tampilkan modal
    new bootstrap.Modal(document.getElementById('editModal')).show();
  }

  function previewEditImage(event) {
    const input = event.target;
    const preview = document.getElementById('editImagePreview');

    if (input.files && input.files[0]) {
      const reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block'; // Menampilkan gambar
      }

      reader.readAsDataURL(input.files[0]); // Membaca file sebagai Data URL
    } else {
      preview.src = '#'; // Reset jika tidak ada file
      preview.style.display = 'none'; // Sembunyikan gambar
    }
  }
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Inisialisasi tooltip Bootstrap 5
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Menampilkan alert SweetAlert jika ada flashdata sukses atau error dari session
    <?php if (session()->getFlashdata('success')) : ?>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "<?= session()->getFlashdata('success'); ?>",
        showConfirmButton: false,
        timer: 2000
      });
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')) : ?>
      Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: "<?= implode(', ', session()->getFlashdata('errors')); ?>",
      });
    <?php endif; ?>
  });
</script>

<?= $this->endSection(); ?>