@extends('layouts.app')

@section('title')
    Cars
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/car/index.css') }}">
@endsection

@section('content')
    <div class="banner_New">
        <img src="{{ asset('assets/img/cars/photo_2024-10-06_13-01-20.jpg') }}">

        <div class="banner_text">
            <h2>
                New Cars
            </h2>

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
    @forelse($cars as $car)
        <div class="card">
            <img src="{{ asset('assets/img/cars/'.$car->image) }}" alt="Car Image">
            <a href="{{ route('car.soft-delete', ) }}">
                <i class="fa-solid fa-eye-slash"></i>
            </a>
            <div class="card-contant">
                <h2>{{ $car->car_model }}</h2>
                <p>
                    <strong>Type:</strong> {{ $car->type }} <br>
                    <strong>Color:</strong> {{ $car->color }}<br>
                    @if($car->plate)
                        <strong>Plate Number:</strong> {{ $car->plate }}<br>
                    @endif
                    <strong>Price:</strong> EGP {{ number_format($car->price, 2) }}<br>
                    @if($car->description)
                        <strong>Description:</strong> {{ $car->description }}<br>
                    @endif
                </p>
                <h3>EGP {{ number_format($car->price, 2) }} <span>{{ ucfirst($car->status) }}</span></h3>

                <p><strong>Last Updated:</strong> {{ $car->updated_at->format('d M Y') }}</p>

                <a href="{{ route('car.show', $car->id) }}" class="card-button">Buy now</a>
                <br>
            </div>
        </div>
    @empty
        <p>No cars available Now</p>
    @endforelse
</div>
@endsection
