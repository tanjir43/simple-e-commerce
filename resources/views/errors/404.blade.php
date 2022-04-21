@extends('frontend.master')
@section('title')
    error -page
@endsection

@section('body')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">error</li>
                </ol>
            </div>
        </nav>

        <div class="error-content text-center" style="background-image: url({{asset('/')}}assets/images/backgrounds/error-bg.jpg)">
            <div class="container">
                <h1 class="error-title">Error 404</h1>
                <p>We are sorry, the page you've requested is not available.</p>
                <a href="{{route('homes')}}" class="btn btn-outline-primary-2 btn-minwidth-lg">
                    <span>BACK TO HOMEPAGE</span>
                    <i class="icon-long-arrow-right"></i>
                </a>
            </div>
        </div>
    </main>
@endsection

