@extends('car.index')

@section('title', 'Archived Cars')

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
                {{-- <img src="{{ asset('assets/img/cars/'.$car->image) }}" alt="Car Image">
                @if (auth()->check() && auth()->user()->role == 'admin')
                    <a href="{{ route('', $car->id) }}">


                    </a>
                @endif --}}
                <div class="img" style=" background-image: url('{{ asset('assets/img/cars/' . $car->image) }}'); ">
                    @if (auth()->check() && auth()->user()->role == 'admin')
                        <a href="{{ route('car.restore', $car->id) }}" style="position: absolute; top: 10px; right: 10px;">
                            <i class="fa-solid fa-bounce">&#xf06e;</i>
                        </a>
                    @endif
                </div>
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
                </div>
                <div class="card-button-container">
                    <a href="{{ route('car.show', $car->id) }}">
                        <button class="bn632-hover bn28">View More Details</button>
                    </a>
                    @if
                        <form action="{{ route('car.force-delete', $car->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bn632-hover bn28">Delete</button>
                        </form>
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
