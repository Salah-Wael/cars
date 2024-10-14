@extends('layouts.app')

@section('title', 'Cars Table')

@section('content')
<div class="container">
    <h2>All Cars</h2>
    <table class="table table-bordered">
        <thead>
            <tr>






status
user_id
created_at
                <th>type</th>
                <th>car_model</th>
                <th>Color</th>
                <th>Price</th>
                <th>plate</th>
                <th>images</th>
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
