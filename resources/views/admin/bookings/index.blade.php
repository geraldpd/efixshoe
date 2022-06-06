@extends('layouts.admin.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <h1>Bookings</h1>

        <div class="col-md-12">

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">status</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Pickup Date</th>
                        <th scope="col">Delivery Date</th>
                        <th scope="col">Total Pairs</th>
                        <th scope="col">Total Cost</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->status }}</td>
                            <td>{{ $booking->customer->email }}</td>
                            <td>{{ $booking->pickup_date }}</td>
                            <td>{{ $booking->delivery_date }}</td>
                            <td class="text-center">{{ $booking->total_pairs_of_shoes }}</td>
                            <td>{{ $booking->paymentDetail->total_cost }}</td>
                            <td>
                                <a href="{{ route('admin.bookings.show', [$booking]) }}">Details</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="6">No Bookings</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $bookings->links() }}

        </div>
    </div>
</div>
@endsection
