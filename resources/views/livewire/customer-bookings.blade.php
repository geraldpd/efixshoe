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
                @forelse($bookings as $booking)
                    <div class="ourServices__item">
                        <div class="ourServices__item__info">
                            <h5 class="ourServices__item__subtitle">Booking ID: {{ $booking->id }} | Status: <span style="color: {{ $booking->status_color }}">{{ $booking->status }}</span></h5>
                            <h3 class="ourServices__item__subtitle">Payment Method: {{ ucwords($booking->paymentDetail->paymentMethod->name) }}</h3>
                            <h3 class="ourServices__item__subtitle" style="color: var(--green-1);">Total Price: PHP {{ number_format($booking->paymentDetail->total_cost / 100, 2) ?: 'Price' }}</h3>
                            @foreach ($booking->bookingItems as $item)
                                <p class="ourServices__item__text">Pairs of Shoes: {{ $item->pairs_of_shoes }} | Service(s): {{ implode(", ", $item->services->pluck('name')->toArray()) }}</p>
                            @endforeach
                            <br>
                        </div>
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
        </div>
    </section>
</div>