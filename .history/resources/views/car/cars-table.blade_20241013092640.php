@extends('layouts.app')

@section('title', 'Cars Table')

@section('content')
<div class="container">
    <h2>All Cars</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
type
car_model
color
plate
images
description
price
status
user_id
deleted_at
created_at
updated_at
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
