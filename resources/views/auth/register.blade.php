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
                        <a href="{{ route('customer.booking') }}" class="btn">Avail A Service</a>
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
                                    <label for="address">{{ __('House No. / Bldg / Street') }}</label>
                                    <textarea id="address" name="address" required autofocus>{{ old('address') }}</textarea>

                                    @error('address')
                                        <p class="error-message"><strong>{{ $message }}</strong></p>
                                    @enderror
                                </div>

                                <div class="form__group form__group__full">
                                    <label for="city">{{ __('City') }}</label>
                                    <select name="city" id="city" required>
                                        <option value="Vigan City">Vigan City</option>
                                    </select>

                                    @error('city')
                                        <p class="error-message"><strong>{{ $message }}</strong></p>
                                    @enderror
                                </div>

                                <div class="form__group form__group__full">
                                    <label for="brgy">{{ __('Barangay') }}</label>
                                    <select name="brgy" id="brgy" required>
                                        <option value="">--Select Barangay--</option>
                                        <option value="Ayusan Norte">Ayusan Norte</option>
                                        <option value="Ayusan Sur">Ayusan Sur</option>
                                        <option value="Barangay I">Barangay I (Poblacion)</option>
                                        <option value="Barangay II">Barangay II (Poblacion)</option>
                                        <option value="Barangay III">Barangay III (Poblacion)</option>
                                        <option value="Barangay IV">Barangay IV (Poblacion)</option>
                                        <option value="Barangay V">Barangay V (Poblacion)</option>
                                        <option value="Barangay VI">Barangay VI (Poblacion)</option>
                                        <option value="Barangay VII">Barangay VII (Poblacion)</option>
                                        <option value="Barangay VIII">Barangay VIII (Poblacion)</option>
                                        <option value="Barangay IX">Barangay IX (Poblacion)</option>
                                        <option value="Barraca">Barraca</option>
                                        <option value="Beddeng Daya">Beddeng Daya</option>
                                        <option value="Beddeng Laud">Beddeng Laud</option>
                                        <option value="Bongtolan">Bongtolan</option>
                                        <option value="Bulala">Bulala</option>
                                        <option value="Cabalangegan">Cabalangegan</option>
                                        <option value="Cabaroan Daya">Cabaroan Daya</option>
                                        <option value="Cabaroan Laud">Cabaroan Laud</option>
                                        <option value="Camangaan">Camangaan</option>
                                        <option value="Capangpangan">Capangpangan</option>
                                        <option value="Mindoro">Mindoro</option>
                                        <option value="Nagsangalan">Nagsangalan</option>
                                        <option value="Pantay Daya">Pantay Daya</option>
                                        <option value="Pantay Fatima">Pantay Fatima</option>
                                        <option value="Pantay Laud">Pantay Laud</option>
                                        <option value="Paoa">Paoa</option>
                                        <option value="Paratong">Paratong</option>
                                        <option value="Pong-ol">Pong-ol</option>
                                        <option value="Purok-a">Purok-a-bassit</option>
                                        <option value="Purok-a">Purok-a-dackel</option>
                                        <option value="Raois">Raois</option>
                                        <option value="Rugsuanan">Rugsuanan</option>
                                        <option value="Salindeg">Salindeg</option>
                                        <option value="San Jose">San Jose</option>
                                        <option value="San Julian">San Julian Norte</option>
                                        <option value="San Julian">San Julian Sur</option>
                                        <option value="San Pedro">San Pedro</option>
                                        <option value="Tamag">Tamag</option>
                                    </select>

                                    @error('brgy')
                                        <p class="error-message"><strong>{{ $message }}</strong></p>
                                    @enderror
                                </div>

                                <div class="form__group form__group__full">
                                    <label for="password">{{ __('Password') }}</label> &nbsp; &nbsp;
                                    <i class="far fa-eye" id="togglePassword1" style="font-size: 14px; cursor: pointer;"></i>
                                    <input id="password" type="password" name="password" required autocomplete="current-password">
                                    <p>Note: Must be at least 8 characters and contain at least 1 uppercase character, 1 number, and 1 special character.</p>

                                    @error('password')
                                        <p class="error-message"><strong>{{ $message }}</strong></p>
                                    @enderror
                                </div>

                                <div class="form__group form__group__full">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label> &nbsp; &nbsp;
                                    <i class="far fa-eye" id="togglePassword2" style="font-size: 14px; cursor: pointer;"></i>
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

@push('custom-scripts')
    <script>
        const togglePassword1 = document.querySelector('#togglePassword1');
        const togglePassword2 = document.querySelector('#togglePassword2');
        const password = document.querySelector('#password');
        const password_confirm = document.querySelector('#password-confirm');

        togglePassword1.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');

            if (this.classList.contains('fa-eye-slash')) {
                this.classList.remove('fa-eye');
            }

            if (type == 'password' && !this.classList.contains('fa-eye')) {
                this.classList.add('fa-eye');
            }
        });

        togglePassword2.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password_confirm.getAttribute('type') === 'password' ? 'text' : 'password';
            password_confirm.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');

            if (this.classList.contains('fa-eye-slash')) {
                this.classList.remove('fa-eye');
            }

            if (type == 'password' && !this.classList.contains('fa-eye')) {
                this.classList.add('fa-eye');
            }
        });
    </script>
@endpush
