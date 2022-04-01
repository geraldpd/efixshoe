@extends('layouts.frontend.main')

@section('content')
<!-- Hero Section -->
<section id="hero">
    <div class="container">
        <div class="hero__wrapper">
        <div class="hero__left" data-aos="fade-left">
            <div class="hero__left__wrapper">

            <h1 class="hero__heading">eFixShoe: An Online Shoe Care and Services in Metro Vigan</h1>
            <p class="hero__info">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <div class="button__wrapper">
                <a href="#" class="btn primary-btn">Explore Services</a>
                <a href="#" class="btn">Book A Service</a>
            </div>
            </div>
        </div>
        <div class="hero__right" data-aos="fade-right">
            <div class="hero__imgWrapper">
            <img src="{{ asset('images/heroImg.png') }}">
            </div>
        </div>
        </div>
    </div>
</section>
<!-- End Hero Section -->
@endsection
