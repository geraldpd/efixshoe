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
                <h4 class="subtitle-success">
                    Total: PHP {{ Cart::priceTotal() }}
                </h4>

                <div class="form__wrapper">
                    <form method="POST" action="{{ route('customer.cart.store') }}">
                        @csrf
                        <div class="form__group">
                            <label for="pickup_date">Pick-up Date</label>
                            <input id="pickup_date" type="number" name="pickup_date" value="{{ old('pickup_date') }}" required >

                            @error('pickup_date')
                                <p class="error-message"><strong>{{ $message }}</strong></p>
                            @enderror
                        </div>

                        <div class="form__group">
                            <label for="delivery_date">Delivery Date</label>
                            <input id="delivery_date" type="number" name="delivery_date" value="{{ old('delivery_date') }}">

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
