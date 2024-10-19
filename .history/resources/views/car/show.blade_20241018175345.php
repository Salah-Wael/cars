@extends('layouts.app')

@section('title')
    Show Car Details
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/car/show.css') }}">
@endsection

@section('content')
    @if ($car)


        <!-- Single Car Details -->
        <div class="single-product mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <!-- Car Images Section -->
                        <div class="testimonial-sliders card" id="carImagesSlider">
                            <!-- Additional Car Images -->
                            @forelse ($carImages as $carImage)
                                <div class="single-testimonial-slider">
                                    <div class="single-product-img">
                                        <img src="{{ asset('assets/img/cars/' . $carImage->image) }}"
                                            alt="{{ $car->car_model }}" class="car-image">
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
                    <div class="col-md-5">
                        <div class="single-product-content">
                            <p class="single-product-pricing"><span>{{ $car->type }} {{ $car->car_model }} (<span style="color: {{ $car->color }};">{{ $car->color }}</span>)</span></p>
                            <p class=""><strong>Price: </strong>{{ number_format($car->price, 0) }}$</p>
                            <p><strong>Status: </strong>{{ ucfirst($car->status) }}</p>
                            @if ($car->plate)
                                <p><strong>Plate: </strong>{{ $car->plate }}</p>
                            @endif
                            @if ($car->description)
                                <p><strong>Description: </strong>{{ $car->description }}</p>
                            @endif

                            <hr>
                            contact info

                            <div class="card-button-container">
                                @if (auth()->check() && auth()->user()->role == 'admin')
                                    <form action="{{ route('car.force-delete', $car->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bn632-hover bn28">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- QR Code Section (Optional) -->
                    {{-- <div class="col-md-4">
                        {{ $qrCode ?? '' }}
                    </div> --}}
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
                            <div class="col-lg-4 col-md-6 text-center mb-4">
                                <!-- Single Product Item -->
                                {{-- <div class="single-product-item border rounded shadow-sm overflow-hidden"> --}}
                                    <!-- Product Image -->
                                    <div class="single-testimonial-slider">
                                        <div class="single-product-img">
                                            <img src="{{ asset('assets/img/cars/' . $item->image) }}"
                                                alt="{{ $car->car_model }}" class="car-image">
                                        </div>
                                    </div>

                                    <!-- Product Details -->
                                    <div class="product-details p-3">
                                        {{ $item->type }} {{ $item->car_model }} (<span style="color: {{ $item->color }};">{{ $item->color }}</span>)</span></p>
                                        <a href="{{ route('car.show', $item->id) }}" class="cart-btn btn btn-primary mt-2">
                                            <i class="fas fa-shopping-cart"></i> View Details
                                        </a>
                                    </div>
                                {{-- </div> --}}
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

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Select all images inside the slider
            let images = document.querySelectorAll('#carImagesSlider .car-image');
            let currentIndex = 0; // To track which image to show

            // Function to hide all images and show the active one
            function showNextImage() {
                // Hide the current image
                images[currentIndex].style.display = 'none';

                // Update the currentIndex
                currentIndex = (currentIndex + 1) % images.length;

                // Show the next image
                images[currentIndex].style.display = 'block';
            }

            // Initialize: Show the first image and hide the others
            images.forEach((image, index) => {
                if (index !== 0) {
                    image.style.display = 'none'; // Hide all but the first image initially
                }
            });

            // Change image every 2 seconds (2000 milliseconds)
            setInterval(showNextImage, 2000);
        });
    </script>
@endsection
