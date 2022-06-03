<?php

namespace App\Http\Controllers\Customer;

use App\Models\Booking;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bookings = Booking::where('user_id', auth()->user()->id)
            ->with(['bookingItems', 'bookingItems.services', 'paymentDetail'])
            ->get();

        // foreach($bookings as $booking){
        //     dd($booking->bookingItems()->sum('pairs_of_shoes'));
        // }

        return view('customer.home', compact('bookings'));
    }
}
