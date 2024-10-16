{{-- resources/views/car_manufacturers/edit.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Manufacturer</h1>

        <form action="{{ route('car_manufacturers.update', $carManufacturer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="manufacturer">Manufacturer Name</label>
                <input type="text" class="form-control @error('manufacturer') is-invalid @enderror" id="manufacturer" name="manufacturer" value="{{ old('manufacturer', $carManufacturer->manufacturer) }}" required>
                @error('manufacturer')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
