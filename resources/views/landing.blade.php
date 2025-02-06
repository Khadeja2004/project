@extends('layouts.app')
 @section('content')
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Tryaq Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    

    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<meta name="theme-color" content="#7952b3">

    <!-- إضافة خط عربي من Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@700&display=swap" rel="stylesheet">

    <!-- إضافة CSS مخصص -->
    <style>
        .brand-arabic {
            font-family: 'Noto Naskh Arabic', serif;
            font-size: 2rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .brand-arabic:hover {
            color: #f8f9fa;
        }

        /* تعديل موضع زر القائمة المنسدلة */
        .navbar-toggler {
            order: -1;
        }

        /* تعديل موضع عربة التسوق */
        .btn-outline-light {
            margin-left: auto;
        }

        @media (max-width: 767.98px) {
            .brand-arabic {
                font-size: 1.5rem;
            }
        }

        .custom-btn {
            background-color: transparent;
            color: white;
            padding: 10px 25px;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid white;
            display: inline-block;
            margin-top: 20px;
        }

        .custom-btn:hover {
            background-color: white;
            color: black;
            border: 2px solid white;
        }

        .carousel-caption {
            top: 50%;
            transform: translateY(-50%);
            bottom: auto;
            text-align: center;
        }

        /* إزالة classes text-start و text-end من جميع carousel-caption */
        .carousel-caption.text-start,
        .carousel-caption.text-end {
            text-align: center;
        }

        /* تغير الألوان الأساسية */
        body {
            background-color: #f0f0f0;
            color: #333;
        }

        /* إضافة ظل للنص */
        h1, h2, h3 {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* تحسين التصميم المتجاوب */
        @media (max-width: 768px) {
            .carousel-caption {
                padding: 20px;
            }
        }

        /* إضافة تأثيرات hover */
        .custom-btn, .animated-btn {
            background-color: white;
            color: black;
            padding: 10px 25px;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid white;
            display: inline-block;
            margin-top: 20px;
        }

        .custom-btn:hover, .animated-btn:hover {
            background-color: transparent;
            color: white;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        /* إضافة خطوط جديدة */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
        }

        .testimonials {
            padding: 100px 0;
            background-color: #f0f0f0;
        }

        .testimonial-card {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
        }

        .testimonial-card p {
            font-size: 16px;
            color: #666;
            margin-bottom: 15px;
        }

        .testimonial-card h5 {
            font-size: 18px;
            font-weight: 700;
            color: #333;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
    </style>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  </head>
  <body>
    
<header>


<main>

    <!-- Indicators -->
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="3"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="4"></li>
    </ol>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images\4996365.jpg') }}" class="bd-placeholder-img w-100" style="object-fit: cover; height: 100vh;" alt="Slide 1">
            <div class="container">
                <div class="carousel-caption">
                  
                    <p><a class="custom-btn" href="{{ route('shop.index') }}">SHOP NOW</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/bearded-traveler-male-dressed-fleece-shirt-with-backpack-posing-grey-background.jpg') }}" class="bd-placeholder-img w-100" style="object-fit: cover; height: 100vh;" alt="Slide 2">
            <div class="container">
                <div class="carousel-caption">
                   
                    <p><a class="custom-btn" href="{{ route('shop.index') }}">SHOP NOW</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/201.jpg') }}" class="bd-placeholder-img w-100" style="object-fit: cover; height: 100vh;" alt="Slide 3">
            <div class="container">
                <div class="carousel-caption">
                  
                    <p><a class="custom-btn" href="{{ route('shop.index') }}">SHOP NOW</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/alireza-esmaeeli-jO2Ge4jkueo-unsplash.jpg') }}" class="bd-placeholder-img w-100" style="object-fit: cover; height: 100vh;" alt="Slide 4">
            <div class="container">
                <div class="carousel-caption">
                    
                    <p><a class="custom-btn" href="{{ route('shop.index') }}">SHOP NOW</a></p>
                </div>
            </div>
        </div>
    </div>

    <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>

<!-- Controls -->

<!-- شريط الأخبار المتحرك -->


<style>
    .news-ticker {
        background: #000;
        padding: 10px 0;
        overflow: hidden;
        position: relative;
    }

    .ticker-wrap {
        width: 100%;
        overflow: hidden;
    }

    .ticker {
        display: inline-flex;
        white-space: nowrap;
        animation: ticker 30s linear infinite;
    }

    .ticker-item {
        padding: 0 2rem;
        color: white;
        font-weight: bold;
    }

    @keyframes ticker {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
</style>

<!-- Vision & Mission Section -->
 <section class="who-is-tryaq">
    <h2>WHO IS ElMoore </h2>
    <p>A quiet yet powerful presence that bridges the gap between the past and the present. ElMoore is more than a name; it is an echo of ancient wisdom, drawn from a word that means "cure." It speaks to the heart of our vission: to offer not just clothes, but a sense of renewal, a return to comfort, and a canvas for personal expression.</p>
</section>

<style>
    .who-is-tryaq {
        padding: 50px 20px;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .who-is-tryaq h2 {
        margin-bottom: 20px;
    }

    .who-is-tryaq p {
        line-height: 1.6;
    }
</style> 

<style>
    .vision-mission {
        padding: 100px 0;
        background-color: #f8f9fa;
    }

    .section-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 2rem;
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 70%;
        height: 3px;
        background: #000000;
    }

    .content-card {
        position: relative;
        background: #fff;
        padding: 40px;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.5s ease;
        min-height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .content-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, transparent 0%, rgba(0,0,0,0.02) 100%);
        z-index: 1;
    }

    .card-content {
        position: relative;
        z-index: 2;
    }

    .icon-circle {
        width: 70px;
        height: 70px;
        background: #000;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
        transition: all 0.5s ease;
    }

    .icon-circle i {
        font-size: 30px;
        color: #fff;
    }

    .content-card h3 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    .content-card p {
        font-size: 16px;
        line-height: 1.6;
        color: #666;
        margin: 0;
    }

    .hover-content {
        position: absolute;
        bottom: 40px;
        right: 40px;
        z-index: 2;
    }

    .number {
        font-size: 48px;
        font-weight: 700;
        color: rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .line {
        width: 0;
        height: 3px;
        background: #000;
        transition: all 0.5s ease;
        margin-top: 10px;
    }

    /* Hover Effects */
    .content-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
    }

    .content-card:hover .icon-circle {
        transform: scale(1.1);
    }

    .content-card:hover .line {
        width: 100%;
    }

    .content-card:hover .number {
        color: rgba(0,0,0,0.2);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .section-title {
            font-size: 2.5rem;
        }

        .content-card {
            padding: 30px;
            min-height: 250px;
        }

        .icon-circle {
            width: 60px;
            height: 60px;
        }

        .icon-circle i {
            font-size: 24px;
        }

        .content-card h3 {
            font-size: 24px;
        }

        .number {
            font-size: 36px;
        }
    }
</style>

<!-- Our Services Section -->


<style>
    .our-services {
        padding: 100px 0;
        position: relative;
        overflow: hidden;
        background: #000000;
        color: #ffffff;
    }

    .animated-background::before {
        content: '';
        position: absolute;
        width: 200%;
        height: 200%;
        top: -50%;
        left: -50%;
        z-index: 0;
        background: linear-gradient(
            45deg,
            rgba(50, 50, 50, 0.1) 0%,
            rgba(70, 70, 70, 0.2) 30%,
            rgba(90, 90, 90, 0.3) 40%,
            rgba(50, 50, 50, 0.1) 50%,
            rgba(70, 70, 70, 0.2) 60%,
            rgba(90, 90, 90, 0.3) 70%,
            rgba(50, 50, 50, 0.1) 100%
        );
        animation: backgroundAnimation 15s linear infinite;
        transform-origin: center center;
    }

    .animated-background::after {
        content: '';
        position: absolute;
        width: 200%;
        height: 200%;
        top: -50%;
        left: -50%;
        z-index: 0;
        background: linear-gradient(
            -45deg,
            rgba(40, 40, 40, 0.1) 0%,
            rgba(60, 60, 60, 0.2) 30%,
            rgba(80, 80, 80, 0.3) 40%,
            rgba(40, 40, 40, 0.1) 50%,
            rgba(60, 60, 60, 0.2) 60%,
            rgba(80, 80, 80, 0.3) 70%,
            rgba(40, 40, 40, 0.1) 100%
        );
        animation: backgroundAnimation2 20s linear infinite;
        transform-origin: center center;
    }

    .service-card {
        position: relative;
        z-index: 1;
        background: #ffffff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 40px;
        border-radius: 20px;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .service-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        background: #f8f8f8;
    }

    .service-icon {
        width: 70px;
        height: 70px;
        background: #333333;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        transition: all 0.5s ease;
    }

    .service-icon i {
        font-size: 30px;
        color: #ffffff;
    }

    .service-card:hover .service-icon {
        background: #444444;
        transform: scale(1.1) rotate(5deg);
    }

    .service-card h3 {
        color: #000000;
        margin-bottom: 15px;
    }

    .service-card p {
        color: #333333;
    }

    .section-title {
        color: #ffffff;
    }

    @keyframes backgroundAnimation {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes backgroundAnimation2 {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(-360deg);
        }
    }
</style>

<!-- Testimonials Section -->

        

<!-- Our Team Section -->

<style>
    .our-team {
        padding: 100px 0;
        background-color: #e9ecef;
    }

    .team-card {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .team-img {
        width: 100%;
        height: auto;
        border-radius: 50%;
        margin-bottom: 15px;
    }

    .team-card h3 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .team-card p {
        font-size: 16px;
        color: #666;
    }
</style>

<!-- FOOTER -->
  

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      
  </body>
</html>
@endsection
