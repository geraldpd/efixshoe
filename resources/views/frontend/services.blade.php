@extends('layouts.frontend.main')

@section('content')
<!-- page Title -->
<section id="page__title" data-aos="fade-up">
    <div class="container">
        <h2 class="page__title__text">
            Our Services
        </h2>
    </div>
</section>

<!-- Our Services -->
<section id="ourServices" data-aos="fade-up">
    <div class="container">
        <div class="ourServices__wrapper">
            <div class="ourServices__item">
                <div class="ourServices__item__img">
                    <img src="{{ asset('images/deepclean.png') }}" alt="deep clean img">
                </div>
                <div class="ourServices__item__info">
                <h3 class="ourServices__item__title">
                    Deep Clean
                </h3>
                <h4 class="ourServices__item__price">PHP 500</h4>
                <p class="ourServices__item__text">
                    Some content
                </p>
                </div>
            </div>
            <div class="ourServices__item">
                <div class="ourServices__item__img">
                    <img src="{{ asset('images/unyellowing.jpg') }}" alt="unyellowing img">
                </div>
                <div class="ourServices__item__info">
                <h3 class="ourServices__item__title">
                    Unyellowing
                </h3>
                <h4 class="ourServices__item__price">PHP 500</h4>
                <p class="ourServices__item__text">
                    Some content
                </p>
                </div>
            </div>
            <div class="ourServices__item">
                <div class="ourServices__item__img">
                    <img src="{{ asset('images/reglue.jpg') }}" alt="reglue img">
                </div>
                <div class="ourServices__item__info">
                <h3 class="ourServices__item__title">
                    Reglue
                </h3>
                <h4 class="ourServices__item__price">PHP 500</h4>
                <p class="ourServices__item__text">
                    Some content
                </p>
                </div>
            </div>
            <div class="ourServices__item">
                <div class="ourServices__item__img">
                    <img src="{{ asset('images/restitch.jpg') }}" alt="restitch img">
                </div>
                <div class="ourServices__item__info">
                <h3 class="ourServices__item__title">
                    Restitch
                </h3>
                <h4 class="ourServices__item__price">PHP 500</h4>
                <p class="ourServices__item__text">
                    Some content
                </p>
                </div>
            </div>
            <div class="ourServices__item">
                <div class="ourServices__item__img">
                    <img src="{{ asset('images/restoration.png') }}" alt="restore img">
                </div>
                <div class="ourServices__item__info">
                <h3 class="ourServices__item__title">
                    Restore
                </h3>
                <h4 class="ourServices__item__price">PHP 500</h4>
                <p class="ourServices__item__text">
                    Some content
                </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Our Services -->
@endsection
