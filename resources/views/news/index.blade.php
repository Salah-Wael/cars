@extends('layouts.app')

@section('title')
    News
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/news/index.css') }}">
@endsection

@section('content')
    <div class="banner_New">
        <img src="{{ asset('assets/img/news/photo_2024-10-06_13-01-20.jpg') }}">

        <div class="banner_text">
            <h1>
                New Cars
            </h1>

            <p> Find your dream car for sale on
                <br>PistonHeads in our premium auc <br> tions and classified marketplace.<br>
                Trusted by millions
            </p>
        </div>
    </div>
    <br>
    <div class="search-bar">
        <i class="fa fa-search"></i>
        <input type="text" id="search-input" placeholder="search">
    </div>

    <!--Cards -->
    <div class="card-container">

        <div class="card">
            <img src="{{ asset('assets/img/news/1.webp') }}" alt="">
            <div class="card-contant">
                <h1>2024 Chevrolet Camaro 1LT Convertible</h1>
                <p> Exterior: Black<br>5.7L V-8 Gas V <br> Fuel Type: Gas</p>
                <h3>EGP 10,660,000<span> New</span> </h3>
                <a href="" class="card-butten">Buy now</a>
                <br>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('assets/img/news/2.webp') }}" alt="">
            <div class="card-contant">
                <h1>2024 Chevrolet Camaro 1LT Convertible</h1>
                <p> Exterior: Black<br>5.7L V-8 Gas V <br> Fuel Type: Gas</p>
                <h3>EGP 10,660,000<span> New</span> </h3>
                <a href="" class="card-butten">Buy now</a>
                <br>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('assets/img/news/3.webp') }}" alt="">
            <div class="card-contant">
                <h1>2024 Chevrolet Camaro 1LT Convertible</h1>
                <p> Exterior: Black<br>5.7L V-8 Gas V <br> Fuel Type: Gas</p>
                <h3>EGP 10,660,000<span> New</span> </h3>
                <a href="" class="card-butten">Buy now</a>
                <br>
                <br>
            </div>
        </div>
        <br>

        <div class="card">
            <img src="{{ asset('assets/img/news/4.webp') }}" alt="">
            <div class="card-contant">
                <h1>2024 Chevrolet Camaro 1LT Convertible</h1>
                <p> Exterior: Black<br>5.7L V-8 Gas V <br> Fuel Type: Gas</p>
                <h3>EGP 10,660,000<span> New</span> </h3>
                <a href="" class="card-butten">Buy now</a>
                <br>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('assets/img/news/5.webp') }}" alt="">
            <div class="card-contant">
                <h1>2024 Chevrolet Camaro 1LT Convertible</h1>
                <p> Exterior: Black<br>5.7L V-8 Gas V <br> Fuel Type: Gas</p>
                <h3>EGP 10,660,000<span> New</span> </h3>
                <a href="" class="card-butten">Buy now</a>
                <br>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('assets/img/news/6.webp') }}" alt="">
            <div class="card-contant">
                <h1>2024 Chevrolet Camaro 1LT Convertible</h1>
                <p> Exterior: Black<br>5.7L V-8 Gas V <br> Fuel Type: Gas</p>
                <h3>EGP 10,660,000<span> New</span> </h3>
                <a href="" class="card-butten">Buy now</a>
                <br>
                <br>
            </div>
        </div>
        <br>

        <div class="card">
            <img src="{{ asset('assets/img/news/7.webp') }}" alt="">
            <div class="card-contant">
                <h1>2024 Chevrolet Camaro 1LT Convertible</h1>
                <p> Exterior: Black<br>5.7L V-8 Gas V <br> Fuel Type: Gas</p>
                <h3>EGP 10,660,000<span> New</span> </h3>
                <a href="" class="card-butten">Buy now</a>
                <br>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('assets/img/news/2.webp') }}" alt="">
            <div class="card-contant">
                <h1>2024 Chevrolet Camaro 1LT Convertible</h1>
                <p> Exterior: Black<br>5.7L V-8 Gas V <br> Fuel Type: Gas</p>
                <h3>EGP 10,660,000<span> New</span> </h3>
                <a href="" class="card-butten">Buy now</a>
                <br>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('assets/img/news/9.webp') }}" alt="">
            <div class="card-contant">
                <h1>2024 Chevrolet Camaro 1LT Convertible</h1>
                <p> Exterior: Black<br>5.7L V-8 Gas V <br> Fuel Type: Gas</p>
                <h3>EGP 10,660,000<span> New</span> </h3>
                <a href="" class="card-butten">Buy now</a>
                <br>
                <br>

            </div>
        </div>
        <br>

        <div class="card">
            <img src="{{ asset('assets/img/news/10.webp') }}p" alt="">
            <div class="card-contant">
                <h1>2024 Chevrolet Camaro 1LT Convertible</h1>
                <p> Exterior: Black<br>5.7L V-8 Gas V <br> Fuel Type: Gas</p>
                <h3>EGP 10,660,000<span> New</span> </h3>
                <a href="" class="card-butten">Buy now</a>
                <br>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('assets/img/news/11.webp') }}" alt="">
            <div class="card-contant">
                <h1>2024 Chevrolet Camaro 1LT Convertible</h1>
                <p> Exterior: Black<br>5.7L V-8 Gas V <br> Fuel Type: Gas</p>
                <h3>EGP 10,660,000<span> New</span> </h3>
                <a href="" class="card-butten">Buy now</a>
                <br>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('assets/img/news/12.webp') }}" alt="">
            <div class="card-contant">
                <h1>2024 Chevrolet Camaro 1LT Convertible</h1>
                <p> Exterior: Black<br>5.7L V-8 Gas V <br> Fuel Type: Gas</p>
                <h3>EGP 10,660,000<span> New</span> </h3>
                <a href="" class="card-butten">Buy now</a>
                <br>
                <br>
            </div>
        </div>
        <br>

    </div>
@endsection
