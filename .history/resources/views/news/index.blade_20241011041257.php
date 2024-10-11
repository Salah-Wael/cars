@extends('layout.nav')

@section('title')
    News
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/news/index.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/filter.css') }}">
@endsection

@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach ($tags as $tag)
                                <li data-filter=".{{ str_replace(' ', '', $tag->tag) }}">{{ $tag->tag }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="news news-list">
        @forelse($news as $new)
            <div class="card mb-3 news_card @foreach ($new->tags as $tag){{ str_replace(' ', '', $tag->tag).' ' }}@endforeach">
                <strong>
                    {{ 'By ' }}
                    <a href="/user">
                        {{ $new->firstName.' '.$new->lastName }}
                    </a>
                </strong>

                @if ($new->created_at == $new->updated_at)
                    {{ ", created at" }} {{ date("Y-m-d h:m",strtotime($new->created_at)) }}
                @else
                    {{ ", updated at" }} {{ date("Y-m-d h:m",strtotime($new->updated_at)) }}
                @endif

                @foreach ($new->tags as $tag)
                    <span class="badge badge-primary">
                        {{ $tag->tag }}
                    </span>
                @endforeach

                <b>{{ $new->title }}</b>
                <br>

                <img src="{{ asset("assets/images/news/".$new->image) }}" alt="{{ $new->title }}">

                @if (strlen($new->content) > 30)
                    <p>{{ substr($new->content, 0, 30) }}...</p>
                @else
                    <p>{{ substr($new->content, 0, 30) }}</p>
                @endif

                <a class="btn btn-primary" href="{{ route('news.show', $new->id) }}" role="button">Read</a>

                @if (((auth()->user()->role == 'admin') && $new->role != 'hero') || ((auth()->user()->role == 'hero') && auth()->user()->id == $new->user_id))
                    <a class="btn btn-primary" href="{{ route('news.edit', $new->id) }}" role="button">Edit</a>
                @endif

                @if ((auth()->user()->role == 'admin') || ((auth()->user()->role == 'hero') && auth()->user()->id == $new->user_id))
                    <form action="{{ route('news.delete', $new->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" name="post-delete-form" value="Delete">
                    </form>
                @endif
            </div>
        @empty
            <h2>Sorry! No news today</h2>
        @endforelse
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

    <!-- Initialize Isotope -->
    <script>
        $(document).ready(function(){
            var $grid = $('.news-list').isotope({
                itemSelector: '.news_card',
                layoutMode: 'fitRows'
            });

            $('.product-filters ul li').click(function(){
                $('.product-filters ul li').removeClass('active');
                $(this).addClass('active');

                var selector = $(this).attr('data-filter');
                $grid.isotope({ filter: selector });
                return false;
            });
        });
    </script>
@endsection
