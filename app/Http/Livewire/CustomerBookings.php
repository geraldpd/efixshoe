<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use Livewire\Component;

class CustomerBookings extends Component
{
    public function render()
    {
        $bookings = Booking::where('user_id', auth()->user()->id)
            ->with(['bookingItems', 'bookingItems.services', 'paymentDetail'])
            ->get();

        return view('livewire.customer-bookings', compact('bookings'));
    }
}
