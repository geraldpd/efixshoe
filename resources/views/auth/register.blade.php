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
                        <a href="{{ route('booking') }}" class="btn">Book A Service</a>
                    </div>
                </div>
            </div>

            <div class="hero__right" data-aos="fade-right">

                <div class="container">
                    <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
                </div>

                <section id="form">
                    <div class="container">

                        <h3 class="form__title">
                            Sign Up
                        </h3>

                        <div class="form__wrapper">

                            <form method="POST" action="{{ route('register') }}" netlify>
                                @csrf

                                <div class="form__group">
                                    <label for="first_name">{{ __('First Name') }}</label>
                                    <input id="first_name" type="first_name" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <p class="error-message"><strong>{{ $message }}</strong></p>
                                    @enderror
                                </div>

                                <div class="form__group">
                                    <label for="last_name">{{ __('Last Name') }}</label>
                                    <input id="last_name" type="last_name" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <p class="error-message"><strong>{{ $message }}</strong></p>
                                    @enderror
                                </div>

                                <div class="form__group form__group__full">
                                    <label for="email">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <p class="error-message"><strong>{{ $message }}</strong></p>
                                    @enderror
                                </div>

                                <div class="form__group form__group__full">
                                    <label for="contact_number">{{ __('Contact Number') }}</label>
                                    <input id="contact_number" type="text" placeholder="09 *** *** ***" maxlength="11" name="contact_number" value="{{ old('contact_number') }}" required autocomplete="contact_number">

                                    @error('contact_number')
                                        <p class="error-message"><strong>{{ $message }}</strong></p>
                                    @enderror
                                </div>

                                <div class="form__group form__group__full">
                                    <label for="address_1">{{ __('Address 1') }}</label>
                                    <textarea id="address_1" name="address_1" required autofocus>{{ old('address_1') }}</textarea>

                                    @error('address_1')
                                        <p class="error-message"><strong>{{ $message }}</strong></p>
                                    @enderror
                                </div>

                                <div class="form__group form__group__full">
                                    <label for="address_2">{{ __('Address 2') }}</label>
                                    <textarea id="address_2" name="address_2" required autofocus>{{ old('address_1') }}</textarea>

                                    @error('address_2')
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

                                <div class="form__group form__group__full">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="current-password">
                                </div>

                                <button type="submit" class="btn primary-btn">
                                    {{ __('Register') }}
                                </button>

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
