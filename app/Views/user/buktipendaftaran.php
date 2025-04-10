


<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bukti Pendaftaran - <?= $siswa['nama_lengkap'] ?></title>

  <style>
    @page {
      size: A4;
      margin: 0;
    }

    body {
      font-family: 'Arial', sans-serif;
      font-size: 12pt;
      margin: 0;
      padding: 0;
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
      border-bottom: 1px solid #000;
    }

    .logo {
      width: 50px;
      height: auto;
      
    }

    .school-name {
      font-size: 18pt;
      font-weight: bold;
    }

    .school-address {
      font-size: 10pt;
    }

    .title {
      font-size: 16pt;
      font-weight: bold;
      text-align: center;
      margin: 20px 0;
    }

    .registration-info {
      margin-bottom: 20px;
    }

    .registration-info table {
      width: 100%;
      margin-top: 10px;
    }

    .registration-info td {
      padding: 5px;
    }

    .note {
      margin-top: 20px;
      font-size: 10pt;
      padding: 10px;
      border-top: 1px solid #000;
      font-style: italic;
    }

    .footer {
      text-align: center;
      font-size: 8pt;
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <div class="school-name">SEKOLAH MENENGAH PERTAMA  PGRI 1 PURING</div>
      <div class="school-address">Puring Wetan, Sitiadi, Kec. Puring, Kabupaten Kebumen, Jawa Tengah 54383</div>
      <div class="school-address">Telepon: (021) 12345678 |info@smppgri1puring.sch.id</div>

    </div>

    <div class="title">Bukti Pendaftaran</div>

    <div class="registration-info">
      <table>
        <tr>
          <td>Nama Lengkap</td>
          <td>: <?= $siswa['nama_lengkap'] ?></td>
        </tr>
        <tr>
          <td>NISN</td>
          <td>: <?= $siswa['nisn'] ?></td>          
        </tr>

        <tr>
          <td>No. Pendaftaran</td>
          <td>: <?= $siswa['no_pendaftaran'] ?></td>          
        </tr>
        <tr>
          <td>Tanggal Pendaftaran</td>
          <td>: <?= date('d F Y', strtotime($siswa['tgl_pendaftaran'])) ?></td>
        </tr>
        <tr>
          <td>Status Pendaftaran</td>
        <td>:  <?php if ($siswa['status_ppdb'] == 'verified'): ?>
                      Diterima
                    <?php elseif ($siswa['status_ppdb'] == 'rejected'): ?>
                       Ditolak
                    <?php else: ?>
                        Proses
                    <?php endif; ?></td>
            
        </tr>
      </table>
    </div>

    <div class="note">
      <strong>Catatan:</strong>
      <ul>
        <li>Bukti pendaftaran ini harap dibawa pada saat verifikasi berkas.</li>
        <li>Verifikasi berkas dilakukan pada tanggal <?= date('d-m-Y', strtotime('+3 days', strtotime($siswa['tgl_pendaftaran']))) ?> pukul 08.00 - 14.00 WIB.</li>
        <li>Pendaftar wajib membawa berkas-berkas asli beserta fotocopy untuk diverifikasi.</li>
      </ul>
    </div>

    <div class="footer">
      <p>Dokumen ini dicetak secara otomatis oleh sistem dan sah tanpa tanda tangan basah.</p>
      <p>PPDB SEKOLAH MENENGAH PERTAMA PGRI 1 PURING - Tahun Ajaran <?= $siswa['tahun'] ?></p>
    </div>
  </div>
</body>

</html>