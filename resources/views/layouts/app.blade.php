<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', 'ageisegy_shop')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa:wght@400;700&family=Baskervville+SC&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
            
            :root {
                --primary-color: #ffffff;
                --text-color: #000000;
                --hover-color: #333333;
                --bg-color: #F7D4FD;
            }
            
            body {
                font-family: 'Inter', sans-serif;
                background-color: #F0FFF0;
            }
            
            .navbar {
                background-color: white !important;
                padding: 15px 0;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            }
            
            .nav-wrapper {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
            }
            
            .navbar-brand {
                font-family: 'Aref Ruqaa', serif;
                font-weight: 700;
                font-size: 3.5rem !important;
                color: #000000 !important;
                text-decoration: none;
                transition: color 0.3s ease;
                margin: 0;
                padding: 0;
                line-height: 1;
                letter-spacing: 2px;
            }

            .navbar-brand:hover {
                opacity: 0.8;
            }
            
            .nav-icons {
                display: flex;
                align-items: center;
                gap: 15px;
            }
            
            .nav-icons button,
            .nav-icons a {
                background: none;
                border: none;
                color: #333 !important;
                font-size: 18px;
                padding: 5px;
            }
            
            .navbar-collapse {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                padding: 15px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                z-index: 1000;
            }
            
            .nav-link {
                font-family: 'Inter', sans-serif;
                color: #666666 !important;
                text-align: right;
                padding: 10px 15px;
                font-weight: 500;
                letter-spacing: -0.3px;
            }

            .nav-link:hover {
                color: #333333 !important;
                transition: color 0.3s ease;
            }
            
            .search-bar {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                padding: 15px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                z-index: 1000;
            }
            
            .search-bar .form-control {
                border-radius: 20px 0 0 20px;
            }
            
            .search-bar .btn {
                border-radius: 0 20px 20px 0;
                border-color: #2E8B57;
                color: #2E8B57;
            }
            
            .search-bar .btn:hover {
                background-color: #ffffff;
                color: white;
            }
            
            .btn-outline-light {
                border-color: var(--text-color);
                color: var(--text-color);
            }
            
            .btn-outline-light:hover {
                background-color: var(--text-color);
                color: var(--primary-color);
            }
            
            /* .footer {
                background-color: #F7D4FD !important;
                color: var(--text-color) !important;
                padding: 3rem 0 2rem;
                margin-top: 5rem;
            }
            
            .footer h5 {
                font-weight: bold;
                margin-bottom: 1.5rem;
                font-size: 1.2rem;
            }
            
            .footer ul li {
                margin-bottom: 0.8rem;
            }
            
            .footer a {
                color: var(--text-color) !important;
                text-decoration: none;
                transition: color 0.3s ease;
            }
            
            .footer a:hover {
                color: #666666 !important;
            }
            
            .footer hr {
                border-color: rgba(255,255,255,0.1);
                margin: 2rem 0;
            }
            
            .footer .text-center {
                font-size: 0.9rem;
                opacity: 0.8;
            } */
            
            @media (max-width: 767px) {
                .navbar-brand {
                    font-size: 1.5rem;
                }
                
                .footer {
                    padding: 2rem 0 1rem;
                    text-align: center;
                }
                
                .footer h5 {
                    margin-top: 1.5rem;
                }
            }
            

            footer .quick-links{
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px 50px;
            }

            footer .quik-link-header{
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 20px;
            }
            
            footer{
                background: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            footer .col-info{
                padding-top:40px;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 20px;
            }

            footer .col-info img{
                background-color: var(--bg-color);
                padding: 15px;
                border-radius: 50%;
            }
            footer .col-info a{
                color: #000;
                text-decoration: none;
            }
            footer .col-info span{
                color: gray;
                font-size: 14px;
            }
            .form-control {
                background-color: white !important;
                border: 1px solid black !important;
                color: black !important;
            }
            
            .form-control::placeholder {
                color: #666666 !important;
            }
            
            .form-control:focus {
                box-shadow: none !important;
                border-color: black !important;
            }
            
            .card {
                transition: transform 0.2s, box-shadow 0.2s;
                border: none;
            }
            
            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            }
            
            /* تنسيق أيقونة الواتساب */
            .whatsapp-float {
                position: fixed;
                bottom: 20px;
                right: 20px;
                background-color: white;
                color: #000;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                text-align: center;
                font-size: 24px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.2);
                display: flex;
                align-items: center;
                justify-content: center;
                text-decoration: none;
                transition: all 0.3s ease;
                z-index: 1000;
                border: 2px solid #000;
            }

            .whatsapp-float:hover {
                transform: scale(1.1);
                color: white;
                background-color: #000;
            }

            .whatsapp-float i {
                line-height: 50px;
            }

            /* إضافة هذه الأنماط إلى قسم الـ styles */
            /* ستايل زر المنيو */
            .menu-btn {
                background: none;
                border: none;
                padding: 8px;
                cursor: pointer;
                display: flex;
                flex-direction: column;
                gap: 6px;
                width: 35px;
            }

            .menu-btn span {
                display: block;
                width: 100%;
                height: 2px;
                background-color: #333;
                transition: all 0.3s ease;
                border-radius: 2px;
            }

            /* ستايل أيقونات الموبايل */
            .mobile-icons {
                display: flex;
                align-items: center;
                gap: 15px;
            }

            .mobile-icons button,
            .mobile-icons a {
                background: none;
                border: none;
                padding: 5px;
                color: #333;
                font-size: 18px;
            }

            /* ستايل البحث في الموبايل */
            .mobile-search {
                width: 100%;
                padding: 10px 0;
            }

            .mobile-search .form-control {
                border-radius: 20px 0 0 20px;
            }

            .mobile-search .btn {
                border-radius: 0 20px 20px 0;
            }

            /* تنسيق البراند في الموبايل */
            @media (max-width: 991px) {
                .navbar-brand {
                    margin: 0 !important;
                    font-size: 2.2rem !important;
                }

                .mobile-header {
                    padding: 10px 0;
                }

                .navbar {
                    padding: 0 !important;
                }

                #navbarNav {
                    position: absolute;
                    top: 100%;
                    left: 0;
                    right: 0;
                    background: white;
                    padding: 15px;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                    z-index: 1000;
                }

                .nav-item {
                    margin: 10px 0;
                    text-align: right;
                }
            }

            .font-allura {
                font-family: 'Allura', cursive;
            }

            /* تحديث خط العناوين */
            h1, h2, h3, h4, h5, h6, .navbar-brand {
                font-family: 'Inter', sans-serif;
                font-weight: 700;
                letter-spacing: -0.5px;
            }

            /* تحديث خط البطاقات */
            .card-title {
                font-family: 'Inter', sans-serif;
                font-weight: 600;
                letter-spacing: -0.5px;
            }

            .card-text {
                font-family: 'Inter', sans-serif;
                font-weight: 400;
            }

            /* تحديث أسعار المنتجات */
            .price {
                font-family: 'Inter', sans-serif;
                font-weight: 500;
                letter-spacing: -0.3px;
            }

            /* للخط Oswald */
            .oswald-heading {
                font-family: "Oswald", sans-serif;
                font-optical-sizing: auto;
                font-weight: 500; /* يمكنك اختيار وزن من 200 إلى 700 */
                font-style: normal;
            }

            /* للخط Baskervville SC */
            .baskervville-sc-regular {
                font-family: "Baskervville SC", serif;
                font-weight: 400;
                font-style: normal;
            }

            /* للخط Aref Ruqaa */
            .aref-ruqaa-regular {
                font-family: "Aref Ruqaa", serif;
                font-weight: 400;
                font-style: normal;
            }

            .aref-ruqaa-bold {
                font-family: "Aref Ruqaa", serif;
                font-weight: 700;
                font-style: normal;
            }
        </style>
        @yield('styles')
    </head>
    <body>
        <!-- Header -->
        <nav class="navbar">
            <div class="container">
                <div class="nav-wrapper">
                    <!-- زر المنيو -->
                    <button class="menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <!-- البراند في النص -->
                    <a class="navbar-brand" href="{{ route('shop.index') }}">
                        <img src="{{ asset('images/title.png') }}" alt="Elmorre" style="width: 150px;">
                    </a>

                    <!-- أيقونات البحث والسلة -->
                    <div class="nav-icons">
                        <button class="search-toggle">
                            <i class="fas fa-search"></i>
                        </button>
                        <a href="{{ route('shop.index')}}" class="cart-icon">
                            <i class="fas fa-shopping-bag"></i>
                        </a>
                    </div>
                </div>

                <!-- شريط البحث -->
                <div class="search-bar collapse">
                    <form class="d-flex" action="" method="GET">
                        <input class="form-control" type="search" name="query" placeholder="ابحث عن منتج">
                        <button class="btn btn-outline-light" type="submit">بحث</button>
                    </form>
                </div>
            

                <!-- القائمة المنسدلة -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop.index') }}">PRODUCTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('socialmedia') }}">CONTACT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sizeshart') }}"> SIZES CHART</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="container mt-5">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer mt-5 py-4">
            <div class="container">
                <div class="quick-links">
                    <img src="{{ asset('images/new image.png') }}" alt="">
                    <div class="quik-link-header">
                        <h2>Quick Links</h2>
                        <p>Explore More Here</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                    <div class="col-info">
                            <img src="{{ asset('images/newicon3.png') }}" alt="">
                            <p><a href="{{ route('sizeshart') }}">Privacy Policy</a></p>
                            <span>Know your rights and responsibilities. Read our terms.</span>
                        </div>
                        </div>
                        <div class="col-4">
                            <div class="col-info">
                                <img src="{{ asset('images/newicon2.png') }}" alt="">
                                <p><a href="{{ route('socialmedia') }}">Contact Us</a></p>
                                <span>Need assistance? Reach out our friendly support team.</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="col-info">
                                <img src="{{ asset('images/newicon.png') }}" alt="">
                                <p><a href="{{ route('shop.index') }}">Shop Now</a></p>
                                <span>Join the fashion elite. Shop our best sellers now!</span>
                            </div>
                            </div>
                </div>
            </div>
        </footer>

        <!-- WhatsApp Floating Icon -->
        <a href="https://wa.me/201156429081" class="whatsapp-float" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.min.css"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.min.css"></script>
        <script>
            // إضافة الجافاسكربت
document.addEventListener('DOMContentLoaded', function() {
    const searchToggle = document.querySelector('.search-toggle');
    const searchBar = document.querySelector('.search-bar');
    
    if(searchToggle && searchBar) {
        searchToggle.addEventListener('click', function() {
            searchBar.classList.toggle('show');
        });
    }

    // إغلاق القوائم عند لنقر خارجها
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.navbar')) {
            searchBar.classList.remove('show');
            document.querySelector('#navbarNav').classList.remove('show');
        }
    });
            });
        </script>
        @yield('scripts')
    </body>
</html>