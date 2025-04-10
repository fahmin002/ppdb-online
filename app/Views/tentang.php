<?= $this->extend('layout/user/template') ?>
<?= $this->section('content') ?>
<!-- Tentang Sekolah Section -->
<section id="tentang" class="py-5">
    <div class="container">
        <h2 class="section-title">Tentang SMP PGRI 1 Puring</h2>
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="https://lh5.googleusercontent.com/p/AF1QipOPCyIScfHMKxg_a0qixi6yBvX_r5SYMxRqyy7x=w408-h306-k-no" alt="placeholder" class="img-fluid rounded-3 shadow">
            </div>
            <div class="col-lg-6">
                <p class="mb-4">SMP PGRI 1 Puring merupakan lembaga pendidikan yang berdiri sejak tahun 1987 dengan visi menjadi institusi pendidikan unggulan yang menghasilkan generasi berkarakter, berintegritas, dan berdaya saing global.</p>
                <p class="mb-4">Dengan fasilitas modern dan tenaga pengajar berkualitas, kami berkomitmen memberikan pendidikan terbaik untuk mengembangkan potensi akademik dan non-akademik setiap siswa.</p>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Testimoni Siswa</h2>
        <div class="row">
            <div class="col-md-4 mb-md-0 mb-4">
                <div class="card h-100 border-0 shadow-sm fade-in">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <img src="/api/placeholder/50/50" alt="Siswa 1" class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0">Ahmad Rizky</h6>
                                <p class="text-muted small mb-0">Kelas XII - Ekskul Robotik</p>
                            </div>
                        </div>
                        <p class="card-text">"Ekstrakurikuler robotik mengajarkan saya tentang pemrograman, elektronika, dan kerja tim yang sangat bermanfaat. Kami juga berhasil menjuarai beberapa kompetisi nasional."</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-md-0 mb-4">
                <div class="card h-100 border-0 shadow-sm fade-in">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <img src="/api/placeholder/50/50" alt="Siswa 2" class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0">Siti Aminah</h6>
                                <p class="text-muted small mb-0">Kelas XI - Ekskul Seni Musik</p>
                            </div>
                        </div>
                        <p class="card-text">"Bergabung dengan ekskul musik membuka wawasan saya tentang berbagai genre musik. Kami belajar bermain alat musik dan tampil di berbagai acara sekolah."</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-md-0 mb-4">
                <div class="card h-100 border-0 shadow-sm fade-in">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <img src="/api/placeholder/50/50" alt="Siswa 3" class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0">Budi Santoso</h6>
                                <p class="text-muted small mb-0">Kelas X - Ekskul Basket</p>
                            </div>
                        </div>
                        <p class="card-text">"Ekskul basket tidak hanya mengajarkan teknik bermain, tapi juga nilai-nilai sportivitas dan kerja sama tim. Pengalaman yang sangat berharga."</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
                <iframe class="mt-md-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3299.7471290871777!2d109.52432750000001!3d-7.734621199999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e65348b26597d97%3A0x6203a5c6282278a5!2sSMP%20PGRI%201%20PURING!5e1!3m2!1sid!2sid!4v1744035057045!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
<?= $this->endSection() ?>