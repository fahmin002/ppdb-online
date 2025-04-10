<?= $this->extend('layout/user/template'); ?>
<?= $this->section('content'); ?>
    <style>
        :root {
            --primary-blue: #1a73e8;
            --secondary-blue: #4285f4;
            --light-blue: #e8f0fe;
            --dark-blue: #0d47a1;
            --white: #ffffff;
            --light-gray: #f8f9fa;
        }
        
        
        .header {
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            color: var(--white);
            padding: 80px 0;
            text-align: center;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .header h1 {
            font-weight: 700;
            letter-spacing: 1px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .header p {
            font-size: 18px;
            max-width: 600px;
            margin: 0 auto;
            opacity: 0.9;
        }
        
        .gallery-container {
            padding: 20px;
        }
        
        .gallery-item {
            margin-bottom: 30px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        
        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }
        
        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
            transition: all 0.5s ease;
        }
        
        .gallery-item:hover img {
            transform: scale(1.05);
        }
        
        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(26, 115, 232, 0.8), rgba(26, 115, 232, 0.2));
            opacity: 0;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: var(--white);
            text-align: center;
        }
        
        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }
        
        .gallery-title {
            font-weight: 600;
            font-size: 20px;
            margin-bottom: 10px;
            transform: translateY(20px);
            transition: all 0.4s ease;
            opacity: 0;
        }
        
        .gallery-description {
            font-size: 14px;
            transform: translateY(20px);
            transition: all 0.4s ease 0.1s;
            opacity: 0;
        }
        
        .gallery-item:hover .gallery-title,
        .gallery-item:hover .gallery-description {
            transform: translateY(0);
            opacity: 1;
        }
        
        .gallery-buttons {
            margin-top: 15px;
            transform: translateY(20px);
            transition: all 0.4s ease 0.2s;
            opacity: 0;
        }
        
        .gallery-item:hover .gallery-buttons {
            transform: translateY(0);
            opacity: 1;
        }
        
        .btn-gallery {
            background-color: var(--white);
            color: var(--primary-blue);
            border: none;
            border-radius: 30px;
            padding: 8px 20px;
            margin: 0 5px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-gallery:hover {
            background-color: var(--dark-blue);
            color: var(--white);
            transform: scale(1.05);
        }
        
        .btn-gallery i {
            margin-right: 5px;
        }
        
        .filter-buttons {
            margin-bottom: 30px;
            text-align: center;
        }
        
        .filter-btn {
            background-color: var(--white);
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
            border-radius: 30px;
            padding: 10px 25px;
            margin: 0 5px 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .filter-btn:hover, .filter-btn.active {
            background-color: var(--primary-blue);
            color: var(--white);
        }
        
        .search-box {
            max-width: 600px;
            margin: 0 auto 30px;
        }
        
        .search-box input {
            border-radius: 30px;
            padding: 12px 25px;
            border: 2px solid var(--light-blue);
            transition: all 0.3s ease;
        }
        
        .search-box input:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.25rem rgba(26, 115, 232, 0.25);
        }
        
        .no-results {
            text-align: center;
            padding: 50px 0;
            color: var(--primary-blue);
        }
        
        footer {
            background: linear-gradient(135deg, var(--dark-blue), var(--primary-blue));
            color: var(--white);
            padding: 30px 0;
            margin-top: 30px;
        }
        
        .social-icons a {
            color: var(--white);
            margin: 0 10px;
            font-size: 24px;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            transform: translateY(-5px);
            opacity: 0.8;
        }
        
        /* Animation for items */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animated {
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        /* Custom styles for lightbox */
        .lb-data .lb-caption {
            font-size: 18px;
            font-weight: 600;
            color: var(--white);
        }
        
        .lb-data .lb-details {
            margin-top: 10px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 767px) {
            .header {
                padding: 50px 0;
            }
            
            .header h1 {
                font-size: 28px;
            }
            
            .header p {
                font-size: 16px;
            }
            
            .gallery-item {
                margin-bottom: 20px;
            }
            
            .gallery-item img {
                height: 200px;
            }
            
            .filter-buttons {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="header">
    <div class="container">
        <h1 class="mb-3">Keseharian di Sekolah Kami</h1>
        <p>Rekam aktivitas pembelajaran, ekstrakurikuler, dan kehidupan sosial di lingkungan sekolah</p>      
    </div>
</header>
    
    <!-- Main Gallery Section -->
    <div class="container gallery-container">
        <!-- Search Box -->
        <div class="row">
            <div class="col-md-12">
                <div class="search-box">
                    <input type="text" class="form-control" id="gallerySearch" placeholder="Search gallery items...">
                </div>
            </div>
        </div>
        
        <!-- Filter Buttons -->
        <div class="filter-buttons">
            <button class="btn filter-btn active" data-filter="all">All</button>
            <button class="btn filter-btn" data-filter="nature">Nature</button>
            <button class="btn filter-btn" data-filter="architecture">Architecture</button>
            <button class="btn filter-btn" data-filter="people">People</button>
            <button class="btn filter-btn" data-filter="technology">Technology</button>
        </div>
        
        <!-- Gallery Grid -->
        <div class="row" id="galleryGrid">
            <!-- Gallery Item 1 -->
            <div class="col-lg-4 col-md-6 gallery-item-wrapper" data-category="nature" data-title="Mountain Landscape">
                <div class="gallery-item animated" style="animation-delay: 0.1s;">
                    <a href="/img/image.png" data-lightbox="gallery" data-title="Beautiful mountain landscape with a lake reflecting the snowy peaks">
                        <img src="/img/image.png" alt="Mountain Landscape" class="img-fluid">
                        <div class="gallery-overlay">
                            <h3 class="gallery-title">Mountain Landscape</h3>
                            <p class="gallery-description">Beautiful mountain landscape with a lake reflecting the snowy peaks</p>
                            <div class="gallery-buttons">
                                <button class="btn btn-gallery"><i class="fas fa-expand"></i> View</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <!-- Gallery Item 2 -->
            <div class="col-lg-4 col-md-6 gallery-item-wrapper" data-category="architecture" data-title="Modern Building">
                <div class="gallery-item animated" style="animation-delay: 0.2s;">
                    <a href="/img/image.png" data-lightbox="gallery" data-title="Striking modern architecture with glass facades reflecting the blue sky">
                        <img src="/img/image.png" alt="Modern Building" class="img-fluid">
                        <div class="gallery-overlay">
                            <h3 class="gallery-title">Modern Building</h3>
                            <p class="gallery-description">Striking modern architecture with glass facades reflecting the blue sky</p>
                            <div class="gallery-buttons">
                                <button class="btn btn-gallery"><i class="fas fa-expand"></i> View</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <!-- Gallery Item 3 -->
            <div class="col-lg-4 col-md-6 gallery-item-wrapper" data-category="people" data-title="Creative Team">
                <div class="gallery-item animated" style="animation-delay: 0.3s;">
                    <a href="/img/image.png" data-lightbox="gallery" data-title="Creative team collaborating on an exciting new project">
                        <img src="/img/image.png" alt="Creative Team" class="img-fluid">
                        <div class="gallery-overlay">
                            <h3 class="gallery-title">Creative Team</h3>
                            <p class="gallery-description">Creative team collaborating on an exciting new project</p>
                            <div class="gallery-buttons">
                                <button class="btn btn-gallery"><i class="fas fa-expand"></i> View</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <!-- Gallery Item 4 -->
            <div class="col-lg-4 col-md-6 gallery-item-wrapper" data-category="technology" data-title="Tech Workspace">
                <div class="gallery-item animated" style="animation-delay: 0.4s;">
                    <a href="/img/image.png" data-lightbox="gallery" data-title="Modern technology workspace with multiple screens and devices">
                        <img src="/img/image.png" alt="Tech Workspace" class="img-fluid">
                        <div class="gallery-overlay">
                            <h3 class="gallery-title">Tech Workspace</h3>
                            <p class="gallery-description">Modern technology workspace with multiple screens and devices</p>
                            <div class="gallery-buttons">
                                <button class="btn btn-gallery"><i class="fas fa-expand"></i> View</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <!-- Gallery Item 5 -->
            <div class="col-lg-4 col-md-6 gallery-item-wrapper" data-category="nature" data-title="Forest Path">
                <div class="gallery-item animated" style="animation-delay: 0.5s;">
                    <a href="/img/image.png" data-lightbox="gallery" data-title="Serene forest path with sunlight filtering through the trees">
                        <img src="/img/image.png" alt="Forest Path" class="img-fluid">
                        <div class="gallery-overlay">
                            <h3 class="gallery-title">Forest Path</h3>
                            <p class="gallery-description">Serene forest path with sunlight filtering through the trees</p>
                            <div class="gallery-buttons">
                                <button class="btn btn-gallery"><i class="fas fa-expand"></i> View</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <!-- Gallery Item 6 -->
            <div class="col-lg-4 col-md-6 gallery-item-wrapper" data-category="architecture" data-title="Historic Building">
                <div class="gallery-item animated" style="animation-delay: 0.6s;">
                    <a href="/img/image.png" data-lightbox="gallery" data-title="Historic architecture with ornate details and classic design">
                        <img src="/img/image.png" alt="Historic Building" class="img-fluid">
                        <div class="gallery-overlay">
                            <h3 class="gallery-title">Historic Building</h3>
                            <p class="gallery-description">Historic architecture with ornate details and classic design</p>
                            <div class="gallery-buttons">
                                <button class="btn btn-gallery"><i class="fas fa-expand"></i> View</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <!-- Gallery Item 7 -->
            <div class="col-lg-4 col-md-6 gallery-item-wrapper" data-category="people" data-title="Business Meeting">
                <div class="gallery-item animated" style="animation-delay: 0.7s;">
                    <a href="/img/image.png" data-lightbox="gallery" data-title="Professional business team in a strategic planning meeting">
                        <img src="/img/image.png" alt="Business Meeting" class="img-fluid">
                        <div class="gallery-overlay">
                            <h3 class="gallery-title">Business Meeting</h3>
                            <p class="gallery-description">Professional business team in a strategic planning meeting</p>
                            <div class="gallery-buttons">
                                <button class="btn btn-gallery"><i class="fas fa-expand"></i> View</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <!-- Gallery Item 8 -->
            <div class="col-lg-4 col-md-6 gallery-item-wrapper" data-category="technology" data-title="Smart Devices">
                <div class="gallery-item animated" style="animation-delay: 0.8s;">
                    <a href="/img/image.png" data-lightbox="gallery" data-title="Collection of modern smart devices and gadgets">
                        <img src="/img/image.png" alt="Smart Devices" class="img-fluid">
                        <div class="gallery-overlay">
                            <h3 class="gallery-title">Smart Devices</h3>
                            <p class="gallery-description">Collection of modern smart devices and gadgets</p>
                            <div class="gallery-buttons">
                                <button class="btn btn-gallery"><i class="fas fa-expand"></i> View</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <!-- Gallery Item 9 -->
            <div class="col-lg-4 col-md-6 gallery-item-wrapper" data-category="nature" data-title="Ocean View">
                <div class="gallery-item animated" style="animation-delay: 0.9s;">
                    <a href="/img/image.png" data-lightbox="gallery" data-title="Breathtaking ocean view with waves crashing on the shore">
                        <img src="/img/image.png" alt="Ocean View" class="img-fluid">
                        <div class="gallery-overlay">
                            <h3 class="gallery-title">Ocean View</h3>
                            <p class="gallery-description">Breathtaking ocean view with waves crashing on the shore</p>
                            <div class="gallery-buttons">
                                <button class="btn btn-gallery"><i class="fas fa-expand"></i> View</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- No Results Message -->
        <div id="noResults" class="no-results" style="display: none;">
            <i class="fas fa-search fa-3x mb-3"></i>
            <h3>No gallery items match your search</h3>
            <p>Try using different keywords or clear your search</p>
        </div>
    </div>   
    
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Lightbox
            lightbox.option({
                'resizeDuration': 300,
                'wrapAround': true,
                'showImageNumberLabel': false,
                'fadeDuration': 300
            });
            
            // Filter functionality
            $('.filter-btn').on('click', function() {
                var filterValue = $(this).data('filter');
                
                // Update active button
                $('.filter-btn').removeClass('active');
                $(this).addClass('active');
                
                if (filterValue === 'all') {
                    $('.gallery-item-wrapper').show();
                } else {
                    $('.gallery-item-wrapper').hide();
                    $('.gallery-item-wrapper[data-category="' + filterValue + '"]').show();
                }
                
                checkNoResults();
            });
            
            // Search functionality
            $('#gallerySearch').on('input', function() {
                var searchTerm = $(this).val().toLowerCase();
                
                $('.gallery-item-wrapper').each(function() {
                    var title = $(this).data('title').toLowerCase();
                    var category = $(this).data('category').toLowerCase();
                    var description = $(this).find('.gallery-description').text().toLowerCase();
                    
                    if (title.includes(searchTerm) || category.includes(searchTerm) || description.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
                
                checkNoResults();
            });
            
            // Check if there are no visible items
            function checkNoResults() {
                if ($('.gallery-item-wrapper:visible').length === 0) {
                    $('#noResults').fadeIn();
                } else {
                    $('#noResults').fadeOut();
                }
            }
            
            // Animation on scroll
            $(window).on('scroll', function() {
                $('.gallery-item').each(function() {
                    if (isElementInViewport(this) && !$(this).hasClass('animated-in')) {
                        $(this).addClass('animated-in');
                    }
                });
            });
            
            // Helper function to check if element is in viewport
            function isElementInViewport(el) {
                var rect = el.getBoundingClientRect();
                return (
                    rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.bottom >= 0
                );
            }
            
            // Initialize the hover effect for gallery buttons
            $('.gallery-item').hover(
                function() {
                    $(this).find('.gallery-buttons').css('opacity', '1');
                },
                function() {
                    $(this).find('.gallery-buttons').css('opacity', '0');
                }
            );
            
            // Open lightbox when clicking on gallery item
            $('.gallery-item').on('click', function(e) {
                if (!$(e.target).hasClass('btn-gallery')) {
                    $(this).find('a').click();
                }
            });
        });
    </script>
</body>
</html>
<?= $this->endSection(); ?>