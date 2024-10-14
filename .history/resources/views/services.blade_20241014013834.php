@extends('layouts.app')

@section('title')
    Services
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/services.css') }}">
@endsection

@section('content')
    <section>
        <div class="row">
            <h2 class="section-heading">Our Services</h2>
        </div>
        <div class="row">
            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fas fa-money-bill-wave"></i>

                    </div>
                    <h3>Financing & Installments</h3>
                    <p>
                        We provide flexible financing solutions and installment plans to suit your needs.
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fas fa-brush"></i>
                    </div>
                    <h3>Car Customization</h3>
                    <p>
                        Choose your car's color, accessories, and other features to match your taste.
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fas fa-wrench"></i>
                    </div>

                    <h3>After-Sales Services</h3>
                    <p>
                        Post-purchase maintenance and support to ensure optimal performance.
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Car Insurance Services</h3>
                    <p>
                        Comprehensive insurance options to keep you and your car safe.
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <h3>Trade-In Program</h3>
                    <p>
                        Exchange your old car for a new one with a fair evaluation.
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h3>Registration & Licensing Services</h3>
                    <p>
                        We handle car registration and licensing to save you time and hassle.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
