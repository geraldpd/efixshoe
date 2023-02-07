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
                        Never gonna give you up
                        Never gonna let you down
                        Never gonna run around and desert you
                        Never gonna make you cry
                        Never gonna say goodbye
                        Never gonna tell a lie and hurt you
                    </p>
                    <div class="button__wrapper">
                        <a href="#" class="btn primary-btn">Explore Services</a>
                        <a href="#" class="btn">Avail A Service</a>
                    </div>
                </div>
            </div>

            <div class="hero__right" data-aos="fade-right">

                <div class="container">
                    <p>Don't have an account yet? <a href="{{ route('register') }}">sign up</a></p>
                </div>

                <section id="form">
                    <div class="container">

                        <h3 class="form__title">
                            Reset password
                        </h3>

                        <div class="form__wrapper">

                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form__group form__group__full">
                                    <label for="email">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <p><strong>{{ $message }}</strong></p>
                                    @enderror
                                </div>

                                <div class="form__group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" name="password" required autocomplete="new-password">
                                    @error('password')
                                     <p><strong>{{ $message }}</strong></p>
                                    @enderror
                                </div>

                                <div class="form__group">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form__group">
                                    <button type="submit" class="btn primary-btn">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
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
