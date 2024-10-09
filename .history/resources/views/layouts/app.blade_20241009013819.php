<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- title -->
    <title>Cars - @yield('title', 'Home')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:ital,wght@1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    @yield('css')
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="#">Logo Here</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <div class="mx-auto">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active fw-semibold fs-6 ms-2" aria-current="page"
                                href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold fs-6 ms-2" href="#">New Cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold fs-6 ms-2" href="#">Used Cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold fs-6 ms-2" href="{{ route('news.index') }}">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold fs-6 ms-2" href="#">Services</a>
                        </li>
                    </ul>
                </div>
                <!-- Right aligned Log In and Sign Up buttons -->
                <ul class="navbar-nav mb-lg-0">
                    @guest


                        @if (Route::has('login'))
                            {{-- <li>
                                <a href="{{ route('login') }}">{{ __('messages.Login') }}</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="btn btn-outline-danger fw-semibold fs-6 ms-2" href="{{ route('login') }}">LogIn</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            {{-- <li>
                                <a href="{{ route('register') }}">{{ __('messages.Register') }}</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="btn btn-danger fw-semibold fs-6 ms-2" href="{{ route('register') }}">Sign Up</a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="#" {{ Auth::user()->name }} </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger fw-semibold fs-6 ms-2"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('messages.Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>



    @section('content')
        <section class="who_us">
            <div class="container">
                <div class="row">
                    <div class="high col-md-6">
                        <p class="high_text_lg">High Performance Cars
                            in your hands</p>
                        <p class="high_lorem">Lorem ipsum dolor sit amet consectetur.
                            Commodo ut tincidunt tincidunt purus
                            aenean curabitur. Eget ipsum vitae in
                            aliquam turpis facilisi. Vestibulum

                        </p>
                        <button class="high_btn">Shop Now</button>
                    </div>
                    <div class="high_image col-md-6">
                        <img class="high_img" src="{{ asset('assets/img/app/wallpaperflare.com_wallpaper (2).jpg') }}" alt="">
                    </div>
                </div>
            </div>

        </section>
        <section class="offer mt-3">
            <div class="offer_for_you container text-center">
                <p style="color: #EE2628;">
                    OUR BENEFITS
                </p>
                <h1>WHAT WE OFFER FOR YOU</h1>
                <p style="color:  #6C6C6C;">"We offer everything you need to find the perfect car, with competitive prices
                    and exceptional services."</p>
            </div>
        </section>
        <section class="car mt-3">
            <div class="container">
                <div class="row">
                    <div class="car_img col-md-3">
                        <div class="car_content">
                            <img src="{{ asset('assets/img/') }}./assest/1.jpeg" alt="Trusted Quality">
                            <div class="overlay_text">Trusted Quality</div>
                        </div>
                    </div>
                    <div class="car_img col-md-3">
                        <div class="car_content">
                            <img src="./assest/2.jpeg" alt="Flexible Payments">
                            <div class="overlay_text">Flexible Payments</div>
                        </div>
                    </div>
                    <div class="car_img col-md-3">
                        <div class="car_content">
                            <img src="./assest/3.jpeg" alt="Expert Maintenance">
                            <div class="overlay_text">Expert Maintenance</div>
                        </div>
                    </div>
                    <div class="car_img col-md-3">
                        <div class="car_content">
                            <img src="./assest/4.jpeg" alt="Trade-In Offers">
                            <div class="overlay_text">Trade-In Offers</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="new_car mt-5">
            <div class="title text-center">
                <h1>New Cars</h1>
                <div class="border"></div>
            </div>

            <div class="container mt-3">
                <div class="row">
                    <div class="new_car_car col-md-4">
                        <div class="car_card">
                            <img src="./assest/ca1.jpeg" alt="2024 Chevrolet Camaro ILT Convertible">
                            <div class="car_details">
                                <h4>2024 Chevrolet Camaro ILT Convertible</h4>
                                <p><strong>Exterior:</strong> Black</p>
                                <p><strong>Engine:</strong> 5.7L V-8 Gas V</p>
                                <p><strong>Fuel Type:</strong> Gas</p>
                                <div class="car_status">NEW</div>
                            </div>
                        </div>
                    </div>
                    <div class="new_car_car col-md-4">
                        <div class="car_card">
                            <img src="./assest/ca2.jpeg" alt="2023 Dodge Challenger R/T RWD">
                            <div class="car_details">
                                <h4>2023 Dodge Challenger R/T RWD</h4>
                                <p><strong>Exterior:</strong> Triple Nickel Clearcoat</p>
                                <p><strong>Engine:</strong> 5.7L V-8 Gas V</p>
                                <p><strong>Fuel Type:</strong> Gas</p>
                                <div class="car_status">NEW</div>
                            </div>
                        </div>
                    </div>
                    <div class="new_car_car col-md-4">
                        <div class="car_card">
                            <img src="./assest/ca3.jpeg" alt="2024 Ram 2500 Tradesman">
                            <div class="car_details">
                                <h4>2024 Ram 2500 Tradesman</h4>
                                <p><strong>Exterior:</strong> Black</p>
                                <p><strong>Engine:</strong> 6.4L V-8 Gas V</p>
                                <p><strong>Fuel Type:</strong> Gas</p>
                                <div class="car_status">NEW</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="new_car mt-5">
            <div class="title text-center">
                <h1>Used Cars</h1>
                <div class="border"></div>
            </div>

            <div class="container mt-3">
                <div class="row">
                    <div class="new_car_car col-md-4">
                        <div class="car_card">
                            <img src="./assest/ca1.jpeg" alt="2024 Chevrolet Camaro ILT Convertible">
                            <div class="car_details">
                                <h4>2024 Chevrolet Camaro ILT Convertible</h4>
                                <p><strong>Exterior:</strong> Black</p>
                                <p><strong>Engine:</strong> 5.7L V-8 Gas V</p>
                                <p><strong>Fuel Type:</strong> Gas</p>
                                <div class="car_status">Used</div>
                            </div>
                        </div>
                    </div>
                    <div class="new_car_car col-md-4">
                        <div class="car_card">
                            <img src="./assest/ca2.jpeg" alt="2023 Dodge Challenger R/T RWD">
                            <div class="car_details">
                                <h4>2023 Dodge Challenger R/T RWD</h4>
                                <p><strong>Exterior:</strong> Triple Nickel Clearcoat</p>
                                <p><strong>Engine:</strong> 5.7L V-8 Gas V</p>
                                <p><strong>Fuel Type:</strong> Gas</p>
                                <div class="car_status">Used</div>
                            </div>
                        </div>
                    </div>
                    <div class="new_car_car col-md-4">
                        <div class="car_card">
                            <img src="./assest/ca3.jpeg" alt="2024 Ram 2500 Tradesman">
                            <div class="car_details">
                                <h4>2024 Ram 2500 Tradesman</h4>
                                <p><strong>Exterior:</strong> Black</p>
                                <p><strong>Engine:</strong> 6.4L V-8 Gas V</p>
                                <p><strong>Fuel Type:</strong> Gas</p>
                                <div class="car_status">Used</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="feedback mt-5 ">
            <div class="title ms-5">
                <h1>What people are saying about us</h1>
                <div class="border1"></div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="testimonial-card">
                        <span class="testimonial-icon">🌟🌟🌟🌟</span>
                        <h3 class="testimonial-title">Great selection of cars.</h3>
                        <p class="testimonial-text">The website helped me find my dream car!</p>
                        <p class="testimonial-date">10 September 2024</p>
                    </div>
                    <div class="testimonial-card">
                        <span class="testimonial-icon">🌟</span>
                        <h3 class="testimonial-title">Great selection of cars.</h3>
                        <p class="testimonial-text">The website helped me find my dream car!</p>
                        <p class="testimonial-date">10 September 2024</p>
                    </div>
                    <div class="testimonial-card">
                        <span class="testimonial-icon">🌟</span>
                        <h3 class="testimonial-title">Great selection of cars.</h3>
                        <p class="testimonial-text">The website helped me find my dream car!</p>
                        <p class="testimonial-date">10 September 2024</p>
                    </div>

                </div>
            </div>
        </section>
    @show

    <footer class="footer">
        <div class="container">
            <div class="row">

                <div class="footer-col">
                    <img class="logo"></img>
                </div>

                <div class="footer-col">
                    <h3>Contact Info</h3>
                    <br>
                    <ul>
                        <li><a href="#"> Address: <br><span> Egypt,Cairo</span></a></li><br>
                        <li><a href="#"> Phone: <br><span>+20110000000</span></a></li><br>
                        <li><a href="#"> Email: <br><span>AUtoExample@gmail.com</span></a></li>
                    </ul>

                </div>

                <div class="footer-col">
                    <diV class="social-links">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                    </diV>

                    <ul>
                        <li><a href="#">© 1998 to 2024 CarGurus Cairo Limited, All Rights Reserved</a></li><br>
                        <li><a href="#">PistonHeads® is a registered trademark of CarGurus Egypt Limited</a></li>
                        <br>
                        <li><a href="#">CarGurus Cairo Limited, 1 Tahrir Square, 3rd Floor, Cairo, Egypt</a></li>
                        <br>
                        <li><a href="#">This site is protected by reCAPTCHA and the Google Privacy Policy and
                                Terms of Service apply.</a></li>
                    </ul>

                </div>

            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    @yield('script')
</body>

</html>
