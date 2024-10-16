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
    <link rel="icon" href={{ asset('/assets/img/app/favicon.ico') }} type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            <a class="navbar-brand fw-bold fs-3" href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/img/app/Nav.png') }}" class="nav-logo" alt="">
            </a>
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
                        <!-- Cars (with sub-menu) -->
                        <li class="nav-item dropdown">
                            <a class="nav-link fw-semibold fs-6 ms-2" href="{{ route('car.index') }}">Cars</a> <!-- Direct link -->

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if (auth()->check() && auth()->user()->role == 'admin')
                                    <li><a class="dropdown-item" href="{{ route('car.table') }}">Cars Requests</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('car.index') }}">All Cars</a></li>
                                <li><a class="dropdown-item" href="{{ route('car.create') }}">Sell your Car</a></li>
                                @if (auth()->check() && auth()->user()->role == 'admin')
                                    <li><a class="dropdown-item" href="{{ route('car.archived') }}">Archived Cars</a></li>
                                @endif

                            </ul>
                        </li>
                        <!-- News (with sub-menu) -->
                        <li class="nav-item dropdown">
                            <a class="nav-link fw-semibold fs-6 ms-2" href="{{ route('news.index') }}">News</a>

                            @if (auth()->check() && auth()->user()->role == 'admin')
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('news.create') }}">Create new news</a></li>
                                </ul>
                            @endif
                        </li>
                        <!-- Tags (with sub-menu) -->
                        @if (auth()->check() && auth()->user()->role == 'admin')
                            <li class="nav-item dropdown">
                                <a class="nav-link fw-semibold fs-6 ms-2" href="{{ route('tag.index') }}">Tags</a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('tag.create') }}">Create new tag</a></li>
                                </ul>
                            </li>

                        @endif
                        <li class="nav-item">
                            <a class="nav-link fw-semibold fs-6 ms-2" href="{{ route('services') }}">Services</a>
                        </li>
                    </ul>
                </div>
                <!-- Right aligned Log In and Sign Up buttons -->
                <ul class="navbar-nav mb-lg-0">
                    @guest


                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="btn btn-outline-danger fw-semibold fs-6 ms-2" href="{{ route('login') }}">LogIn</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
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
                                {{ __('Logout') }}
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
                        <button onclick="window.location.href='{{ route('car.index') }}'" class="high_btn">Buy Now</button>
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
                            <img src="{{ asset('assets/img/app/1.jpeg') }}" alt="Trusted Quality">
                            <div class="overlay_text">Trusted Quality</div>
                        </div>
                    </div>
                    <div class="car_img col-md-3">
                        <div class="car_content">
                            <img src="{{ asset('assets/img/app/2.jpeg') }}" alt="Flexible Payments">
                            <div class="overlay_text">Flexible Payments</div>
                        </div>
                    </div>
                    <div class="car_img col-md-3">
                        <div class="car_content">
                            <img src="{{ asset('assets/img/app/3.jpeg') }}" alt="Expert Maintenance">
                            <div class="overlay_text">Expert Maintenance</div>
                        </div>
                    </div>
                    <div class="car_img col-md-3">
                        <div class="car_content">
                            <img src="{{ asset('assets/img/app/4.jpeg') }}" alt="Trade-In Offers">
                            <div class="overlay_text">Trade-In Offers</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @isset($cars)
            <section class="new_car mt-5">
                <div class="title text-center">
                    <h2><a href="{{ route('car.index') }}" style="">Cars</a></h2>
                    <div class="border"></div>
                </div>

                <div class="container mt-3">
                    <div class="row">
                        @foreach($cars as $car)
                            <div class="new_car_car col-md-4">
                                <div class="car_card">
                                    <img src="{{ asset('assets/img/cars/' .$car->image ) }}" alt="{{ $car->car_model }}">
                                    <div class="car_details">
                                        <h4><strong>Type:</strong> {{ $car->type }}{{ $car->car_model }}</h4>
                                        <p><strong>Color:</strong> {{ $car->color }}</p>
                                        @if ($car->plate)
                                            <p><strong>Plate Number:</strong> {{ $car->plate }}</p>
                                        @endif
                                        <p><strong>Price:</strong> EGP {{ number_format($car->price)}}</p>
                                        <div class="car_status">{{ strtoupper($car->status) }}</div>
                                        @if ($car->description)
                                            <p><strong>Description:</strong> {{ substr($car->description, 0, 30) }}...</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endisset

        @isset($news)
            <section class="new_car mt-5">
                <div class="title text-center">
                    <h2><a href="{{ route('news.index') }}" style="">News Cars</a></h2>
                    <div class="border"></div>
                </div>

                <div class="container mt-3">
                    <div class="row">
                        @foreach($news as $new)
                            <div class="new_car_car col-md-4">
                                <div class="car_card">
                                    <div class="card mb-3 news_card @foreach ($new->tags as $tag){{ str_replace(' ', '', $tag->tag).' ' }}@endforeach">
                                        <strong>
                                            {{'By '. $new->user->name }}
                                        </strong>

                                        @if ($new->created_at == $new->updated_at)
                                            {{ ", created at" }} {{ date("Y-m-d h:m", strtotime($new->created_at)) }}
                                        @else
                                            {{ ", updated at" }} {{ date("Y-m-d h:m", strtotime($new->updated_at)) }}
                                        @endif
                                        @if(count($new->tags)>0)
                                            <div class="badge-container">
                                                <p class="tags-label">Tags:</p>
                                                @foreach ($new->tags as $tag)
                                                    <span class="badge badge-primary custom-badge">
                                                        {{ $tag->tag }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @endisset

                                        <b class="news-title">{{ $new->title }}</b>
                                        <br>

                                        <img class="news-image" src="{{ asset("assets/img/news/".$new->image) }}" alt="{{ $new->title }}">

                                        @if (strlen($new->content) > 30)
                                            <p class="news-content">{{ substr($new->content, 0, 30) }}...</p>
                                        @else
                                            <p class="news-content">{{ $new->content }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </section>
        @endisset

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
                    <img src="{{ asset('assets/img/app/Footer.png') }}" class="nav-logo" alt="">
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
