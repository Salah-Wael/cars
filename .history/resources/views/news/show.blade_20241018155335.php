@auth
@extends('layouts.app')

@section('title')
    Show News
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/news/show.css') }}">
@endsection

@section('content')
<section class="mt-4">

    <div class="row">
        <!-- Main News Column -->
        <div class="col-md-8 mb-4">
            <!-- News Title -->
            <h3 class="my-2">{{ $news->title }}</h3>

            <!-- Meta Information -->
            <small id="article-meta">
                <strong>{{ 'By ' . $news->user->name }}</strong>
                @if ($news->created_at == $news->updated_at)
                    {{ ', created at ' . date("Y-m-d h:i A", strtotime($news->created_at)) }}
                @else
                    {{ ', updated at ' . date("Y-m-d h:i A", strtotime($news->updated_at)) }}
                @endif
            </small>

            <!-- Tags -->
            <div class="mt-2">
                @foreach ($news->tags as $tag)
                    <span class="badge badge-primary">{{ $tag->tag }}</span>
                @endforeach
            </div>

            <!-- Featured Image -->
            <div class="card my-4 mb-4">
                <img class="card-img-top" src="{{ asset('assets/img/news/' . $news->image) }}" alt="Featured image of {{ $news->title }}" style="max-height: 400px;">
            </div>

            <!-- News Content -->
            <div class="card mb-4">
                <div class="card-body">
                    {!! nl2br(e($news->content)) !!}
                </div>
            </div>

            <!-- Admin Controls -->
            @if (auth()->user()->role == 'admin')
                <div class="d-flex justify-content-between">
                    <a href="{{ route('news.edit', $news->id) }}" class="btn btn-primary w-100 mr-2">Edit</a>
                    <form action="{{ route('news.delete', $news->id) }}" method="POST" class="w-100 ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">Delete</button>
                    </form>
                </div>
            @endif
        </div>

        <!-- Related Articles Column -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">Related Articles</div>
                <div class="card-body">
                    @if($relatedNews->isEmpty())
                        <p>No related posts available.</p>
                    @else
                        <ul class="list-unstyled">
                            @foreach ($relatedNews as $relatedNew)
                                <li class="media my-3">
                                    <!-- Related News Image Thumbnail -->
                                    @if ($relatedNew->image)
                                        <img class="mr-3" src="{{ asset('assets/img/news/' . $relatedNew->image) }}" alt="{{ $relatedNew->title }}" style="width: 64px; height: 64px; object-fit: cover;">
                                    @else
                                        <img class="mr-3" src="{{ asset('assets/img/default-placeholder.png') }}" alt="No image available" style="width: 64px; height: 64px; object-fit: cover;">
                                    @endif

                                    <!-- Related News Title and Excerpt -->
                                    <div class="media-body">
                                        <a href="{{ route('news.show', $relatedNew->id) }}">
                                            <h5 class="mt-0 mb-1 font-weight-bold">{{ $relatedNew->title }}</h5>
                                        </a>
                                        <p>{{ Str::limit($relatedNew->content, 50) }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
@endauth
