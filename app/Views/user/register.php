<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pendaftaran - PPDB Online</title>
    <link href="/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Formulir Pendaftaran</h3>
                                </div>
                                <div class="card-body">
                                    <?php if (session()->getFlashdata('errors')): ?>
                                        <div class="alert alert-danger">
                                            <ul>
                                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                                    <li><?= esc($error) ?></li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    <?php endif ?>
                                    <form action="/register" method="POST">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-3">
                                                    <input name="nisn" class="form-control" id="nisn" type="text" placeholder="Enter your first name" value="<?= old('nisn') ?>" />
                                                    <label for="nisn">NISN</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-3">
                                                    <select name="jalur-masuk" class="form-control" id="jalur-masuk" type="text" placeholder="Enter your first name">
                                                        <option value="0">---Pilih Jalur Masuk---</option>
                                                        <option value="1" <?= old('jalur-masuk') == 1 ? 'selected' : '' ?>>Zonasi</option>
                                                        <option value="2" <?= old('jalur-masuk') == 2 ? 'selected' : '' ?>>Prestasi</option>
                                                        <option value="3" <?= old('jalur-masuk') == 3 ? 'selected' : '' ?>>Afirmasi</option>
                                                        <option value="4" <?= old('jalur-masuk') == 4 ? 'selected' : '' ?>>Perpindahan</option>
                                                    </select>
                                                    <label for="jalur-masuk">Jalur Masuk</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-3">
                                                    <input name="nama-lengkap" class="form-control" id="nama-lengkap" type="text" placeholder="Enter your first name" value="<?= old('nama-lengkap') ?>" />
                                                    <label for="nama-lengkap">Nama lengkap</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input name="nama-panggilan" class="form-control" id="nama-panggilan" type="text" placeholder="Enter your last name" value="<?= old('nama-panggilan') ?>" />
                                                    <label for="nama-panggilan">Nama Panggilan</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3 mt-md-0">
                                                <div class="form-floating mb-3 mb-md-3">
                                                    <select name="jenkel" class="form-control" id="jenkel" type="text" placeholder="Enter your first name">
                                                        <option value="0">---Pilih Jenis Kelamin---</option>
                                                        <option value="1" <?= old('jenkel') == 1 ? 'selected' : '' ?>>Laki-Laki</option>
                                                        <option value="2" <?= old('jenkel') == 2 ? 'selected' : '' ?>>Perempuan</option>
                                                    </select>
                                                    <label for="jenkel">Jenis Kelamin</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input name="tempat-lahir" class="form-control" id="tempat-lahir" type="text" placeholder="Enter your last name" value="<?= old('tempat-lahir') ?>" />
                                                    <label for="tempat-lahir">Tempat Lahir</label>
                                                </div>
                                            </div>
                                            <div class="row mt-3 mt-md-0">
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-3">
                                                        <select name="tanggal-lahir" class="form-control" id="tanggal-lahir" type="text" placeholder="Enter your first name">
                                                            <option value="0">---</option>
                                                            <?php for ($i = 1; $i < 32; $i++) { ?>
                                                                <option value="<?= $i; ?>" <?= old('tanggal-lahir') == $i ? 'selected' : '' ?>><?= $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="tanggal-lahir">Tanggal</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-3">
                                                        <select name="bulan-lahir" class="form-control" id="bulan-lahir" type="text" placeholder="Enter your first name">
                                                            <option value="0">---</option>
                                                            <?php $months = array(
                                                                "Januari",
                                                                "Februari",
                                                                "Maret",
                                                                "April",
                                                                "Mei",
                                                                "Juni",
                                                                "Juli",
                                                                "Agustus",
                                                                "September",
                                                                "Oktober",
                                                                "November",
                                                                "Desember"
                                                            ) ?>
                                                            <?php foreach ($months as $key => $month) { ?>
                                                                <option value="<?= $key + 1; ?>" <?= old('bulan-lahir') == $key + 1 ? 'selected' : '' ?>><?= $month; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="bulan-lahir">Bulan</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-3">
                                                        <select name="tahun-lahir" class="form-control" id="tahun-lahir" type="text" placeholder="Enter your first name">
                                                            <option value="0">---</option>
                                                            <?php for ($i = 1990; $i < 2023; $i++) { ?>
                                                                <option value="<?= $i; ?>" <?= old('tahun-lahir') == $i ? 'selected' : '' ?>><?= $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="tahun-lahir">Tahun</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-3">
                                                    <input name="password" class="form-control" id="password" type="password" placeholder="Enter your password" />
                                                    <label for="password">Kata sandi</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-3">
                                                    <input name="confirm-password" class="form-control" id="confirm-password" type="password" placeholder="Confirm your password" />
                                                    <label for="confirm-password">Konfirmasi sandi</label>
                                                </div>
                                            </div>
                                            <script>
                                                var password = document.getElementById("password"),
                                                    confirm_password = document.getElementById("confirm-password");

                                                function validatePassword() {
                                                    if (password.value != confirm_password.value) {
                                                        confirm_password.setCustomValidity("Kata sandi tidak sama");
                                                    } else {
                                                        confirm_password.setCustomValidity('');
                                                    }
                                                }

                                                password.onchange = validatePassword;
                                                confirm_password.onkeyup = validatePassword;
                                            </script>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Daftar</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="/login">Sudah pernah mendaftar? Login sekarang</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>