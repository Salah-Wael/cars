@extends('layouts.app')

@section('title', 'Archived Cars')

@section('content')
<div class="container">
    <h2>All Archived Cars</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Model</th>
                <th>Color</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->name }}</td>
                <td>{{ $car->car_model }}</td>
                <td>{{ $car->color }}</td>
                <td>{{ $car->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
