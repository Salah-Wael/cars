@extends('layouts.app')

@section('title')
    Show news
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/news/show.css') }}">
@endsection

@section('content')
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 mb-4">
                    <h3 class="my-2">{{ $news->title }}</h3>

                    <small id="article-meta">
                        <strong>
                            {{ 'By ' . $news->user->name }}
                        </strong>
                        @if ($news->created_at == $news->updated_at)
                            {{ ', created at' }} {{ date('Y-m-d h:i A', strtotime($news->created_at)) }}
                        @else
                            {{ ', updated at' }} {{ date('Y-m-d h:i A', strtotime($news->updated_at)) }}
                        @endif

                    </small>
                    <br>
                    @foreach ($news->tags as $tag)
                        <span class="badge badge-primary">
                            {{ $tag->tag }}
                        </span>
                    @endforeach
                    <!--Featured Image-->
                    <div class="card my-4 mb-4">
                        <img style="height: 300px; width:400px;" src="{{ asset('assets/img/news/' . $news->image) }}">
                    </div>
                    <!--/.Featured Image-->

                    <div class="card mb-4">
                        <div class="card-body">{!! nl2br($news->content) !!}</div>
                    </div>
                    
                    @if (auth()->user()->role == 'admin')
                        <div class="card my-4 mb-4">
                            <div class="row">
                                @if (auth()->user()->role == 'admin')
                                    <div class="col-md-6">
                                        <a href="{{ route('news.edit', $news->id) }}"><button class="btn btn-primary"
                                                style="width:100%;">Edit</button></a>
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <form action="{{ route('news.delete', $news->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" style="width:100%;" class="btn btn-danger"
                                            name="post-delete-form" value="DELETE">
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-4">

                    <!--/.Card : Dynamic content wrapper-->

                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">

                        <div class="card-header">Related articles</div>

                        <!--Card content-->
                        <div class="card-body">
                            <!-- If there are related posts -->
                            @if (count($relatedNews) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Excerpt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($relatedNews as $relatedNew)
                                            <a href="{{ route('news.show', $relatedNew->id) }}" class="plain-link">
                                                <tr>
                                                    <!-- Image column -->
                                                    <td style="width: 100px;">
                                                        <img src="{{ asset('assets/img/news/' . $relatedNew->image) }}"
                                                            alt="{{ $relatedNew->title }}"
                                                            style="width: 100px; height: auto;">
                                                    </td>

                                                    <!-- Title column -->
                                                    <td>

                                                        <h5 class="mt-0 mb-1 font-weight-bold">{{ $relatedNew->title }}
                                                        </h5>
                                                    </td>

                                                    <!-- Excerpt column -->
                                                    <td>
                                                        @if (strlen($relatedNew->content) > 30)
                                                            {{ substr($relatedNew->content, 0, 30) }}...
                                                        @else
                                                            {{ $relatedNew->content }}
                                                        @endif
                                                    </td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h4>There are no related posts!</h4>
                            @endif
                        </div>

                    </div>
                    <!--/.Card-->
                </div>
                <!--Grid column-->
            </div>
        </div>
    </div>
    <!--Grid row-->

    <!--Section: Post-->
@endsection
