@extends('layouts.app')

@section('title')
    Show Car Details
@endsection

@section('content')
    @if ($car)

        <!-- Breadcrumb Section -->
        <div class="breadcrumb-section breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="breadcrumb-text">
                            <p>See more details about</p>
                            <h2>{{ $car->type }} {{ $car->car_model }} ({{ $car->color }})</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Section -->

        <!-- Single Car Details -->
        <div class="single-product mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <!-- Car Images Section -->
                        <div class="testimonial-sliders card" id="carImagesSlider">
                            <!-- Main Car Image -->
                            <div class="single-testimonial-slider">
                                <div class="single-product-img">
                                    <img src="{{ asset('assets/img/cars/' . $car->image) }}" alt="{{ $car->car_model }}"
                                         class="car-image" style="display: block;">
                                </div>
                            </div>

                            <!-- Additional Car Images -->
                            @forelse ($carImages as $carImage)
                                <div class="single-testimonial-slider">
                                    <div class="single-product-img">
                                        <img src="{{ asset('assets/img/cars/' . $carImage->image) }}" alt="{{ $car->car_model }}"
                                             class="car-image">
                                    </div>
                                </div>
                            @empty
                                <div class="single-testimonial-slider">
                                    <div class="single-product-img">
                                        <img src="{{ asset('assets/img/cars/' . $car->image) }}" alt="{{ $car->car_model }}"
                                             class="car-image">
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Car Details -->
                    <div class="col-md-3">
                        <div class="single-product-content">
                            <p class="single-product-pricing"><span>{{ $car->car_model }}</span></p>
                            <h3>{{ $car->description ?? 'No description available.' }}</h3>
                            <p class="single-product-pricing"><span>Price: </span>${{ number_format($car->price, 2) }}</p>
                            <p><strong>Type: </strong>{{ ucfirst($car->type) }}</p>
                            <p><strong>Status: </strong>{{ ucfirst($car->status) }}</p>
                            @if ($car->plate)
                                <p><strong>Plate: </strong>{{ $car->plate }}</p>
                            @endif
                            <p><strong>Color: </strong>{{ $car->color }}</p>

                            <!-- Add to Cart Button (if applicable) -->
                            <a href="#" class="cart-btn">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </a>
                        </div>
                    </div>

                    <!-- QR Code Section (Optional) -->
                    <div class="col-md-4">
                        {{ $qrCode ?? '' }}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Car -->

        <!-- Related Cars Section -->
        @if ($related->count() > 0)
            <div class="more-products mb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <div class="section-title">
                                <h3><span class="orange-text">Related</span> Cars</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($related as $item)
                            <div class="col-lg-4 col-md-6 text-center">
                                <div class="single-product-item">
                                    <div class="product-image">
                                        <a href="{{ route('car.show', $item->id) }}">
                                            <img src="{{ asset('assets/img/cars/'.$item->image) }}" alt="">
                                        </a>
                                    </div>
                                    <h3>{{ $item->car_model }}</h3>
                                    <p class="product-price">${{ number_format($item->price, 2) }}</p>
                                    <a href="{{ route('car.show', $item->id) }}" class="cart-btn">
                                        <i class="fas fa-shopping-cart"></i> View Details
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <!-- End Related Cars Section -->

    @else
        <p>Car not found</p>
    @endif
@endsection

@section('scripts')
    
@endsection
