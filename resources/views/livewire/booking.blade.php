<div>
    <section id="serviceGrid">
        <div class="container">
            <h2 class="serviceGrid__title">
                Available Services
            </h2>
            
            @if( session('success') )
                <h5 class="subtitle-success">
                    {{ session('success') }}
                </h5>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <h5 class="subtitle-error">
                        {{ $error }}
                    </h5>
                @endforeach
            @endif

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
                                <br><br>
                                <form wire:submit.prevent="addToMyCart({{ $service->id }})" method="POST" action="{{ route('customer.cart.store') }}">
                                    <div class="form__group">
                                        <label for="pairs_of_shoes">Pair/s of shoes</label>
                                        <input style="background-color: var(--lightGreen-2) !important;" wire:model="quantity.{{ $service->id }}" id="pairs_of_shoes" type="number" name="pairs_of_shoes" value="{{ old('pairs_of_shoes') }}" min="1" required autocomplete="pairs_of_shoes" autofocus>
                
                                        @error('pairs_of_shoes')
                                            <p class="error-message"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn primary-btn" style="margin-top: 1rem;">Add to My Cart</button>
                                </form>
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
</div>
