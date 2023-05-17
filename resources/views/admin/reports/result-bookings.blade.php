@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12 d-print-none">
                <button class="print-buttons btn btn-primary float-end" onClick="window.print()">Print</button>
                <br>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.reports.index') }}">Reports</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Booking Report</li>
                    </ol>
                </nav>
            </div>

            <div class="col-md-12">

                <div class="d-print-block d-none">
                    <img src="{{ asset('images/logo.png') }}" alt="eFixShoe Logo" style="position: absolute; float: right; right: 0; width: 10%;">
                    <br>
                    <h1>Booking Report</h1>
                    <span class="col-sm-8">Print Date: {{ now() }}</span>
                </div>

                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Status</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Creation Date</th>
                            <th scope="col">Pickup Date</th>
                            <th scope="col">Delivery Date</th>
                            <th scope="col">Services Rendered</th>
                            <th scope="col">Total Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($result as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ Str::of($booking->status)->upper()->replace('_', ' ') }}</td>
                                <td>
                                    {{ $booking->customer->full_name }}
                                    {{ $booking->customer->email }}
                                </td>
                                <td>{{ $booking->created_at->format('F d Y g:i A') }}</td>
                                <td>{{ $booking->pickup_date->format('F d Y g:i A') }}</td>
                                <td>{{ $booking->delivery_date->format('F d Y g:i A') }}</td>
                                <td>

                                    <ol>
                                        @foreach ($booking->bookingItems as $bookingItem)
                                            <li class="card-body">
                                                <h5 class="card-title">
                                                    <strong>{{ $bookingItem->pairs_of_shoes }}</strong> pairs of shoes
                                                </h5>

                                                <hr>

                                                <dl class="row">
                                                    @foreach ($bookingItem->services as $service)
                                                        <dt class="col-sm-8">{{ $service->name }}</dt>
                                                        <dd class="col-sm-4 text-right">PHP {{ number_format($service->cost, 2) }}</dd>
                                                    @endforeach

                                                    <hr class="booking_item_divider" />

                                                    <dt class="col-sm-8">Total</dt>
                                                    <dd class="col-sm-4 text-right"><strong>PHP {{ number_format($bookingItem->services->sum('cost'), 2) }}</strong></dd>
                                                </dl>

                                            </li>
                                        @endforeach
                                    </ol>


                                </td>
                                <td>PHP {{ number_format($booking->paymentDetail->total_cost / 100, 2) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="7">No Bookings</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>
    </div>
@endsection

@push('styles')
    <style>
        .booking_item_divider {
            border: none;
            height: 1px;
            background: #000;
            background: repeating-linear-gradient(90deg,#000,#000 6px,transparent 6px,transparent 12px);
        }
    </style>
@endpush

@push('scripts')
    <script>
        /* scripts */
    </script>
@endpush