<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - PPDB Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
   
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg mt-5">
                    <div class="card-header text-center">
                        <i class="fas fa-graduation-cap fa-3x mb-3" style="color: #3498db;"></i>
                        <h3 class="login-title">Login PPDB</h3>
                        <p class="text-muted">Selamat datang di Portal PPDB Online</p>
                    </div>
                    <div class="card-body px-4">
                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php endif ?>
                        <?php if (session()->getFlashdata('message')): ?>
                            <div class="alert alert-success">
                                <ul class="mb-0">
                                    <li><?= esc(session()->getFlashdata('message')) ?></li>
                                </ul>
                            </div>
                        <?php endif ?>
                        
                        <form method="post" action="/login">
                            <div class="form-floating mb-4 position-relative">
                                <input name="nisn" class="form-control" id="inputNisn" type="text" placeholder="Masukkan NISN" required />
                                <label for="inputNisn">
                                    <i class="fas fa-id-card me-2"></i>Nomor Induk Siswa Nasional
                                </label>
                            </div>
                            <div class="form-floating mb-4 position-relative">
                                <input name="password" class="form-control" id="inputPassword" type="password" placeholder="Password" required />
                                <label for="inputPassword">
                                    <i class="fas fa-lock me-2"></i>Kata Sandi
                                </label>
                                <span class="password-toggle input-icon" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="toggleIcon"></i>
                                </span>
                            </div>
                            <div class="d-grid gap-2 mb-4">
                                <button type="submit" class="btn btn-login text-white">
                                    <i class="fas fa-sign-in-alt me-2"></i>Masuk
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-4 border-0">
                        <div class="small">
                            <a href="/register" class="register-link">
                                <i class="fas fa-user-plus me-2"></i>Belum memiliki akun? Daftar sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('inputPassword');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>