@extends('news.create')

@section('title')
    Heros | Edit News
@endsection

@section('css')

    <link rel="stylesheet" href="{{ asset('assets/css/news/edit.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/buttons.css') }}">
@

@section('content')
    <form action="{{ route('news.update', $news->id) }}" method="post" enctype="multipart/form-data" class="dropzone" id="dropzone">
        @csrf
        @method('PUT')

        <!-- Title Input -->
        <div>
            <label for="title">Title</label>
            <input type='text' id="title" name="title" value="{{ old('title', $news->title) }}">
        </div>
        @if ($errors->has('title'))
            <div class="alert alert-danger">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        @endif

        <!-- Content Input -->
        <label for="content">Content</label>
        <textarea id="content" name="content" rows="4">{{ old('content', $news->content) }}</textarea>
        @if ($errors->has('content'))
            <div class="alert alert-danger">
                @error('content')
                    {{ $message }}
                @enderror
            </div>
        @endif

        <!-- Image Input -->
        <div class="form-group">
            <label for="image" class="custom-file-upload">
                <span>Click if you need to update the image</span>
                <input type="file" name="image" id="image" accept=".jpeg, .jpg, .png, .webp, .svg">
            </label>
            <br>
            <img style="width: 70px; height: 100px;" src="{{ asset('assets/img/news/' . $news->image) }}" alt="{{ $news->title }}">
        </div>
        @if ($errors->has('image'))
            <div class="alert alert-danger">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
        @endif

        <!-- Tags Input -->
        <div class="tags-container">
            @foreach ($tags as $tag)
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="tag-checkbox" id="tag-{{ $tag->id }}"
                    {{ in_array($tag->id, old('tags', $news->tags->pluck('id')->toArray())) ? 'checked' : '' }}>

                <label for="tag-{{ $tag->id }}" class="tag-label">{{ $tag->tag }}</label>
            @endforeach
        </div>
        @if ($errors->has('tags'))
            <div class="alert alert-danger">
                @error('tags')
                    {{ $message }}
                @enderror
            </div>
        @endif

        <!-- Submit Button -->
        <input type="submit" value="Edit">
        <a href="{{ route('news.index') }}">
            <button class="bn632-hover bn28">Cancel</button>
        </a>
    </form>
@endsection
