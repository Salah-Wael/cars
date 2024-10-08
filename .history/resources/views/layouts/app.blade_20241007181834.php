<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- title -->
    <title>Sala7 - @yield('title','Home')</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    @yield('css')

    @vite('resources/js/app.js')
</head>

<body >
{{-- <body @if(session('locale') == 'ar') dir="rtl" @endif> --}}

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="/">
                                <h2><span class="orange-text">Sala7</span></h2>
                                {{-- <img src="{{ asset('assets/img/logo.png') }}" alt=""> --}}
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="current-list-item"><a href="/">{{ __('messages.home') }}</a></li>
                                <li><a href="{{route('product.index')}}">{{ __('messages.Products') }}</a></li>
                                <li><a href="{{route('category.index')}}">{{ __('messages.Categories') }}</a></li>

                                @if (Auth::user() && Auth::user()->role == 'admin')
                                    <li><a href="#">Admin</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('product.create') }}">Create Product</a></li>
                                            <li><a href="{{ route('product.table') }}">Products Table</a></li>
                                            <li><a href="{{ route('orders') }}">ALL Orders</a></li>
                                            <li><a href="{{ route('news.create') }}">create News</a></li>
                                            <li><a href="{{ route('tag.create') }}">create Tag</a></li>
                                            <li><a href="{{ route('tag.index') }}">All the Tags</a></li>
                                            <li><a href="{{ route('category.create') }}">create Category</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Test</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('test.offers') }}">Offers</a></li>
                                        </ul>
                                    </li>
                                @endif
                                <li><a href="{{ route('news.index') }}">{{ __('messages.News') }}</a></li>
                                <li><a href="{{ route('contact') }}">{{ __('messages.contact') }}</a></li>
                                <li><a href="{{ route('about') }}">{{ __('messages.about') }}</a></li>
                                @if (Auth::check())
                                    <li><a href="">{{ __('messages.Shop') }}</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('cart.show') }}">Cart</a></li>
                                            <li><a href="{{ route('checkout.show') }}">Check Out</a></li>
                                            <li><a href="{{ route('previous.checkout.show') }}">Previous Check Out Orders</a></li>
                                        </ul>
                                    </li>
                                @endif
                                <li>
                                    <a href="#">{{ __('messages.Languages') }}</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('language.change', 'ar') }}">{{ __('messages.Arabic') }}</a></li>
                                        <li><a href="{{ route('language.change', 'en') }}">English</a></li>
                                    </ul>
                                </li>
                                @guest
                                    @if (Route::has('login'))
                                        <li >
                                            <a  href="{{ route('login') }}">{{ __('messages.Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li >
                                            <a href="{{ route('register') }}">{{ __('messages.Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li >
                                        <a  href="#"
                                            {{ Auth::user()->name }}
                                        </a>
                                    </li>
                                    <li >
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            {{ __('messages.Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest

                                <li>
                                    <div class="header-icons">
                                        @if (Auth::check())
                                            @php
                                                $productsCountInCart = DB::table('carts')->where('user_id', Auth::user()->id)->count()
                                            @endphp
                                            <a class="shopping-cart" href="{{ route('cart.show') }}">
                                                <i class="fas fa-shopping-cart">
                                                </i>
                                                <span class="orange-text">{{ $productsCountInCart }}</span>
                                            </a>
                                        @endif
                                        <a class="mobile-hide search-bar-icon" href="#">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>{{ __('messages.Search for') }}</h3>
                            <form action="{{ 'search' }}" method="POST">
                            @csrf
                                <input type="text" name='search' placeholder="{{ __('messages.Search') }}">
                                <button type="submit">{{ __('messages.Search') }} <i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->

    @if (session('success'))
            <div style="height:40px;color:black;background-image: linear-gradient(to right,#DF63FF,#82E9EF);display: flex;align-items: center;justify-content: center;">
            {{ session('success')  }}
            </div>
    @endif
    @if (session('message'))
            <div style="height:40px;color:black;background-image: linear-gradient(to right,#DF63FF,#82E9EF);display: flex;align-items: center;justify-content: center;">
            {{ session('message')  }}
            </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

@section('content')
    <!-- home page slider -->
    <div class="homepage-slider">
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Fresh & Organic</p>
                                <h2>Delicious Seasonal Fruits</h2>
                                <div class="hero-btns">
                                    <a href="{{ route('product.category.show', 'fruits') }}" class="boxed-btn">Fruit Collection</a>
                                    <a href="{{route('contact')}}" class="bordered-btn">{{ __('messages.contact') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Fresh Everyday</p>
                                <h2>100% Organic Collection</h2>
                                <div class="hero-btns">
                                    <a href="{{ route('product.index') }}" class="boxed-btn">Visit Shop</a>
                                    <a href="{{route('contact')}}" class="bordered-btn">{{ __('messages.contact') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-right">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Mega Sale Going On!</p>
                                <h2>Get {{ \Carbon\Carbon::now()->format('F') }} Discount</h2>
                                <div class="hero-btns">
                                    <a href="{{ route('product.index') }}" class="boxed-btn">Visit Shop</a>
                                    <a href="{{route('contact')}}" class="bordered-btn">{{ __('messages.contact') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end home page slider -->
@show

    <!-- footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">{{ __('messages.about_us') }}</h2>
                        <p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium
                            doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Get in Touch</h2>
                        <ul>
                            <li>EL-Maadi, Cairo, Egypt.</li>
                            <li><a href="mailto:sasa.wael2016@gmail.com">sasa.wael2016@gmail.com</a></li>
                            <li><a href="https://api.whatsapp.com/send/?phone=%2B201155800086" target="_blank">+20 1155 8000 86</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">{{ __('messages.Pages') }}</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                            <li><a href="{{ route('about') }}">{{ __('messages.about') }}</a></li>
                            <li><a href="{{ route('news.index') }}">{{ __('messages.News') }}</a></li>
                            <li><a href="{{route('contact')}}">{{ __('messages.contact') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">Subscribe</h2>
                        <p>Subscribe to our mailing list to get the latest updates.</p>
                        <form action="" method="">
                        @csrf
                            <input type="email" placeholder="Email">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->

    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>
                        Copyrights &copy; 2024 - <a href="https://github.com/Salah-Wael">Salah EL-Din</a>, All Rights Reserved.
                    </p>
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->

    <!-- jquery -->
    <script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- count down -->
    <script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
    <!-- isotope -->
    <script src="{{ asset('assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
    <!-- waypoints -->
    <script src="{{ asset('assets/js/waypoints.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- mean menu -->
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <!-- sticker js -->
    <script src="{{ asset('assets/js/sticker.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    {{-- <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>

        Pusher.logToConsole = false;

        var pusher = new Pusher('52af53366597d764a8d1', {
        cluster: 'mt1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
        alert(JSON.stringify(data));
        });
    </script> --}}

    @yield('script')

</body>

</html>
