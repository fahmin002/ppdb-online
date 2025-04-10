<?= $this->extend('layout/user/template'); ?>
<?= $this->section('content'); ?>

    <style>
        .alur-card {
            transition: transform 0.3s ease-in-out;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 25px;
            background: #fff;
        }

        .alur-card:hover {
            transform: translateY(-5px);
        }

        .alur-icon {
            background: #4e73df;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        .step-number {
            position: absolute;
            top: 4px;
            left: 3px;
            background: #f6c23e;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .section-title {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 50px;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: #4e73df;
        }

        @media (max-width: 768px) {
            .alur-card {
                margin-bottom: 30px;
            }
        }
    </style>

<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center section-title mb-5">Alur Pendaftaran PPDB</h2>
        
        <div class="row">
            <!-- Step 1 -->
            <div class="col-lg-6 mb-4">
                <div class="alur-card card p-4 position-relative">
                    <div class="step-number">01</div>
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center">
                            <div class="alur-icon mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                    <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                                    <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="mb-3">Persiapan Berkas</h4>
                            <p class="text-muted">Calon peserta didik menyiapkan berkas-berkas yang diperlukan untuk pendaftaran</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="col-lg-6 mb-4">
                <div class="alur-card card p-4 position-relative">
                    <div class="step-number">02</div>
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center">
                            <div class="alur-icon mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-laptop" viewBox="0 0 16 16">
                                    <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="mb-3">Pendaftaran Online</h4>
                            <p class="text-muted">Melakukan pendaftaran secara online melalui website PPDB yang telah disediakan</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="col-lg-6 mb-4">
                <div class="alur-card card p-4 position-relative">
                    <div class="step-number">03</div>
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center">
                            <div class="alur-icon mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-upload" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="mb-3">Upload Berkas</h4>
                            <p class="text-muted">Mengunggah berkas-berkas yang diperlukan ke sistem PPDB online</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="col-lg-6 mb-4">
                <div class="alur-card card p-4 position-relative">
                    <div class="step-number">04</div>
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center">
                            <div class="alur-icon mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="mb-3">Verifikasi</h4>
                            <p class="text-muted">Menunggu proses verifikasi berkas oleh panitia PPDB</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 5 -->
            <div class="col-lg-6 mb-4">
                <div class="alur-card card p-4 position-relative">
                    <div class="step-number">05</div>
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center">
                            <div class="alur-icon mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                    <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="mb-3">Pengumuman</h4>
                            <p class="text-muted">Pengumuman hasil seleksi PPDB akan diumumkan sesuai jadwal</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 6 -->
            <div class="col-lg-6 mb-4">
                <div class="alur-card card p-4 position-relative">
                    <div class="step-number">06</div>
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center">
                            <div class="alur-icon mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-person-check" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="mb-3">Daftar Ulang</h4>
                            <p class="text-muted">Peserta yang diterima melakukan daftar ulang sesuai jadwal yang ditentukan</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?= $this->endSection(); ?>