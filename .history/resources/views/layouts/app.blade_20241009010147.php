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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./assest/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:ital,wght@1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    @yield('css')
</head>

<body>

    

    @guest
        @if (Route::has('login'))
            <li>
                <a href="{{ route('login') }}">{{ __('messages.Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li>
                <a href="{{ route('register') }}">{{ __('messages.Register') }}</a>
            </li>
        @endif
    @else
        <li>
            <a href="#" {{ Auth::user()->name }} </a>
        </li>
        <li>
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

    @section('content')

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

    @yield('script')
</body>

</html>
