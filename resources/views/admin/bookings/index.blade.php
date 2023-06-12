@extends('adminlte::page')

@section('title', 'Bookings')

@section('content_header')
    <h1>Bookings</h1>
@stop

@section('content')

@php
    $heads = [
        '#',
        'Status',
        'Customer',
        'Pickup Date',
        'Delivery Date',
        'Total Pairs',
        'Total Cost',
        'Action'
    ];

    // $btnDetails = "<a href='{{ route('admin.bookings.show', [$booking]) }}'>Details</a>";

    $d = [];
    foreach ($bookings as $booking) {
        $d[] = [
            $booking->id,
            Str::of($booking->status)->upper()->replace('_', ' '),
            $booking->customer->email,
            $booking->pickup_date->format('F d Y g:i A'),
            $booking->delivery_date->format('F d Y g:i A'),
            $booking->total_pairs_of_shoes,
            'PHP ' . number_format($booking->paymentDetail->total_cost / 100, 2),
            "<a href='/admin/bookings/$booking->id' title='View Details'><i class='fa fa-eye'></i></a>"
        ];
    }

    $config = [
        'data' => $d,
        'order' => [[0, 'desc']],
        'columns' => [
            null, 
            ['orderable' => false],
            ['orderable' => false],
            null,
            null,
            null,
            ['orderable' => false],
            ['orderable' => false]
        ],
    ];
@endphp

<x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config" striped hoverable bordered beautify/>

@endsection
