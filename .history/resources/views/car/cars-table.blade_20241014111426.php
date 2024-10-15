@extends('layouts.app')

@section('title', 'Cars Table')

@section('content')
<div class="container">
    @if($cars count())
    <h2>All Cars</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Type</th>
                <th>Car Model</th>
                <th>Color</th>
                <th>Price</th>
                <th>Plate</th>
                <th>Images</th>
                <th>Description</th>
                <th>Status</th>
                <th>User ID</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cars as $car)
            <tr>
                <td>{{ $car->type }}</td> <!-- Assuming 'type' column exists in your cars table -->
                <td>{{ $car->car_model }}</td>
                <td>{{ $car->color }}</td>
                <td>{{ $car->price }}</td>
                <td>{{ $car->plate }}</td>

                <!-- Display car images -->
                <td>
                    @if($car->images)
                        @foreach($car->images as $image)
                            <img src="{{ asset('assets/img/cars/' . $image->image) }}" alt="Car Image" style="width: 50px; height: 50px;">
                        @endforeach
                    @else
                        No images
                    @endif
                </td>

                <td>{{ $car->description }}</td>
                <td>{{ $car->status }}</td>
                <td>{{ $car->user_id }}</td>
                <td>{{ $car->created_at->format('Y-m-d H:i') }}</td>

                <!-- Action Buttons: Accept, Refuse, Archive -->
                <td>
                    <!-- Accept Button -->
                    <form action="{{ route('car.accept', $car->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button class="btn btn-success btn-sm" type="submit">Accept</button>
                    </form>

                    <!-- Refuse Button -->
                    <form action="{{ route('car.force-delete', $car->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Refuse</button>
                    </form>

                    <!-- Archive Button -->
                    <form action="{{ route('car.soft-delete', $car->id) }}" method="GET" style="display: inline;">
                        @csrf
                        <button class="btn btn-warning btn-sm" type="submit">Archive</button>
                    </form>
                </td>
            </tr>
            @empty
                <p>No cars requests yet</p>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
