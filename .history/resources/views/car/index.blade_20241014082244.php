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
                <div style="position: relative; width: 100%; height: auto; background-image: url('{{ asset('assets/img/cars/' . $car->image) }}'); background-size: cover; background-position: center;">
                    @if (auth()->check() && auth()->user()->role == 'admin')
                        <a href="{{ route('car.soft-delete', $car->id) }}" style="position: absolute; top: 10px; right: 10px;">
                            <i class="fa-solid fa-eye toggle-icon"></i>
                        </a>
                    @endif
                </div>

                <div class="card-contant">
                    <h2>{{ $car->car_model }}</h2>
                    <p>
                        <strong>Type:</strong> {{ $car->type }} <br>
                        <strong>Color:</strong> {{ $car->color }}<br>
                        @if ($car->plate)
                            <strong>Plate Number:</strong> {{ $car->plate }}<br>
                        @endif
                        <strong>Price:</strong> EGP {{ number_format($car->price, 2) }}<br>
                        @if ($car->description)
                            <strong>Description:</strong> {{ $car->description }}<br>
                        @endif
                    </p>
                    <h3>EGP {{ number_format($car->price, 2) }} <span>{{ ucfirst($car->status) }}</span></h3>
                </div>
                <div style="display: flex; justify-content: center; align-items: center; height: auto;">
                    <a href="{{ route('car.show', $car->id) }}">
                        <button class="bn632-hover bn28">View More Details</button>
                    </a>
                </div>
            </div>
            @empty
                <p>No cars available Now</p>
        @endforelse
    </div>
@endsection
