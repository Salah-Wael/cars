{{-- resources/views/car_manufacturers/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Car Manufacturers</h2>

        <a href="{{ route('car_manufacturers.create') }}" class="btn btn-primary mb-3">Add New Manufacturer</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($carManufacturers->isEmpty())
            <p>No car manufacturers available.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Manufacturer Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carManufacturers as $manufacturer)
                        <tr>
                            <td>{{ $manufacturer->id }}</td>
                            <td>{{ $manufacturer->manufacturer }}</td>
                            <td>
                                <a href="{{ route('car_manufacturers.edit', $manufacturer->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('car_manufacturers.destroy', $manufacturer->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
