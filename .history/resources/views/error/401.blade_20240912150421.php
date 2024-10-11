@extends('layouts.master')

@section('title')
    401 - Unauthorized
@endsection

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <h1>401 - Unauthorized</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <!-- error section -->
    <div class="full-height-section error-section">
        <div class="full-height-tablecell">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="error-text">
                            <i class="far fa-solid fa-eye-slash"></i>
                            <h1>Oops! Unauthorized.</h1>
                            @isset($message)
                                <p>{{ $message }}</p>
                            @else
                                <p>You do not have permission to access this page.</p>
                            @endisset
                            <a href="/" class="boxed-btn">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end error section -->
    
@endsection
