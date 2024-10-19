@extends('tag.create')

@section('title')
    Edit Tag
@endsection


@section('content')
    <div class="container mt-4">
        <h2>Edit Tag</h2>
        <form action="{{ route('tag.update', $tag->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="tag">Tag Name</label>
                <input type="text" name="tag" id="tag" class="form-control" value="{{ old('tag', $tag->tag) }}">
                @if ($errors->has('tag'))
                    <div class="alert alert-danger mt-2">
                        @error('tag')
                            {{ $message }}
                        @enderror
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" onclick="window.location='{{ url()->previous() }}'">Cancel</button>
        </form>
    </div>
@endsection
