 <!-- Footer -->
 <footer class="footer">
     <div class="container">
         <div class="row">
             <div class="col-lg-4 mb-4 mb-lg-0">
                 <h5>SMP PGRI 1 Puring</h5>
                 <p>Where Tomorrow's Leaders Come Together</p>
                 <div class="mt-3">
                     <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                     <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                     <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                     <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                 </div>
             </div>
             <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                 <h5>Tautan Cepat</h5>
                 <ul class="list-unstyled">
                     <li><a href="#" class="footer-link">Beranda</a></li>
                     <li><a href="#tentang" class="footer-link">Tentang Kami</a></li>
                     <li><a href="#kegiatan" class="footer-link">Kegiatan</a></li>
                     <li><a href="#kurikulum" class="footer-link">Kurikulum</a></li>
                     <li><a href="#jadwal" class="footer-link">Jadwal PPDB</a></li>
                 </ul>
             </div>
             <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                 <h5>Tautan Lainnya</h5>
                 <ul class="list-unstyled">
                     <li><a href="#" class="footer-link">Fasilitas</a></li>
                     <li><a href="#" class="footer-link">Galeri</a></li>
                     <li><a href="#" class="footer-link">Prestasi</a></li>
                     <li><a href="#" class="footer-link">Berita</a></li>
                     <li><a href="#" class="footer-link">Karir</a></li>
                 </ul>
             </div>
             <div class="col-lg-4 col-md-4">
                 <h5>Kontak Kami</h5>
                 <address>
                     <p><i class="fas fa-map-marker-alt me-2"></i> Jl. Pendidikan No. 123, Kota Modern, Indonesia 12345</p>
                     <p><i class="fas fa-phone-alt me-2"></i> (021) 1234-5678</p>
                     <p><i class="fas fa-envelope me-2"></i> info@sekolahmodern.ac.id</p>
                 </address>
             </div>
         </div>
         <div class="copyright">
             <p>&copy; 2025 SMP PGRI 1 Puring - PPDB. All Rights Reserved.</p>
         </div>
     </div>
 </footer>

 <!-- Back to Top Button -->
 <a href="#" class="btn btn-primary btn-lg back-to-top" role="button" style="position: fixed; bottom: 20px; right: 20px; display: none;"><i class="fas fa-arrow-up"></i></a>

 <!-- Scripts -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>
 <script>
     // Initialize tooltips
     var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
     var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
         return new bootstrap.Tooltip(tooltipTriggerEl)
     })

     // Back to top button
     window.onscroll = function() {
         if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
             document.querySelector('.back-to-top').style.display = "block";
         } else {
             document.querySelector('.back-to-top').style.display = "none";
         }
     };

     // Smooth scrolling for anchor links
     document.querySelectorAll('a[href^="#"]').forEach(anchor => {
         anchor.addEventListener('click', function(e) {
             e.preventDefault();

             const targetId = this.getAttribute('href');
             if (targetId === '#') return;

             const targetElement = document.querySelector(targetId);
             if (targetElement) {
                 window.scrollTo({
                     top: targetElement.offsetTop - 70,
                     behavior: 'smooth'
                 });
             }
         });
     });

     // Fade-in animation on scroll
     const fadeElements = document.querySelectorAll('.fade-in');

     const fadeInOnScroll = function() {
         fadeElements.forEach(element => {
             const elementPosition = element.getBoundingClientRect().top;
             const windowHeight = window.innerHeight;

             if (elementPosition < windowHeight - 50) {
                 element.classList.add('active');
             }
         });
     };

     // Execute on load
     fadeInOnScroll();

     // Execute on scroll
     window.addEventListener('scroll', fadeInOnScroll);

     // Form submission (prevent default for demo)
     const forms = document.querySelectorAll('form');
     forms.forEach(form => {
         form.addEventListener('submit', function(e) {
             e.preventDefault();
             alert('Form submitted successfully! This is a demo.');
         });
     });
 </script>
 <script src="/js/login.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>
 </body>

 </html>