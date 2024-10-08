<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- title -->
    <title>Cars - @yield('title','Home')</title>
</head>
<body>

    @section('content')
    <!-- home page slider -->
    <div class="homepage-slider">
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Fresh & Organic</p>
                                <h2>Delicious Seasonal Fruits</h2>
                                <div class="hero-btns">
                                    <a href="{{ route('product.category.show', 'fruits') }}" class="boxed-btn">Fruit Collection</a>
                                    <a href="{{route('contact')}}" class="bordered-btn">{{ __('messages.contact') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Fresh Everyday</p>
                                <h2>100% Organic Collection</h2>
                                <div class="hero-btns">
                                    <a href="{{ route('product.index') }}" class="boxed-btn">Visit Shop</a>
                                    <a href="{{route('contact')}}" class="bordered-btn">{{ __('messages.contact') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-right">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Mega Sale Going On!</p>
                                <h2>Get {{ \Carbon\Carbon::now()->format('F') }} Discount</h2>
                                <div class="hero-btns">
                                    <a href="{{ route('product.index') }}" class="boxed-btn">Visit Shop</a>
                                    <a href="{{route('contact')}}" class="bordered-btn">{{ __('messages.contact') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end home page slider -->
    @show

    @yield('script')
</body>
</html>
