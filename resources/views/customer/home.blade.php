@extends('layouts.guest')
@section('title', 'Hotel Hebat')
@section('content')
    <!--================Banner Area =================-->
    <section class="banner_area" id="home">
        <div class="booking_table d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
            </div>
            <div class="container">
                <div class="banner_content text-center">
                    <h1> Hotel Hebat</h1>
                    <p class="text-white">Hotel yang Bersih, Sehat, Aman dan Hebat, dengan harga yang terjangkau anda bisa menginap disini
                        dengan puas </p>
                </div>
            </div>
        </div>
    </section>
    <!--================Banner Area =================-->

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
                    <a href="#" class="main-btn mt-4">Explore</a>
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0 ps-lg-4 text-center">
                    <img src="../assets/HHB.png" class="img-fluid" alt="About Us">
                </div>

            </div>
        </div>
    </section>
    <!-- About section exit -->

    <section id="rooms" class="rooms_wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 section-title text-center mb-5">
                    <h6>What I can do for you</h6>
                    <h3>Our Favorite Rooms</h3>
                </div>
            </div>
            <div class="row m-0">
                @foreach ($type as $tp)
                    <div class="col-md-4 mb-4 mb-lg-0">
                        <div class="room-item">
                            <img src="{{ asset('images/' . $tp->foto) }}" class="img-fluid" alt="">
                            <div class="room-item-wrap">
                                <div class="room-content">
                                    <h1 class="text-white mb-lg-5 ml-2 text-decoration-underline">{{ $tp->name }}</h1>
                                    <p class="text-white">@currency($tp->harga)<small>/Malam</small></p>
                                    <a class="main-btn border-white text-white mt-lg-2"
                                        href="{{ route('detail', $tp->id) }}">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================ Accomodation Area  =================-->

    <!-- Services section -->
    <section id="services" class="services_wrapper">
        <div class="counter mt-3">
            <div class="container">
                <div class="row text-center">
                    <h1></h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Services section Exit -->

       <!-- Location section -->
       <section id="price" class="rooms_wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 section-title text-center mb-5">
                    <h6>Enjoy Standardised Accommodations in your Favourite Destinations</h6>
                    <h3>Our Location</h3>
                </div>
            </div>
            <div class="row m-0">
               <!--  <div class="col-md-4 mb-4 mb-lg-0">
                    <div class="room-item">
                        <img src="./../assets/bandung.jpg" width="500px" class="img-fluid">
                        <div class="room-item-wrap">
                            <div class="room-content">
                                <h5 class="text-white mb-lg-5 text-decoration-underline text-center">BANDUNG</h5>
                            </div>
                        </div>
                    </div>
                </div> -->
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
    <!-- Location Section Exit  -->

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
    <!--================ Contact Area  =================-->
@endsection
