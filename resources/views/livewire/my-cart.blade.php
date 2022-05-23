<div>
    <section id="ourServices">
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

            <div class="ourServices__wrapper">
                @forelse($cartItems as $item)
                    <div class="ourServices__item">
                        <div class="ourServices__item__info">
                            <h4 class="ourServices__item__title">Pairs of Shoes: {{ $item->qty }}</h4>
                            <h4 class="ourServices__item__price">PHP {{ number_format($item->price, 2) ?: 'Price' }}</h4>
                            <p class="ourServices__item__text">Service(s): {{ implode(", ", $item->options->services) }}</p>
                        </div>

                        <a href="#" class="btn" wire:click="removeItemInCart('{{ $item->rowId }}')">Remove Item</a>
                    </div>
                @empty
                    <div class="serviceGrid__item">
                        <div class="serviceGrid__item__info">
                            <h3 class="serviceGrid__item__title">No Items</h3>
                            <h3 class="serviceGrid__item__price">-</h3>
                        </div>
                    </div>
                @endforelse
            </div>

            @if( Cart::count() > 0 )
                <h2 class="page__subtitle__text" style="text-align: right;">
                    Total: PHP {{ Cart::priceTotal() }}
                </h2>

                <div class="form__wrapper">
                    <form wire:submit.prevent="checkout" method="POST" action="{{ route('customer.checkout') }}">
                        @csrf
                        <div class="form__group">
                            <label for="pickup_date">Pick-up Date: {{ $pickupDate }}</label>
                            <select name="pickup_date" id="pickup_date" wire:model="selectedPickupSlot" required>
                                <option value=''>--Choose a time slot--</option>
                                @foreach($slots as $key => $slot)
                                    <option value="{{ $key }}">{{ $slot }}</option>
                                @endforeach
                            </select>

                            @error('pickup_date')
                                <p class="error-message"><strong>{{ $message }}</strong></p>
                            @enderror
                        </div>

                        <div class="form__group">
                            <label for="delivery_date">Delivery Date: {{ $deliveryDate }}</label>
                            <select name="delivery_date" id="delivery_date" wire:model="selectedDeliverySlot" required>
                                <option value=''>--Choose a time slot--</option>
                                @foreach($slots as $key => $slot)
                                    <option value="{{ $key }}">{{ $slot }}</option>
                                @endforeach
                            </select>

                            @error('delivery_date')
                                <p class="error-message"><strong>{{ $message }}</strong></p>
                            @enderror
                        </div>

                        <button type="submit" class="btn primary-btn" style="margin-top: 3rem;">Checkout</button>
                    </form>
                </div>
            @else
                <a href="{{ route('customer.booking') }}" class="btn primary-btn" style="margin-bottom: 3rem;">Book A Service Now</a>
            @endif
        </div>
    </section>
</div>
