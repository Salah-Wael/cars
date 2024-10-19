@extends('layouts.app')

@section('title')
    Tag List
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/tag/index.css') }}">
@endsection

@section('content')
    <div class="container mt-4">
        <h2>Tags List</h2>
        <a href="{{ route('car_manufacturers.create') }}" class="btn btn-primary mb-3">Add New Tag</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tag Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->tag }}</td>
                        <td>
                            <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('tag.delete', $tag->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
