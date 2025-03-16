<?= $this->extend('layout/admin/template'); ?>
<?= $this->section('content'); ?>
<main>
  <div class="container-fluid px-4">
    <!-- Header Section with improved styling -->
    <div class="row mt-4 mb-3">
      <div class="col-md-8">
        <h1 class="fw-bold text-primary"><i class="fa-solid fa-person-praying"></i>Halaman Tambah Admin</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin" class="text-decoration-none"><i class="fas fa-home me-1"></i>Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tabel Admin</li>
          </ol>
        </nav>
      </div>
      <div class="col-md-4 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJobModal">
          <i class="fa-solid fa-person-praying"></i>Tambah Admin
        </button>
      </div>
    </div>

    <!-- Card with improved styling -->
    <div class="card shadow-sm mb-4 border-0 rounded-3">
      <div class="card-header bg-light py-3">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <i class="fas fa-table text-primary me-1"></i>
            <span class="fw-bold">Tabel ADmin</span>
          </div>
          <div>
            <button class="btn btn-sm btn-outline-secondary me-2">
              <i class="fas fa-file-export me-1"></i> Export
            </button>
            <button class="btn btn-sm btn-outline-secondary">
              <i class="fas fa-print me-1"></i> Print
            </button>
          </div>
        </div>
      </div>
      <div class="card-body">
        <!-- Responsive table with striped rows and hover effect -->
        <div class="table-responsive">
          <table id="datatablesSimple" class="table table-striped table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama User</th>
                <th class="text-center">Email</th>
                <th class="text-center">Password</th>
                <th class="text-center">Foto</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($addusermodel as $d) : ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td><?= $d['nama_user']; ?></td>
                  <td><?= $d['email']; ?></td>
                  <td><?= $d['password']; ?></td>
                  <td>
                    <img src="/foto_user/<?= $d['foto']; ?>" alt="Foto User" width="50" height="50">
                  </td>
                  <td>
                    <div class="d-flex justify-content-center gap-2">
                      <!-- Tombol Edit -->
                      <button onclick="editUser(<?= $d['id_user'] ?>, '<?= $d['nama_user'] ?>')" class="btn btn-warning btn-sm">
                        <i class="fa fa-pencil"></i>
                      </button>

                      <!-- Tombol Hapus -->
                      <form action="/User/delete/<?= $d['id_user']; ?>" method="post" class="d-inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
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
          <i class="fa-solid fa-person-praying me-2"></i>Tambah User
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="<?= base_url('admin/adduser/store'); ?>" enctype="multipart/form-data">
        <?= csrf_field() ?> <!-- CSRF Token -->
        <div class="modal-body">
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
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
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

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title" id="editModalLabel"><i class="fas fa-edit me-2"></i>Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="id" id="edit_id">
          <div class="mb-3">
            <label for="edit_User" class="form-label">Asal User</label>
            <input type="text" class="form-control" id="edit_User" name="User" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
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

<!-- JavaScript -->
<script>
  function editUser(id, User) {
    // Isi nilai id dan User ke modal
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_User').value = User;

    // Update form action dengan id yang sesuai
    document.querySelector('#editModal form').action = `/User/update/${id}`;

    // Tampilkan modal
    new bootstrap.Modal(document.getElementById('editModal')).show();
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