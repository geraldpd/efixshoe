@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.bookings.index') }}">Bookings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $booking->id }}</li>
                    </ol>
                </nav>

                @if(session()->has('message'))
                    <div class="alert alert-info">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <dl class="row">
                            <dt class="col-sm-3">Customer</dt>
                            <dd class="col-sm-9">
                                <p>
                                    <span>{{ $booking->customer->full_name }}</span>
                                    <br>
                                    {{ $booking->customer->email }}
                                </p>
                            </dd>

                            <dt class="col-sm-3">Contact #:</dt>
                            <dd class="col-sm-9">{{ $booking->customer->contact_number }}</dd>

                            <dt class="col-sm-3">Address:</dt>
                            <dd class="col-sm-9">{{ $booking->customer->address }}</dd>

                            <dt class="col-sm-3">Pickup Date:</dt>
                            <dd class="col-sm-9">{{ $booking->pickup_date->format('F d Y g:i A') }}</dd>

                            <dt class="col-sm-3">Delivery Date:</dt>
                            <dd class="col-sm-9">{{ $booking->delivery_date->format('F d Y g:i A') }}</dd>
                        </dl>

                    </div>

                    <div class="col-md-6">
                        <dl class="row">

                            <dd class="col-sm-6">
                                @if(! in_array($booking->status, ['COMPLETED', 'DECLINED']))
                                    <form method="POST" action="{{ route('admin.bookings.update', [$booking]) }}">
                                        @csrf
                                        @method('PUT')

                                        <label for="">Select Progress</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" id="status"  name="status">
                                                <option value="" selected disabled> {{ Str::of($booking->status)->title()->replace('_', ' ') }} (current)</option>
                                                @foreach($statuses as $status)
                                                    <option value="{{ $status }}">{{ Str::of($status)->title()->replace('_', ' ') }}</option>
                                                @endforeach
                                            </select>
                                            <button  class="btn btn-primary" type="submit" for="status">Update</button>
                                        </div>

                                        <div id="div_decline_reason" style="display: none;">
                                            <label for="">Decline Reason (Optional)</label>
                                            <input type="text" id="decline_reason" name="decline_reason">
                                        </div>

                                    </form>
                                @else
                                    <h2>{{ $booking->status }}</h2>

                                    @if( $booking->status == 'DECLINED' )
                                        <b>Decline Reason: {{ $booking->decline_reason ?: 'N/A' }}</b>
                                    @endif
                                @endif
                            </dd>

                            <dt class="col-md-12">
                                <br>
                            </dt>

                            <dt class="col-sm-3">Total Cost:</dt>
                            <dd class="col-sm-9"><h4>PHP {{ number_format($booking->paymentDetail->total_cost / 100, 2) }}</h4></dd>


                            <dt class="col-sm-3">Payment Mode:</dt>
                            <dd class="col-sm-9">{{ $booking->paymentDetail->paymentMethod->name }}</dd>

                            @if($booking->paymentDetail->payment_method_id != 1 && $booking->paymentDetail->receipt_attachment)
                                <dt class="col-sm-3">Payment Attachment:</dt>
                                <dd class="col-sm-9">
                                    <a href="{{ asset($booking->paymentDetail->receipt_attachment) }}" target="_blank">Click to View</a>
                                </dd>
                            @endif
                        </dl>
                    </div>
                </div>

                <div class="row">
                    @foreach ($booking->bookingItems as $bookingItem)
                        <div class="col-md-4 mt-10 mb-10">
                            <div class="card">
                                <div class="card-header">
                                    Item #{{ $bookingItem->id }}
                                </div>
                                <div class="card-body">
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

                                </div>
                            </div>
                            <br>
                        </div>
                    @endforeach
                </div>


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
        document.getElementById('decline_reason').value = '';

        document.getElementById('status').addEventListener('change', function() {
            if( this.value == 'DECLINED' ){
                document.getElementById('div_decline_reason').style.display = 'block';
            }
            else{
                document.getElementById('div_decline_reason').style.display = 'none';
                document.getElementById('decline_reason').value = '';
            }
        });
    </script>
@endpush