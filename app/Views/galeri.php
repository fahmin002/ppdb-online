<?= $this->extend('layout/user/template'); ?>
<?= $this->section('content'); ?>
<!-- Galeri Section -->
<section id="gallery" class="gallery">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-10 text-center mt-2">               
                <h2>Galeri Foto</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, itaque?</p>
            </div>
        </div>

        <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 justify-content-center">
            <div class="col mt-3">
                <a href="/img/image.png" data-toggle="lightbox" data-caption="Sandhika & Nofa 1" data-gallery="mygallery">
                    <img src="/img/image.png" alt="Sandhika & Nofa 1" class="img-fluid w-100 rounded">
                </a>
            </div>
            <div class="col mt-3">
                <a href="/img/image.png" data-toggle="lightbox" data-caption="Sandhika & Nofa 1" data-gallery="mygallery">
                    <img src="/img/image.png" alt="Sandhika & Nofa 1" class="img-fluid w-100 rounded">
                </a>
            </div>
            <div class="col mt-3">
                <a href="/img/image.png" data-toggle="lightbox" data-caption="Sandhika & Nofa 1" data-gallery="mygallery">
                    <img src="/img/image.png" alt="Sandhika & Nofa 1" class="img-fluid w-100 rounded">
                </a>
            </div>
            <div class="col mt-3">
                <a href="/img/image.png" data-toggle="lightbox" data-caption="Sandhika & Nofa 1" data-gallery="mygallery">
                    <img src="/img/image.png" alt="Sandhika & Nofa 1" class="img-fluid w-100 rounded">
                </a>
            </div>
            <div class="col mt-3">
                <a href="/img/image.png" data-toggle="lightbox" data-caption="Sandhika & Nofa 5"
                    data-gallery="mygallery">
                    <img src="/img/image.png" alt="Sandhika & Nofa 5" class="img-fluid w-100 rounded">
                </a>
            </div>
            <div class="col mt-3">
                <a href="/img/image.png" data-toggle="lightbox" data-caption="Sandhika & Nofa 6"
                    data-gallery="mygallery">
                    <img src="/img/image.png" alt="Sandhika & Nofa 6" class="img-fluid w-100 rounded">
                </a>
            </div>
        </div>
        <div class="row" style="margin-top: 70px;">
            <a href="https://www.youtube.com/watch?v=WAeQgXaHcxg" data-toggle="lightbox" data-gallery="youtubevideos" class="col-sm-4">
                <img src="/img/image.png" class="img-fluid">
            </a>
            <a href="https://youtu.be/iQ4D273C7Ac?start=30" data-toggle="lightbox" data-gallery="youtubevideos" class="col-sm-4">
                <img src="https://i1.ytimg.com/vi/iQ4D273C7Ac/mqdefault.jpg" class="img-fluid mt-2">
            </a>
            <a href="//www.youtube.com/embed/dQw4w9WgXcQ" data-toggle="lightbox" data-gallery="youtubevideos" class="col-sm-4">
                <img src="https://i1.ytimg.com/vi/dQw4w9WgXcQ/mqdefault.jpg" class="img-fluid mt-2 sm-0">
            </a>
        </div>
    </div>
</section>



<style>
    .gallery {
        background-color: #f5f5f5;
        font-size: 1rem;
        font-weight: 300;
        padding: 20px 0;
    }
</style>
<?= $this->endSection(); ?>