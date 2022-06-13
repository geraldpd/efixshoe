<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::paginate(15);

        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        $statuses = [];
        switch ($booking->status) {
            case Booking::PENDING:
                $statuses = ['DECLINED'];
                if( $booking->paymentDetail->paymentMethod->name == 'Cash' ){
                    $statuses[] = 'FOR_PICKUP';
                }
                else{
                    $statuses[] = 'AWAITING_PAYMENT';
                }
            break;

            case Booking::DECLINED:
            break;

            case Booking::FOR_PICKUP:
            case Booking::AWAITING_PAYMENT:
                $statuses = [
                    'PROCESSING'
                ];
            break;

            case Booking::PROCESSING:
                $statuses = [];
                if( $booking->paymentDetail->paymentMethod->name == 'Cash' ){
                    $statuses[] = 'FOR_CASH_ON_DELIVERY';
                }
                else{
                    $statuses[] = 'FOR_DELIVERY';
                }
            break;

            case Booking::FOR_DELIVERY:
            case Booking::FOR_CASH_ON_DELIVERY:
                $statuses = [
                    'COMPLETED'
                ];
            break;

            case Booking::COMPLETED:
            break;
        }

        return view('admin.bookings.show', compact('booking', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('message', 'Booking Successfully Updated');

    }
}
