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
                            <dd class="col-sm-9">{{ $booking->customer->address_1 }}</dd>

                            <dt class="col-sm-3">Pickup Date:</dt>
                            <dd class="col-sm-9">{{ $booking->pickup_date }}</dd>

                            <dt class="col-sm-3">Delivery Date:</dt>
                            <dd class="col-sm-9">{{ $booking->delivery_date }}</dd>
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
                                                <option value="" selected disabled> {{ $booking->status }}(current)</option>
                                                @foreach($statuses as $status)
                                                    <option value="{{ $status }}">{{ Str::of($status)->title()->replace('_', ' ') }}</option>
                                                @endforeach
                                            </select>
                                            <button  class="btn btn-primary" type="submit" for="status">Update</button>
                                        </div>

                                    </form>
                                @else
                                    <h2>{{ $booking->status }}</h2>
                                @endif
                            </dd>

                            <dt class="col-md-12">
                                <br>
                            </dt>

                            <dt class="col-sm-3">Total Cost:</dt>
                            <dd class="col-sm-9"><h4>PHP {{ $booking->paymentDetail->total_cost }}</h4></dd>


                            <dt class="col-sm-3">Payment Mode:</dt>
                            <dd class="col-sm-9">{{ $booking->paymentDetail->paymentMethod->name }}</dd>

                            @if($booking->paymentDetail->payment_method_id != 1)
                                <dt class="col-sm-3">Payment Attachment:</dt>
                                <dd class="col-sm-9">{{ $booking->paymentDetail->paymentMethod->receipt_attachment }}</dd>
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
                                            <dd class="col-sm-4 text-right">PHP {{ $service->cost }}</dd>
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