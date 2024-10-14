@extends('layouts.app')

@section('title')
    Cars
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/car/index.css') }}">
    .card-button-container{
    display: flex;
    justify-content: center;
    align-items: center;
    height: auto;
    flex-direction:column;
}

.bn632-hover {
  width: 160px;
  font-size: 16px;
  font-weight: 600;
  color: #fff;
  cursor: pointer;
  margin-top: 20px;
  height: 55px;
  text-align:center;
  border: none;
  background-size: 300% 100%;
  border-radius: 50px;
  moz-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}

.bn632-hover:hover {
  background-position: 100% 0;
  moz-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}

.bn632-hover:focus {
  outline: none;
}

.bn632-hover.bn28 {
  background-image: linear-gradient(
    to right,
    #eb3941,
    #f15e64,
    #e14e53,
    #e2373f
  );
  box-shadow: 0 5px 15px rgba(242, 97, 103, 0.4);
}
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
    @if( count($cars) > 0)
        <div class="search-bar">
            <i class="fa fa-search"></i>
            <input type="text" id="search-input" placeholder="search">
        </div>
    @endif

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

                    @if (auth()->check() && auth()->user()->id == $car->user_id)
                        <a href="{{ route('car.edit', $car->id) }}">
                            <button class="bn632-hover bn28">Edit</button>
                        </a>
                    @endif

                    @if (auth()->check() && auth()->user()->role == 'admin')
                        <form action="{{ route('car.force-delete', $car->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bn632-hover bn28">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
            @empty
                <p>No cars available Now</p>
        @endforelse
    </div>
@endsection
