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
                        <a href="{{ route('customer.booking') }}" class="btn">Book A Service</a>
                    </div>
                </div>
            </div>

            <div class="hero__right" data-aos="fade-right">

                <div class="container">
                    <p>Don't have an account yet? <a href="{{ route('register') }}">Sign Up</a></p>
                </div>

                <section id="form">
                    <div class="container">

                        <h3 class="form__title">
                            Sign in
                        </h3>

                        <div class="form__wrapper">

                            <form method="POST" action="{{ route('login') }}" netlify>
                                @csrf

                                <div class="form__group form__group__full">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <p class="error-message"><strong>{{ $message }}</strong></p>
                                    @enderror
                                </div>

                                <div class="form__group form__group__full">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <p class="error-message"><strong>{{ $message }}</strong></p>
                                    @enderror
                                </div>

                                {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label> --}}

                                <button type="submit" class="btn primary-btn">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </form>

                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</section>
<!-- End Hero Section -->
@endsection
