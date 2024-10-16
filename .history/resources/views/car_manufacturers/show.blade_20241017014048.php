{{-- resources/views/car_manufacturers/show.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manufacturer Details</h1>

        <div class="card">
            <div class="card-header">
                Manufacturer ID: {{ $carManufacturer->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Manufacturer Name: {{ $carManufacturer->manufacturer }}</h5>
                <a href="{{ route('car_manufacturers.edit', $carManufacturer->id) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('car_manufacturers.destroy', $carManufacturer->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>

        <a href="{{ route('car_manufacturers.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
@endsection
