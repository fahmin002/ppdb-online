<?= $this->extend('layout/user/template'); ?>
<?= $this->section('content'); ?>
<section id="kontak" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">Hubungi Kami</h2>
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Informasi Kontak</h4>
                            <div class="d-flex mb-3">
                                <i class="fas fa-map-marker-alt text-primary fs-4 me-3 mt-1"></i>
                                <div>
                                    <h5 class="mb-1">Alamat</h5>
                                    <p class="mb-0">Jl. Pendidikan No. 123, Kota Modern, Indonesia 12345</p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <i class="fas fa-phone-alt text-primary fs-4 me-3 mt-1"></i>
                                <div>
                                    <h5 class="mb-1">Telepon</h5>
                                    <p class="mb-0">(021) 1234-5678</p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <i class="fas fa-envelope text-primary fs-4 me-3 mt-1"></i>
                                <div>
                                    <h5 class="mb-1">Email</h5>
                                    <p class="mb-0">info@sekolahmodern.ac.id</p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <i class="fas fa-clock text-primary fs-4 me-3 mt-1"></i>
                                <div>
                                    <h5 class="mb-1">Jam Operasional</h5>
                                    <p class="mb-0">Senin - Jumat: 08.00 - 16.00</p>
                                    <p class="mb-0">Sabtu: 08.00 - 12.00</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h5 class="mb-2">Media Sosial</h5>
                                <div class="d-flex">
                                    <a href="#" class="social-icon me-2"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="social-icon me-2"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="social-icon me-2"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-4">Ada Pertanyaan?</h4>
                            <form>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nama_kontak" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_kontak" placeholder="Masukkan nama lengkap">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email_kontak" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email_kontak" placeholder="Masukkan email">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subjek</label>
                                    <input type="text" class="form-control" id="subject" placeholder="Masukkan subjek">
                                </div>
                                <div class="mb-3">
                                    <label for="pesan" class="form-label">Pesan</label>
                                    <textarea class="form-control" id="pesan" rows="5" placeholder="Masukkan pesan atau pertanyaan Anda"></textarea>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection(); ?>