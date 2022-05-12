@extends('layouts.frontend.auth')

@section('content')
<!-- Hero Section -->
<section id="hero">
    <div class="container">
        <div class="hero__wrapper">

            <div class="hero__left" data-aos="fade-left">
                <div class="hero__left__wrapper">

                    <h1 class="hero__heading">eFixShoe: An Online Shoe Care and Services in Metro Vigan</h1>
                    <p class="hero__info">
                        Providing shoe cleaning has never been a new notion, but the idea behind "Clean Steps" is to take it to the next level, "One Step Above," where people can be amazed by the results.
                        We hand wash your shoes making sure that every dirt is taken care of. We brush 'em, soap 'em clean because we value your time. Contact us, and we will pick them up and get them delivered within Metro Vigan.
                    </p>
                    <div class="button__wrapper">
                        <a href="{{ route('services') }}" class="btn primary-btn">Explore Services</a>
                        <a href="#" class="btn">Book A Service</a>
                    </div>
                </div>
            </div>

            <div class="hero__right" data-aos="fade-right">

                <div class="container">
                    <p>Return to <a href="{{ route('login') }}">Sign In</a></p>
                </div>

                <section id="form">
                    <div class="container">

                        <h3 class="form__title">
                            Reset Password
                        </h3>

                        <div class="form__wrapper">

                            <form method="POST" action="{{ route('password.email') }}" netlify>
                                @csrf

                                <div class="form__group form__group__full">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <p class="error-message"><strong>{{ $message }}</strong></p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn primary-btn">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </form>

                        </div>

                        @if (session('status'))
                            <div data-aos="fade-up">
                                <h3 class="form__title">We have emailed your password reset link!</h3>
                            </div>
                        @endif
                    </div>
                </section>
            </div>

        </div>
    </div>
</section>
<!-- End Hero Section -->
@endsection
