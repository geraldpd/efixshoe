<div>
    <section id="serviceGrid">
        <div class="container">
            <h2 class="serviceGrid__title">
                Available Services
            </h2>
            <div class="serviceGrid__wrapper">
                @forelse ($services as $service)
                    <div class="serviceGrid__item">
                        <div class="serviceGrid__item__img">
                            <img src="{{ $service->image ? asset($service->image) : asset('images/temp_service.jpg') }}">
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
            </div>
        </div>
    </section>
    <!-- End Available Services -->

    <section id="form">
        <div class="container">
            @if( session('success') )
                <h5 class="subtitle-success">
                    {{ session('success') }}
                </h5>
            @elseif( session('error') )
                <h5 class="subtitle-error">
                    {{ session('error') }}
                </h5>
            @endif
            <div class="form__wrapper">
                <form wire:submit.prevent="addToMyCart" method="POST" action="{{ route('customer.cart.store') }}">
                    @csrf
                    <div class="form__group">
                        <label for="pairs_of_shoes">How many pairs of shoes?</label>
                        <input wire:model="quantity" id="pairs_of_shoes" type="number" name="pairs_of_shoes" value="{{ old('pairs_of_shoes') }}" min="1" required autocomplete="pairs_of_shoes" autofocus>

                        @error('pairs_of_shoes')
                        <p class="error-message"><strong>{{ $message }}</strong></p>
                        @enderror
                    </div>

                    <div class="form__group form__group__full" style="margin-top: 3rem;">
                        <label for="last_name">Select Services</label>

                        @forelse ($services as $service)
                            <div class="checkbox-wrapper">
                                @if( $service->is_active )
                                    <input type="checkbox" name="service[]" id="{{ Illuminate\Support\Str::slug($service->name) }}" value="{{ $service->id }}" wire:model="selectedServices">
                                    <label class="checkbox-label" for="{{ Illuminate\Support\Str::slug($service->name) }}">{{ $service->name ?: 'Service' }}</label>
                                @else
                                    <input type="checkbox" name="" id="{{ Illuminate\Support\Str::slug($service->name) }}" value="{{ $service->id }}" disabled>
                                    <label class="checkbox-label line-strike red-label" for="{{ Illuminate\Support\Str::slug($service->name) }}">{{ $service->name ?: 'Service' }}</label>
                                @endif
                            </div>
                        @empty
                            <div class="checkbox-wrapper">
                                <input type="checkbox" name="" id="service" value="1" disabled>
                                <label class="checkbox-label" for="service">No Service Available</label>
                            </div>
                        @endforelse

                        @error('service')
                            <br><p class="error-message"><strong>{{ $message }}</strong></p>
                        @enderror
                    </div>

                    <button type="submit" class="btn primary-btn" style="margin-top: 3rem;">Add to My Cart</button>
                </form>
            </div>
        </div>
    </section>
</div>
