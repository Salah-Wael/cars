@extends('layouts.app')

@section('title', 'Car Details')

@section('content')
<div class="container">
    <h2>{{ $car->name }}</h2>
    <p><strong>Model:</strong> {{ $car->car_model }}</p>
    <p><strong>Color:</strong> {{ $car->color }}</p>
    <p><strong>Price:</strong> {{ $car->price }}</p>
    <p><strong>Description:</strong> {{ $car->description }}</p>

    <!-- Show car images if available -->
    @if($carImages)
        <h4>Images:</h4>
        <div class="row">
            @foreach($carImages as $image)
                <div class="col-md-3">
                    <img src="{{ asset('assets/' . $image->filename) }}" class="img-fluid">
                </div>
            @endforeach
        </div>
    @endif

    <!-- Show related cars -->
    @if($related)
        <h4>Related Cars:</h4>
        <ul>
            @foreach($related as $relatedCar)
                <li><a href="{{ route('car.show', $relatedCar->id) }}">{{ $relatedCar->name }}</a> - ${{ $relatedCar->price }}</li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
