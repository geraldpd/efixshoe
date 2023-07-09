<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Notifications\UpdateBookingStatus;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::orderByDesc('id')->paginate(15);

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
                    $statuses[] = 'APPROVED FOR PICKUP';
                }
                else{
                    $statuses[] = 'AWAITING PAYMENT';
                    $statuses[] = 'PROCESSING';
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
                    $statuses[] = 'CASH ON DELIVERY';
                }
                else{
                    $statuses[] = 'FOR DELIVERY';
                }
            break;

            case Booking::FOR_DELIVERY:
            case Booking::FOR_CASH_ON_DELIVERY:
                $statuses = [
                    'DELIVERED'
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
        if( !$request->status ){
            return redirect()->back()->with('message', 'No Action Required');
        }

        $booking->status = $request->status;

        if( $request->status == 'DECLINED' ){
            $booking->decline_reason = $request->decline_reason;
        }

        $booking->save();

        $booking->customer->notify(new UpdateBookingStatus($booking));

        return redirect()->back()->with('message', 'Booking Successfully Updated');

    }
}
