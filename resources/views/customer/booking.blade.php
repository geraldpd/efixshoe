@extends('layouts.frontend.main')

@section('content')
    <!-- Available Services -->
    <section id="serviceGrid" data-aos="fade-up">
        <div class="container">
            <h2 class="serviceGrid__title">
                Available Services
            </h2>
            <div class="serviceGrid__wrapper">
                @forelse ($services as $service)
                    <div class="serviceGrid__item">
                        <div class="serviceGrid__item__img">
                            @if( $service->name && file_exists(public_path('images/' . Illuminate\Support\Str::slug($service->name) . '.jpg')) )
                                <img src="{{ asset('images/' . Illuminate\Support\Str::slug($service->name) . '.jpg') }}">
                            @else
                                <img src="{{ asset('images/temp_service.jpg') }}">
                            @endif
                        </div>
                        <div class="serviceGrid__item__info">
                            <h3 class="serviceGrid__item__title">{{ $service->name ?: 'Service' }}</h3>
                            @if($service->is_active)
                                <h3 class="serviceGrid__item__price">PHP {{ number_format($service->cost, 2) ?: 'Price' }}</h3>
                            @else
                                <h3 class="serviceGrid__item__red__label">NOT AVAILABLE</h3>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="serviceGrid__item">
                        <div class="serviceGrid__item__img">
                            <img src="{{ asset('images/temp_service.jpg') }}">
                        </div>
                        <div class="serviceGrid__item__info">
                            <h3 class="serviceGrid__item__title">No Service Available</h3>
                            <h3 class="serviceGrid__item__price">-</h3>
                        </div>
                    </div>
                @endforelse
                {{-- <div class="serviceGrid__item">
                    <div class="serviceGrid__item__img">
                        <img src="{{ asset('images/deepclean.png') }}" alt="deep clean img">
                    </div>
                    <div class="serviceGrid__item__info">
                        <h3 class="serviceGrid__item__title">
                            Deep Clean
                        </h3>
                        <h3 class="serviceGrid__item__price">PHP 300.00</h3>
                    </div>
                </div>
                <div class="serviceGrid__item">
                    <div class="serviceGrid__item__img">
                        <img src="{{ asset('images/unyellowing.jpg') }}" alt="unyellowing img">
                    </div>
                    <div class="serviceGrid__item__info">
                        <h3 class="serviceGrid__item__title">
                            Unyellowing
                        </h3>
                        <h3 class="serviceGrid__item__price">PHP 300.00</h3>
                    </div>
                </div>
                <div class="serviceGrid__item">
                    <div class="serviceGrid__item__img">
                        <img src="{{ asset('images/reglue.jpg') }}" alt="reglue img">
                    </div>
                    <div class="serviceGrid__item__info">
                        <h3 class="serviceGrid__item__title">
                            Reglue
                        </h3>
                        <h3 class="serviceGrid__item__price">PHP 500.00</h3>
                    </div>
                </div>
                <div class="serviceGrid__item">
                    <div class="serviceGrid__item__img">
                        <img src="{{ asset('images/restitch.jpg') }}" alt="restitch img">
                    </div>
                    <div class="serviceGrid__item__info">
                        <h3 class="serviceGrid__item__title">
                            Restitch
                        </h3>
                        <h3 class="serviceGrid__item__price">PHP 500.00</h3>
                    </div>
                </div>
                <div class="serviceGrid__item">
                    <div class="serviceGrid__item__img">
                        <img src="{{ asset('images/restoration.png') }}" alt="restore img">
                    </div>
                    <div class="serviceGrid__item__info">
                        <h3 class="serviceGrid__item__title">
                            Restore
                        </h3>
                        <h3 class="serviceGrid__item__price">PHP 500.00</h3>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- End Available Services -->

    <section id="form">
        <div class="container">
            <div class="form__wrapper">
                <form method="POST" action="{{ route('customer.cart.store') }}">
                    @csrf
                    <div class="form__group">
                        <label for="pairs_of_shoes">How many pairs of shoes?</label>
                        <input id="pairs_of_shoes" type="number" name="pairs_of_shoes" value="{{ old('pairs_of_shoes') }}" min="1" required autocomplete="pairs_of_shoes" autofocus>

                        @error('pairs_of_shoes')
                            <p class="error-message"><strong>{{ $message }}</strong></p>
                        @enderror
                    </div>

                    <div class="form__group form__group__full" style="margin-top: 3rem;">
                        <label for="last_name">Select Services</label>

                        @forelse ($services as $service)
                            <div class="checkbox-wrapper">
                                @if( $service->is_active )
                                    <input type="checkbox" name="service[]" id="{{ Illuminate\Support\Str::slug($service->name) }}" value="1">
                                    <label class="checkbox-label" for="{{ Illuminate\Support\Str::slug($service->name) }}">{{ $service->name ?: 'Service' }}</label>
                                @else
                                    <input type="checkbox" name="" id="{{ Illuminate\Support\Str::slug($service->name) }}" value="1" disabled>
                                    <label class="checkbox-label line-strike red-label" for="{{ Illuminate\Support\Str::slug($service->name) }}">{{ $service->name ?: 'Service' }}</label>
                                @endif
                            </div>
                        @empty
                            <div class="checkbox-wrapper">
                                <input type="checkbox" name="" id="service" value="1" disabled>
                                <label class="checkbox-label" for="service">No Service Available</label>
                            </div>
                        @endforelse

                        {{-- <div class="checkbox-wrapper">
                            <input type="checkbox" name="service[]" id="deep_clean" value="1">
                            <label class="checkbox-label" for="deep_clean">Deep Clean</label>
                        </div>
                        <div class="checkbox-wrapper">
                            <input type="checkbox" name="service[]" id="unyellowing" value="2">
                            <label class="checkbox-label" for="unyellowing">Unyellowing</label>
                        </div>
                        <div class="checkbox-wrapper">
                            <input type="checkbox" name="service[]" id="reglue" value="3">
                            <label class="checkbox-label" for="reglue">Reglue</label>
                        </div>
                        <div class="checkbox-wrapper">
                            <input type="checkbox" name="service[]" id="restitch" value="4">
                            <label class="checkbox-label" for="restitch">Restitch</label>
                        </div>
                        <div class="checkbox-wrapper">
                            <input type="checkbox" name="service[]" id="restore" value="5">
                            <label class="checkbox-label" for="restore">Restore</label>
                        </div> --}}

                        @error('service')
                            <br><p class="error-message"><strong>{{ $message }}</strong></p>
                        @enderror
                    </div>

                    <button type="submit" class="btn primary-btn" style="margin-top: 3rem;">Add to My Cart</button>
                </form>
            </div>
        </div>
    </section>
@endsection
