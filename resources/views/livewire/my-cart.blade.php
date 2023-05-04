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
                            <h4 class="ourServices__item__title">Pair/s of Shoes: {{ $item->qty }}</h4>
                            <h4 class="ourServices__item__price">PHP {{ number_format($item->qty * $item->price, 2) ?: 'Price' }}</h4>
                            <p class="ourServices__item__text">Service(s): {{ implode(", ", $item->options->services) }}</p>
                        </div>

                        <a href="#" class="btn" wire:click="removeItemInCart('{{ $item->rowId }}')">Remove Item</a>
                    </div>
                @empty
                    <div class="ourServices__item">
                        <div class="ourServices__item__info">
                            <h3 class="ourServices__item__title">No Items</h3>
                            <h3 class="ourServices__item__price">-</h3>
                        </div>
                    </div>
                @endforelse
            </div>

            @if( Cart::count() > 0 )
                @if( $discount != 0 )
                    <h2 class="page__subtitle" style="text-align: right;">
                        Sub Total: PHP {{ $subTotal }}
                    </h2>
                    <br>
                    <h5 class="page__subtitle" style="text-align: right;">
                        Discount: PHP {{ $discount }}
                    </h5>
                @endif
                <br>
                <h2 class="page__subtitle__text" style="text-align: right;">
                    Total: PHP {{ $priceTotal }}
                </h2>
                
                <br>

                <div class="form__wrapper">
                    <form wire:submit.prevent="checkout" method="POST" action="{{ route('customer.checkout') }}">
                        @csrf
                        <div class="form__group">
                            <label for="pickup_date">Pick-up Date: {{ $pickupDate->format('d F Y') }}</label>
                            <select name="pickup_date" id="pickup_date" wire:model="selectedPickupSlot" required>
                                <option value=''>--Choose a time slot--</option>
                                @foreach($slots as $key => $slot)
                                    @php
                                        $check = (isset($pickupDateCtr[$key]) && $pickupDateCtr[$key] > $maxBookingPerSlot);
                                    @endphp

                                    <option value="{{ $key }}" {{ $check ? 'disabled' : '' }} title="{{ $check ? 'The time is already fully booked, choose another time slot.' : '' }}">{{ $slot }}</option>
                                @endforeach
                            </select>

                            @error('pickup_date')
                                <p class="error-message"><strong>{{ $message }}</strong></p>
                            @enderror
                        </div>

                        <div class="form__group">
                            <label for="delivery_date">Delivery Date: {{ $deliveryDate->format('d F Y') }}</label>
                            <select name="delivery_date" id="delivery_date" wire:model="selectedDeliverySlot" required>
                                <option value=''>--Choose a time slot--</option>
                                @foreach($slots as $key => $slot)
                                    @php
                                        $check = (isset($deliveryDateCtr[$key]) && $deliveryDateCtr[$key] > $maxBookingPerSlot);
                                    @endphp

                                    <option value="{{ $key }}" {{ $check ? 'disabled' : '' }} title="{{ $check ? 'The time is already fully booked, choose another time slot.' : '' }}">{{ $slot }}</option>
                                @endforeach
                            </select>

                            @error('delivery_date')
                                <p class="error-message"><strong>{{ $message }}</strong></p>
                            @enderror
                        </div>

                        <div class="form__group">
                            <label for="mode_of_payment">Mode of Payment</label>
                            <select name="mode_of_payment" id="mode_of_payment" wire:model="selectedModeOfPayment" wire:change="change" required>
                                <option value=''>--Choose Mode of Payment--</option>
                                @foreach($paymentMethods as $paymentMethod)
                                    <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
                                @endforeach
                            </select>

                            @error('mode_of_payment')
                                <p class="error-message"><strong>{{ $message }}</strong></p>
                            @enderror
                        </div>

                        <div class="form__group">
                            <div class="form__group">
                                <label for="voucher">Voucher</label>
                                <input type="text" wire:model="voucher" placeholder="Input Voucher" {{ $isVoucherApplied ? "readonly" : '' }}>

                                @if( $voucher && !$isVoucherApplied )
                                    <br><br><a href="#" class="btn primary-btn" wire:click="applyVoucher">Apply voucher</a>
                                @elseif( $voucher && $isVoucherApplied )
                                    <p class="subtitle-success">
                                        <strong>Voucher applied!</strong>
                                    </p>
                                    <a href="#" class="btn primary-btn" style="background: #d9534f !important; color: white !important;" wire:click="removeVoucher">Remove voucher</a>
                                @endif

                                @error('voucher')
                                    <p class="error-message"><strong>{{ $message }}</strong></p>
                                @enderror
                            </div>
                        </div>

                        @if( $showReceiptDiv )
                            <div class="form__group">
                                <label for="receipt">Upload Receipt</label>
                                <input type="file" wire:model="receipt" style="background-color: none !important;">
                                <p class="subtitle-success">
                                    <strong>Note: If using GCash/PayMaya/Bank Transfer, kindly transfer the exact amount to the Account details displayed and upload your receipt.</strong>
                                </p>

                                @error('receipt')
                                    <p class="error-message"><strong>{{ $message }}</strong></p>
                                @enderror
                            </div>

                            @if( $paymentMethodDetails )
                                <div class="form__group" style="text-align: center !important;">
                                    <h3 class="ourServices__item__text">Account Name: {{ $paymentMethodDetails->account_name }}</h3>
                                    <h3 class="ourServices__item__text">Account Number: {{ $paymentMethodDetails->account_number }}</h3>
                                    <br>
                                    @if( $paymentMethodDetails->image )
                                        <img src="{{ asset($paymentMethodDetails->image) }}" style="height: 400px !important;">
                                    @endif
                                </div>
                            @endif
                        @endif

                        <div class="form__group form__group__full">
                            <button type="submit" class="btn primary-btn" style="margin-top: 3rem;">Checkout</button>
                        </div>
                    </form>
                </div>
            @else
                <a href="{{ route('customer.booking') }}" class="btn primary-btn" style="margin-bottom: 3rem;">Avail A Service Now</a>
            @endif
        </div>
    </section>
</div>
