<?= $this->extend('layout/admin/template'); ?>
<?= $this->section('content'); ?>
<main>
  <div class="container-fluid px-4">
    <!-- Header Section with improved styling -->
    <div class="row mt-4 mb-3">
      <div class="col-md-8">
        <h1 class="fw-bold text-primary"><i class="fa-solid fa-file-export"></i>Halaman Tambah lampiran</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/lampiran" class="text-decoration-none"><i class="fas fa-home me-1"></i>Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tabel lampiran</li>
          </ol>
        </nav>
      </div>
      <div class="col-md-4 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJobModal">
        <i class="fa-solid fa-file-export"></i>Tambah lampiran
        </button>
      </div>
    </div>

    <!-- Card with improved styling -->
    <div class="card shadow-sm mb-4 border-0 rounded-3">
      <div class="card-header bg-light py-3">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <i class="fas fa-table text-primary me-1"></i>
            <span class="fw-bold">Tabel lampiran</span>
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
                <th class="text-center">ID pendaftar</th>
                <th class="text-center">Jenis Lampiran</th>
                <th class="text-center">File Lampiran</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($lampiran as $d) : ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td><?= $d['id_pendaftar']; ?></td>
                  <td><?= $d['jenis_lampiran']; ?></td>
                  <td><?= $d['file_lampiran']; ?></td>
                  <td><?= $d['keterangan']; ?></td>
                  <td>
                    <div class="d-flex justify-content-center gap-2">
                      <!-- Tombol Edit -->
                      <!-- Tombol Edit -->
                      <button onclick="editlampiran(
                    <?= $d['id_pendaftar']; ?>,
                    '<?= esc($d['jenis_lampiran']); ?>',
                    '<?= esc($d['file_lampiran']); ?>',
                    '<?= esc($d['keterangan']); ?>'
                  )" class="btn btn-warning btn-sm">
                        <i class="fa fa-pencil"></i>
                      </button>


                      <!-- Tombol Hapus -->
                      <form action="/lampiran/delete/<?= $d['id_lampiran']; ?>" method="post" class="d-inline">
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
                <i class="fa-solid fa-file-export"></i>Tambah Lampiran
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('lampiran/upload') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <input type="hidden" name="id_pendaftar" value="<?= $d['id_pendaftar']; ?>">

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="jenis_lampiran" class="form-label">Jenis Lampiran</label>
                        <select class="form-select" name="jenis_lampiran" id="jenis_lampiran" required>
                            <option value="">-- Pilih Lampiran --</option>
                            <option value="Akta Kelahiran">Akta Kelahiran</option>
                            <option value="Kartu Keluarga">Kartu Keluarga</option>
                            <option value="Ijazah">Ijazah</option>
                            <option value="Foto 3x4">Foto 3x4</option>
                            <!-- Tambah sesuai kebutuhan -->
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="file_lampiran" class="form-label">Upload File</label>
                        <input type="file" class="form-control" id="file_lampiran" name="file_lampiran" accept=".pdf,.jpg,.jpeg,.png" required>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="3"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Upload Lampiran</button>
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
        <h5 class="modal-title" id="editModalLabel"><i class="fas fa-edit me-2"></i>Edit Lampiran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        <div class="modal-body">
          <input type="hidden" name="id_lampiran" id="edit_id_lampiran"> <!-- Gunakan id_lampiran -->
          <div class="mb-3">
            <label for="edit_jenis_lampiran" class="form-label">Jenis Lampiran</label>
            <input type="text" class="form-control" id="edit_jenis_lampiran" name="jenis_lampiran" required>
          </div>
          <div class="mb-3">
            <label for="edit_file_lampiran" class="form-label">File Lampiran</label>
            <input type="file" class="form-control" id="edit_file_lampiran" name="file_lampiran">
          </div>
          <div class="mb-3">
            <label for="edit_keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="edit_keterangan" name="keterangan" required></textarea>
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
  function editlampiran(id_lampiran, jenis_lampiran, file_lampiran, keterangan) {
    // Mengisi data ke dalam form modal
    document.getElementById('edit_id_lampiran').value = id_lampiran; // Gunakan id_lampiran
    document.getElementById('edit_jenis_lampiran').value = jenis_lampiran;
    document.getElementById('edit_keterangan').value = keterangan;

    // Mengatur action form secara dinamis
    document.querySelector('#editModal form').action = `/lampiran/update/${id_lampiran}`;

    // Membuka modal
    var editModal = new bootstrap.Modal(document.getElementById('editModal'), {
      keyboard: false
    });
    editModal.show();
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