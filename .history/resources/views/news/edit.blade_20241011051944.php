@extends( 'news.create')

@section('title')
    Heros | Edit News
@endsection

@section('content')

<form action="{{ route('news.update',$news->id) }}" method="post" enctype="multipart/form-data" class="dropzone" id="dropzone">
    @csrf
    @method('PUT')

    <!-- Text Inputs: <input type='date'> -->
    <div>
        <label for="title">Title</label>
        <input type='text' id="title" name="title" value="{{ $news->title }}" >
    </div>

    @if($errors->has('title'))
        <div class="alert alert-danger">
            @error('title')
                {{ $message }}
            @enderror
        </div>
    @endif

    <label for="content">Content</label>
    <textarea id="content" name="content" rows="4" >{{ $news->content }}</textarea>
    @if($errors->has('content'))
        <div class="alert alert-danger">
            @error('content')
                {{ $message }}
            @enderror
        </div>
    @endif

    <div class="form-group">

        <label for="image" class="custom-file-upload">
            <span>Click if you need to apdate the image</span>
            <input type="file" name="image" id="image" accept=".jpeg, .jpg, .png, .webp, .svg">
        </label>

        <br>
        <img style="width: 70px; hieght: 100px;" src="{{ asset("assets/img/news/".$news->image) }}" alt="{{ $news->title }}">

    </div>

    @if($errors->has('image'))
        <div class="alert alert-danger">
            @error('image')
                {{ $message }}
            @enderror
        </div>
    @endif


    <label for="tags">Tags</label>
    <select name="tags[]" class="form-control" multiple>
        <option value="" name="tags">__</option>
        @foreach ($tags as $tag)
            <option value="{{ $news->tags }}" name="tags[]">{{ $tag->tag }}</option>
        @endforeach
    </select>

    @if($errors->has('tags'))
    <div class="alert alert-danger">
        @error('tags')
            {{ $message }}
        @enderror
    </div>
    @endif

    <input type="submit" value="Edit">
    <a href="{{ route('news.index') }}" class="button">Cancel</a>

</form>
@endsection




