{{-- resources/views/car_manufacturers/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Manufacturer</h1>

        <form action="{{ route('car_manufacturers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="manufacturer">Manufacturer Name</label>
                <input type="text" class="form-control @error('manufacturer') is-invalid @enderror" id="manufacturer" name="manufacturer" value="{{ old('manufacturer') }}" required>
                @error('manufacturer')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
