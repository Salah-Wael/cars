@extends('layouts.app')

@section('title', 'Create Car')

@section('content')
<div class="container">
    <h2>Create a New Car</h2>
    <form action="{{ route('car.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Car Type --}}
    <div class="mb-3">
        <label for="type" class="form-label">Car Type</label>
        <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" required>
            <option value="" disabled selected>Select a car type</option>
            @foreach($carTypes as $carType)
                <option value="{{ $carType->type }}" {{ old('type') == $carType->type ? 'selected' : '' }}>
                    {{ $carType->type }}
                </option>
                @endforeach
            <option value="{{ $carType->type }}" {{ old('type') == $carType->type ? 'selected' : '' }}>
                Other
            </option>
        </select>
        @error('type')
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
                <option value="{{ $carColor->color }}" {{ old('color') == $carColor->color ? 'selected' : '' }}>
                    {{ $carColor->color }}
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
        <label for="status" class="form-label">status</label>
        <select class="form-control @error('Status') is-invalid @enderror" id="status" name="status" required>
            <option value="" disabled selected>Select a car Status</option>
            @foreach($carStatus as $status)
                <option value="{{ $status }}" {{ old('Status') == $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
                @endforeach
        </select>
        @error('Status')
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
