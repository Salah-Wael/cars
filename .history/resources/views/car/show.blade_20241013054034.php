@extends('layouts.master')

@section('title')
    Show Car Details
@endsection

@section('content')
    @if ($car)

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Explore More Details About</p>
						<h2>{{ $car->car_model }}</h2> <!-- Display car model -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single car section -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<!-- Carousel for car images -->
                    <div class="testimonial-sliders">
                        <div class="single-testimonial-slider" style="height: 100px !important;">
                            <div class="single-product-img">
                                <img src="{{ asset('assets/img/cars/'.$car->image) }}" alt="{{ $car->car_model }}">
                            </div>
                        </div>

                        @forelse ($carImages as $carImage)
                            <div class="single-testimonial-slider">
                                <div class="single-product-img">
                                    <img src="{{ asset('assets/img/cars/'.$carImage->image_path) }}" alt="{{ $car->car_model }}">
                                </div>
                            </div>
                        @empty
                            <div class="single-product-img">
                                <img src="{{ asset('assets/img/cars/'.$car->image) }}" alt="{{ $car->car_model }}">
                            </div>
                        @endforelse
                    </div>
				</div>

				<div class="col-md-3">
					<div class="single-product-content">
						<p class="single-product-pricing"><span>{{ $car->car_model }}</span></p>
						<h3>{{ $car->description }}</h3>
						<p class="single-product-pricing"><span>Price:</span> {{ $car->price }} USD</p>
						<p><strong>Type:</strong> {{ $car->type }}</p>
						<p><strong>Color:</strong> {{ $car->color }}</p>
						<p><strong>Status:</strong> {{ ucfirst($car->status) }}</p>
						<p><strong>Plate Number:</strong> {{ $car->plate ?? 'Not available' }}</p>
						<p><strong>Posted By:</strong> User ID {{ $car->user_id }}</p>

						<div class="single-product-form">
                            <form id="add-to-cart-form" action="{{ route('cart.store', $car->id) }}" method="POST">
                            @csrf
                                <input type="number"
                                    name="quantity"
                                    min="1"
                                    step="1"
                                    value="1">
							</form>

                            <a href="{{ route('cart.store', $car->id) }}" class="cart-btn"
                            onclick="event.preventDefault();
                            document.getElementById('add-to-cart-form').submit();">
                            <i class="fas fa-shopping-cart"></i>
                            {{ __('Add to Cart') }}
                            </a>

                            <h4>Share:</h4>
                            <ul class="product-share">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
					    </div>
				    </div>
			    </div>

                <div class="col-md-4">
                    <!-- QR Code can be shown here -->
                    {{-- {{ $qrCode }} --}}
                </div>
		    </div>
	    </div>
	</div>
	<!-- end single car section -->


    <!-- testimonail-section -->
	<div class="testimonail-section mt-80 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<!-- Testimonial entries can remain as in the original -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->

    <!-- Related Cars -->
    <div class="more-products mb-150">
        <div class="container">
            @if ($related->count() > 0)
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
                                        <img src="{{ asset('assets/img/cars/'.$item->image) }}" alt="{{ $item->car_model }}">
                                    </a>
                                </div>
                                <h3>{{ $item->car_model }}</h3>
                                <p class="product-price">
                                    Price: <span class="orange-text">{{ $item->price }} USD</span>
                                </p>
                                <a href="{{ route('cart.store', $item->id) }}" class="cart-btn"
                                    onclick="event.preventDefault();
                                    document.getElementById('add-to-cart-form-{{ $item->id }}').submit();">
                                    <i class="fas fa-shopping-cart"></i>
                                    {{ __('Add to Cart') }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No related cars found in this price range.</p>
            @endif
        </div>
    </div>
    <!-- end related cars -->


	<!-- logo carousel (optional) -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<!-- Logos can remain unchanged -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

    @else
        <p>Car not found</p>
    @endif
@endsection
