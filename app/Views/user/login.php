<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - PPDB Online</title>
        <link href="/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
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
                                    <?php if (session()->getFlashdata('message')): ?>
                                        <div class="alert alert-success">
                                            <ul>
                                                    <li><?= esc(session()->getFlashdata('message')) ?></li>
                                            </ul>
                                        </div>
                                    <?php endif ?>
                                        <form method="post" action="/login">
                                            <div class="form-floating mb-3">
                                                <input name="nisn" class="form-control" id="inputNisn" type="text" placeholder="name@example.com" />
                                                <label for="inputNisn">Nomor Induk Siswa Nasional</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="password" class="form-control" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Kata Sandi</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="/register">Belum memiliki akun? Daftar sekarang</a></div>
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
