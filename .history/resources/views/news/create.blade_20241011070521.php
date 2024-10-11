@extends( 'layouts.app')

@section('title')
    Create News
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/news/create.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('script')

@endsection

@section('content')

    <form action="{{ route('news.store') }}" for="image" method="post" enctype="multipart/form-data" class="dropzone">
    @csrf
        <!-- Text Inputs: <input type='date'> -->
        <div>
            <label for="title">Title</label>
            <input type='text' id="title" name="title" value="{{ old('title') }}" >
        </div>
        @if($errors->has('title'))
            <div class="alert alert-danger">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        @endif

        <label for="content">Content</label>
        <textarea id="content" name="content" rows="4" >{{ old('content') }}</textarea>
        @if($errors->has('content'))
            <div class="alert alert-danger">
                @error('content')
                    {{ $message }}
                @enderror
            </div>
        @endif

        <div>
            <label for="image" class="custom-file-upload">
                <span>Click to choose an image</span>
                <input type="file" name="image" id="image" accept=".jpeg, .jpg, .png, .jfif, .svg" >
            </label>
        </div>
        @if($errors->has('image'))
        <div class="alert alert-danger">
            @error('image')
                {{ $message }}
            @enderror
        </div>
        @endif

        <label for="tags">Tags</label>
        <div class="tags-container">
            @foreach ($tags as $tag)
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="tag-checkbox" id="tag-{{ $tag->id }}">
<label for="tag-{{ $tag->id }}" class="tag-label">{{ $tag->tag }}</label>
            @endforeach
        </div>

        @if($errors->has('tags'))
        <div class="alert alert-danger">
            @error('tags')
                {{ $message }}
            @enderror
        </div>
        @endif

        <input type="submit" value="Create">
        <input type="reset" value="Reset">

    </form>
@endsection




