@extends('layouts.app')

@section('title', 'Create Car')

@section('content')
<div class="container">
    <h2>Create a New Car</h2>
    <form action="{{ route('car.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Car Name --}}
    <div class="mb-3">
        <label for="name" class="form-label">Car Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Car Model --}}
    <div class="mb-3">
        <label for="car_model" class="form-label">Model</label>
        <input type="text" class="form-control @error('car_model') is-invalid @enderror" id="car_model" name="car_model" value="{{ old('car_model') }}" required>
        @error('car_model')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Car Color --}}
    <div class="mb-3">
        <label for="color" class="form-label">Color</label>
        <select class="form-select @error('color') is-invalid @enderror" id="color" name="color" required>
            <option value="">Select a color</option> <!-- Placeholder option -->
            @foreach ($carColors as $carColor)
                <option value="{{ $carColor->name }}" {{ old('color') == $carColor->name ? 'selected' : '' }}>
                    {{ $carColor->name }}
                </option>
            @endforeach
        </select>
        @error('color')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Plate Number --}}
    <div class="mb-3">
        <label for="plate" class="form-label">Plate Number</label>
        <input type="text" class="form-control @error('plate') is-invalid @enderror" id="plate" name="plate" value="{{ old('plate') }}" required>
        @error('plate')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Status --}}
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status') }}" required>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Price --}}
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
        @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Description --}}
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Car Image --}}
    <div class="mb-3">
        <label for="image" class="form-label">Car Image</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" required>
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Submit Button --}}
    <button type="submit" class="btn btn-primary">Add Car</button>
</form>

</div>
@endsection
