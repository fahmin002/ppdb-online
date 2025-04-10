<?= $this->extend('layout/user/template'); ?>
<?= $this->section('content'); ?>

<style>
  .form-section {
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
  }

  .form-section:hover {
    box-shadow: 0 0 25px rgba(0,0,0,0.1);
  }

  .section-header {
    background: linear-gradient(45deg, #2962ff, #1565c0);
    color: white;
    border-radius: 15px 15px 0 0;
    padding: 20px;
  }

  .form-control {
    border-radius: 8px;
    border: 1px solid #e0e0e0;
    padding: 10px 15px;
    transition: all 0.3s ease;
  }

  .form-control:focus {
    border-color: #2962ff;
    box-shadow: 0 0 0 0.2rem rgba(41, 98, 255, 0.1);
  }

  .form-label {
    font-weight: 500;
    color: #424242;
    margin-bottom: 8px;
  }

  .btn-update {
    background: linear-gradient(45deg, #ff6f00, #f57c00);
    border: none;
    border-radius: 8px;
    padding: 12px 25px;
    color: white;
    font-weight: 500;
    transition: all 0.3s ease;
  }

  .btn-update:hover {
    background: linear-gradient(45deg, #f57c00, #ff6f00);
    transform: translateY(-2px);
  }

  .section-title {
    background: #f5f5f5;
    padding: 10px 15px;
    border-radius: 8px;
    margin-bottom: 20px;
  }

  @media (max-width: 768px) {
    .form-section {
      margin: 10px;
    }
  }
</style>

<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-12">
      <h1 class="display-5 mb-4 text-primary">
        <i class="fas fa-user-edit me-2"></i>Lengkapi Data Siswa
      </h1>

      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="fas fa-exclamation-circle me-2"></i><?= session()->getFlashdata('error') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <div class="form-section mb-4">
        <div class="section-header">
          <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Formulir Edit Data</h4>
        </div>
        <div class="card-body p-4">
          <form action="/user/updateProfile/<?= $siswa['nisn']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="POST">

            <div class="row g-4">
              <!-- Data Pribadi Section -->
              <div class="col-md-6">
                <div class="section-title">
                  <h5 class="mb-0 text-primary"><i class="fas fa-user me-2"></i>Data Pribadi</h5>
                </div>

                <div class="mb-3">
                  <label for="nisn" class="form-label">
                    <i class="fas fa-id-card me-2"></i>NISN
                  </label>
                  <input type="text" class="form-control" name="nisn" id="nisn" value="<?= $siswa['nisn']; ?>">
                </div>

                <div class="mb-3">
                  <label for="nama_lengkap" class="form-label">
                    <i class="fas fa-user me-2"></i>Nama Lengkap
                  </label>
                  <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?= $siswa['nama_lengkap']; ?>">
                </div>

                <div class="mb-3">
                  <label for="nama_panggilan" class="form-label">
                    <i class="fas fa-user-tag me-2"></i>Nama Panggilan
                  </label>
                  <input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan" value="<?= $siswa['nama_panggilan']; ?>">
                </div>

                <div class="mb-3">
                  <label for="tempat_lahir" class="form-label">
                    <i class="fas fa-map-marker-alt me-2"></i>Tempat Lahir
                  </label>
                  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= $siswa['tempat_lahir']; ?>">
                </div>

                <div class="mb-3">
                  <label for="tgl_lahir" class="form-label">
                    <i class="fas fa-calendar-alt me-2"></i>Tanggal Lahir
                  </label>
                  <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $siswa['tgl_lahir']; ?>">
                </div>

                <div class="mb-3">
                  <label for="jenkel" class="form-label">
                    <i class="fas fa-venus-mars me-2"></i>Jenis Kelamin
                  </label>
                  <select class="form-control" name="jenkel" id="jenkel">
                    <option value="L" <?= $siswa['jenkel'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="P" <?= $siswa['jenkel'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label">
                    <i class="fas fa-lock me-2"></i>password
                  </label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>

                <div class="mb-3">
                  <label for="foto" class="form-label">
                    <i class="fas fa-camera me-2"></i>Foto
                  </label>
                  <input type="file" class="form-control" name="foto" id="foto">
                </div>

                <div class="mb-3">
                  <label for="nik" class="form-label">
                    <i class="fas fa-id-card-alt me-2"></i>NIK
                  </label>
                  <input type="text" class="form-control" name="nik" id="nik" value="<?= $siswa['nik']; ?>">
                </div>

                <div class="mb-3">
                  <label for="id_agama" class="form-label">
                    <i class="fas fa-pray me-2"></i>Agama
                  </label>
                  <input type="text" class="form-control" name="id_agama" id="id_agama" value="<?= $siswa['id_agama']; ?>">
                </div>

                <div class="mb-3">
                  <label for="no_telepon" class="form-label">
                    <i class="fas fa-phone me-2"></i>No. Telepon
                  </label>
                  <input type="text" class="form-control" name="no_telepon" id="no_telepon" value="<?= $siswa['no_telepon']; ?>">
                </div>

                <div class="mb-3">
                  <label for="tinggi" class="form-label">
                    <i class="fas fa-ruler-vertical me-2"></i>Tinggi Badan (cm)
                  </label>
                  <input type="number" step="0.1" class="form-control" name="tinggi" id="tinggi" value="<?= $siswa['tinggi']; ?>">
                </div>

                <div class="mb-3">
                  <label for="berat" class="form-label">
                    <i class="fas fa-weight me-2"></i>Berat Badan (kg)
                  </label>
                  <input type="number" step="0.1" class="form-control" name="berat" id="berat" value="<?= $siswa['berat']; ?>">
                </div>

                <div class="mb-3">
                  <label for="jml_saudara" class="form-label">
                    <i class="fas fa-users me-2"></i>Jumlah Saudara
                  </label>
                  <input type="number" class="form-control" name="jml_saudara" id="jml_saudara" value="<?= $siswa['jml_saudara']; ?>">
                </div>

                <div class="mb-3">
                  <label for="anak_ke" class="form-label">
                    <i class="fas fa-child me-2"></i>Anak Ke
                  </label>
                  <input type="number" class="form-control" name="anak_ke" id="anak_ke" value="<?= $siswa['anak_ke']; ?>">
                </div>
              </div>

              <!-- Data Orang Tua & Alamat Section -->
              <div class="col-md-6">
                <div class="section-title">
                  <h5 class="mb-0 text-primary"><i class="fas fa-users me-2"></i>Data Orang Tua & Alamat</h5>
                </div>

                <div class="mb-3">
                  <label for="nik_ayah" class="form-label">
                    <i class="fas fa-male me-2"></i>NIK Ayah
                  </label>
                  <input type="text" class="form-control" name="nik_ayah" id="nik_ayah" value="<?= $siswa['nik_ayah']; ?>">
                </div>

                <div class="mb-3">
                  <label for="nama_ayah" class="form-label">
                    <i class="fas fa-user me-2"></i>Nama Ayah
                  </label>
                  <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" value="<?= $siswa['nama_ayah']; ?>">
                </div>

                <div class="mb-3">
                  <label for="pendidikan_ayah" class="form-label">
                    <i class="fas fa-graduation-cap me-2"></i>Pendidikan Ayah
                  </label>
                  <input type="text" class="form-control" name="pendidikan_ayah" id="pendidikan_ayah" value="<?= $siswa['pendidikan_ayah']; ?>">
                </div>

                <div class="mb-3">
                  <label for="pekerjaan_ayah" class="form-label">
                    <i class="fas fa-briefcase me-2"></i>Pekerjaan Ayah
                  </label>
                  <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" value="<?= $siswa['pekerjaan_ayah']; ?>">
                </div>

                <div class="mb-3">
                  <label for="penghasilan_ayah" class="form-label">
                    <i class="fas fa-money-bill-wave me-2"></i>Penghasilan Ayah
                  </label>
                  <input type="text" class="form-control" name="penghasilan_ayah" id="penghasilan_ayah" value="<?= $siswa['penghasilan_ayah']; ?>">
                </div>

                <div class="mb-3">
                  <label for="no_telepon_ayah" class="form-label">
                    <i class="fas fa-phone me-2"></i>No. Telepon Ayah
                  </label>
                  <input type="text" class="form-control" name="no_telepon_ayah" id="no_telepon_ayah" value="<?= $siswa['no_telepon_ayah']; ?>">
                </div>

                <div class="mb-3">
                  <label for="nik_ibu" class="form-label">
                    <i class="fas fa-female me-2"></i>NIK Ibu
                  </label>
                  <input type="text" class="form-control" name="nik_ibu" id="nik_ibu" value="<?= $siswa['nik_ibu']; ?>">
                </div>

                <div class="mb-3">
                  <label for="nama_ibu" class="form-label">
                    <i class="fas fa-user me-2"></i>Nama Ibu
                  </label>
                  <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" value="<?= $siswa['nama_ibu']; ?>">
                </div>

                <div class="mb-3">
                  <label for="pendidikan_ibu" class="form-label">
                    <i class="fas fa-graduation-cap me-2"></i>Pendidikan Ibu
                  </label>
                  <input type="text" class="form-control" name="pendidikan_ibu" id="pendidikan_ibu" value="<?= $siswa['pendidikan_ibu']; ?>">
                </div>

                <div class="mb-3">
                  <label for="pekerjaan_ibu" class="form-label">
                    <i class="fas fa-briefcase me-2"></i>Pekerjaan Ibu
                  </label>
                  <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" value="<?= $siswa['pekerjaan_ibu']; ?>">
                </div>

                <div class="mb-3">
                  <label for="penghasilan_ibu" class="form-label">
                    <i class="fas fa-money-bill-wave me-2"></i>Penghasilan Ibu
                  </label>
                  <input type="text" class="form-control" name="penghasilan_ibu" id="penghasilan_ibu" value="<?= $siswa['penghasilan_ibu']; ?>">
                </div>

                <div class="mb-3">
                  <label for="no_telepon_ibu" class="form-label">
                    <i class="fas fa-phone me-2"></i>No. Telepon Ibu
                  </label>
                  <input type="text" class="form-control" name="no_telepon_ibu" id="no_telepon_ibu" value="<?= $siswa['no_telepon_ibu']; ?>">
                </div>
              </div>

              <div class="col-md-6">
                <div class="section-title mt-4">
                  <h5 class="mb-0 text-primary"><i class="fas fa-map-marked-alt me-2"></i>Data Alamat</h5>
                </div>

                <div class="mb-3">
                  <label for="id_provinsi" class="form-label">
                    <i class="fas fa-map me-2"></i>Provinsi
                  </label>
                  <input type="text" class="form-control" name="id_provinsi" id="id_provinsi" value="<?= $siswa['id_provinsi']; ?>">
                </div>

                <div class="mb-3">
                  <label for="id_kabupaten" class="form-label">
                    <i class="fas fa-city me-2"></i>Kabupaten
                  </label>
                  <input type="text" class="form-control" name="id_kabupaten" id="id_kabupaten" value="<?= $siswa['id_kabupaten']; ?>">
                </div>

                <div class="mb-3">
                  <label for="id_kecamatan" class="form-label">
                    <i class="fas fa-building me-2"></i>Kecamatan
                  </label>
                  <input type="text" class="form-control" name="id_kecamatan" id="id_kecamatan" value="<?= $siswa['id_kecamatan']; ?>">
                </div>

                <div class="mb-3">
                  <label for="alamat" class="form-label">
                    <i class="fas fa-home me-2"></i>Alamat Lengkap
                  </label>
                  <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= $siswa['alamat']; ?></textarea>
                </div>
              </div>

              <div class="col-md-6">
                <div class="section-title mt-4">
                  <h5 class="mb-0 text-primary"><i class="fas fa-school me-2"></i>Data Sekolah Asal</h5>
                </div>

                <div class="mb-3">
                  <label for="nama_sekolah_asal" class="form-label">
                    <i class="fas fa-school me-2"></i>Nama Sekolah Asal
                  </label>
                  <input type="text" class="form-control" name="nama_sekolah_asal" id="nama_sekolah_asal" value="<?= $siswa['nama_sekolah_asal']; ?>">
                </div>

                <div class="mb-3">
                  <label for="tahun_lulus" class="form-label">
                    <i class="fas fa-calendar-check me-2"></i>Tahun Lulus
                  </label>
                  <input type="text" class="form-control" name="tahun_lulus" id="tahun_lulus" value="<?= $siswa['tahun_lulus']; ?>">
                </div>

                <div class="mb-3">
                  <label for="no_ijazah" class="form-label">
                    <i class="fas fa-certificate me-2"></i>No. Ijazah
                  </label>
                  <input type="text" class="form-control" name="no_ijazah" id="no_ijazah" value="<?= $siswa['no_ijazah']; ?>">
                </div>

                <div class="mb-3">
                  <label for="no_skhun" class="form-label">
                    <i class="fas fa-file-alt me-2"></i>No. SKHUN
                  </label>
                  <input type="text" class="form-control" name="no_skhun" id="no_skhun" value="<?= $siswa['no_skhun']; ?>">
                </div>
              </div>
            </div>

            <div class="text-center mt-4">
              <button type="submit" class="btn btn-update">
                <i class="fas fa-save me-2"></i>Update Data Siswa
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>