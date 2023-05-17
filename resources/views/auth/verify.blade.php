@extends('layouts.frontend.main')

@section('content')

<section id="ourServices" data-aos="fade-up">
    <div class="container">
        <div class="ourServices__wrapper">
            <div class="faq-item">
                <h3 class="ourServices__item__subtitle">
                    Verify Your Email Address
                </h3>
                <p class="ourServices__item__text">
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <br><br>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn primary-btn">{{ __('Click here to request another') }}</button>.
                    </form>
                </p>
                @if (session('resent'))
                    <br><br>
                    <h5 class="subtitle-success">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </h5>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection