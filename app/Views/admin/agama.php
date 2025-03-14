<?= $this->extend('layout/admin/template'); ?>
<?= $this->section('content'); ?>
<main>
  <div class="container-fluid px-4">
    <!-- Header Section with improved styling -->
    <div class="row mt-4 mb-3">
      <div class="col-md-8">
        <h1 class="fw-bold text-primary"><i class="fa-solid fa-person-praying"></i>Halaman agama</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin" class="text-decoration-none"><i class="fas fa-home me-1"></i>Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tabel agama</li>
          </ol>
        </nav>
      </div>
      <div class="col-md-4 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJobModal">
          <i class="fa-solid fa-person-praying"></i>Tambah agama
        </button>
      </div>
    </div>

    <!-- Card with improved styling -->
    <div class="card shadow-sm mb-4 border-0 rounded-3">
      <div class="card-header bg-light py-3">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <i class="fas fa-table text-primary me-1"></i>
            <span class="fw-bold">Tabel agama</span>
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
                <th class="text-center">Asal agama</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($agama as $d) : ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td><?= $d['agama']; ?></td>
                  <td>
                    <div class="d-flex justify-content-center gap-2">
                      <!-- Tombol Edit -->
                      <button class="btn btn-sm btn-warning"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal"
                        data-id="<?= $d['id']; ?>"
                        data-pekerjaan="<?= $d['agama']; ?>"
                        title="Edit">
                        <i class="fas fa-edit"></i>
                      </button>

                      <!-- Tombol Hapus -->
                      <form action="/agama/delete/<?= $d['id']; ?>" method="post" class="d-inline">
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

<div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <!-- Form Dibuka Disini -->
    <form action="/agama/save" method="post">
      <?= csrf_field(); ?>
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="addJobModalLabel"><i class="fas fa-plus-circle me-2"></i>Tambah Agama Baru</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="jobName" class="form-label">Nama Agama</label>
            <input type="text" class="form-control" name="agama" id="jobName" placeholder="Masukkan nama Agama" required>
          </div>
        </div> <!-- Penutupan modal-body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form> <!-- Penutupan Form -->
  </div> <!-- Penutupan modal-dialog -->
</div> 

<!-- Modal untuk Tambah Pekerjaan -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="/agama/update/<?= $d['id']; ?>">
      <?= csrf_field(); ?>
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title" id="editModalLabel">Edit agama</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="itemName" class="form-label">Nama agama</label>
            <input type="text" class="form-control" id="itemName" name="agama" placeholder="Silahkan ubah nama agama" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
        </div>
      </div>
    </form>
  </div>
</div>



<!-- Script untuk inisialisasi tooltip -->
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

<script>
  $(document).ready(function() {
    // Event listener untuk modal edit agama
    $('#editModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget); // Tombol yang diklik

      if (button.length === 0) {
        console.error("Tombol tidak ditemukan!");
        return;
      }

      console.log(button); // Debugging: cek apakah tombol terdeteksi

      var id = button.data('id'); // Ambil data-id
      var agama = button.data('agama'); // Ambil data-agama

      console.log("ID:", id, "agama:", agama); // Debugging: cek apakah data terbaca

      var modal = $(this);
      modal.find('.modal-body #itemName').attr(agama); // Isi input field
      modal.find('form').attr('action', '/agama/update/' + id); // Set action form
    });
  });
</script>

<?= $this->endSection(); ?>