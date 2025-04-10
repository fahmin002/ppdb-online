<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bukti Pendaftaran - <?= $siswa['nama_lengkap'] ?></title>

  <!-- PaperCSS for clean, printable styling -->
  <link rel="stylesheet" href="https://unpkg.com/papercss@1.8.2/dist/paper.min.css">

  <style>
    @page {
      size: A4;
      margin: 0;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Roboto', sans-serif;
      font-size: 12pt;
    }

    .container {
      width: 100%;
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
      border-bottom: 3px solid #000;
      padding-bottom: 10px;
    }

    .logo {
      width: 80px;
      height: auto;
    }

    .school-name {
      font-size: 24pt;
      font-weight: bold;
      margin: 5px 0;
    }

    .school-address {
      font-size: 10pt;
      margin-bottom: 5px;
    }

    .title {
      font-size: 18pt;
      font-weight: bold;
      text-align: center;
      margin: 20px 0;
      text-transform: uppercase;
    }

    .subtitle {
      font-size: 14pt;
      text-align: center;
      margin-bottom: 30px;
    }

    .photo-container {
      float: right;
      width: 3cm;
      height: 4cm;
      /* border: 1px solid #000; */
      margin-left: 15px;
      text-align: center;
      padding-top: 30px;
    }

    .registration-info {
      margin-bottom: 20px;
    }

    .section-title {
      font-weight: bold;
      font-size: 14pt;
      margin: 20px 0 10px 0;
      padding-bottom: 5px;
      border-bottom: 1px solid #000;
    }

    .signature-section {
      margin-top: 50px;
      display: flex;
      justify-content: space-between;
    }

    .signature-box {
      width: 45%;
      text-align: center;
    }

    .signature-line {
      margin-top: 80px;
      border-bottom: 1px solid #000;
      margin-bottom: 5px;
    }

    .footer {
      margin-top: 50px;
      text-align: center;
      font-size: 9pt;
      color: #666;
    }

    .note {
      margin-top: 20px;
      padding: 10px;
      border: 1px dashed #000;
      font-size: 10pt;
    }

    .profile-img img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        border: 3px solid #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <table style="width: 100%;">
        <tr>
          <td style="width: 15%; text-align: left;">
            <img src="<?= base_url('img/logo.png') ?>" alt="Logo Sekolah" class="logo">
          </td>
          <td style="width: 70%; text-align: center;">
            <div class="school-name">SEKOLAH MENENGAH PERTAMA NEGERI X</div>
            <div class="school-address">Jl. Pendidikan No. 123, Kecamatan XYZ, Kabupaten ABC</div>
            <div class="school-address">Telepon: (021) 12345678 | Email: smpn.x@example.com</div>
          </td>
          <td style="width: 15%; text-align: right;">
            <!-- Secondary logo if needed -->
          </td>
        </tr>
      </table>
    </div>

    <div class="subtitle">Tahun Pelajaran <?= $siswa['tahun'] ?></div>

    <div class="registration-info">
      <div class="photo-container">
        <?php if (!empty($siswa['foto'])): ?>
          <img src="/foto-siswa/<?= $siswa['foto']; ?>" alt="Foto Siswa" class="profile-img" />
        <?php else: ?>
          <p>Foto 3x4</p>
        <?php endif; ?>
      </div>

      <!-- Informasi pendaftaran siswa -->
      <!-- <div class="section-title">Informasi Pendaftaran</div> -->
      <table style="width: 100%; margin-top: 100px;">
        <tr>
          <td style="width: 30%;">Nama Lengkap</td>
          <td style="width: 70%;"><?= $siswa['nama_lengkap'] ?></td>
        </tr>
        <tr>
          <td>No. Pendaftaran</td>
          <td><?= $siswa['no_pendaftaran'] ?></td>
        </tr>
        <tr>
          <td>Tanggal Pendaftaran</td>
          <td><?= date('d F Y', strtotime($siswa['tgl_pendaftaran'])) ?></td>
        </tr>
        <tr>
          <td>Status Pendaftaran</td>
          <td><?= strtoupper($siswa['status_pendaftaran']) ?></td>
        </tr>
      </table>
    </div>

    <div class="note">
      <strong>Catatan:</strong>
      <ol>
        <li>Bukti pendaftaran ini harap dibawa pada saat verifikasi berkas.</li>
        <li>Verifikasi berkas dilakukan pada tanggal <?= date('d-m-Y', strtotime('+3 days', strtotime($siswa['tgl_pendaftaran']))) ?> pukul 08.00 - 14.00 WIB.</li>
        <li>Pendaftar wajib membawa berkas-berkas asli beserta fotocopy untuk diverifikasi.</li>
        <a href="/cetak-pdf" class="btn btn-primary">Cetak PDF</a>
      </ol>
    </div>

    <div class="signature-section">
      <div class="signature-box">
        <p>Orang Tua/Wali</p>
        <div class="signature-line"></div>
        <p><?= $siswa['nama_ayah'] ?>/<?= $siswa['nama_ibu'] ?></p>
      </div>

      <div class="signature-box">
        <p><?= date('d F Y') ?></p>       
        <div class="signature-line"></div>
        <p><?= $siswa['nama_lengkap'] ?></p>
      </div>
    </div>

    <div class="footer">
      <p>Dokumen ini dicetak secara otomatis oleh sistem dan sah tanpa tanda tangan basah.</p>
      <p>PPDB SMP Negeri X - Tahun Ajaran <?= $siswa['tahun'] ?></p>
    </div>
  </div> <!-- Penutup div container -->

  <div class="footer">
            <button class="print-button" onclick="window.print()">
                <i class="fa-solid fa-file-arrow-down"></i>Cetak Laporan
            </button>
        </div>

</body>

</html>