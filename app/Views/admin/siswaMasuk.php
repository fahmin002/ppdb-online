<?= $this->extend('layout/admin/template'); ?>
<?= $this->section('content'); ?>
<style>
    .pdf {
        color: blue;
        font-size: 1rem;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
    }
</style>

<main>
    <div class="container-fluid px-4">
        <!-- Header Section with improved styling -->
        <div class="row mt-4 mb-3">
            <div class="col-md-8">
                <h1 class="fw-bold text-primary"><i class="fa-solid fa-user"></i>Siswa Terdaftar</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/lampiran" class="text-decoration-none"><i class="fas fa-home me-1"></i>Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tabel Siswa</li>
                    </ol>
                </nav>
            </div>
            <!-- <div class="col-md-4 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJobModal">
          <i class="fa-solid fa-file-export"></i>Tambah lampiran
        </button>
      </div> -->
        </div>

        <!-- Card with improved styling -->
        <div class="card shadow-sm mb-4 border-0 rounded-3">
            <div class="card-header bg-light py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-table text-primary me-1"></i>
                        <span class="fw-bold">Tabel Siswa</span>
                    </div>
                    <!-- <div>
            <button class="btn btn-sm btn-outline-secondary me-2">
              <i class="fas fa-file-export me-1"></i> Export
            </button>
            <button class="btn btn-sm btn-outline-secondary">
              <i class="fas fa-print me-1"></i> Print
            </button>
          </div> -->
                </div>
            </div>
            <div class="card-body">
                <!-- Responsive table with striped rows and hover effect -->
                <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-striped table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Id Siswa</th> <!-- Tambahkan kolom Nama Siswa -->
                                <th class="text-center">No Pendaftaran</th> <!-- Tambahkan kolom Nama Siswa -->
                                <th class="text-center">Nama Siswa</th>
                                <th class="text-center">Detail Profile</th>
                                <th class="text-center">Tanggal Daftar</th>
                                <th class="text-center">Status Pendaftaran</th>
                                <th class="text-center">Status PPDB</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($daftarSiswa as $d) : ?>
                                <d>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= esc($d['id_siswa']); ?></td> <!-- Tampilkan nama siswa -->
                                    <td><?= esc($d['no_pendaftaran']); ?></td>
                                    <td><?= esc($d['nama_lengkap']); ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/pendaftaran/' . $d['id_siswa']) ?>" class="badge pdf">
                                            <i class="fas fa-eye me-1"></i>
                                        </a>
                                    </td>
                                    <td><?= esc($d['tgl_pendaftaran']); ?></td>
                                    <td><?= esc($d['status_pendaftaran']); ?></td>
                                    <td><?= esc($d['status_ppdb']); ?></td>
                                    <?php if ($d['status_ppdb'] == 'pending'): ?>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a data-toggle="tooltip" data-placement="top" title="Verifikasi Pendaftaran" href="/admin/pendaftaran/verify/<?= $d['id_siswa'] ?>" class="btn btn-success btn-sm">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <a data-toggle="tooltip" data-placement="top" title="Reject Pendaftaran" href="/admin/pendaftaran/reject/<?= $d['id_siswa'] ?>" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-xmark"></i>
                                                </a>
                                            </div>
                                        </td>
                                    <?php else: ?>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a data-toggle="tooltip" data-placement="top" title="Pending Pendaftaran" href="/admin/pendaftaran/pending/<?= $d['id_siswa'] ?>" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-clock"></i>
                                                </a>
                                            </div>
                                        </td>
                                    <?php endif; ?>
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
                    <i class="fa-solid fa-file-export"></i> Tambah Lampiran
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
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