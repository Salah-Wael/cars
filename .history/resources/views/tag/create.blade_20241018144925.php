@extends('layouts.app')

@section('title')
    Create Tag
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/tag/create.css') }}">
@endsection

@section('content')
    <div class="container mt-4">
        <h2>Create New Tag</h2>
        <form action="{{ route('tag.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tag">Tag Name</label>
                <input type="text" name="tag" id="tag" class="form-control" value="{{ old('tag') }}">
                @if ($errors->has('tag'))
                    <div class="alert alert-danger mt-2">
                        @error('tag')
                            {{ $message }}
                        @enderror
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <button type="button" class="btn btn-secondary" onclick="window.location='{{ redirect()->back() }}'">Cancel</button>
        </form>
    </div>
@endsection
