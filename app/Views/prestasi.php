<?= $this->extend('layout/user/template') ?>
<?= $this->section('content') ?>
    <!-- Tentang Sekolah Section -->
    <?php
        $prestasi = [
            array(
                "title" => "Siswa SMP PGRI 1 Puring Raih Prestasi Gemilang di POPDA 2024",
                "image" => "https://smppgri1puring.sch.id/media_library/posts/large/17293f7b0403c431dfdd30b8f84a6ce5.jpg",
                "content" => [
                    "Riska Putri Ayulisa – Meraih medali dalam cabang Pencak Silat setelah menampilkan kemampuan luar biasa di atas gelanggang.",
                    "Taqib Ngabdulloh – Membuktikan kekuatannya dengan meraih medali dalam cabang Atletik Tolak Peluru dengan lemparan terbaiknya."
                ]
                ),
            array(
                "title"=> "Tim Bola Voli Putra SMP PGRI 1 Puring Raih Juara 1 di Festival Pandan Kuning 2024",
                "image"=> "https://smppgri1puring.sch.id/media_library/posts/large/97ae15574af06bd4bf23b86bc2eb0093.jpg",
                "content"=> [
                    "SMP PGRI 1 Puring kembali menorehkan prestasi luar biasa! Tim Bola Voli Putra kami berhasil meraih Juara 1 dalam Turnamen Bola Voli Festival Pandan Kuning 2024 yang diikuti oleh sekolah-sekolah se-Kabupaten Kebumen."
                ]
            ),
            array(
                "title"=> "SMP PGRI 1 Puring Raih Juara 1 Voli Putra, Juara 2 Voli Putri, dan Juara 3 GPS Yogyakarta",
                "image"=> "https://smppgri1puring.sch.id/media_library/posts/medium/3e6e52db8dcfe2016e2f068732dea58f.jpg",
                "content"=> [
                    "SMP PGRI 1 Puring kembali mengukir prestasi gemilang di berbagai ajang kejuaraan! Dalam rangka HUT RI Kecamatan Puring, tim Voli Putra kami berhasil meraih Juara 1, sementara tim Voli Putri sukses menyabet Juara 2. Kedua tim menunjukkan semangat juang tinggi dan kerja keras yang luar biasa sepanjang turnamen."
                    ]
                ),
            array(
                "title"=> "SMP PGRI 1 Puring Raih Juara 3 Putri di Jambore & Kemah Wisata Pantai Suwuk",
                "image"=> "https://smppgri1puring.sch.id/media_library/posts/medium/5d95c73f71b5d34009213d7af4547a49.jpg",
                "content"=> [ "SMP PGRI 1 Puring dengan bangga mengumumkan bahwa tim putri kami berhasil meraih Juara 3 dalam ajang Jambore & Kemah Wisata Pantai Suwuk. Keberhasilan ini merupakan hasil dari kerja keras, semangat kebersamaan, dan keterampilan yang ditunjukkan oleh para peserta selama kegiatan."
                ]
            )
        ]
    ?>
    <section id="prestasi" class="py-5">
        <h2 class="section-title">Prestasi Yang Diraih</h2>
        <?php for ($i = 0; $i < count($prestasi); $i++) { ?>
            <div class="container card">
                <a target="_blank" href="https://smppgri1puring.sch.id/read/<?= $i + 1 ?>/<?= strtolower(str_replace(' ', '-', $prestasi[$i]['title'])) ?>" class="row align-items-center card-body text-decoration-none">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img src="<?= $prestasi[$i]['image'] ?>" alt="placeholder" class="img-fluid rounded-3 shadow">
                    </div>
                    <div class="col-lg-6">
                        <p class="mb-4 font-weight-bold" style="font-weight: bold"><?= $prestasi[$i]['title'] ?></p>
                            <?php foreach ($prestasi[$i]['content'] as $content) { ?>
                                <p><?= $content ?></p>
                            <?php } ?>
                    </div>
                </a>
            </div>
        <?php } ?>
    </section>
<?= $this->endSection() ?>