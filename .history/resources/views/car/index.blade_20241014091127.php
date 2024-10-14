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
                <div class="img" style=" background-image: url('{{ asset('assets/img/cars/' . $car->image) }}'); ">
                    @if (auth()->check() && auth()->user()->role == 'admin')
                        <a href="{{ route('car.soft-delete', $car->id) }}" style="position: absolute; top: 10px; right: 10px;">
                            <i class="fa-solid fa-eye toggle-icon"></i>
                        </a>
                    @endif
                </div>

                <div class="card-contant">
                    <h2>{{ $car->type }}</h2>
                    <p>
                        <strong>Model:</strong> {{ $car->car_model }} <br>
                        <strong>Color:</strong> {{ $car->color }}<br>
                        @if ($car->plate)
                            <strong>Plate Number:</strong> {{ $car->plate }}<br>
                        @endif
                        <strong>Status:</strong>  {{ strtoupper($car->status) }} <br>
                        <strong>Price:</strong> EGP {{ number_format($car->price) }}<br>
                        @if ($car->description)
                            <strong>Description:</strong> {{ $car->description }}<br>
                        @endif
                    </p>
                </div>
                <div class="card-button-container">
                    <a href="{{ route('car.show', $car->id) }}">
                        <button class="bn632-hover bn28">View More Details</button>
                    </a>
                    @if ()

                    

                    @endif
                    <a href="{{ route('car.force-delete', $car->id) }}">
                        <button class="bn632-hover bn28">Delete</button>
                    </a>
                </div>
            </div>
            @empty
                <p>No cars available Now</p>
        @endforelse
    </div>
@endsection
