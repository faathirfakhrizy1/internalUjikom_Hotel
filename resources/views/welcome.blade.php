<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100">
    <!-- Navbar section -->
    <header class="header_wrapper">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <!-- <img src="../assets/HHB.png" class="img-fluid" alt="logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-stream navbar-toggler-icon"></i>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav menu-navbar-nav">
                        @if(Auth::guest())
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#about">about</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#rooms">rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#Location">Location</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link">|</a>
                        </li>
                        @if (Route::has('login'))
                            @auth
                                {{-- <a href="{{ url('/home') }}" class="nav-link">Home</a> --}}
                            @else
                                <li class="nav-item">
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                                    @endif
                                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                                </li>
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Navbar section exit -->

    <!-- Banner section -->
    <section id="home" class="banner_wrapper p-0">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url(./../assets/hotel1.jpg);">
                    <div class="slide-caption text-center">
                        <div>
                            <h1>welcome to hotel Hebat</h1>
                            <p>Hotel yang Bersih, Sehat, Aman dan Hebat, dengan harga yang terjangkau anda bisa menginap disini dengan puas </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image: url(./../assets/hotel2.jpg);">
                    <div class="slide-caption text-center">
                        <div>
                            <h1>welcome to hotel Hebat</h1>
                            <p>Hotel yang Bersih, Sehat, Aman dan Hebat, dengan harga yang terjangkau anda bisa menginap disini dengan puas </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- Banner section exit -->

    <!-- About section -->
    <section id="about" class="about_wrapper">
        <div class="container">
            <div class="row flex-lg-row flex-column-reverse ">
                <div class="col-lg-6 text-center text-lg-start">
                    <h3>Welcome to <span>Hotel Hebat<br class="d-none d-lg-block">
                            the haven</span> of your weekend</h3>
                    <p>lorum luptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                        dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum
                        quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius</p>
                    <p>lorum luptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                        dolores eos qui ratione voluptatem</p>
                    <a href="#home" class="main-btn mt-4">Explore</a>
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0 ps-lg-4 text-center">
                    <img src="../assets/HHB.png" class="img-fluid" alt="About Us">
                </div>

            </div>
        </div>
    </section>
    <!-- About section exit -->

    <!-- Rooms section -->
    <section id="rooms" class="rooms_wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 section-title text-center mb-5">
                    <h6>What I can do for you</h6>
                    <h3>Our Favorite Rooms</h3>
                </div>
            </div>
            <div class="row m-0">

                <div class="col-md-4 mb-4 mb-lg-0">
                    <div class="room-item">
                        <img src="./../assets/kamar1.jpg" class="img-fluid">
                        <div class="room-item-wrap">
                            <div class="room-content">
                                <h1 class="text-white mb-lg-5 ml-2 text-decoration-underline">Regular</h1>
                                <a class="main-btn border-white text-white mt-lg-2"
                                    href="{{ route('kamar.regular') }}">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4 mb-lg-0">
                    <div class="room-item">
                        <img src="./../assets/kamar2.png" class="img-fluid">
                        <div class="room-item-wrap">
                            <div class="room-content">
                                <h1 class="text-white mb-lg-5 ml-2 text-decoration-underline">Deluxe</h1>
                                <a class="main-btn border-white text-white mt-lg-2"
                                    href="{{ route('kamar.deluxe') }}">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-lg-0">
                    <div class="room-item">
                        <img src="./../assets/kamar6.jpg" class="img-fluid">
                        <div class="room-item-wrap">
                            <div class="room-content">
                                <h1 class="text-white mb-lg-5 ml-2 text-decoration-underline">Ekonomi</h1>
                                <a class="main-btn border-white text-white mt-lg-2"
                                    href="{{ route('kamar.ekonomi') }}">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section Exit -->

    <!-- Services section -->
    <section id="services" class="services_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 section-title text-center mb-3">

                </div>
            </div>
        </div>
        <div class="counter mt-3">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-2 mb-lg-0 mb-md-0 mb-5">
                        <h1>
                            <img src="./../assets/wifi.png" alt="">
                        </h1>
                        {{-- <p>Free Wifi</p> --}}
                    </div>
                    <div class="col-md-2 mb-lg-0 mb-md-0 mb-5">
                        <h1>
                            <img src="./../assets/tv.png" alt="">
                            </h2>
                            {{-- <p>Television</p> --}}
                    </div>
                    <div class="col-md-2 mb-lg-0 mb-md-0 mb-5">
                        <h1>
                            <img src="./../assets/toilet.png" alt="">
                            </h2>
                            {{-- <p>Toiletries</p> --}}
                    </div>
                    <div class="col-md-2 mb-lg-0 mb-md-0 mb-5">
                        <h1>
                            <img src="./../assets/water.png" alt="">
                            </h2>
                            {{-- <p>Mineral</p> --}}
                    </div>
                    <div class="col-md-2 mb-lg-0 mb-md-0 mb-5">
                        <h1>
                            <img src="./../assets/shower.png" alt="">
                            </h2>
                            {{-- <p>Washrooms</p> --}}
                    </div>
                    <div class="col-md-2 mb-lg-0 mb-md-0 mb-5">
                        <h1>
                            <img src="./../assets/clothes.png" alt="">
                            </h2>
                            {{-- <p>Spotless Linen</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services section Exit -->

    <!-- Pricing section -->
    <section id="Location" class="rooms_wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 section-title text-center mb-5">
                    <h6>Enjoy Standardised Accommodations in your Favourite Destinations</h6>
                    <h3>Our Location</h3>
                </div>
            </div>
            <div class="row m-0">
                <div class="col-md-4 mb-4 mb-lg-0">
                    <div class="room-item">
                        <img src="./../assets/bali.jpg" width="500px"  class="img-fluid">
                        <div class="room-item-wrap">
                            <div class="room-content">
                                <h5 class="text-white mb-lg-5 text-decoration-underline text-center">BALI</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-lg-0">
                    <div class="room-item">
                        <img src="./../assets/candijogja.jpg" class="img-fluid">
                        <div class="room-item-wrap">
                            <div class="room-content">
                                <h5 class="text-white mb-lg-5 text-decoration-underline text-center">YOGYA</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-lg-0">
                    <div class="room-item">
                        <img src="./../assets/jakarta.jpg" class="img-fluid">
                        <div class="room-item-wrap">
                            <div class="room-content">
                                <h5 class="text-white mb-lg-5 text-decoration-underline text-center">JAKARTA</h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Pricing Section Exit  -->

    <!-- Footer section -->
    <section id="contact" class="footer_wrapper mt-3 mt-md-0 pb-0">
        <div class="container pb-3">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <h5>Hotel Location</h5>
                    <p class="ps-0">Hotel Hebat berlokasi di Jalan Otto Iskandardinata kampung tanjung RT 003/RW 013, Pasawahan, Kec. Tarogong Kaler, Kabupaten Garut, Jawa Barat 44151</p>
                    <div class="contact-info">
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="fa fa-home me-3"></i> Tarogong Kaler, Kab Garut</a></li>
                            <li><a href="#"><i class="fa fa-phone me-3"></i>+6 666 666</a></li>
                            <li><a href="#"><i class="fa fa-envelope me-3"></i>info@hotelhebat.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Stay Connected</h5>
                    <ul class="social-network d-flex align-items-center p-0">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Newsletter</h5>
                    <div class="form-group mb-4">
                        <input type="email" class="form-control bg-transparent" placeholder="enter your email here">
                        <button type="submit" class="main-btn rounded-2 mt-3 border-white text-white">Subscribe</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid copyright-section">
            <p>Copyright <a href="#">@HotelHebat.</a> All Rights Reserved</p>
        </div>
    </section>
    <!-- Footer section exit -->

    <!-- Bootstrap 5 JS CDN Links -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/7db3ce39be.js" crossorigin="anonymous"></script>

    <!-- Custom Js Link -->
    <script src="../js/script.js"></script>
</body>

</html>
